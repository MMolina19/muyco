<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collection;
use App\Models\Product;
use App\Models\Image;
use App\Models\Navbar;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class CollectionController extends Controller {
    public function index(Request $request) {

        $products = Product::with('collections')->get();
        $collections = Collection::with('images')->get();

        return view('collections.index')
            ->with([
                'productSelected'   =>  null,
                'collections'  => $collections,
                'products'   =>  $products,
                'paginate'  =>  false,
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
        return view('collections.create',[
            'image'     => null,
            'images'     => null,
            'products'  => Product::all(),
            'collection'=> null,
            'navbar'    => Navbar::all(),
            ]
        );
    }


    public function updateImages(Request $request, $producto, $coleccion) {

        $product = Product::Where('slug',$producto)->with('collections')->first();

        if($product==null){
            $request->session()->flash('success', trans('products.not-found'));
            return back();
        }

        if(is_numeric($coleccion)){
            foreach($product->collections as $collection){
                if($collection->id == $coleccion){
                    $collectionSelected = $collection;
                }
            }
        }else{
            foreach($product->collections as $collection){
                if($collection->slug == $coleccion){
                    $collectionSelected = $collection;
                }
            }
        }
        if($collectionSelected == null){
            $request->session()->flash('error', trans('collections.not-found'));
            return back();
        }

        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'product_id'  => 'required',
            'name'  => 'required',
            'description'  => 'required',
            'amount'    =>  'required','numeric', 'min:1','max:999999.99', 'regex:/^\d+(\.\d{1,2})?$/',
        ],);//max:kilobytes
        $collection = Collection::create([
            'name'          =>  $request->name,
            'slug'          =>  Str::slug($request->name),
            'description'   =>  $request->description,
            'amount'        =>  round($request->amount,2),
        ]);
        $collection->save();
        $collection->products()->sync($request->product_id);

        $request->session()->flash('success',trans('collections.stored'));
        return redirect(route(__('urls.collections')));
    }

    public function setImages(Collection $collection, Request $request){
        $product = Product::find($request->product_id)->with('collections')->first();
        $collection = Collection::where('slug',$collection->slug)->with('images')->first();

        foreach($collection->images as $image){
            if(file_exists($image))
                @unlink($image);
        }

        if($request->hasfile('image_path')){
            foreach($request->file('image_path') as $key=>$img){
                $imagePath = public_path(DIRECTORY_SEPARATOR.'images'.
                                DIRECTORY_SEPARATOR .strtolower(__('products.title')). DIRECTORY_SEPARATOR .
                                $product->slug . DIRECTORY_SEPARATOR .
                                $collection->slug . DIRECTORY_SEPARATOR);
                $imageUrl = 'images/'.strtolower(__('products.title')).'/'.
                                $product->slug . '/' .
                                $collection->slug . '/';

                $imageName = 'cover-'.$product->slug .
                                '-' . $collection->slug. '.' .$request->cover->extension();

                $collectionImagesCount = 0;
                if($collection->images){
                    $collectionImagesCount = $collection->images()->count();
                    if($collectionImagesCount<10)
                        $imageName .='0';
                }

                //$imageName .= ++$key;
                $imageName .= ++$collectionImagesCount;
                $imageName .= '.' . $img->getClientOriginalExtension();
                $imageUrl .= $imageName;

                $img->move($imagePath.$imageName.$img->getClientOriginalExtension(),$img);
                $image = Image::create([
                    'name'          =>  $imageName,
                    'user_id'       =>  auth()->id(),
                    'product_id'    =>  $product->id,
                    'collection_id' =>  $collection->id,
                    'path'          =>  $img,
                    'url'           =>  $imageUrl,
                    'extension'     =>  $img->getClientOriginalExtension(),
                ]);
                $image->save();
                $image->collections()->sync($request->collection_id);
            }
            return 1;
        }
        return 0;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $producto, $coleccion) {
        echo'<pre>';
        var_dump(array(
            'producto'  => $producto,
            'coleccion'  => $coleccion,
        ));
        echo'</pre>';

        $productSelected = Product::where('slug',$producto)->with('collections')->first();

        echo'<pre>';
        var_dump(array(
            'productSelected'=>$productSelected
        ));
        echo'</pre>';
        dd(0);

        if( $productSelected == null ){
            $request->session()->put('error', __('collections.no-product-matches-found',['product'=>$producto]));
            $collections=null;
        }
        else{
            if($coleccion == null || $coleccion == trans('collecions.slug')){
                $collections = null;
            }
            else{
                $collections = Collection::where('slug',$coleccion)->with('products')->get();
                if( $collections == null )
                    $request->session()->put('error', __('collections.no-collection-matches-found',['product'=>$producto,'collection'=>$coleccion]));
            }
        }

        return view('collections.index')
            ->with([
                'products'          =>  Product::all(),
                'productSelected'   =>  $productSelected->slug,
                'collections'       =>  $collections,
                'navbar'            =>  Navbar::all(),]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $producto, $coleccion) {
        if(is_numeric($producto)){
            $product = Product::find($producto)->with('collections');
        }else{
            //$product = Product::with('collections')->where('slug',$slug)->first();
            $product = Product::find(1)
                    ->where('slug',$producto)
                    ->with('collections')
                    ->first();
        }
        $collectionSelected = null;

        if(is_numeric($coleccion)){
            foreach($product->collections as $collection){
                if($collection->id == $coleccion){
                    $collectionSelected = $collection;
                }
            }
        }else{
            foreach($product->collections as $collection){
                if($collection->slug == $coleccion){
                    $collectionSelected = $collection;
                }
            }
        }
        if($collectionSelected == null){
            $request->session()->flash('error', trans('collections.not-found'));
            return redirect(route(__('urls.collections')));
        }

        return view('collections.edit')
                ->with([
                    'create'        =>  false,
                    'update'        =>  true,
                    'products'      =>  Product::all(),
                    'product'       =>  $product,
                    'collection'    =>  $collectionSelected,
                    'navbar'        =>  Navbar::all(),
                ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $producto, $coleccion) {

        if(is_numeric($producto)){
            $product = Product::find($producto);
        }else{
            //$product = Product::with('collections')->where('slug',$slug)->first();
            $product = Product::find(1)
                    ->where('slug',$producto)->first();
        }

        if(is_numeric($coleccion)){
            $collection = Collection::find($coleccion);
        }else{
            //$product = Product::with('collections')->where('slug',$slug)->first();
            $collection = Collection::find(1)
                    ->where('slug',$coleccion)->first();
        }
        if($product==null){
            $request->session()->flash('error', trans('products.not-found'));
            return redirect(route(__('urls.collections')));
        }

        if($collection==null){
            $request->session()->flash('error', trans('collections.not-found'));
            return redirect(route(__('urls.collections')));
        }

        if($request->activate){
            $collection->update(['active'=>1,]);
            $request->session()->flash('success', trans('collections.activated'));
        }else{
            //$product = Product::where('name',$request->product_name);
            $request->validate([
                'product_id'  => 'required',
                'name'  => 'required',
                'description'  => 'required',
                'amount'    =>  'required','numeric', 'min:1','max:999999.99', 'regex:/^\d+(\.\d{1,2})?$/',
                'cover' => 'required',
                'cover.*' => 'image|mimes:jpg,png,jpeg|max:5048', //max 5048kb
            ],);//max:kilobytes

            $imageName = null;
            $imagePath = null;
            $imageUrl = null;

            if($request->hasFile("cover")) {
                $imagePath = public_path(DIRECTORY_SEPARATOR.'images'.
                                DIRECTORY_SEPARATOR .strtolower(__('products.title')). DIRECTORY_SEPARATOR .
                                $product->slug . DIRECTORY_SEPARATOR .
                                $collection->slug . DIRECTORY_SEPARATOR);
                $imageUrl = 'images/'.strtolower(__('products.title')).'/'.
                                $product->slug . '/' .
                                $collection->slug . '/';

                $imageName = 'cover-'.$product->slug .
                                '-' . $collection->slug. '.' .$request->cover->extension();

                /*echo '<pre>';
                var_dump(array(
                    //'imagePath' =>  $imagePath,
                    //'imageUrl'  =>  $imageUrl,
                    //'imageName' =>  $imageName,
                    'name'          =>  $request->name,
                    'slug'          =>  Str::slug($request->name),
                    'description'   =>  $request->description,
                    'amount'        =>  $request->amount,
                    'cover'         =>  $imageName,
                    'cover_path'    =>  $imagePath,
                    'cover_url'     =>  $imageUrl,
                ));
                echo '</pre>';
                dd(0);*/

                $path = $request->cover->move($imagePath,$imageName);
                $collection->cover_path = $imagePath;
                $collection->cover_url = $imageUrl;

                $collection->update([
                    'name'          =>  $request->name,
                    'slug'          =>  Str::slug($request->name),
                    'description'   =>  $request->description,
                    'amount'        =>  $request->amount,
                    'cover'         =>  $imageName,
                    'cover_path'    =>  $imagePath,
                    'cover_url'     =>  $imageUrl,
                ]);
            }

            $collection->products()->sync($request->product_id);
            $request->session()->flash('success', trans('collections.updated'));

            $request->validate([
                //'image_path' => 'required|image|mimes:jpg,png,jpeg|max:5048',
                'image_path' => 'array',
                'image_path.*' => 'image|mimes:jpg,png,jpeg|max:5048'
            ],);//max:kilobytes

            if($this->setImages($collection,$request)){
                $request->session()->flash('success',trans('images.stored'));
            } else {
                $request->session()->flash('error',trans('images.no-images-to-upload'));
            }

            return redirect(route(__('urls.collections')));
        }

        return redirect(route(__('urls.collections')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $producto, $coleccion) {
        $product = Product::where('slug',$producto)->with('collections');
        var_dump($coleccion);dd(1);
        foreach($product->collections as $collection){
            if($collection->slug == $coleccion){
                $collection->active = null;
            }
        }

        $collection->update();
        $request->session()->flash('success', trans('collections.deleted'));
        //User::destroy($id);
        return redirect(route(__('urls.collections')));
    }
}
