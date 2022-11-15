<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upholstered;
use App\Models\Navbar;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class UpholsteredController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('upholstered.index')
            ->with([
                'upholstered'=> Upholstered::paginate('10'),
                'navbar'    =>  Navbar::all(),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        if(Gate::denies('is-admin')){
            return redirect()->back()
                ->with('error', trans('auth.admin-role-required'));
        }
        return view('upholstered.create',[
            'upholstered'  =>  null,
            'navbar'    =>  Navbar::all(),]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if(Gate::denies('is-admin')){
            return redirect()->back()
                ->with('error', trans('auth.admin-role-required'));
        }
        $newUpholstered = new Upholstered();
        $user = $newUpholstered->create([
            'name'  =>  $request->name,
            'slug'  =>  Str::slug($request->name),
        ]);

        $request->session()->flash('success',trans('upholstered.stored'));
        return redirect(route('upholstered.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Upholstered  $upholstered
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$madera) {
        if (is_numeric($madera)){
            $upholstered = Upholstered::find($madera);
        }else {
            $upholstered = Upholstered::where('slug',$madera)->first();
        }
        if($madera==null){
            $request->session()->flash('success', trans('upholstered.not-found'));
            return redirect()->back();
        }

        return view('upholstered.show',
        [
            'upholstered'  =>  $upholstered,
            'navbar'    =>  Navbar::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Upholstered  $upholstered
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $madera) {
        if(Gate::denies('is-admin')){
            return redirect(__('urls.home'))
                ->with('error', trans('auth.admin-role-required'));
        }
        if (is_numeric($madera)){
            $upholstered = Upholstered::find($madera);
        }else {
            $upholstered = Upholstered::where('slug',$madera)->first();
        }
        if(!$upholstered){
            $request->session()->flash('error', trans('upholstered.you-cannot-edit'));
            return redirect(route(trans('urls.upholstered')));
        }
        return view('upholstered.edit',
        [
            'upholstered'  =>  $upholstered,
            'navbar'    =>  Navbar::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Upholstered  $upholstered
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $madera) {
        if(Gate::denies('is-admin')){
            return redirect(__('urls.home'))
                ->with('error', trans('auth.admin-role-required'));
        }
        if (is_numeric($madera)){
            $upholstered = Upholstered::find($madera);
        }else {
            $upholstered = Upholstered::where('slug',$madera)->first();
        }
        if(!$upholstered){
            $request->session()->flash('error', trans('upholstered.you-cannot-edit'));
            return redirect(route(trans('urls.upholstered')));
        }

        if($request->activate){
            $upholstered->active = 1;
            $upholstered->update();
            $request->session()->flash('success', trans('upholstered.activated'));
        }
        else{
            if($upholstered->name != $request->name){
                $upholstered->update([
                    //'upholstered_id' => $request->upholstered_id,
                    'name'  =>  $request->name,
                    'slug'  =>  Str::slug($request->name),]);
                $request->session()->flash('success', trans('upholstered.updated'));
            }
        }

        return redirect(route(trans('urls.upholstered')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Upholstered  $upholstered
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$madera) {
        if (is_numeric($madera)){
            $upholstered = Upholstered::find($madera);
        }else {
            $upholstered = Upholstered::where('slug',$madera)->first();
        }
        if(!$upholstered){
            $request->session()->flash('error', trans('upholstered.you-cannot-edit'));
            return redirect(route(trans('urls.upholstered')));
        }
        $upholstered->active = 0;
        $upholstered->update();
        $request->session()->flash('success', trans('upholstered.deleted'));
        //User::destroy($id);
        return redirect(route(trans('urls.upholstered')));
    }
}
