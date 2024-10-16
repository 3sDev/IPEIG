<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\MyTrait;
use App\Http\Controllers\Services\ConvertBase64;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class SoutenanceController extends Controller
{
    use MyTrait;
    use ConvertBase64;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get($this->getUrlServer().'/all-classes-terminal');
        $classes = json_decode($response);   
        return view('soutenance.index', ['classes' => $classes]);
    }

    public function encadrement()
    {
        $response = Http::get($this->getUrlServer().'/getAllDemandesFromStudentByCategoryStageCopie0');
        $Stagespfe = json_decode($response);   
        return view('encadrement.index', ['Stagespfe' => $Stagespfe]);
    }

    public function listeSouteances(Request $request)
    {
        $classe_id = $request->classe_id;
        $student_id = $request->student_id;
        $response = Http::get($this->getUrlServer().'/getAllDemandesByIdStudentAndCategory/'.$student_id);
        $Stagespfe = json_decode($response);   
        
        $responseByClasse = Http::get($this->getUrlServer().'/getAllDemandesByIdStudentAndCategoryAndClasse/'.$classe_id);
        $StagespfeByClasse = json_decode($responseByClasse); 

        //return $Stagespfe;
        if ($student_id != '') {
            return view('soutenance.liste', ['Stagespfe' => $Stagespfe]);
        } else {
            return view('soutenance.liste', ['Stagespfe' => $StagespfeByClasse]);
        }
        
        
        //return view('soutenance.liste', ['demandestudents' => $demandestudents]);
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
        $response = Http::get($this->getUrlServer().'/demandefromstudent/'.$id);
        $demandes = json_decode($response);

        return view('stagepfe.show', ['demandes' => $demandes]);
    }

    public function showAffectation($id)
    {
        $response = Http::get($this->getUrlServer().'/demandefromstudent/'.$id);
        $demandes = json_decode($response);

        return view('stagepfe.showAffectation', ['demandes' => $demandes]);
    }

    public function showAffectationBinome($id, $binome)
    {
        $response  = Http::get($this->getUrlServer().'/demandefromstudent/'.$id);
        $demandes  = json_decode($response);
        
        $binome = DB::select('select students.nom as nom, students.prenom as prenom, students.cin as cin, classes.abbreviation as abbreviation 
        from students inner join classes where students.classe_id = classes.id and students.id = ?', [$binome]);

        return view('soutenance.showBinome', ['demandes' => $demandes, 'binome' => $binome]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response = Http::get($this->getUrlServer().'/teachers');
        $teachers = json_decode($response);

        $response1 = Http::get($this->getUrlServer().'/sallesdep');
        $salles = json_decode($response1);

        $response2 = Http::get($this->getUrlServer().'/demandefromstudent/'.$id);
        $demandeByStudent = json_decode($response2);

        return view('soutenance.edit', ['demandes' => $demandeByStudent, 'teachers' => $teachers
        , 'salles' => $salles]);
    }
    
    public function detailSoutenance($id)
    {
        $response = Http::get($this->getUrlServer().'/teachers');
        $teachers = json_decode($response);

        $response1 = Http::get($this->getUrlServer().'/sallesdep');
        $salles = json_decode($response1);

        $response2 = Http::get($this->getUrlServer().'/demandefromstudent/'.$id);
        $demandes = json_decode($response2);

        return view('soutenance.details', ['demandes' => $demandes, 'teachers' => $teachers
        , 'salles' => $salles]);
    }

    public function getStudent(Request $request)
    {
        $states = DB::select('select * from students where classe_id = ?', [$request->classe_id]);
        
        //return ($states);
        return response()->json($states);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateSoutenance(Request $request, $id)
    {
        $rapporteurId  =  explode("/", $request->input('rapporteur_pfe'))[0];
        $rapporteurNom =  explode("/", $request->input('rapporteur_pfe'))[1];
        $presidentJuryId  =  explode("/", $request->input('president_pfe'))[0];
        $presidentJuryNom =  explode("/", $request->input('president_pfe'))[1];

        $response = Http::put($this->getUrlServer().'/updateSoutenanceDashboard/'.$id, [
            'soutenance_pfe'        => $request->input('soutenance_pfe'),
            'heuredebut_soutenance' => $request->input('heuredebut_soutenance'),
            'heurefin_soutenance'   => $request->input('heurefin_soutenance'),
            'salle_soutenance'      => $request->input('salle_soutenance'),
            'rapporteur_id'         => $rapporteurId,
            'rapporteur_pfe'        => $rapporteurNom,
            'presidentjury_id'      => $presidentJuryId,
            'president_pfe'         => $presidentJuryNom,
            'invite1_pfe'           => $request->input('invite1_pfe'),
            'invite2_pfe'           => $request->input('invite2_pfe'),
        ]);
        error_log("-------------------------------------------------------".$response);
        return redirect()->back()->with('message', 'Soutenance est modifié avec succés');
    }

    public function updateProposition(Request $request, $id)
    {
        $file      = $request->proposition_pfe;
        $myFile    = $this->convertImage($file);
        $myExtFile = $this->getExtensionImage($file);

        $response = Http::put($this->getUrlServer().'/update-propositionPFE/'.$id, [
            'proposition_pfe' => $myFile,
            'extensionFile'   => $myExtFile,
        ]);
        //error_log('UpdateImage--------------------------------------------------------------------------'.$response);
        return redirect()->back()->with('message', 'Le fichier est modifié avec succés'); 
    }

    public function updateAttestation(Request $request, $id)
    {
        $file      = $request->attestation_stage_pfe;
        $myFile    = $this->convertImage($file);
        $myExtFile = $this->getExtensionImage($file);

        $response = Http::put($this->getUrlServer().'/update-attestationPFE/'.$id, [
            'attestation_stage_pfe' => $myFile,
            'extensionFile'         => $myExtFile,
        ]);
        //error_log('UpdateImage--------------------------------------------------------------------------'.$response);
        return redirect()->back()->with('message', 'Le fichier est modifié avec succés'); 
    }

    public function updateRapport(Request $request, $id)
    {
        $file      = $request->rapport_livrable_pfe;
        $myFile    = $this->convertImage($file);
        $myExtFile = $this->getExtensionImage($file);

        $response = Http::put($this->getUrlServer().'/update-rapportPFE/'.$id, [
            'rapport_livrable_pfe' => $myFile,
            'extensionFile'        => $myExtFile,
        ]);
        //error_log('UpdateImage--------------------------------------------------------------------------'.$response);
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
        $response = Http::delete($this->getUrlServer().'/delete-pfeDirection/'.$id);
        return redirect()->back(); 
    }
}
