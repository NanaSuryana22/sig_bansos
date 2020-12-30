<?php

namespace App\Http\Controllers\api;

use App\Penyaluran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SebaranBansosKecamatan as SebaranBansosKecamatanResource;

class SebaranBansosKecamatanController extends Controller
{
    public function index(Request $request)
    {
        $penyalurans = Penyaluran::all();

        $geoJSONdata = $penyalurans->map(function ($penyaluran) {
            return [
                'type'       => 'Feature',
                'properties' => new SebaranBansosKecamatanResource($penyaluran),
                'geometry'   => [
                    'type'        => 'Point',
                    'coordinates' => [
                        $penyaluran->kec_long,
                        $penyaluran->kec_lat,
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
