<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matiere;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;

class DepartementController extends Controller
{
    use Services\MyTrait;
    use Services\ConvertBase64;
    // private $urlServer = "http://smartschools.tn/university/public/api";
    // private $urlLocal  = "http://127.0.0.1:8080/api";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get($this->getUrlServer().'/departements');
        $departements = json_decode($response);   
        return view('departement.index', ['departements' => $departements]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image      = $request->signature_chef_dep;
        $myImage64  = $this->convertImage($image);
        $myExtImg64 = $this->getExtensionImage($image);

        $response = Http::post($this->getUrlServer().'/departements', [
            'departmentLabel'    => $request->input('departmentLabel'),
            'description'        => $request->input('description'),
            'nom_chef_dep'       => $request->input('nom_chef_dep'),
            'signature_chef_dep' => $myImage64,
            'extensionImg'       => $myExtImg64,
        ]);
        error_log($response);
        return redirect('/departements')->with('message', 'Matière est ajoutée avec succés');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
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
        $response = Http::get($this->getUrlServer().'/departement/'.$id);
        $departements = json_decode($response);  
        return view('departement.edit', ['departements' => $departements]); 
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
        $response = Http::put($this->getUrlServer().'/update-departement/'.$id, [
            'departmentLabel' => $request->input('departmentLabel'),
            'description'     => $request->input('description'),
            'nom_chef_dep'    => $request->input('nom_chef_dep'),
        ]);
        return redirect()->back()->with('message', 'Département est modifié avec succés');
    }

	//Signature chef département
    public function updateSignatureChefDep(Request $request, $id)
    {
    $file         = $request->signature_chef_dep;
    $myFile64     = $this->convertImage($file);
    $myExtFile64  = $this->getExtensionImage($file);
    $response = Http::put($this->getUrlServer().'/updateSignatureChefDep/'.$id, [
        'signature_chef_dep'  => $myFile64,
        'extensionFile'       => $myExtFile64,
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
        $response = Http::delete($this->getUrlServer().'/delete-departement/'.$id);
        return redirect()->back()->with('message', 'Département est supprimé avec succés');
    }
}
