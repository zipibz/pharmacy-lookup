<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pharmacy;
use Illuminate\Support\Facades\Validator;

class PharmacyController extends Controller
{
    /**
     * Finds the closest pharmacy to the given latitude/longitude 
     *
     * @param $latitude
     * @param $longitude
     */
    public function closest(Request $request, $latitude, $longitude) {

        // $validator = Validator::make($request->all(), [
        //     'latitude' => ['required','regex:^[-+]?([1-8]?\d(\.\d+)?|90(\.0+)?)'], 
        //     'longitude' => ['required','regex:\s*[-+]?(180(\.0+)?|((1[0-7]\d)|([1-9]?\d))(\.\d+)?)$']
        // ], [
        //     'latitude.regex' => 'Latitude value appears to be incorrect format',
        //     'longitude.regex' => 'Longitude value appears to be incorrect format'
        // ]);
        
        // // Test validation
        // if ($validator->fails()) {
        //     return response()->json($validator->errors(), 404);
        // }

        $query = Pharmacy::distance($latitude, $longitude);
        $asc = $query->orderBy('distance', 'ASC')->get();

        $pharmacy = [
            'name' => $asc[0]->name,
            'latitude' => $asc[0]->latitude,
            'longitude' => $asc[0]->longitude,
            'distance' => $asc[0]->distance,
            'address' => [
                    'street' => $asc[0]->street,
                    'city' => $asc[0]->city,
                    'state' => $asc[0]->state,
                    'zip' => $asc[0]->zip
                ]
            ];
            
        return response()->json($pharmacy, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
