<?php

namespace App\Http\Controllers;

use App\cellphone_plan;
use Illuminate\Http\Request;

class CellphonePlanController extends Controller
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
    public function create(Request $request)
    {
        if ( $request->uuid == '' || $request->uuid == null)
        {
            $uuid = floor(time()-999999999);
        }
        else
        {
            $uuid = $request->uuid;
        }


       
        $cellphone_plan = cellphone_plan::updateOrCreate(
            ['uuid' => $uuid ,],
            [   'public' => $request->public,
                'subject' => $request->subject,
                'description' => $request->description,
                'more' => $request->more,
                'call_text_type' => $request->call_text_type,
                'call_text' => $request->call_text,
                'data_type' => $request->data_type,
                'data' => $request->data,
                'features' => $request->features,
                'processing_fee' => $request->processing_fee,
                'price' => $request->price,
                'total_price' => $request->total_price,
            ]
        );

        return response()->json([
            'status' => 'success',
            'messages'   => 'success_realestate',
            'cellphone_plan' => $cellphone_plan,
        ]);
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
     * @param  \App\cellphone_plan  $cellphone_plan
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = cellphone_plan::orderBy('created_at', 'desc')
                    ->get(); 
        
        if($data == null)
        {
            return response()->json([
                    'status' => 'error',
                    'messages'   => 'error_search_data'
            ]); 
        }
        else
            return response()->json($data);
    }
    public function getBuilding(Request $request)
    {
        $uuid = $request->uuid;
        
        if ( $uuid == null )
        {
            return response()->json([
                'status' => 'error',
                'messages'   => 'error_auth'
            ]); 
        }
        

        $data = cellphone_plan::where('uuid',$uuid)
                    ->orderBy('created_at', 'desc')
                    ->first(); 
        
        if($data == null)
        {
            return response()->json([
                    'status' => 'error',
                    'messages'   => 'error_search_data'
            ]); 
        }
        else
        {
            return response()->json($data); 
        }
            
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cellphone_plan  $cellphone_plan
     * @return \Illuminate\Http\Response
     */
    public function edit(cellphone_plan $cellphone_plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cellphone_plan  $cellphone_plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cellphone_plan $cellphone_plan)
    {
        //
    }
    public function delete(Request $request)
    {
        $uuid = $request->uuid;

        $data = cellphone_plan::where('uuid',$uuid)
                        ->delete();

        return response()->json([
            'status' => 'success',
            'messages'   => 'delete_completed'
        ]); 
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cellphone_plan  $cellphone_plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(cellphone_plan $cellphone_plan)
    {
        //
    }
}
