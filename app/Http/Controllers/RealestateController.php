<?php

namespace App\Http\Controllers;

use App\realestate;
use App\realestate_building;
use App\realestate_image;
use App\realestate_option;

use Illuminate\Http\Request;
use App\Http\Controllers\AwsImageUpload;

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
            $uuid = floor(time()-999999999);
        }
        else
        {
            $uuid = $request->uuid;
        }

        //test
        $realestate = realestate::updateOrCreate(
            ['uuid' => $uuid , 'dealer_email' => $request->dealer_email],
            [   'public' => $request->public,
                'transaction' => $request->transaction,
                'street_number' => $request->street_number,
                'street_name' => $request->street_name,
                'city' => $request->city,
                'province' => $request->province,
                'country' => $request->country,
                'postal_code' => $request->postal_code,
                'price' => $request->price,
                'price_type' => $request->price_type,
                'subject' => $request->subject,
                'description' => $request->description,
                'move_in_date' => $request->move_in_date,
            ]
        );


        if($realestate == null)
        {
            return response()->json([
                    'status' => 'error',
                    'messages'   => 'error_search_data'
            ]); 
        }
        else
        {
            
            $uuid = $realestate->uuid;
            

            $realestate_building = realestate_building::updateOrCreate(
                ['uuid' => $uuid , 'dealer_email' => $request->dealer_email],
                [   'building_type' => $request->building_type,
                    'building_name' => $request->building_name,
                    'building_size' => $request->building_size,
                    'beds' => $request->beds,
                    'baths' => $request->baths,
                    'floor' => $request->floor,
                    'built_in' => $request->built_in,
                    'parking_spaces' => $request->parking_spaces,
                    
                ]
            );


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
    public function create_images(Request $request)
    {
        $dealer_email = $request->dealer_email;

        $awsImageUpload = new AwsImageUpload();

        $temp = array();
        //이미지 파싱 [[
        for ($i = 0; $i< 10; $i++)
        {
            if ($request->hasFile('image'.$i))
            {
                $file = $request->file('image'.$i);
                $temp[$i] = $awsImageUpload->setImageUpload($file, 'realestate', $dealer_email);
                
            }
            else
            {
                $temp[$i] = '';
            }
        }
        

        $realestate_image = realestate_image::updateOrCreate(
            ['uuid' => $request->uuid, 'dealer_email' => $request->dealer_email],
            [   
                'image1' => $temp[0],
                'image2' => $temp[1],
                'image3' => $temp[2],
                'image4' => $temp[3],
                'image5' => $temp[4],
                'image6' => $temp[5],
                'image7' => $temp[6],
                'image8' => $temp[7],
                'image9' => $temp[8],
                'image10' => $temp[9],

            ]
        );
       
        $arr = [];
        for($i = 1; $i <=10; $i++)
        {
            $arr[] = $realestate_image['image'.$i];
        }

        return response()->json([
            'status' => 'success',
            'messages'   => 'success_realestate',
            'data'   => $arr,
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
                    'messages'   => 'error_search_data'
            ]); 
        }
        else
            return response()->json($realestate);
    }

    public function getBuilding(Request $request)
    {
        $uuid = $request->uuid;
        $dealer_email = $request->dealer_email;

        if ( $uuid == null || $dealer_email == null)
        {
            return response()->json([
                'status' => 'error',
                'messages'   => 'error_auth'
            ]); 
        }
        $select_column = array( //부동산 기본정보
                                'realestate.uuid',
                                'public',
                                'transaction',
                                'street_number',
                                'street_name',
                                'city',
                                'province',
                                'country',
                                'postal_code',
                                'price',
                                'price_type',
                                'subject',
                                'description',
                                'view',
                                'move_in_date',
                                'realestate.dealer_email',
                                'realestate.created_at',
                                'realestate.updated_at',
                                //부동산 상세 정보
                                'building_type',
                                'building_name',
                                'building_size',
                                'beds',
                                'baths',
                                'floor',
                                'built_in',
                                'parking_spaces',
                            );

        $realestate = realestate::select($select_column)
                    ->Join('realestate_building','realestate.uuid','=','realestate_building.uuid')
                    ->where([['realestate.uuid',$uuid],['realestate.dealer_email', $dealer_email]])
                    ->orderBy('created_at', 'desc')
                    ->first(); 
        
        if($realestate == null)
        {
            return response()->json([
                    'status' => 'error',
                    'messages'   => 'error_search_data'
            ]); 
        }
        else
            return response()->json($realestate);
    }

    public function getImage(Request $request)
    {
        $uuid = $request->uuid;
        $dealer_email = $request->dealer_email;

        if ( $uuid == null || $dealer_email == null)
        {
            return response()->json([
                'status' => 'error',
                'messages'   => 'error_auth'
            ]); 
        }
        $select_column = array( 'image1',
                                'image2',
                                'image3',
                                'image4',
                                'image5',
                                'image6',
                                'image7',
                                'image8',
                                'image9',
                                'image10',
                            );

        $realestate = realestate_image::select($select_column)
                    ->where([['uuid',$uuid],['dealer_email', $dealer_email]])
                    ->orderBy('created_at', 'desc')
                    ->first(); 
        
        if($realestate == null)
        {
            return response()->json([
                    'status' => 'error',
                    'messages'   => 'error_search_data'
            ]); 
        }
        else
            return response()->json($realestate);
    }

    public function getOption(Request $request)
    {
        $uuid = $request->uuid;
        $dealer_email = $request->dealer_email;

        if ( $uuid == null || $dealer_email == null)
        {
            return response()->json([
                'status' => 'error',
                'messages'   => 'error_auth'
            ]); 
        }
        $select_column = array( 'pet',
                                'internet',
                                'snow_removal',
                                'laundry',
                                'dryer',
                                'heating',
                                'cooling',
                                'refrigerator',
                                'dishwasher',
                                'oven',
                                'full_fumiture',
                                'Amenities',
                                'transit_friendly',
                                'storage',
                                'elevator',
                                'other',
                            );

        $realestate = realestate_option::select($select_column)
                    ->where([['uuid',$uuid],['dealer_email', $dealer_email]])
                    ->orderBy('created_at', 'desc')
                    ->first(); 
        
        if($realestate == null)
        {
            return response()->json([
                    'status' => 'error',
                    'messages'   => 'error_search_data'
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

    public function delete(Request $request)
    {
        $uuid = $request->uuid;
        $dealer_email = $request->dealer_email;

        $realestate = realestate::where([['uuid',$uuid],['dealer_email', $dealer_email]])
                        ->delete();

        $realestate_building = realestate_building::where([['uuid',$uuid],['dealer_email', $dealer_email]])
                        ->delete();

        $realestate_image = realestate_image::where([['uuid',$uuid],['dealer_email', $dealer_email]])
                        ->delete();

        $realestate_option = realestate_option::where([['uuid',$uuid],['dealer_email', $dealer_email]])
                        ->delete();
        
        return response()->json([
            'status' => 'success',
            'messages'   => 'delete_realestate_completed'
        ]); 
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\realestate  $realestate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
    }
}
