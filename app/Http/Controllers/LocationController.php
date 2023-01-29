<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignupRequest;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDO;

class LocationController extends Controller
{
    /**
     * List countries 
     */
    public function listCountries(Request $request){

        if($request->name){
            $countries = Country::where('name','LIKE','%'.strip_tags($request->name).'%')->get();
        }else{
            $countries = Country::all();
        }
        $data = [
            'countries' => $countries,
            'message' => "Countries listed successfully"
        ];
        return response()->json($data, 200);
    }

    /**
     * List states for country passed
     */
    public function listStates(Request $request, $country){
        if($request->name){
            $states = State::where('country_id', $country)->where('name','LIKE','%'.strip_tags($request->name).'%')->get();
        }else{
            $states = State::where('country_id', $country)->get();
        }
        $data = [
            'states' => $states,
            'message' => "States listed successfully"
        ];
        return response()->json($data, 200);
    }

    /**
     * List cities for country passed
     */
    public function listCities(Request $request, $state){
        if($request->name){
            $cities = State::where('state_id', $state)->where('name','LIKE','%'.strip_tags($request->name).'%')->get();
        }else{
            $cities = State::where('state_id', $state)->get();
        }
        
        $data = [
            'cities' => $cities,
            'message' => "Cities listed successfully"
        ];
        return response()->json($data, 200);
    }
}
