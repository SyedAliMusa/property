<?php

namespace App\Http\Controllers\frontEnd\Property;

use App\Http\Controllers\Controller;
use App\Models\property;
use App\Models\propertyFeatures;
use App\Models\propertyImages;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class PropertyController extends Controller
{
    public function add(Request $request) {
        $garage = false;
        if ($request->garage == 'true') {
            $garage = true;
        }
        $property = new property();

        $property->property_id = $request->propertyId;
        $property->agent_id = Auth::id();
        $property->description = $request->description;
        $property->title = $request->title;
        $property->type = $request->status;
        $property->style = $request->type;
        $property->state = $request->state;
        $property->city = $request->city;
        $property->bedrooms = $request->bedrooms;
        $property->bathrooms = $request->bathrooms;
        $property->garage = $garage;
        $property->price = $request->price;
        $property->area = $request->area;
        $property->area_unit = $request->unit;
        $property->address = $request->address;
        $property->video_url = $request->videoUrl;
        $property->save();

        $path = public_path() . '/PropertyImages/Sale';
        if ($property->status == 'Rent') {
            $path = public_path() . '/PropertyImages/Rent';
        }

        if ($request->hasfile('file')) {
            foreach ($request->file('file') as $file) {
                $name = $file->getClientOriginalName();
                $filename = pathinfo($name, PATHINFO_FILENAME);
                $extension = pathinfo($name, PATHINFO_EXTENSION);
                $name = md5(time() . $filename) . '.' . $extension;
                $first_image = 0;
                if ($file->move($path, $name)) {
                    if ($first_image == 0) {
                        $img = \Intervention\Image\Facades\Image::make($path . '/' . $name);
                        $img->resize(262, 166);
                        $img->save($path . '/' . $name);
                    } else {
                        $img = \Intervention\Image\Facades\Image::make($path . '/' . $name);
                        $img->resize(847, 424);
                        $img->save($path . '/' . $name);
                    }
                    $image = new propertyImages();
                    $image->property_id = $property->id;
                    $image->image_name = $name;
                    $image->save();
                    $first_image++;
                }
            }
        }

        if ($request->has('features')) {
            foreach ($request->features as $fea) {
                $feature = new propertyFeatures();
                $feature->property_id = $property->id;
                $feature->features = $fea;
                $feature->save();
            }
        }
        $success = 'Your property added successfully!';
        return view('frontEnd.views.Property.add_property', compact('success'));
    }

    public function show() {
        $propertySale = property::Property('Sale');
        $propertyRent = property::Property('Rent');
        $propertyFeatured = property::PropertyFeatured();
        $users  = User::FeaturedUsers();
        echo count($users);
    }

    public function getProperty($id) {
        $property = property::with(['user', 'propertyImages', 'propertyFeatures'])
                    ->where($id)->first();
    }
}
