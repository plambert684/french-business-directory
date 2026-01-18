<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EtablissementsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $requestHistory = new \App\Models\RequestsHistory();

        if (request()->route('siren')) {

            $siren = request()->route('siren');

            $establishments = \App\Models\etablissementsHistorique::searchBySiren($siren);

            //Save request and response to history
            $requestHistory->endpoint = request()->path();
            $requestHistory->method = request()->method();
            $requestHistory->ip_address = request()->ip();
            $requestHistory->user_agent = request()->header('User-Agent');
            $requestHistory->request_headers = json_encode(request()->headers->all());
            $requestHistory->request_body = json_encode(request()->all());
            $requestHistory->response_status = 200;
            $requestHistory->response_body = $establishments->toJson();
            $requestHistory->user_id = auth()->check() ? auth()->id() : null;

            $requestHistory->save();


            return response()->json($establishments);

        } else {
            return response()->json(['error' => 'SIREN header is required'], 400);
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
