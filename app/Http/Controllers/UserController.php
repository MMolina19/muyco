<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\Role;
use App\Models\User;
use App\Models\Navbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class  UserController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        return view('users.index')
            //->join('roles', 'role.user_id', 'user_id')
            ->with([
                'users'=> User::paginate('10'),'roles'=>Role::all(),
                'navbar'    =>  Navbar::all(),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {
        $user = Auth::user();
        /*echo '<pre>';
        var_dump(array(
            'user'  =>  $user,
            'user_role' =>  $user->roles->pluck('name'),
        ));
        echo '</pre>';
        dd(0);*/

        //if ($user->roles->pluck( 'name' )->contains( 'admin' )) {
            return view('users.create')
            ->with([
                'roles' => Role::all(),
                'navbar'    => Navbar::all(),
            ]);
        //}
        //if(Gate::denies('is-Admin')){
        //else{
        //    return redirect()->back()
        //        ->with('error', trans('auth.admin-role-required'));
        //}

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request) {
        /*if(Gate::denies('is-Admin')){
            return redirect(__('urls.home'))
                ->with('error', trans('auth.admin-role-required'));
        }*/
        //$validatedData = $request->validated();
        //$user = User::create($validatedData);
        $newUser = new CreateNewUser();
        //$user = $newUser->create($request->all());
        $user = $newUser->create($request->only(['name','username','email','phone','password','password_confirmation']));
        $user->roles()->sync($request->roles);

        $request->session()->flash('success',trans('users.stored'));
        return redirect(route(trans('users')));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return view('users.index')
        ->with(
            ['users'=> User::paginate('10'),'roles'=>Role::all(),
                'navbar'    => Navbar::all(),
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario) {
        if(!Gate::denies('is-Admin')){
            return redirect()->back()
                ->with('error', trans('auth.admin-role-required'));
        }
        if(!User::find($usuario)) {
            redirect(route('users.index'));
        }

        return view('users.edit',
        [
            'roles' => Role::all(),
            'user'  =>  $usuario,
        ])->with([
            'navbar'    => Navbar::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario) {
        /*if(Gate::denies('is-Admin')){
            return redirect(__('urls.home'))
                ->with('error', trans('auth.admin-role-required'));
        }*/

        if(!$usuario){
            $request->session()->flash('error', trans('users.you-cannot-edit'));
            return redirect(route('users'));
        }

        if($request->activate){
            $usuario->active = 1;
            $usuario->update();
            $request->session()->flash('success', trans('users.activated'));
        }else{
            $usuario->update($request->except(['_token','roles']));
            $usuario->roles()->sync($request->roles);
            $request->session()->flash('success', trans('users.updated'));
        }
        return redirect(route(trans('urls.users')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($usuario, Request $request) {
        /*if(Gate::denies('is-Admin')){
            return redirect(trans('urls.home'))
                ->with('error', trans('auth.admin-role-required'));
        }*/

        $user = User::findOrFail($usuario);
        $user->active = 0;
        $user->update();
        $request->session()->flash('success', trans('users.deleted'));
        //User::destroy($id);
        return redirect(route(trans('urls.users')));
    }
}
