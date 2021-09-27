<?php

namespace App\Http\Controllers\backEnd\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Property;

class UserController extends Controller
{
    public function showUsers() {
        $users = User::with('properties')->get();
        return view('Admin.views.Users.user_list', compact('users'));
    }

    public function showFeaturedUsers() {
        $users = User::allFeaturedAgents();
        return view('Admin.views.Users.featured_user_list', compact('users'));
    }

    public function setUserType(Request $request) {
        $user = User::find($request->get('userId'));
        if ($request->get('type') == 'Featured') {
            $user->is_feature = !$user->is_feature;
        } elseif ($request->get('type') == 'Deactivate') {
            $user->is_active = !$user->is_active;
        } else {
            echo 'any other type';
        }
        $user->save();
        return redirect(route('adminUserList'));
    }

    public function setUserAccountActivateType(Request $request) {

        return redirect(route('adminUserList'));
    }

    public function showUserProfile($id) {
        $user = User::with('properties')->where('id', $id)->first();
//        dd($user->properties);
        return view('Admin.views.Users.user_profile', compact('user'));
    }
}
