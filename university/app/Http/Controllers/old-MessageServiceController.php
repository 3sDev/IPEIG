<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MessageService;
use App\Models\User;

class MessageServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $response = MessageService::where("id", "=", $id)->get();
        $data = json_decode($response);
        return $data;
    }

    public function getAllMessage()
    {
        $response = MessageService::all();
        $data = json_decode($response);
        return $data;
    }

    public function getAllMessagesFromAdminTableMsgService()
    {
        $response = User::with('messages')->get();
        $data = json_decode($response);
       	return $data;
    }

    //Messages envoyés par l'Admin vers Service
    public function getAllMsgSentToService($id)
    {
        $response = MessageService::with('userReceiver')->orderBy('created_at', 'DESC')->where("user_sender_id", "=", $id)
        ->where("deleted", "=", "0")->get();
        $data = json_decode($response);
        return $data;
    }

    //Messages envoyés par l'Admin vers Service
    public function getAllMsgRecievedFromService($id)
    {
        $response = MessageService::with('userSender')->orderBy('created_at', 'desc')->where("user_receiver_id", "=", $id)
        ->where("deleted", "=", "0")->get();
        $data = json_decode($response);
        return $data;
    }

    public function getMessageFromService($id)
    {
        $response = MessageService::with('userSender')->orderBy('created_at', 'desc')->where("id", "=", $id)->get();
        $data = json_decode($response);
        return $data;
    }

    //count
    public function coutAllMessagesSend($id)
    {
        $response = MessageService::where("user_sender_id", "=", $id)->count();
        $data = json_decode($response);
        return $data;
    }

    //count
    public function coutAllMessagesReceive($id)
    {
        $response = MessageService::where("user_receiver_id", "=", $id)->count();
        $data = json_decode($response);
        return $data;
    }

    //count
    public function coutAllMessagesReceiveNotView($id)
    {
        $response = MessageService::where('statut','=','false')->where("user_receiver_id", "=", $id)->count();
        $data = json_decode($response);
        return $data;
    }

    //change Statut of message
    public function changeStatutService(Request $request, $id)
    {
        $msg = MessageService::find($id);
        $msg->statut = $request->input('statut');
        $msg->update();
    }

    //afficher les messages dans une corbeil
    public function getAllCorbeilMessage($id)
    {
        $response = MessageService::with('userSender', 'userReceiver')->where("deleted", "=", 1)->where("user_receiver_id", "=", $id)->orWhere("user_sender_id", "=", $id)
        ->orderBy('created_at', 'DESC')->get();
        $data = json_decode($response);
        return $data;
    }



    public function changeStatutStudent(Request $request, $id)
    {
        $msg = MessageService::find($id);
        $msg->statut = $request->input('statut');

        $msg->update();
    }

    //Messages recus étudiant - admin
    // public function getAllMessagesFromStudentWithIdStudent($id)
    // {
    //     $response = MessageService::with('student')->where("user_id", "=", $id)
    //     ->where("source", "=", "admin")->orderBy('created_at', 'ASC')->get();
    //     $data = json_decode($response);
    //     return $data;
    // }

    

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
        //Service Convert File
        if ($request->extensionFile != '') {
        
        $extFile  = $request->extensionFile;
        $dataFile = base64_decode($request->fichier); //decode base64 string
        $nameFile = time().".$extFile";
        $file     = "upload/messages/services/".$nameFile;
        $moveFile = file_put_contents($file, $dataFile);
        }
        else { $nameFile = null; }

        $msg                   = new MessageService();
        $msg->objet            = $request->input('objet');
        $msg->message          = $request->input('message');
        $msg->source           = $request->input('source');
        $msg->statut           = $request->input('statut');
        $msg->fichier          = $nameFile;
        $msg->user_sender_id   = $request->input('user_sender_id');
        $msg->user_receiver_id = $request->input('user_receiver_id');

        $msg->save();
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
        return MessageService::destroy($id); 
    }

    public function corbeilMessage(Request $request, $id)
    {
        $msg = MessageService::find($id);
        $msg->deleted = '1';
        $msg->update();
    }

    public function restaurerMessage(Request $request, $id)
    {
        $msg = MessageService::find($id);
        $msg->deleted = '0';
        $msg->update();
    }
    
    public function deleteMessageService($id)
    {
        return MessageService::destroy($id); 
    }
}