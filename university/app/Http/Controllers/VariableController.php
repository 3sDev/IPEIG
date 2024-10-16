<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Variable;

class VariableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Variable::where("id", "=", "1")->get();
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
        //
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
    public function update(Request $request)
    {
        $Variable = Variable::find(1);
        $Variable->directeur_ar  = $request->input('directeur_ar');
        $Variable->directeur_fr  = $request->input('directeur_fr');
        $Variable->secretaire_ar = $request->input('secretaire_ar');
        $Variable->secretaire_fr = $request->input('secretaire_fr');
        $Variable->tel    = $request->input('tel');
        $Variable->fax   = $request->input('fax');
        $Variable->adresse_ar    = $request->input('adresse_ar');
        $Variable->adresse_fr    = $request->input('adresse_fr');
        $Variable->nom_universite_ar   = $request->input('nom_universite_ar');
        $Variable->nom_universite_fr   = $request->input('nom_universite_fr');
        $Variable->nom_etab_ar         = $request->input('nom_etab_ar');
        $Variable->nom_etab_fr         = $request->input('nom_etab_fr');
        $Variable->annee_universitaire = $request->input('annee_universitaire');
        $Variable->long          = $request->input('long');
        $Variable->lat           = $request->input('lat');
        $Variable->rayon         = $request->input('rayon');
        $Variable->long_2        = $request->input('long_2');
        $Variable->lat_2         = $request->input('lat_2');
        $Variable->rayon_2       = $request->input('rayon_2');
         $Variable->long_3        = $request->input('long_3');
        $Variable->lat_3         = $request->input('lat_3');
        $Variable->rayon_3       = $request->input('rayon_3');
         $Variable->place_ar      = $request->input('place_ar');
       $Variable->place_fr      = $request->input('place_fr');
          $Variable->etab_abrv      = $request->input('etab_abrv');
        $Variable->update();
    }

    //Signature directeur
    public function updateSignatureDirecteur(Request $request)
    {
        $variable = Variable::find(1);
        //Service Convert File
        if ($request->extensionFile != '') {
            File::delete('upload/variables/'.$variable->signature_directeur);
            $extFile   = $request->extensionFile;
            $dataImage = base64_decode($request->signature_directeur); //decode base64 string
            $nameFile1 = "SignatureDirecteur";
            $file      = "upload/variables/".$nameFile1.".".$extFile;
            $moveImage = file_put_contents($file, $dataImage);
        }
        else { $nameFile1 = $variable->signature_directeur; }
        $variable->signature_directeur = $nameFile1.".".$extFile;
        $variable->update();   
    }

    //Signature secretaire general
    public function updateSignatureSecretaire(Request $request)
    {
        $variable = Variable::find(1);
        //Service Convert File
        if ($request->extensionFile != '') {
            File::delete('upload/variables/'.$variable->signature_secretaire);
            $extFile   = $request->extensionFile;
            $dataImage = base64_decode($request->signature_secretaire); //decode base64 string
            $nameFile2 = "SignatureSecretaire";
            $file      = "upload/variables/".$nameFile2.".".$extFile;
            $moveImage = file_put_contents($file, $dataImage);
        }
        else { $nameFile2 = $variable->signature_secretaire; }
        $variable->signature_secretaire = $nameFile2.".".$extFile;
        $variable->update();   
    }

    //Signature chef département
    public function updateSignatureChefDepartement(Request $request)
    {
        $variable = Variable::find(1);
        //Service Convert File
        if ($request->extensionFile != '') {
            File::delete('upload/variables/'.$variable->logo_universite);
            $extFile   = $request->extensionFile;
            $dataImage = base64_decode($request->logo_universite); //decode base64 string
            $nameFile2 = "logo_universite";
            $file      = "upload/variables/".$nameFile2.".".$extFile;
            $moveImage = file_put_contents($file, $dataImage);
        }
        else { $nameFile2 = $variable->logo_universite; }
        $variable->logo_universite = $nameFile2.".".$extFile;
        $variable->update();   
    }
     public function updateimage(Request $request)
    {
        $variable = Variable::find(1);
        //Service Convert File
        if ($request->extensionFile != '') {
            File::delete('upload/variables/'.$variable->upim);
            $extFile   = $request->extensionFile;
            $dataImage = base64_decode($request->upim); //decode base64 string
            $nameFile7 = "AdminLTELogo";
            $file      = "upload/variables/".$nameFile7.".".$extFile;
            $moveImage = file_put_contents($file, $dataImage);
        }
        else { $nameFile7 = $variable->upim; }
        $variable->upim = $nameFile7.".".$extFile;
        $variable->update();   
    }

    //Logo issat
    public function updateLogoVariable(Request $request)
    {

        $variable = Variable::find(1);
        //Service Convert File
        if ($request->extensionFile != '') {
            File::delete('upload/variables/'.$variable->logo);
            $extFile   = $request->extensionFile;
            $dataImage = base64_decode($request->logo); //decode base64 string
            $nameFile3 = "logo";
            $file      = "upload/variables/".$nameFile3.".".$extFile;
            $moveImage = file_put_contents($file, $dataImage);
        }
        else { $nameFile3 = $variable->logo; }
        $variable->logo = $nameFile3.".".$extFile;
        $variable->update();   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Variable::destroy($id);
    }
}








