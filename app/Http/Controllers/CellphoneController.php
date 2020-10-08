<?php

namespace App\Http\Controllers;

use App\cellphone;
use App\device;
use Illuminate\Http\Request;
use App\Http\Controllers\AwsImageUpload;

class CellphoneController extends Controller
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
        $dealer_email = $request->dealer_email;

        if ( $request->uuid == '' || $request->uuid == null)
        {
            $uuid = floor(time()-999999999);
        }
        else
        {
            $uuid = $request->uuid;
        }


        $awsImageUpload = new AwsImageUpload();

        $arr = array();
        //이미지 파싱 [[
        for ($i = 0; $i< 5; $i++)
        {
            if ($request->hasFile('image'.$i))
            {
                $file = $request->file('image'.$i);
                $arr[$i] = $awsImageUpload->setImageUpload($file, 'cellphone', $dealer_email);
                
            }
            else
            {
                $arr[$i] = '';
            }
        }

        $cellphone = cellphone::updateOrCreate(
            ['uuid' => $uuid , 'dealer_email' => $request->dealer_email],
            [   'public' => $request->public,
                'transaction' => $request->transaction,
                'maker' => $request->maker,
                'device_name' => $request->device_name,
                'device_storage' => $request->device_storage,
                'device_color' => $request->device_color,
                'item' => $request->item,
                //'srp' => $request->srp,
                'tier' => $request->tier,
                'up_front_cost' => $request->up_front_cost,
                'agreement_credit' => $request->agreement_credit,
                'dro' => $request->dro,
                'monthly_discount' => $request->monthly_discount,
                'monthly_payment' => $request->monthly_payment,
                'image1' => $arr[0],
                'image2' => $arr[1],
                'image3' => $arr[2],
                'image4' => $arr[3],
                'image5' => $arr[4],
            ]
        );

        return response()->json([
            'status' => 'success',
            'messages'   => 'success_realestate',
            'cellphone' => $cellphone,
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
     * @param  \App\cellphone  $cellphone
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $dealer_email = $request->dealer_email;

        $data = cellphone::where('dealer_email', $dealer_email)
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

    public function getDevice(Request $request)
    {
        $maker = $request->maker;

        $arr = [];

        $data = device::where('maker', $maker)
                        ->distinct()
                        ->get();

        foreach($data as $row)
        {
            $arr[] = $row['device'];
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
        

        $cellphone = cellphone::where([['uuid',$uuid],['dealer_email', $dealer_email]])
                    ->orderBy('created_at', 'desc')
                    ->first(); 
        
        if($cellphone == null)
        {
            return response()->json([
                    'status' => 'error',
                    'messages'   => 'error_search_data'
            ]); 
        }
        else
        {
            $arr = array();
            //이미지 파싱 [[
            for ($i = 1; $i<= 5; $i++)
            {
                $arr[$i] = $cellphone['image'.$i];    
            }

            return response()->json([
                'status' => 'success',
                'cellphone'   => $cellphone,
                'preview' => $arr
            ]); 
        }
            
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cellphone  $cellphone
     * @return \Illuminate\Http\Response
     */
    public function edit(cellphone $cellphone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cellphone  $cellphone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cellphone $cellphone)
    {
        //
    }

    public function delete(Request $request)
    {
        $uuid = $request->uuid;
        $dealer_email = $request->dealer_email;

        $cellphone = cellphone::where([['uuid',$uuid],['dealer_email', $dealer_email]])
                        ->delete();

        return response()->json([
            'status' => 'success',
            'messages'   => 'delete_completed'
        ]); 
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cellphone  $cellphone
     * @return \Illuminate\Http\Response
     */
    public function destroy(cellphone $cellphone)
    {
        //
    }
}
