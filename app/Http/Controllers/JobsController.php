<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index(Request $request){	

       $urlAPI = 'https://jobs.github.com/positions.json?page='.$request->page;

       $curl = curl_init();
       curl_setopt($curl, CURLOPT_URL, $urlAPI);
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
       curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Accept: application/json',
       ]);

       $result = json_decode(curl_exec($curl),true);

       return response()->json($result,200);
    }

    public function search(Request $request){

       $urlAPI = "https://jobs.github.com/positions.json?";
           
       ($request->description) && $urlAPI .= "description=".$request->description."&";
       ($request->location) && $urlAPI .= "location=".$request->location."&";
       ($request->full_time) && $urlAPI .= "full_time=".$request->full_time."&";
       ($request->lat) && $urlAPI .= "lat=".$request->lat."&";
       ($request->long) && $urlAPI .= "long=".$request->long."&";
           
       $curl = curl_init();
       curl_setopt($curl, CURLOPT_URL, $urlAPI);
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
       curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Accept: application/json',
       ]);

       $result = json_decode(curl_exec($curl),true);

       return response()->json($result,200);

    }
}
