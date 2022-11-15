<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\Navbar;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class RoomController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('rooms.index')
            ->with([
                'rooms'=> Room::paginate('10'),
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
        return view('rooms.create',[
            'room'  =>  null,
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
        $newRoom = new Room();
        $newRoom->create([
            'name'  =>  $request->name,
            'slug'  =>  Str::slug($request->name),
        ]);

        $request->session()->flash('success',trans('rooms.stored'));
        return redirect(route('room.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$habitacion) {
        if (is_numeric($habitacion)){
            $room = Room::find($habitacion);
        }else {
            $room = Room::where('slug',$habitacion)->first();
        }
        if($habitacion==null){
            $request->session()->flash('success', trans('rooms.not-found'));
            return redirect()->back();
        }

        return view('rooms.show',
        [
            'room'  =>  $room,
            'navbar'    =>  Navbar::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $habitacion) {
        if(Gate::denies('is-admin')){
            return redirect(__('urls.home'))
                ->with('error', trans('auth.admin-role-required'));
        }
        if (is_numeric($habitacion)){
            $room = Room::find($habitacion);
        }else {
            $room = Room::where('slug',$habitacion)->first();
        }
        if(!$room){
            $request->session()->flash('error', trans('rooms.you-cannot-edit'));
            return redirect(route(trans('urls.rooms')));
        }
        return view('rooms.edit',
        [
            'room'  =>  $room,
            'navbar'    =>  Navbar::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $habitacion) {
        if(Gate::denies('is-admin')){
            return redirect(__('urls.home'))
                ->with('error', trans('auth.admin-role-required'));
        }
        if (is_numeric($habitacion)){
            $room = Room::find($habitacion);
        }else {
            $room = Room::where('slug',$habitacion)->first();
        }
        if(!$room){
            $request->session()->flash('error', trans('rooms.you-cannot-edit'));
            return redirect(route(trans('urls.rooms')));
        }

        if($request->activate){
            $room->active = 1;
            $room->update();
            $request->session()->flash('success', trans('rooms.activated'));
        }
        else{
            if($room->name != $request->name){
                $room->update([
                    //'room_id' => $request->room_id,
                    'name'  =>  $request->name,
                    'slug'  =>  Str::slug($request->name),]);
                $request->session()->flash('success', trans('rooms.updated'));
            }
        }

        return redirect(route(trans('urls.rooms')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$habitacion) {
        if (is_numeric($habitacion)){
            $room = Room::find($habitacion);
        }else {
            $room = Room::where('slug',$habitacion)->first();
        }
        if(!$room){
            $request->session()->flash('error', trans('rooms.you-cannot-edit'));
            return redirect(route(trans('urls.rooms')));
        }
        $room->active = 0;
        $room->update();
        $request->session()->flash('success', trans('rooms.deleted'));
        //User::destroy($id);
        return redirect(route(trans('urls.rooms')));
    }
}
