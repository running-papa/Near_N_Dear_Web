<?php

namespace App\Http\Controllers;

use App\realestate;
use Illuminate\Http\Request;

class RealestateController extends Controller
{
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
     * @param  \App\realestate  $realestate
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $dealer_email = $request->dealer_email;

        $realestate = realestate::where('dealer_email', $dealer_email)
                    ->orderBy('created_at', 'desc')
                    ->get(); 
        
        if($realestate == null)
        {
            return response()->json([
                    'status' => 'error',
                    'messages'   => 'error_realestate'
            ]); 
        }
        else
            return response()->json($realestate);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\realestate  $realestate
     * @return \Illuminate\Http\Response
     */
    public function edit(realestate $realestate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\realestate  $realestate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, realestate $realestate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\realestate  $realestate
     * @return \Illuminate\Http\Response
     */
    public function destroy(realestate $realestate)
    {
        //
    }
}
