<?php

namespace App\Http\Controllers\Api;

use App\Penduduk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Penduduk as PendudukResource;

class PendudukController extends Controller
{
    /**
     * Get outlet listing on Leaflet JS geoJSON data structure.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $penduduks = Penduduk::all();

        $geoJSONdata = $penduduks->map(function ($penduduk) {
            return [
                'type'       => 'Feature',
                'properties' => new OutletResource($penduduk),
                'geometry'   => [
                    'type'        => 'Point',
                    'coordinates' => [
                        $penduduk->longitude,
                        $penduduk->latitude,
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
