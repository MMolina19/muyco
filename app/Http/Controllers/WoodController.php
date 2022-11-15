<?php

namespace App\Http\Controllers;

use App\Models\Wood;
use Illuminate\Http\Request;
use App\Models\Navbar;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class WoodController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('woods.index')
            ->with([
                'woods'=> Wood::paginate('10'),
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
        return view('woods.create',[
            'wood'  =>  null,
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
        $newWood = new Wood();
        $newWood->create([
            'name'  =>  $request->name,
            'slug'  =>  Str::slug($request->name),
        ]);

        $request->session()->flash('success',trans('woods.stored'));
        return redirect(route('wood.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wood  $wood
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$madera) {
        if (is_numeric($madera)){
            $wood = Wood::find($madera);
        }else {
            $wood = Wood::where('slug',$madera)->first();
        }
        if($madera==null){
            $request->session()->flash('success', trans('woods.not-found'));
            return redirect()->back();
        }

        return view('woods.show',
        [
            'wood'  =>  $wood,
            'navbar'    =>  Navbar::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wood  $wood
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $madera) {
        if(Gate::denies('is-admin')){
            return redirect(__('urls.home'))
                ->with('error', trans('auth.admin-role-required'));
        }
        if (is_numeric($madera)){
            $wood = Wood::find($madera);
        }else {
            $wood = Wood::where('slug',$madera)->first();
        }
        if(!$wood){
            $request->session()->flash('error', trans('woods.you-cannot-edit'));
            return redirect(route(trans('urls.woods')));
        }
        return view('woods.edit',
        [
            'wood'  =>  $wood,
            'navbar'    =>  Navbar::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wood  $wood
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $madera) {
        if(Gate::denies('is-admin')){
            return redirect(__('urls.home'))
                ->with('error', trans('auth.admin-role-required'));
        }
        if (is_numeric($madera)){
            $wood = Wood::find($madera);
        }else {
            $wood = Wood::where('slug',$madera)->first();
        }
        if(!$wood){
            $request->session()->flash('error', trans('woods.you-cannot-edit'));
            return redirect(route(trans('urls.woods')));
        }

        if($request->activate){
            $wood->active = 1;
            $wood->update();
            $request->session()->flash('success', trans('woods.activated'));
        }
        else{
            if($wood->name != $request->name){
                $wood->update([
                    //'wood_id' => $request->wood_id,
                    'name'  =>  $request->name,
                    'slug'  =>  Str::slug($request->name),]);
                $request->session()->flash('success', trans('woods.updated'));
            }
        }

        return redirect(route(trans('urls.woods')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wood  $wood
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$madera) {
        if (is_numeric($madera)){
            $wood = Wood::find($madera);
        }else {
            $wood = Wood::where('slug',$madera)->first();
        }
        if(!$wood){
            $request->session()->flash('error', trans('woods.you-cannot-edit'));
            return redirect(route(trans('urls.woods')));
        }
        $wood->active = 0;
        $wood->update();
        $request->session()->flash('success', trans('woods.deleted'));
        //User::destroy($id);
        return redirect(route(trans('urls.woods')));
    }
}
