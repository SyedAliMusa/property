<?php

namespace App\Http\Controllers\backEnd\Property;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function showProperties() {
        $properties = Property::allProperty();
        return view('Admin.views.Property.property_list', compact('properties'));
    }

    public function showSoldProperties() {
        $properties = Property::soldProperty();
        return view('Admin.views.Property.sold_property_list', compact('properties'));
    }

    public function showDeletedProperties() {
        $properties = Property::deletedPropertyAll();
        return view('Admin.views.Property.deleted_property_list', compact('properties'));
    }

    public function showFeaturedProperties() {
        $properties = Property::featuredPropertyAll();
        return view('Admin.views.Property.featured_property_list', compact('properties'));
    }

    public function showInactiveProperties() {
        $properties = Property::inActivePropertyAll();
        return view('Admin.views.Property.inactive_property_list', compact('properties'));
    }

    public function setPropertyType(Request $request): \Illuminate\Http\RedirectResponse
    {
        $property = Property::find($request->get('propertyId'));
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
        return back();
    }

    public function showPropertyDetails($id){
        $property = Property::with(['user', 'propertyImages', 'propertyFeatures'])->where('id', $id)->first();
        $user = User::with('properties')->where('id', $property->user->id)->first();
        return view('Admin.views.Property.property_detail', compact('property', 'user'));
    }

}
