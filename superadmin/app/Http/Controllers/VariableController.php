<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class VariableController extends Controller
{
    use Services\MyTrait;
    use Services\ConvertBase64;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
    }

    public function liste()
    {
        //
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
    public function edit()
    {
        $response = Http::get($this->getUrlServer().'/variable');
        $variable = json_decode($response);  
        return view('variable.edit', ['variable' => $variable]);
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
    
        $response = Http::put($this->getUrlServer().'/update-variable', [
            'directeur_ar'  => $request->input('directeur_ar'),
            'directeur_fr'  => $request->input('directeur_fr'),
            'secretaire_ar' => $request->input('secretaire_ar'),
            'secretaire_fr' => $request->input('secretaire_fr'),
            'tel'    => $request->input('tel'),
            'fax'    => $request->input('fax'),
            'adresse_ar'    => $request->input('adresse_ar'),
            'adresse_fr'    => $request->input('adresse_fr'),
            'nom_universite_ar'      => $request->input('nom_universite_ar'),
            'nom_universite_fr'      => $request->input('nom_universite_fr'),
            'nom_etab_ar'            => $request->input('nom_etab_ar'),
            'nom_etab_fr'            => $request->input('nom_etab_fr'),
            'annee_universitaire'    => $request->input('annee_universitaire'),
            'long'          => $request->input('long'),
            'lat'           => $request->input('lat'),
            'rayon'         => $request->input('rayon'),
            'long_2'        => $request->input('long_2'),
            'lat_2'         => $request->input('lat_2'),
            'rayon_2'       => $request->input('rayon_2'),
           'long_3'        => $request->input('long_3'),
            'lat_3'         => $request->input('lat_3'),
            'rayon_3'       => $request->input('rayon_3'),
           'place_ar'       => $request->input('place_ar'),
             'place_fr'       => $request->input('place_fr'),
                'etab_abrv'       => $request->input('etab_abrv'),
        ]);
        error_log($response);
        return redirect()->back()->with('message', 'Les données sont modifiées avec succés'); 
    }

    //Signature directeur issat
    public function updateSignatureDirecteur(Request $request)
    {
        $file         = $request->signature_directeur;
    
        $myFile64     = $this->convertImage($file);
        $myExtFile64  = $this->getExtensionImage($file);
        $response = Http::put($this->getUrlServer().'/updateSignatureDirecteur', [
            'signature_directeur' => $myFile64,
            'extensionFile'       => $myExtFile64,
        ]);
        error_log($response);
        return redirect()->back()->with('message', 'Le fichier est modifié avec succés'); 
    }

    //Signature Secretaire général issat
    public function updateSignatureSecretaire(Request $request)
    {
        $file         = $request->signature_secretaire;
        $myFile64     = $this->convertImage($file);
        $myExtFile64  = $this->getExtensionImage($file);
        $response = Http::put($this->getUrlServer().'/updateSignatureSecretaire', [
            'signature_secretaire' => $myFile64,
            'extensionFile'        => $myExtFile64,
        ]);
        error_log($response);
        return redirect()->back()->with('message', 'Le fichier est modifié avec succés'); 
    }

    //Signature Chef département
    public function updateSignatureChefDepartement(Request $request)
    {
        $file         = $request->logo_universite;
        $myFile64     = $this->convertImage($file);
        $myExtFile64  = $this->getExtensionImage($file);
        $response = Http::put($this->getUrlServer().'/updateSignatureChefDepartement', [
            'logo_universite' => $myFile64,
            'extensionFile'        => $myExtFile64,
        ]);
        error_log($response);
        return redirect()->back()->with('message', 'Le fichier est modifié avec succés'); 
    }
      public function updateimage(Request $request)
    {
        $file         = $request->upim;
        $myFile64     = $this->convertImage($file);
        $myExtFile64  = $this->getExtensionImage($file);
        $response = Http::put($this->getUrlServer().'/updateimage', [
            'upim'          => $myFile64,
            'extensionFile' => $myExtFile64,
        ]);
        error_log($response);
        return redirect()->back()->with('message', 'Le fichier est modifié avec succés'); 
    }

    //Logo issat
    public function updateLogoVariable(Request $request)
    {
        $file         = $request->logo;
  
        $myFile64     = $this->convertImage($file);
        $myExtFile64  = $this->getExtensionImage($file);
        $response = Http::put($this->getUrlServer().'/updateLogoVariable', [
            'logo'          => $myFile64,
            'extensionFile' => $myExtFile64,
        ]);
        error_log($response);
        return redirect()->back()->with('message', 'Le fichier est modifié avec succés'); 
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Http::delete($this->getUrlServer().'/delete-agenda/'.$id);
        return redirect()->back(); 
    }
}





