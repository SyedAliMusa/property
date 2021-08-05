<?php

namespace App\Http\Controllers\frontEnd\Home;

use App\Http\Controllers\Controller;
use App\Models\property;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        $propertySale = property::Property('Sale');
        $propertyRent = property::Property('Rent');
        $propertyFeatured = property::PropertyFeatured();
        $users  = User::FeaturedUsers();
        return view('frontEnd.views.home', compact(
            'propertySale',
            'propertyRent',
            'propertyFeatured',
            'users'
        ));
    }
}
