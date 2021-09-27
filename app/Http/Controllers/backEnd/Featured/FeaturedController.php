<?php

namespace App\Http\Controllers\backEnd\Featured;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;

class FeaturedController extends Controller
{
    public function setType(Request $request): \Illuminate\Http\RedirectResponse
    {
        if ($request->get('changeFor') == 'Property') {
            $property = Property::find($request->get('changeId'));
            if ($request->get('type') == 'Featured') {
                $property->is_feature = !$property->is_feature;
            } elseif ($request->get('type') == 'Deactivate') {
                $property->is_active = !$property->is_active;
            } elseif ($request->get('type') == 'Sold') {
                $property->is_sold = !$property->is_sold;
            } else {
                echo 'any other type';
            }
            $property->save();
        } else if ($request->get('changeFor') == 'User') {
            $user = User::find($request->get('changeId'));
            if ($request->get('type') == 'Featured') {
                $user->is_feature = !$user->is_feature;
            } elseif ($request->get('type') == 'Deactivate') {
                $user->is_active = !$user->is_active;
            } else {
                echo 'any other type';
            }
            $user->save();
        } else {
            echo 'any other type';
        }
        return back();
    }
}
