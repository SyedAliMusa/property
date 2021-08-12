<?php

namespace App\Http\Controllers\frontEnd\Home;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyFeatures;
use App\Models\PropertyImages;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    public function index() {

        $propertySale = Property::Property('Sale', 6);
        $propertyRent = Property::Property('Rent', 6);
        $propertyFeatured = Property::PropertyFeatured(10);
        $users  = User::FeaturedUsers(3);
        return view('frontEnd.views.home', compact(
            'propertySale',
            'propertyRent',
            'propertyFeatured',
            'users'
        ));

    }

    public function list() {
        $myList = Property::with(['user', 'propertyImages', 'propertyFeatures'])
                    ->where('agent_id', auth()->id())
                    ->Active()
                    ->Sold()
                    ->Pending()
                    ->Deleted()
                    ->get();
//        dd($myList);
        $latest = Property::LastThreeFeaturedProperty(6);
        return view('frontEnd.views.Profile.my_property_list', compact('myList', 'latest'));
    }

    public function edit(Property $property) {
        return view('frontEnd.views.Profile.edit_property', compact('property'));
    }

    public function editStore(Request $request, Property $property) {
        $garage = false;
        if ($request->garage == 'true') {
            $garage = true;
        }


        if ($property->type != $request->status) {
            if ($property->propertyImages != null) {
                foreach ($property->propertyImages  as $image) {
                    File::move(public_path() . '/PropertyImages/' . $property->type . '/' . $image->image_name,
                        public_path() . '/PropertyImages/' . $request->status . '/' . $image->image_name);
                }
            }
            if ($property->featured_image != null) {
                File::move(public_path() . '/PropertyImages/' . $property->type . '/' . $property->featured_image,
                    public_path() . '/PropertyImages/' . $request->status . '/' . $property->featured_image);
            }
            if ($property->home_image != null) {
                File::move(public_path() . '/PropertyImages/' . $property->type . '/' . $property->home_image,
                    public_path() . '/PropertyImages/' . $request->status . '/' . $property->home_image);
            }
        }


        $path = public_path() . '/PropertyImages/Sale';
        if ($request->status == 'Rent') {
            $path = public_path() . '/PropertyImages/Rent';
        }


        if ($request->hasFile('featureImage')) {
            $fName = $request->file('featureImage')->getClientOriginalName();
            $fileNameF = pathinfo($fName, PATHINFO_FILENAME);
            $extensionF = pathinfo($fName, PATHINFO_EXTENSION);
            $fName = md5(time() . $fileNameF) . '.' . $extensionF;
            if ($request->file('featureImage')->move($path, $fName)) {
                $img = Image::make($path . '/' . $fName);
                $img->resize(85, 64);
                $img->save($path . '/' . $fName);
            }
            $property->featured_image =$fName;
        }

        if ($request->hasFile('homeImage')) {
            $hName = $request->file('homeImage')->getClientOriginalName();
            $fileNameH = pathinfo($hName, PATHINFO_FILENAME);
            $extensionH = pathinfo($hName, PATHINFO_EXTENSION);
            $hName = md5(time() . $fileNameH) . '.' . $extensionH;
            if ($request->file('homeImage')->move($path, $hName)) {
                $img = Image::make($path . '/' . $hName);
                $img->resize(262, 166);
                $img->save($path . '/' . $hName);
            }
            $property->home_image = $hName;
        }

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

        $success = 'Your property edited successfully!';
        $myList = Property::with(['user', 'propertyImages', 'propertyFeatures'])
            ->where('agent_id', auth()->id())
            ->Active()
            ->Sold()
            ->Pending()
            ->Deleted()
            ->get();
        $latest = Property::LastThreeFeaturedProperty(6);
        return view('frontEnd.views.Profile.my_property_list', compact('myList', 'latest', 'success'));
    }

    public function delete(Property $id) {
        $id->is_deleted = true;
        $id->save();
        return redirect(route('myPropertyList'));
    }

    public function agent(User $user) {
        return view('frontEnd.views.Profile.profile', compact('user'));
    }

    public function profileUpdate(Request $request) {
        $user = User::find(\auth()->id());
        if ($request->has('password') && $request->password != null) {
            $user->password = Hash::make($request->password);
        }

        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->telephone = $request->officeNo;
        $user->bio = $request->bio;
        $user->save();
        return redirect(route('profile', $user->id));
    }

    public function profileImage(Request $request) {

        if ($request->hasFile('myProfile')) {

            $file = $request->file('myProfile');
            $path = public_path() . '/Profile';
            $nameO = $file->getClientOriginalName();
            $filename = pathinfo($nameO, PATHINFO_FILENAME);
            $extension = pathinfo($nameO, PATHINFO_EXTENSION);
            $name = $nameO . '_'. md5(time() . $filename) . '.' . $extension;
            $nameS = 'small_' . $nameO . '_'. md5(time() . $filename) . '.' . $extension;

            $img = Image::make($file->path());

            $img->resize(163, 163)->save($path . '/' . $name);
            $img->resize(65, 65)->save($path . '/' . $nameS);

            $user = User::find(\auth()->id());
            $user->profile = $name;
            $user->small_profile = $nameS;
            $user->save();

        } else {
            return back();
        }

        return redirect(route('profile', $user->id));
    }
}
