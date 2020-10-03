<?php

namespace App\Http\Controllers;

use App\vehicle;
use App\vehicle_maker;
use App\vehicle_image;
use App\vehicle_basic_option;
use App\vehicle_safety_option;
use App\vehicle_other_option;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\AwsImageUpload;
class VehicleController extends Controller
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

        $vehicle = vehicle::updateOrCreate(
            ['uuid' => $uuid , 'dealer_email' => $request->dealer_email],
            [   'public' => $request->public,
                'transaction' => $request->transaction,
                'maker' => $request->maker,
                'series' => $request->series,
                'trim' => $request->trim,
                'type' => $request->type,
                'year' => $request->year,
                'fuel' => $request->fuel,
                'price' => $request->price,
                'mileage' => $request->mileage,
                'accident_status' => $request->accident_status,
                'accident_details' => $request->accident_details,
                'number' => $request->number,
                'subject' => $request->subject,
                'description' => $request->description,
                'view' => $request->view,
                'postal_code' => $request->postal_code,
            ]
        );


        if($vehicle == null)
        {
            return response()->json([
                    'status' => 'error',
                    'messages'   => 'error_search_data'
            ]); 
        }
        else
        {
            return response()->json([
                'status' => 'success',
                'messages'   => 'success_update',
                'vehicle'   => $vehicle,
            ]);

        }
    }
    public function create_option(Request $request)
    {
        $vehicle_basic_option = vehicle_basic_option::updateOrCreate(
            ['uuid' => $request->uuid, 'dealer_email' => $request->dealer_email],
            [   'power_handle' => $request->power_handle,
                'power_window' => $request->power_window,
                'air_conditioner' => $request->air_conditioner,
                'full_auto_air_conditioner' => $request->full_auto_air_conditioner,
                'tinting' => $request->tinting,
                'sunroof' => $request->sunroof,
                'panorama_sunroof' => $request->panorama_sunroof,
                'aluminium_wheel' => $request->aluminium_wheel,
                'ecm_room_mirror' => $request->ecm_room_mirror,
                'woodgrain' => $request->woodgrain,
                'metalgrain' => $request->metalgrain,
                'remote_starting_device' => $request->remote_starting_device,
                'smart_key' => $request->smart_key,
                'leather_seat' => $request->leather_seat,
                'electric_sheet' => $request->electric_sheet,
                'memory_sheet' => $request->memory_sheet,
                'heated_sheet' => $request->heated_sheet,
                'gout_sheet' => $request->gout_sheet,
                'black_box' => $request->black_box,
                'high_pass' => $request->high_pass,
                'other' => $request->basic_other,
            ]
        );
        $vehicle_safety_option = vehicle_safety_option::updateOrCreate(
            ['uuid' => $request->uuid, 'dealer_email' => $request->dealer_email],
            [   'driver_air_bag' => $request->driver_air_bag,
                'passenger_air_bag' => $request->passenger_air_bag,
                'side_air_bag' => $request->side_air_bag,
                'curtain_air_bag' => $request->curtain_air_bag,
                'abs' => $request->abs,
                'ecs' => $request->ecs,
                'esp' => $request->esp,
                'tcs' => $request->tcs,
                'forward_aft_detector' => $request->forward_aft_detector,
                'rear_camera' => $request->rear_camera,
                'navigation' => $request->navigation,
                'air_purifier' => $request->air_purifier,
                'other' => $request->safety_other,
            ]
        );
        $vehicle_other_option = vehicle_other_option::updateOrCreate(
            ['uuid' => $request->uuid, 'dealer_email' => $request->dealer_email],
            [   'super_vision_board' => $request->super_vision_board,
                'bucket_sheet' => $request->bucket_sheet,
                'air_dam' => $request->air_dam,
                'bumpergard' => $request->bumpergard,
                'chrome_wheel' => $request->chrome_wheel,
                'four_wheel_drive' => $request->four_wheel_drive,
                'rear_spoiler' => $request->rear_spoiler,
                'cruise_control' => $request->cruise_control,
                'loop_carrier' => $request->loop_carrier,
                'other' => $request->other_other,
            ]
        );
       
        return response()->json([
            'status' => 'success',
            'messages'   => 'success_update',
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
                $temp[$i] = $awsImageUpload->setImageUpload($file, 'vehicle', $dealer_email);
                
            }
            else
            {
                $temp[$i] = '';
            }
        }
        

        $vehicle_image = vehicle_image::updateOrCreate(
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
            $arr[] = $vehicle_image['image'.$i];
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
     * @param  \App\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $dealer_email = $request->dealer_email;

        $data = vehicle::where('dealer_email', $dealer_email)
                    ->orderBy('created_at', 'desc')
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
    public function getMaker()
    {
       
        $arr = [];
        $data = vehicle_maker::select('maker')
                                ->distinct()
                                ->get(); 

        foreach($data as $row)
        {
            $arr[] = $row['maker'];
        }
        
        if($data == null)
        {
            return response()->json([
                    'status' => 'error',
                    'messages'   => 'error_search_data'
            ]); 
        }
        else
            return response()->json($arr);
    }
    public function getSeries(Request $request)
    {
        $maker = $request->maker;

        $data = vehicle_maker::select('series')
                                ->where('maker',$maker)
                                ->distinct()
                                ->get(); 
        
        $arr = [];

        foreach($data as $row)
        {
            $arr[] = $row['series'];
        }

        if($data == null)
        {
            return response()->json([
                    'status' => 'error',
                    'messages'   => 'error_search_data'
            ]); 
        }
        else
            return response()->json($arr);
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
        

        $vehicle = vehicle::where([['uuid',$uuid],['dealer_email', $dealer_email]])
                    ->orderBy('created_at', 'desc')
                    ->first(); 
        
        if($vehicle == null)
        {
            return response()->json([
                    'status' => 'error',
                    'messages'   => 'error_search_data'
            ]); 
        }
        else
            return response()->json($vehicle);
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

        $vehicle_image = vehicle_image::select($select_column)
                    ->where([['uuid',$uuid],['dealer_email', $dealer_email]])
                    ->orderBy('created_at', 'desc')
                    ->first(); 
        
        if($vehicle_image == null)
        {
            return response()->json([
                    'status' => 'error',
                    'messages'   => 'error_search_data'
            ]); 
        }
        else
            return response()->json($vehicle_image);
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
        
        $vehicle_basic_option = vehicle_basic_option::where([['uuid',$uuid],['dealer_email', $dealer_email]])
                    ->orderBy('created_at', 'desc')
                    ->first(); 

        $vehicle_safety_option = vehicle_safety_option::where([['uuid',$uuid],['dealer_email', $dealer_email]])
                    ->orderBy('created_at', 'desc')
                    ->first(); 
        
        $vehicle_other_option = vehicle_other_option::where([['uuid',$uuid],['dealer_email', $dealer_email]])
                    ->orderBy('created_at', 'desc')
                    ->first(); 
        
        if($vehicle_basic_option == null || $vehicle_safety_option == null || $vehicle_other_option == null)
        {
            return response()->json([
                    'status' => 'error',
                    'messages'   => 'error_search_data'
            ]); 
        }
        else
            return response()->json([
                'status' => 'success',
                'basic_option' => $vehicle_basic_option,
                'safety_option' => $vehicle_safety_option,
                'other_option' => $vehicle_other_option,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(vehicle $vehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vehicle $vehicle)
    {
        //
    }

    public function delete(Request $request)
    {
        $uuid = $request->uuid;
        $dealer_email = $request->dealer_email;

        $vehicle = vehicle::where([['uuid',$uuid],['dealer_email', $dealer_email]])
                        ->delete();

        $vehicle_image = vehicle_image::where([['uuid',$uuid],['dealer_email', $dealer_email]])
                        ->delete();

        $vehicle_basic_option = vehicle_basic_option::where([['uuid',$uuid],['dealer_email', $dealer_email]])
                        ->delete();

        $vehicle_safety_option = vehicle_safety_option::where([['uuid',$uuid],['dealer_email', $dealer_email]])
                        ->delete();
                        
        $vehicle_other_option = vehicle_other_option::where([['uuid',$uuid],['dealer_email', $dealer_email]])
                        ->delete();
        
        return response()->json([
            'status' => 'success',
            'messages'   => 'delete_realestate_completed'
        ]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(vehicle $vehicle)
    {
        //
    }
}

