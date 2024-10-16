<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class CourrierSortantController extends Controller
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
        $response = Http::get($this->getUrlServer().'/getAllCourriersSortants');
        $sortants = json_decode($response);   
        return view('sortant.index', ['sortants' => $sortants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sortant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->piece_jointe != '') {

            $file        = $request->piece_jointe;
            $myFile64    = $this->convertAllFile($file);
            $myExtFile64 = $this->getExtensionFile($file);
        }
        else { 
            $myFile64 = '';
            $myExtFile64    = '';
        }

        $idAdmin  = Auth::user()->id;

        $response = Http::post($this->getUrlServer().'/sortants', [
            'numero_inscription' => $request->input('numero_inscription'),
            'date_edition'       => $request->input('date_edition'),
            'sujet'              => $request->input('sujet'),
            'destinataire'       => $request->input('destinataire'),
            'voie_envoi'         => $request->input('voie_envoi'),
            'observation'        => $request->input('observation'),
            'piece_jointe'       => $myFile64,
            'extensionFile'      => $myExtFile64,
            'user'               => $idAdmin,
        ]);
        error_log('------------------------------------------------------------------'.$response);
        return redirect('/sortants')->with('message', 'Votre Courrier est ajouté avec succés');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response = Http::get($this->getUrlServer().'/sortant/'.$id);
        $sortants = json_decode($response);

        return view('sortant.show', ['sortants' => $sortants]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response = Http::get($this->getUrlServer().'/sortant/'.$id);
        $sortants = json_decode($response);  

        return view('sortant.edit', ['sortants' => $sortants]);
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
        $idAdmin  = Auth::user()->id;
        $response = Http::put($this->getUrlServer().'/update-sortant/'.$id, [
            'numero_inscription' => $request->input('numero_inscription'),
            'date_edition'       => $request->input('date_edition'),
            'sujet'              => $request->input('sujet'),
            'destinataire'       => $request->input('destinataire'),
            'voie_envoi'         => $request->input('voie_envoi'),
            'observation'        => $request->input('observation'),
            'user'            => $idAdmin,
        ]);
        error_log($response);
        return redirect()->back()->with('message', 'Le courrier est modifié avec succés'); 
    }

    public function updateFileSortant(Request $request, $id)
    {
        $file         = $request->piece_jointe;
        $myFile64     = $this->convertImage($file);
        $myExtFile64  = $this->getExtensionImage($file);

        $response = Http::put($this->getUrlServer().'/update-fileSortant/'.$id, [
            'piece_jointe'  => $myFile64,
            'extensionFile' => $myExtFile64,
        ]);
        error_log($response);
        return redirect()->back()->with('message', 'Le fichier de courrier est modifié avec succés'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Http::delete($this->getUrlServer().'/delete-sortant/'.$id);
        return redirect()->back();
    }
}
