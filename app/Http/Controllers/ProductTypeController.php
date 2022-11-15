<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;
use App\Models\Navbar;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class ProductTypeController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('products_types.index')
            ->with([
                'productTypes'  => ProductType::paginate('10'),
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
        return view('products_types.create',[
            'productType'  =>  null,
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
        $newProductType = new ProductType();
        $newProductType->create([
            'name'  =>  $request->name,
            'slug'  =>  Str::slug($request->name),
        ]);

        $request->session()->flash('success',trans('products_types.stored'));
        return redirect(route('products_types.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$tipodeproducto) {
        if (is_numeric($tipodeproducto)){
            $productType = ProductType::find($tipodeproducto);
        }else {
            $productType = ProductType::where('slug',$tipodeproducto)->first();
        }
        if($tipodeproducto==null){
            $request->session()->flash('success', trans('products_types.not-found'));
            return redirect()->back();
        }

        return view('products_types.show',
        [
            'productType'  =>  $productType,
            'navbar'    =>  Navbar::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $tipodeproducto) {
        if(Gate::denies('is-admin')){
            return redirect(__('urls.home'))
                ->with('error', trans('auth.admin-role-required'));
        }
        if (is_numeric($tipodeproducto)){
            $productType = ProductType::find($tipodeproducto);
        }else {
            $productType = ProductType::where('slug',$tipodeproducto)->first();
        }
        if(!$productType){
            $request->session()->flash('error', trans('products_types.you-cannot-edit'));
            return redirect(route(trans('urls.products_types')));
        }
        return view('products_types.edit',
        [
            'productType'  =>  $productType,
            'navbar'    =>  Navbar::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tipodeproducto) {
        if(Gate::denies('is-admin')){
            return redirect(__('urls.home'))
                ->with('error', trans('auth.admin-role-required'));
        }
        if (is_numeric($tipodeproducto)){
            $productType = ProductType::find($tipodeproducto);
        }else {
            $productType = ProductType::where('slug',$tipodeproducto)->first();
        }
        if(!$productType){
            $request->session()->flash('error', trans('products_types.you-cannot-edit'));
            return redirect(route(trans('urls.products_types')));
        }

        if($request->activate){
            $productType->active = 1;
            $productType->update();
            $request->session()->flash('success', trans('products_types.activated'));
        }
        else{
            if($productType->name != $request->name){
                $productType->update([
                    //'wood_id' => $request->designtype_id,
                    'name'  =>  $request->name,
                    'slug'  =>  Str::slug($request->name),]);
                $request->session()->flash('success', trans('products_types.updated'));
            }
        }

        return redirect(route(trans('urls.products_types')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$tipodeproducto) {
        if (is_numeric($tipodeproducto)){
            $productType = ProductType::find($tipodeproducto);
        }else {
            $productType = ProductType::where('slug',$tipodeproducto)->first();
        }
        if(!$productType){
            $request->session()->flash('error', trans('products_types.you-cannot-edit'));
            return redirect(route(trans('urls.products_types')));
        }
        $productType->active = 0;
        $productType->update();
        $request->session()->flash('success', trans('products_types.deleted'));
        //User::destroy($id);
        return redirect(route(trans('urls.products_types')));
    }
}
