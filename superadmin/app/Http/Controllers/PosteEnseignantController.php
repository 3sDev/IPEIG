<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\EnseignantPoste;

class PosteEnseignantController extends Controller
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
      $Enseignants =  EnseignantPoste::all();

    // Pass the $posts variable to the view using compact
   return view('enseignantPoste.show', compact('Enseignants'));
        /*$response = Http::get($this->getUrlServer().'/AllPostePersonnelsFonction');
        $fonctions = json_decode($response); 

        $response1 = Http::get($this->getUrlServer().'/AllPostePersonnelsCategorie');
        $categories = json_decode($response1); 

        $response2 = Http::get($this->getUrlServer().'/AllPostePersonnelsGrade');
        $grades = json_decode($response2); 

        return view('personnelPoste.index', ['categories' => $categories, 'grades' => $grades, 'fonctions' => $fonctions]);*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('enseignantPoste.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
     
     
   
      	$etat = new EnseignantPoste;
        $etat->value = $request->input('value');
        $etat->Poste_fr= $request->input('Poste_fr');
        $etat->Poste_ar= $request->input('Poste_ar');
        $etat->save();
      
        return redirect('enseignantPoste')->with('message', 'enseignant Etat est ajouté avec succés');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostePersonnel  $PostePersonnel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostePersonnel  $PostePersonnel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response = Http::get($this->getUrlServer().'/poste/'.$id);
        $liens = json_decode($response);  

        return view('personnelPoste.edit', ['liens' => $liens]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostePersonnel  $PostePersonnel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $response = Http::put($this->getUrlServer().'/update-poste/'.$id, [
            'label_fr' => $request->input('label_fr'),
            'label_fr' => $request->input('label_fr'),
        ]);
        return redirect()->back()->with('message', 'Poste personnel est modifié avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostePersonnel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
  
       $Enseignants = EnseignantPoste::find($id);

    if ($Enseignants) {
        // Delete the post
        $Enseignants->delete();

    }
       return redirect()->back()->with('message', 'Poste enseignant a été supprimé avec succés');
    }
}






