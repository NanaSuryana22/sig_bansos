<?php

namespace App\Http\Controllers\api;

use App\Penyaluran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SebaranBansosDesa as SebaranBansosDesaResource;

class SebaranBansosDesaController extends Controller
{
    public function index(Request $request)
    {
        $penyalurans = Penyaluran::all();

        $geoJSONdata = $penyalurans->map(function ($penyaluran) {
            return [
                'type'       => 'Feature',
                'properties' => new SebaranBansosDesaResource($penyaluran),
                'geometry'   => [
                    'type'        => 'Point',
                    'coordinates' => [
                        $penyaluran->kel_long,
                        $penyaluran->kel_lat,
                    ],
                ],
            ];
        });

        return response()->json([
            'type'     => 'FeatureCollection',
            'features' => $geoJSONdata,
        ]);
    }
}
