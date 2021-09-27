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

        $id = explode('@', auth()->user()->email);
        $property->property_id = $id[0].uniqid();
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
            ->paginate(2);
        $latest = Property::lastThreeFeaturedProperty(6);
        return view('frontEnd.views.Property.property_list', compact('list', 'latest'));
    }

    public function getProperty(Property $property) {
        if (Auth::check()) {
            if(\auth()->user()->id != $property->user->id) {
                $property->views = ($property->views) + 1;
                $property->save();
            }
        } else {
            $property->views = ($property->views) + 1;
            $property->save();
        }
        $latest = Property::lastThreeProperty();
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

        $list = Property::with(['user', 'propertyImages', 'propertyFeatures'])
                ->Active()
                ->Sold()
                ->Pending()
                ->Deleted();

        if ($request->has('location') && $request->location != null) {
            $list->where('location', 'like', "%{$request->location}%");
        }

        if ($request->has('type') && $request->type != null) {
            $list->where('type', 'like', "%{$request->type}%");
        }

        if ($request->has('style') && $request->style != null) {
            $list->where('style', 'like', "%{$request->style}%");
        }

        if ($request->has('bedrooms') && $request->bedrooms != null) {
            $list->where('bedrooms', 'like', "%{$request->bedrooms}%");
        }

        if ($request->has('bathrooms') && $request->bathrooms != null) {
            $list->where('bathrooms', 'like', "%{$request->bathrooms}%");
        }

        if ($request->has('minPrice') && $request->minPrice != null) {
            $list->where('price', '>=', $request->minPrice);
        }

        if ($request->has('maxPrice') && $request->maxPrice != null) {
            $list->where('price', '<', $request->maxPrice);
        }

        if ($request->has('minSq') && $request->minSq != null) {

            $list->where('area', '>=', $request->minSq);
        }

        if ($request->has('maxSq') && $request->maxSq != null) {
            $list->where('area', '<', $request->maxSq);
        }

        $list = $list->orderBy('id', 'DESC')->paginate(2);

        $latest = Property::lastThreeFeaturedProperty(6);
        return view('frontEnd.views.search', compact('list', 'latest'));

    }
}
