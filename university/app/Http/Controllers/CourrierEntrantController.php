<?php

namespace App\Http\Controllers;

use App\Models\CourrierEntrant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CourrierEntrantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $response = CourrierEntrant::where("id", "=", $id)->get();
        $data = json_decode($response);
        return $data;
    }

    public function getAllCourriersEntrants()
    {
        $response = CourrierEntrant::all();
        $data = json_decode($response);
        return $data;
    }

        //count
        public function countAllCourriersEntrants()
        {
            $response = CourrierEntrant::count();
            $data = json_decode($response);
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
    public function store(Request $request)
    {
        //Service Convert File
        if ($request->extensionFile != '') {

            $extFile  = $request->extensionFile;
            $dataFile = base64_decode($request->piece_jointe); //decode base64 string
            $nameFile = time().".$extFile";
            $file     = "upload/courriers/entrants/".$nameFile;
            $moveFile = file_put_contents($file, $dataFile);
        }
        else { $nameFile = null; }

        $courrier = new CourrierEntrant();
        $courrier->numero_ordre    = $request->input('numero_ordre');
        $courrier->date_arrivee    = $request->input('date_arrivee');
        $courrier->numero_courrier = $request->input('numero_courrier');
        $courrier->date_courrier   = $request->input('date_courrier');
        $courrier->source          = $request->input('source');
        $courrier->sujet           = $request->input('sujet');
        $courrier->destinataire    = $request->input('destinataire');
        $courrier->date_livraison  = $request->input('date_livraison');
        $courrier->piece_jointe    = $nameFile;
        $courrier->user            = $request->input('user');

        $courrier->save();
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
        $courrier = CourrierEntrant::find($id);
        $courrier->numero_ordre    = $request->input('numero_ordre');
        $courrier->date_arrivee    = $request->input('date_arrivee');
        $courrier->numero_courrier = $request->input('numero_courrier');
        $courrier->date_courrier   = $request->input('date_courrier');
        $courrier->source          = $request->input('source');
        $courrier->sujet           = $request->input('sujet');
        $courrier->destinataire    = $request->input('destinataire');
        $courrier->date_livraison  = $request->input('date_livraison');
        $courrier->user            = $request->input('user');

        $courrier->update();
    }

    public function updateFileEntrant(Request $request, $id)
    {
        $courrier = CourrierEntrant::find($id);
        //Service Convert File
        if ($request->extensionFile != '') {
            File::delete('upload/courriers/entrants/'.$courrier->piece_jointe);
            $extFile   = $request->extensionFile;
            $dataImage = base64_decode($request->piece_jointe); //decode base64 string
            $nameFile4 = time().".$extFile";
            $file      = "upload/courriers/entrants/".$nameFile4;
            $moveImage = file_put_contents($file, $dataImage);
        }
        else { $nameFile4 = $courrier->piece_jointe; }
        $courrier->piece_jointe = $nameFile4;
        $courrier->update();   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return CourrierEntrant::destroy($id);
    }
}
