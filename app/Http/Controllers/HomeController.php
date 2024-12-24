<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    public function home()
    {
        return view('user.home.index');
    }

    public function handleApi(Request $request)
    {
        $data = [
            'data' => 'dataJson',
            'payloads' => $request->all()
        ];
        return response()->json([...$data], 200);
    }
    public function get_data_iot(Request $request)
    {
        // $top = $request->top;
        // $bottom = $request->bottom;
        // $images = $request->images;
        // dd($request);


        // return response()->json([
        //     "data" =>  $request->all(),
        //     "message" => "ddax nhan thong bao iot",
        //     // "data" => $name,
        //     // "data" => $name,
        //     // "data" => $name,
        // ],200);
        $client = new Client();
        $dataToSend = [
            'top' => '20',
            'bottom' => '10',
            'images' => '1',
        ];

        $dataToSend = $request->all();

        $response = $client->get('https://drmaya.click/api/esp32/send_data_iot');


        $data = json_decode($response->getBody()->getContents(), true);
        return response()->json(['data' => $data]);

        // $topDistance = $data['top'];
        // $bottomDistance = $data['bottom'];
        // $images = $data['images'];


        // return view('user.home.index', [
        //     'topDistance' => $topDistance,
        //     'bottomDistance' => $bottomDistance,
        //     'images' => $images,
        // ]);
    }
}
