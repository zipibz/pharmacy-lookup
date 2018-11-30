<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pharmacy;
use Illuminate\Support\Facades\Validator;

class PharmacyController extends Controller
{
    /**
     * Finds the closest pharmacy to the provided latitude/longitude
     *
     * @param $latitude The latitude of the users location
     * @param $longitude The longitude of the users location
     * @returns JSON representing the pharmacy that was found
     */
    public function closest($latitude, $longitude) {

        $query = Pharmacy::distance($latitude, $longitude);
        $asc = $query->orderBy('distance', 'ASC')->get();

        $pharmacy = [
            'name' => $asc[0]->name,
            'distance' => round($asc[0]->distance, 2),
            'address' => [
                'street' => $asc[0]->street,
                'city' => $asc[0]->city,
                'state' => $asc[0]->state,
                'zip' => $asc[0]->zip
            ]
        ];

        return response()->json($pharmacy, 200);
    }
}
