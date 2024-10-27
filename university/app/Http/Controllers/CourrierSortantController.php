<?php

namespace App\Http\Controllers;

use App\Models\CourrierSortant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CourrierSortantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $response = CourrierSortant::where("id", "=", $id)->get();
        $data = json_decode($response);
        return $data;
    }

    public function getAllCourriersSortants()
    {
        $response = CourrierSortant::all();
        $data = json_decode($response);
        return $data;
    }

    //count
    public function countAllCourriersSortants()
    {
        $response = CourrierSortant::count();
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
            $file     = "upload/courriers/sortants/".$nameFile;
            $moveFile = file_put_contents($file, $dataFile);
        }
        else { $nameFile = null; }

        $courrier = new CourrierSortant();
        $courrier->numero_inscription = $request->input('numero_inscription');
        $courrier->date_edition       = $request->input('date_edition');
        $courrier->sujet              = $request->input('sujet');
        $courrier->destinataire       = $request->input('destinataire');
        $courrier->voie_envoi         = $request->input('voie_envoi');
        $courrier->observation        = $request->input('observation');
        $courrier->piece_jointe       = $nameFile;
        $courrier->user               = $request->input('user');

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
        $courrier = CourrierSortant::find($id);
        $courrier->numero_inscription = $request->input('numero_inscription');
        $courrier->date_edition       = $request->input('date_edition');
        $courrier->sujet              = $request->input('sujet');
        $courrier->destinataire       = $request->input('destinataire');
        $courrier->voie_envoi         = $request->input('voie_envoi');
        $courrier->observation        = $request->input('observation');
        $courrier->user               = $request->input('user');

        $courrier->update();
    }

    public function updateFileSortant(Request $request, $id)
    {
        $courrier = CourrierSortant::find($id);
        //Service Convert File
        if ($request->extensionFile != '') {
            File::delete('upload/courriers/sortants/'.$courrier->piece_jointe);
            $extFile   = $request->extensionFile;
            $dataImage = base64_decode($request->piece_jointe); //decode base64 string
            $nameFile4 = time().".$extFile";
            $file      = "upload/courriers/sortants/".$nameFile4;
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
        return CourrierSortant::destroy($id);
    }
}
