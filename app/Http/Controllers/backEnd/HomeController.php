<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        $tAgents = User::allAgentsCount();
        $tFeaturedAgents = User::allFeaturedAgentCount();
        $tProperty = Property::allPropertyCount();
        $tSoldProperty = Property::soldPropertyCount();
        $latestAgents = User::latestAgents(8);
        $latestRentalProperty = Property::getTypedProperty('Rent', 5);
        $latestSaleProperty = Property::getTypedProperty('Sale', 5);
        $latestFeaturedProperty = Property::featuredProperty(5);
        $latestSoldProperty = Property::latestSoldProperty(5);
        $data = array('tAgents' => $tAgents, 'tFeaturedAgents' => $tFeaturedAgents, 'tProperty' => $tProperty,
                'tSoldProperty' => $tSoldProperty, 'latestAgents' => $latestAgents, 'latestRentalProperty' => $latestRentalProperty,
                'latestSaleProperty' => $latestSaleProperty, 'latestFeaturedProperty' => $latestFeaturedProperty,
                'latestSoldProperty' => $latestSoldProperty);
        return view('Admin.views.home', compact('data'));
    }

    public function logout(Request $request) {

        Auth::logout();

        return redirect(route('home'));

    }

}
