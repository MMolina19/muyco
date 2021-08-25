<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Models\Role;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Gate;

class  UserController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /*public function __construct() {
        $this->middleware('guest:admin')->except('logout');
    }*/

    public function index(Request $request) {
        return view('admin.users.index', ['users'=> User::paginate('10')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        if(Gate::denies('logged-in')){
            //dd( trans('auth.no-access-allowed'));
            return redirect(route('login'))
                ->with('error', trans('auth.no-access-allowed'));
        }
        if(Gate::allows('is-admin')){
            return View('admin.users.create',['roles' => Role::all()]);
        }
        return redirect(route('admin.users.index'))->with('error', trans('auth.no-admin-privileges'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if(Gate::denies('logged-in')){
            //dd( trans('auth.no-access-allowed'));
            return redirect(route('login'))
                ->with('error', trans('auth.no-access-allowed'));
        }
        /*$validatedData = $request->validate([
            'username' => 'max:255',
            'name'  =>  'required|max:255',
            'email' =>  'required|email|max:255',
            'phone' => 'required|max:16',
            'password'  =>  'required|min:8|max:255',
        ]);*/
        if(Gate::allows('is-admin')){
            $user = User::create($request);
            $user->roles()->sync($request->roles);
            $request->session()->flash('success', trans('users.stored'));

            return redirect(route('admin.users.index'));
        }
        return redirect(route('admin.users.index'))->with('error', trans('auth.no-admin-privileges'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $users[] = $user = User::findOrFail($id);

        return view('admin.users.index', $users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if(Gate::denies('logged-in')){
            //dd( trans('auth.no-access-allowed'));
            return redirect(route('login'))
                ->with('error', trans('auth.no-access-allowed'));
        }
        if(Gate::allows('is-admin')){
            if(!User::find($id)) {
                redirect(route('admin.users.index'));
            }

            return View('admin.users.edit',
                [
                    'roles' => Role::all(),
                    'user'  =>  User::findOrFail($id),
                ]);
        }
        return redirect(route('admin.users.index'))->with('error', trans('auth.no-admin-privileges'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        if(Gate::denies('logged-in')){
            //dd( trans('auth.no-access-allowed'));
            return redirect(route('login'))
                ->with('error', trans('auth.no-access-allowed'));
        }
        if(Gate::allows('is-admin')){
            $user = User::findOrFail($id);

            if(!$user){
                $request->session()->flash('error', trans('users.you-cannot-edit'));
            }

            if($request->activate){
                $user->active = 1;
                $user->update();
                $request->session()->flash('success', trans('users.activated'));
            }else{
                $user->update($request->except(['_token','roles']));
                $user->roles()->sync($request->roles);
                $request->session()->flash('success', trans('users.updated'));
            }

            return redirect(route('admin.users.index'));
        }
        return redirect(route('admin.users.index'))->with('error', trans('auth.no-admin-privileges'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request) {
        if(Gate::denies('logged-in')){
            //dd( trans('auth.no-access-allowed'));
            return redirect(route('login'))
                ->with('error', trans('auth.no-access-allowed'));
        }
        if(Gate::allows('is-admin')){
            $user = User::findOrFail($id);
            $user->active = 0;
            $user->update();
            $request->session()->flash('success', trans('users.deleted'));
            //User::destroy($id);
            return redirect(route('admin.users.index'));
        }
        return redirect(route('admin.users.index'))->with('error', trans('auth.no-admin-privileges'));
    }
}
