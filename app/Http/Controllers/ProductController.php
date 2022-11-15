<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Navbar;
use App\Models\ProductType;
use App\Models\DesignType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class ProductController extends Controller {
    /* *
    public function __invoke() {
        if(Gate::denies('is-Admin')){
            return redirect(__('urls.home'))
                ->with('error', trans('auth.admin-role-required'));
        }
        //return view('products.index',['products'=>Product::all()]);
        return view('products.index')
            ->with(['products'=> Product::paginate('10')]);
    }

     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        /*if(Gate::denies('is-admin')){
            return redirect(__('urls.home'))
                ->with('error', trans('auth.admin-role-required'));
        }*/
        return view('products.index')
            ->with([
                'products'=> Product::paginate('10'),
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
        return view('products.create',[
            'product'   =>  null,
            'productsTypes' =>  ProductType::all(),
            'designsTypes' =>  DesignType::all(),
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
        $newProduct = new Product();
        $user = $newProduct->create([
            'name'  =>  $request->name,
            'slug'  =>  Str::slug($request->name),]);

        $request->session()->flash('success',trans('products.stored'));
        return redirect(route(trans('urls.products')));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$producto) {
        if(is_numeric($producto)){
            $product = Product::find($producto);
        }else{
            $product = Product::where('slug',$producto)->first();
        }

        if($product==null){
            $request->session()->flash('success', trans('products.not-found'));
            return redirect()->back();
        }

        return view('products.show',
        [
            'product'  =>  $product,
            'navbar'    =>  Navbar::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$producto) {
        if(Gate::denies('is-admin')){
            return redirect()->back()
                ->with('error', trans('auth.admin-role-required'));
        }
        if(is_numeric($producto)){
            $product = Product::find($producto);
        }else{
            $product = Product::where('slug',$producto)->first();
        }

        if($product==null){
            $request->session()->flash('success', trans('products.not-found'));
            return redirect()->back();
        }

        return view('products.edit',
        [
            'product'  =>  $product,
            'navbar'    =>  Navbar::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $producto) {
        if(Gate::denies('is-admin')){
            return redirect(__('urls.home'))
                ->with('error', trans('auth.admin-role-required'));
        }
        if(is_numeric($producto)){
            $product = Product::find($producto);
        }else{
            $product = Product::where('slug',$producto)->first();
        }
        if(!$product){
            $request->session()->flash('error', trans('products.you-cannot-edit'));
            return redirect(route(trans('urls.products')));
        }

        if($request->activate){
            $product->active = 1;
            $product->update();
            $request->session()->flash('success', trans('products.activated'));
        }

        elseif($product->name != $request->name){
            $product->update([
                //'product_id' => $request->product_id,
                'name'  =>  $request->name,
                'slug'  =>  Str::slug($request->name),]);
            $request->session()->flash('success', trans('products.updated'));
        }
        return redirect(route(trans('urls.products')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id) {
        if(Gate::denies('is-admin')){
            return redirect(__('urls.home'))
                ->with('error', trans('auth.admin-role-required'));
        }
        $product = Product::findOrFail($id);
        $product->active = 0;
        $product->update();
        $request->session()->flash('success', trans('products.deleted'));
        //User::destroy($id);
        return redirect(route(trans('urls.products')));
    }
}
