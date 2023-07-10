<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Page;
use App\Models\Property;
use App\Models\PropertyEnquire;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

//----------------------------------- Dashboard Home ---------------------------------------
    public function index()
    {
        $user = Auth::user();
        $role = $user->getAttribute('role');
        if($role == 'user')
        {
            
            $counter = [
                'properties' => count(Property::where('user_id', $user->id)->get()),
                'location' => count(Location::all()),
                'page' => count(Page::all()),
                'user' => count(User::all()),
                'message' => count(PropertyEnquire::all()),
            ];
        }
        else{
            $counter = [
                'properties' => count(Property::all()),
                'location' => count(Location::all()),
                'page' => count(Page::all()),
                'user' => count(User::all()),
                'message' => count(PropertyEnquire::all()),
            ];
        }
        
        return view('dashboard.index')->with([
            'counter' => $counter,
            'role' => $role,
        ]);
        // return view('dashboard.index')->with('counter', $counter);
    }

}
