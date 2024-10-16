<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ladumor\OneSignal\OneSignal;

class testController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return "Midi";
        $data = DB::select('select * from classes where id = ?', [1]);
        return $data;
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
    public function sendPush(Request $request)
    {
        $varTitle = "title from variable";
        $fields['include_player_ids'] = ['2fcd9b67-447d-4df9-a410-5127dfa2bb44'];
        $fields['contents'] = array(
            "en" => 'Mahdi',
        );
        $fields['headings'] = array(
            "en" => $varTitle,
        );
        OneSignal::sendPush($fields);
    }

    public function getNotifications ()
    {
        return OneSignal::getNotifications();
    }

    public function getNotification ($notificationID)
    {
        return OneSignal::getNotifications($notificationID);
    }

    public function getDevices ()
    {
        return OneSignal::getDevices();
    }

    public function getDevice ($deviceID)
    {
        return OneSignal::getDevice($deviceID);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
