<?php

namespace App\Http\Controllers;

use App\cellphone_addons;
use Illuminate\Http\Request;

class CellphoneAddonsController extends Controller
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


       
        $cellphone_addons = cellphone_addons::updateOrCreate(
            ['uuid' => $uuid ,],
            [   'public' => $request->public,
                'type' => $request->type,
                'subject' => $request->subject,
                'description' => $request->description,
                'more' => $request->more,
                'price' => $request->price,
            ]
        );

        return response()->json([
            'status' => 'success',
            'messages'   => 'success_realestate',
            'cellphone_addons' => $cellphone_addons,
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
        $data = cellphone_addons::orderBy('created_at', 'desc')
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
        

        $data = cellphone_addons::where('uuid',$uuid)
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
     * Display the specified resource.
     *
     * @param  \App\cellphone_addons  $cellphone_addons
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       $data = cellphone_addons::orderBy('created_at', 'desc')
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cellphone_addons  $cellphone_addons
     * @return \Illuminate\Http\Response
     */
    public function edit(cellphone_addons $cellphone_addons)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cellphone_addons  $cellphone_addons
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cellphone_addons $cellphone_addons)
    {
        //
    }
    public function delete(Request $request)
    {
        $uuid = $request->uuid;

        $data = cellphone_addons::where('uuid',$uuid)
                        ->delete();

        return response()->json([
            'status' => 'success',
            'messages'   => 'delete_completed'
        ]); 
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cellphone_addons  $cellphone_addons
     * @return \Illuminate\Http\Response
     */
    public function destroy(cellphone_addons $cellphone_addons)
    {
        //
    }
}
