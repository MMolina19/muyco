<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Navbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Role;
use App\Models\User;
use App\Models\Province;
use App\Models\UserContactInfo;
use App\Models\UserSocialMedia;
use App\Models\UserLocation;
use App\Models\UserRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class MyProfileController extends Controller {
    public function index() {
        $role=auth()->user()->roles()->first();
        $roles=Role::all();

        $provinces = Province::all();

        $userSocialMedia = UserSocialMedia::where('user_id',auth()->user()->id)->first();
        if($userSocialMedia == null)
            $userSocialMediaMethod='store';
        else
            $userSocialMediaMethod='update';

        $userContactInfo =  UserContactInfo::where('user_id',auth()->user()->id)->first();
        if($userContactInfo == null)
            $userContactInfoMethod='store';
        else
            $userContactInfoMethod='update';

        $userLocation =  UserLocation::where('user_id',auth()->user()->id)->first();
        if($userLocation == null)
            $userLocationMethod='store';
        else
            $userLocationMethod='update';

        return view('users.my-profile')->with(
            [
                'user' => auth()->user(),
                'roles' => $roles,
                'userRole'  => $role,
                'provinces' =>  $provinces,
                'userSocialMedia'   =>  $userSocialMedia,
                'userSocialMediaMethod'   =>  $userSocialMediaMethod,
                'userSocialMediaFormRoute'    =>  'urls.my-profile.'.$userSocialMediaMethod,
                'userContactInfo'   =>  $userContactInfo,
                'userContactInfoMethod'   =>  $userContactInfoMethod,
                'userContactInfoFormRoute'    =>  'urls.my-profile.'.$userContactInfoMethod,
                'userLocation'      =>  $userLocation,
                'userLocationMethod'   =>  $userLocationMethod,
                'userLocationFormRoute'    =>  'urls.my-profile.'.$userLocationMethod,
                'navbar'    =>  Navbar::all(),
            ]);
    }

    public function show() {
        $role=auth()->user()->roles()->first();
        $roles=Role::all();

        $provinces = Province::all();

        $userSocialMedia = UserSocialMedia::where('user_id',auth()->user()->id)->first();
        if($userSocialMedia == null)
            $userSocialMediaMethod='store';
        else
            $userSocialMediaMethod='update';

        $userContactInfo =  UserContactInfo::where('user_id',auth()->user()->id)->first();
        if($userContactInfo == null)
            $userContactInfoMethod='store';
        else
            $userContactInfoMethod='update';

        $userLocation =  UserLocation::where('user_id',auth()->user()->id)->first();
        if($userLocation == null)
            $userLocationMethod='store';
        else
            $userLocationMethod='update';

        return view('users.my-profile')->with(
            [
                'user' => auth()->user(),
                'roles' => $roles,
                'userRole'  => $role,
                'provinces' =>  $provinces,
                'userSocialMedia'   =>  $userSocialMedia,
                'userSocialMediaMethod'   =>  $userSocialMediaMethod,
                'userContactInfo'   =>  $userContactInfo,
                'userContactInfoMethod'   =>  $userContactInfoMethod,
                'userLocation'      =>  $userLocation,
                'userLocationMethod'   =>  $userLocationMethod,
                'navbar'    =>  Navbar::all(),
            ]);
    }

    public function store(Request $request) {
        $currentUserId = Auth()->user()->id;
        switch($request->input()['toBeUpdated']){
            case 'add-social-media':
                $userSocialMedia = new UserSocialMedia();
                $userSocialMedia->user_id = $currentUserId;
                $userSocialMedia->instagram = $request->input()['instagram'];
                $userSocialMedia->facebook = $request->input()['facebook'];
                $userSocialMedia->save();
                $request->session()->put('success',
                    trans('my-profile.add-social-media-registered'));

                break;
            case 'add-contact-info':
                $userContactInfo = new UserContactInfo();
                $userContactInfo->user_id = $currentUserId;
                $userContactInfo->phone = $request->input()['phone'];
                $userContactInfo->mobile = $request->input()['mobile'];
                $userContactInfo->created_at = now();
                $userContactInfo->updated_at = now();

                $userContactInfo->save();
                $request->session()->put('success',
                    trans('my-profile.add-contact-info-registered'));

                break;
            case 'add-location':
                Validator::make($request->all(), [
                    'province_id'   => ['required','numeric','min:1'],
                    'city'          => ['required', 'string', 'max:255'],
                    'address'       => ['required', 'string', 'max:255'],
                ])->validate();
                $userLocation = new UserLocation();
                $userLocation->user_id = $currentUserId;
                $userLocation->province_id = $request->input()['province_id'];
                $userLocation->city = $request->input()['city'];
                $userLocation->address = $request->input()['address'];
                $userLocation->save();

                $request->session()->put('success',
                    trans('my-profile.add-location-registered'));

                break;
        }
        return redirect(route(trans('urls.my-profile')));
    }

    public function update(Request $request,$currentUserId){
        $updateDatabaseRow=false;
        switch($request->input()['toBeUpdated']){
            case 'add-social-media':
                if( UserSocialMedia::where('user_id',$currentUserId)->first()!=null ){
                    $collection = UserSocialMedia::where('user_id',$currentUserId)->first();
                    UserSocialMedia::where('user_id',$currentUserId)->delete();
                    $updateDatabaseRow=true;
                }
                $userSocialMedia = new UserSocialMedia();
                if($updateDatabaseRow!=false)
                    $userSocialMedia->id = $collection->id;
                $userSocialMedia->user_id = $currentUserId;
                $userSocialMedia->instagram = $request->input()['instagram'];
                $userSocialMedia->facebook = $request->input()['facebook'];
                $userSocialMedia->save();
                $request->session()->put('success',trans('my-profile.add-social-media-registered'));

                break;
            case 'add-contact-info':
                if( UserContactInfo::where('user_id',$currentUserId) !=null ){
                    $collection = UserContactInfo::where('user_id',$currentUserId)->first();
                    UserContactInfo::where('user_id',$currentUserId)->delete();
                    $updateDatabaseRow=true;
                }

                $userContactInfo = new UserContactInfo();
                if($updateDatabaseRow!=false)
                    $userContactInfo->id = $collection->id;
                $userContactInfo->user_id = $currentUserId;
                $userContactInfo->phone = $request->input()['phone'];
                $userContactInfo->mobile = $request->input()['mobile'];
                $userContactInfo->save();
                $request->session()->put('success',trans('my-profile.add-contact-info-registered'));

                break;
            case 'add-location':
                Validator::make($request->all(), [
                    'province_id'   => ['required','numeric','min:1'],
                    'city'          => ['required', 'string', 'max:255'],
                    'address'       => ['required', 'string', 'max:255'],
                ])->validate();

                if( UserLocation::where('user_id',$currentUserId)->first() !=null ){
                    $collection = UserLocation::where('user_id',$currentUserId)->first();
                    UserLocation::where('user_id',$currentUserId)->delete();
                    $updateDatabaseRow=true;
                }

                $userLocation = new UserLocation();
                if($updateDatabaseRow!=false)
                    $userLocation->id = $collection->id;
                $userLocation->user_id = $currentUserId;
                $userLocation->province_id = $request->input()['province_id'];
                $userLocation->city = $request->input()['city'];
                $userLocation->address = $request->input()['address'];

                $userLocation->save();
                $request->session()->put('success',trans('my-profile.add-location-registered'));

                break;
            case 'update-user-role':
                $user = Auth()->user();
                $roleAnt = $user->roles();
                $user->roles()->sync([$request->input('role_id')]);
                /*echo'<pre>';
                var_dump(array(
                    'roleAnt'  => $roleAnt,
                    'currentUser'  => $currentUserId,
                    'request->role_id'  =>  $request->role_id,
                ));
                echo'</pre>';dd('Stopped');*/
                $request->session()->put('success',trans('my-profile.update-user-role-registered'));

                break;
        }

        return redirect(route(trans('urls.my-profile')));
    }

    public function destroy($id, Request $request) {
        if(Gate::denies('is-Admin')){
            return redirect(trans('urls.home'))
                ->with('error', trans('auth.role-required'));
        }
        $user = User::findOrFail($id);
        $user->active = 0;
        $user->update();
        $request->session()->put('success', trans('users.deleted'));
        //User::destroy($id);
        return redirect(route(trans('urls.users.index')));
    }

}
