<?php

namespace App\Http\Controllers\frontEnd\Property;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyFeatures;
use App\Models\PropertyImages;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use \Intervention\Image\Facades\Image;

class PropertyController extends Controller
{
    public function add(Request $request) {
        $garage = false;
        if ($request->garage == 'true') {
            $garage = true;
        }

        $path = public_path() . '/PropertyImages/Sale';
        if ($request->status == 'Rent') {
            $path = public_path() . '/PropertyImages/Rent';
        }

        if ($request->hasfile('featureImage')) {
            $fName = $request->file('featureImage')->getClientOriginalName();
            $fileNameF = pathinfo($fName, PATHINFO_FILENAME);
            $extensionF = pathinfo($fName, PATHINFO_EXTENSION);
            $fName = md5(time() . $fileNameF) . '.' . $extensionF;
            if ($request->file('featureImage')->move($path, $fName)) {
                $img = Image::make($path . '/' . $fName);
                $img->resize(85, 64);
                $img->save($path . '/' . $fName);
            }
        }

        if ($request->hasfile('homeImage')) {
            $hName = $request->file('homeImage')->getClientOriginalName();
            $fileNameH = pathinfo($hName, PATHINFO_FILENAME);
            $extensionH = pathinfo($hName, PATHINFO_EXTENSION);
            $hName = md5(time() . $fileNameH) . '.' . $extensionH;
            if ($request->file('homeImage')->move($path, $hName)) {
                $img = Image::make($path . '/' . $hName);
                $img->resize(262, 166);
                $img->save($path . '/' . $hName);
            }
        }


        $property = new Property();

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
        $property->featured_image =$fName;
        $property->home_image = $hName;
        $property->save();

//        $path = public_path() . '/PropertyImages/Sale';
//        if ($property->status == 'Rent') {
//            $path = public_path() . '/PropertyImages/Rent';
//        }

        if ($request->hasfile('file')) {
            foreach ($request->file('file') as $file) {
                $name = $file->getClientOriginalName();
                $filename = pathinfo($name, PATHINFO_FILENAME);
                $extension = pathinfo($name, PATHINFO_EXTENSION);
                $name = md5(time() . $filename) . '.' . $extension;
                if ($file->move($path, $name)) {
                    $img = Image::make($path . '/' . $name);
                    $img->resize(847, 424);
                    $img->save($path . '/' . $name);
                    $image = new PropertyImages();
                    $image->property_id = $property->id;
                    $image->image_name = $name;
                    $image->save();
                }
            }
        }

        if ($request->has('features')) {
            foreach ($request->features as $fea) {
                $feature = new PropertyFeatures();
                $feature->property_id = $property->id;
                $feature->features = $fea;
                $feature->save();
            }
        }
        $success = 'Your property added successfully!';
        return view('frontEnd.views.Property.add_property', compact('success'));
    }

    public function show() {

        $list =  Property::with(['user', 'propertyImages', 'propertyFeatures'])->Active()
            ->Sold()
            ->Pending()
            ->Deleted()
            ->simplePaginate(2);
        $latest = Property::LastThreeFeaturedProperty(6);
        return view('frontEnd.views.Property.property_list', compact('list', 'latest'));
    }

    public function getProperty(Property $property) {
        $latest = Property::LastThreeProperty();
        $path = 'Sale';
        if ($property->type == 'Rent') {
            $path = 'Rent';
        }
        return view('frontEnd.views.Property.property_detail', compact('property', 'path', 'latest'));
    }

    public function agent($id) {
        echo $id;
    }

    public function searchProperty(Request $request) {
        if ($request->has('propertyId') && $request->propertyId != null) {
            $data = Property::with(['user', 'propertyImages', 'propertyFeatures'])
                    ->where('property_id', $request->propertyId)
                    ->Active()
                    ->Sold()
                    ->Pending()
                    ->Deleted()
                    ->first();
            if (!empty($data)) {
                return redirect(route('showProperty', $data->id));
            }
        }
    }
}
