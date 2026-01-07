<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UnitesLegalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->header('siren')) {
            $siren = request()->header('siren');

            $legalUnits = \App\Models\unitesLegales::searchBySiren($siren);

            return response()->json($legalUnits);

        } elseif (request()->header('company')) {

            $company = request()->header('company');

            $legalUnits = \App\Models\unitesLegales::where('denomination_unite_legale', 'like', '%' . $company . '%')->get();

            return response()->json($legalUnits);

        } else {
            return response()->json(['error' => 'Missing parameters header is required'], 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
