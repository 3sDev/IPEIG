<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class CourrierEntrantController extends Controller
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
        $response = Http::get($this->getUrlServer().'/getAllCourriersEntrants');
        $entrants = json_decode($response);   
        return view('entrant.index', ['entrants' => $entrants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entrant.create');
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

        $response = Http::post($this->getUrlServer().'/entrants', [
            'numero_ordre'    => $request->input('numero_ordre'),
            'date_arrivee'    => $request->input('date_arrivee'),
            'numero_courrier' => $request->input('numero_courrier'),
            'date_courrier'   => $request->input('date_courrier'),
            'source'          => $request->input('source'),
            'sujet'           => $request->input('sujet'),
            'destinataire'    => $request->input('destinataire'),
            'date_livraison'  => $request->input('date_livraison'),
            'piece_jointe'    => $myFile64,
            'extensionFile'   => $myExtFile64,
            'user'            => $idAdmin,
        ]);
        error_log('------------------------------------------------------------------'.$response);
        return redirect('/entrants')->with('message', 'Votre Courrier est ajouté avec succés');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response = Http::get($this->getUrlServer().'/entrant/'.$id);
        $entrants = json_decode($response);

        return view('entrant.show', ['entrants' => $entrants]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response = Http::get($this->getUrlServer().'/entrant/'.$id);
        $entrants = json_decode($response);  

        return view('entrant.edit', ['entrants' => $entrants]);
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
        $response = Http::put($this->getUrlServer().'/update-entrant/'.$id, [
            'numero_ordre'    => $request->input('numero_ordre'),
            'date_arrivee'    => $request->input('date_arrivee'),
            'numero_courrier' => $request->input('numero_courrier'),
            'date_courrier'   => $request->input('date_courrier'),
            'source'          => $request->input('source'),
            'sujet'           => $request->input('sujet'),
            'destinataire'    => $request->input('destinataire'),
            'date_livraison'  => $request->input('date_livraison'),
            'user'            => $idAdmin,
        ]);
        error_log($response);
        return redirect()->back()->with('message', 'Le courrier est modifié avec succés'); 
    }

    public function updateFileEntrant(Request $request, $id)
    {
        $file         = $request->piece_jointe;
        $myFile64     = $this->convertImage($file);
        $myExtFile64  = $this->getExtensionImage($file);

        $response = Http::put($this->getUrlServer().'/update-fileEntrant/'.$id, [
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
        $response = Http::delete($this->getUrlServer().'/delete-entrant/'.$id);
        return redirect()->back(); 
    }
}
