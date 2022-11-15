<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Product;
use App\Models\Collection;
use App\Models\Navbar;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class ImageController extends Controller {
    public function index(Request $request) {
        if(Gate::denies('is-admin')){
            return redirect(route(__('urls.home')))->with('error', trans('auth.admin-role-required'));
        }

        $products = Product::with('collections')->get();

        //$collections = Collection::with('products')
        //                ->wherehas('images')->get();
        //if($collections==null)
        $collections = Collection::with('products')->get();

        return view('collections.index')
            ->with([
                'collections'  => $collections,
                'products'   =>  $products,
                'paginate'  =>  false,
                'product_selected'  =>  null,
                'navbar'    =>  Navbar::all(),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('collectionimages.create',[
            'product'=>null,
            'navbar'    =>  Navbar::all(),]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            //'image_path' => 'required|image|mimes:jpg,png,jpeg|max:5048',
            'image_path' => 'required|array',
            'image_path.*' => 'image|mimes:jpg,png,jpeg|max:5048'
        ],);//max:kilobytes
        $collection = Collection::where('slug',$request->collection_slug)->with('products')->first();

        $countImages=0;
        if($request->file('image_path')){
            foreach($request->image_path as $key=>$img){
                $imagePath = 'images/productos/'.$collection->products[0]->slug .
                            '/'.strtolower(__('collections.title')).'/';
                $imageName = $collection->products[0]->slug .
                                '-' . Str::slug($collection->name) .
                                '-' . '0'. ++$key .
                                '.' . $img->getClientOriginalExtension();
                $img->move(public_path($imagePath.$imageName));
                $imagesArray[] = $imagePath.$imageName;
                $image = Image::create([
                    'alt' =>    $imageName,
                    'user_id'   =>  auth()->id(),
                    'path' =>    $imagePath,
                    'extension' =>    $img->getClientOriginalExtension(),
                ]);
                $countImages++;
                $image->save();
                $image->collections()->sync($collection->id);
            }
        }
        $request->session()->flash('success',trans('images.stored'));
        return redirect(route(__('urls.collections')));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$collection) {
        $slug=$collection;
        if(is_numeric($slug)){
            $collection = Collection::find($slug);
        }else{
            $collection = Collection::where('slug',$slug)->with('products')->first();
        }
        //var_dump($slug);
        if($collection==null){
            $request->session()->flash('success', trans('products.not-found'));
            return redirect(route(__('urls.products.index')));
        }

        foreach( $collection->products as $product ){
            $productName= $product->name;
        }

        return view('collections.partials.add-images-to-collection',[
            'collection'    =>  $collection,
            'product_name'  =>  $productName,
            'products'      =>  Product::all(),
            'navbar'        =>  Navbar::all(),
            'create'        =>  true,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$slug) {
        if(is_numeric($slug)){
            $product = Product::find($slug);
        }else{
            $product = Product::where('slug',$slug)->first();
        }

        if($product==null){
            $request->session()->flash('success', trans('products.not-found'));
            return redirect(route(__('urls.products.index')));
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
    public function update(Request $request, $id) {
        $product = Product::find($id);

        if(!$product){
            $request->session()->flash('error', trans('products.you-cannot-edit'));
            return redirect(route('products.index'));
        }

        if($request->activate){
            $product->active = 1;
            $product->update([
                'product_id' => $request->product_id,
                'name'  =>  $request->name,
                'slug'  =>  Str::slug($request->name),]);
            $request->session()->flash('success', trans('products.activated'));
        }

        if($product->name != $request->name){
            $product->update($request->input());
            $request->session()->flash('success', trans('products.updated'));
        }
        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id) {
        $image = Image::findOrFail($id);
        //$product->active = 0;
        //$product->update();
        $request->session()->flash('success', trans('collections.image-deleted'));
        //User::destroy($id);
        return redirect(route('collections.index'));
    }
}
