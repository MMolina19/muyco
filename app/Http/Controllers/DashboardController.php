<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;
use App\Models\Navbar;
use App\Models\Product;
use App\Models\Room;

class DashboardController extends Controller {
    /*public function __invoke() {
        $navbar=Navbar::all();

        return view('dashboard.index')->with([
                'products'  =>  Product::all()->with('collections'),
                'navbar'    =>  $navbar,
            ]);
    }*/
    public function index() {
        $navbar=Navbar::all();
        //Product::paginate('10'),
        return view('dashboard.index')
            ->with([
                'products'  =>  Product::paginate('10'),
                'navbar'    =>  $navbar,
            ]);
    }
}
