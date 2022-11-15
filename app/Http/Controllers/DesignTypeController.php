<?php

namespace App\Http\Controllers;

use App\Models\DesignType;
use Illuminate\Http\Request;
use App\Models\Navbar;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class DesignTypeController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('designs_types.index')
            ->with([
                'designstypes'=> DesignType::paginate('10'),
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
        return view('designs_types.create',[
            'designtype'  =>  null,
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
        $newDesignType = new DesignType();
        $newDesignType->create([
            'name'  =>  $request->name,
            'slug'  =>  Str::slug($request->name),
        ]);

        $request->session()->flash('success',trans('designs_types.stored'));
        return redirect(route('designs_types.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DesignType  $designType
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$tipodediseno) {
        if (is_numeric($tipodediseno)){
            $designType = DesignType::find($tipodediseno);
        }else {
            $designType = DesignType::where('slug',$tipodediseno)->first();
        }
        if($tipodediseno==null){
            $request->session()->flash('success', trans('designs_types.not-found'));
            return redirect()->back();
        }

        return view('designs_types.show',
        [
            'designType'  =>  $designType,
            'navbar'    =>  Navbar::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DesignType  $designType
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $tipodediseno) {
        if(Gate::denies('is-admin')){
            return redirect(__('urls.home'))
                ->with('error', trans('auth.admin-role-required'));
        }
        if (is_numeric($tipodediseno)){
            $designType = DesignType::find($tipodediseno);
        }else {
            $designType = DesignType::where('slug',$tipodediseno)->first();
        }
        if(!$designType){
            $request->session()->flash('error', trans('designs_types.you-cannot-edit'));
            return redirect(route(trans('urls.designs_types')));
        }
        return view('designs_types.edit',
        [
            'designtype'  =>  $designType,
            'navbar'    =>  Navbar::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DesignType  $designType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tipodediseno) {
        if(Gate::denies('is-admin')){
            return redirect(__('urls.home'))
                ->with('error', trans('auth.admin-role-required'));
        }
        if (is_numeric($tipodediseno)){
            $designType = DesignType::find($tipodediseno);
        }else {
            $designType = DesignType::where('slug',$tipodediseno)->first();
        }
        if(!$designType){
            $request->session()->flash('error', trans('designs_types.you-cannot-edit'));
            return redirect(route(trans('urls.designs_types')));
        }

        if($request->activate){
            $designType->active = 1;
            $designType->update();
            $request->session()->flash('success', trans('designs_types.activated'));
        }
        else{
            if($designType->name != $request->name){
                $designType->update([
                    //'wood_id' => $request->designtype_id,
                    'name'  =>  $request->name,
                    'slug'  =>  Str::slug($request->name),]);
                $request->session()->flash('success', trans('designs_types.updated'));
            }
        }

        return redirect(route(trans('urls.designs_types')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DesignType  $designType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$tipodediseno) {
        if (is_numeric($tipodediseno)){
            $designType = DesignType::find($tipodediseno);
        }else {
            $designType = DesignType::where('slug',$tipodediseno)->first();
        }
        if(!$designType){
            $request->session()->flash('error', trans('designs_types.you-cannot-edit'));
            return redirect(route(trans('urls.designs_types')));
        }
        $designType->active = 0;
        $designType->update();
        $request->session()->flash('success', trans('designs_types.deleted'));
        //User::destroy($id);
        return redirect(route(trans('urls.designs_types')));
    }
}
