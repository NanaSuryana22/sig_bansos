<?php

namespace App\Http\Controllers\Api;

use App\Pelaporan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PetaPelaporan as PetaPelaporanResource;

class SebaranLaporanController extends Controller
{
    public function index(Request $request)
    {
        $pelaporans = Pelaporan::all();

        $geoJSONdata = $pelaporans->map(function ($pelaporan) {
            return [
                'type'       => 'Feature',
                'properties' => new PetaPelaporanResource($pelaporan),
                'geometry'   => [
                    'type'        => 'Point',
                    'coordinates' => [
                        $pelaporan->long,
                        $pelaporan->lat,
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
