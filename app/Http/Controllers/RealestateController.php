<?php

namespace App\Http\Controllers;

use App\realestate;
use App\realestate_building;
use App\realestate_image;
use App\realestate_option;

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
    public function create(Request $request)
    {   
        if ( $request->uuid == '' || $request->uuid == null)
        {
            $realestate = new realestate;
            $realestate->uuid = floor(time()-999999999);
        }
        else
        {
            $realestate =  realestate::where('uuid',$request->uuid)->first();
        }
        
        $realestate->public = $request->public;
        $realestate->transaction = 'incomplete';
        $realestate->street_number = $request->street_number;
        $realestate->street_name = $request->street_name;
        $realestate->city = $request->city;
        $realestate->province = $request->province;
        $realestate->country = $request->country;
        $realestate->postal_code = $request->postal_code;
        $realestate->price = $request->price;
        $realestate->price_type = $request->price_type;
        $realestate->subject = $request->subject;
        $realestate->description = $request->description;
        $realestate->move_in_date = $request->move_in_date;
        $realestate->dealer_email = $request->dealer_email;
        $realestate->view = '0';
        $realestate->save();
        
        if($realestate == null)
        {
            return response()->json([
                    'status' => 'error',
                    'messages'   => 'error_realestate'
            ]); 
        }
        else
        {
            if ( $request->uuid == '')
            {
                $realestate_building = new realestate_building;
            }
            else
            {
                $realestate_building =  realestate_building::where('uuid',$request->uuid)->first();
            }

            $realestate_building->uuid = $realestate->uuid;
            $realestate_building->building_type = $request->building_type;
            $realestate_building->building_name = $request->building_name;
            $realestate_building->building_size = $request->building_size;
            $realestate_building->beds = $request->beds;
            $realestate_building->baths = $request->baths;
            $realestate_building->floor = $request->floor;
            $realestate_building->built_in = $request->built_in;
            $realestate_building->parking_spaces = $request->parking_spaces;
            $realestate_building->built_in = $request->built_in;
            $realestate_building->built_in = $request->built_in;
            $realestate_building->save();

            return response()->json([
                'status' => 'success',
                'messages'   => 'success_realestate',
                'realestate'   => $realestate,
                'realestate_building'   => $realestate_building
            ]);

        }
    }
    public function create_option(Request $request)
    {
        $realestate_option = realestate_option::updateOrCreate(
            ['uuid' => $request->uuid, 'dealer_email' => $request->dealer_email],
            [   'pet' => $request->pet,
                'internet' => $request->internet,
                'snow_removal' => $request->snow_removal,
                'laundry' => $request->laundry,
                'dryer' => $request->dryer,
                'heating' => $request->heating,
                'cooling' => $request->cooling,
                'refrigerator' => $request->refrigerator,
                'dishwasher' => $request->dishwasher,
                'oven' => $request->oven,
                'full_fumiture' => $request->full_fumiture,
                'Amenities' => $request->Amenities,
                'transit_friendly' => $request->transit_friendly,
                'storage' => $request->storage,
                'elevator' => $request->elevator,
                'other' => $request->other,
            ]
        );
       
        return response()->json([
            'status' => 'success',
            'messages'   => 'success_realestate',
            'realestate_option'   => $realestate_option,
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
