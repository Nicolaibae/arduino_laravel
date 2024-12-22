<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        return view('user.home.index');
    }


    public function iot(Request $request){
        $name = $request->name;


        return response()->json([
            "data" => $name,
        ],200);
    }



    public function get_data_iot(Request $request){
        $top = $request->top;
        $bottom = $request->bottom;
        $images = $request->images;


        return response()->json([
            "data" =>  $request->all(),
            "message" => "ddax nhan thong bao iot",
            // "data" => $name,
            // "data" => $name,
            // "data" => $name,
        ],200);
    }
}
