<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Models\EmploiTeacher;
use App\Models\SalleEmploi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class EmploiTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getAllSeanceFromIdTeacher($id)
    {
        $response = EmploiTeacher::with('classe', 'matiere', 'salle')->where("teacher_id", "=", $id)->get();
        $data = json_decode($response);
        return $data;
    }

    public function getAllSeanceFromIdTeacherBySemestre($id, $semestre)
    {
        $response = EmploiTeacher::with('classe', 'matiere', 'salle')->where("teacher_id", "=", $id)
        ->where("semestre", "=", $semestre)->get();
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
        //Add seance
        $teacher = new EmploiTeacher;
        $teacher->classe_id   = $request->input('classe_id');
        $teacher->matiere_id  = $request->input('matiere_id');
        $teacher->salle_id    = $request->input('salle_id');
        $teacher->teacher_id  = $request->input('teacher_id');
        $teacher->jour        = $request->input('jour'); 
        $teacher->heure_debut = $request->input('heure_debut'); 
        $teacher->heure_fin   = $request->input('heure_fin');
        $teacher->type_seance = $request->input('type_seance');
        $teacher->semestre    = $request->input('semestre');

        $mySemestre = $request->input('semestre');
        
        if ($mySemestre == '1') {
            $statutSalle = DB::select('select statut from salle_emplois where jour = ? and heure_debut = ? and heure_fin = ? and salle_id = ?',[$teacher->jour, $teacher->heure_debut, $teacher->heure_fin, $teacher->salle_id]);
        
            if ($statutSalle[0]->statut == 0 && $teacher->type_seance == "15") {
                DB::update('update salle_emplois set statut = ? where jour = ? and heure_debut = ? and heure_fin = ? and salle_id = ?',[2, $teacher->jour, $teacher->heure_debut, $teacher->heure_fin, $teacher->salle_id]);
                $teacher->save();
            }
            elseif ($statutSalle[0]->statut == 2 && $teacher->type_seance == "15") {
                DB::update('update salle_emplois set statut = ? where jour = ? and heure_debut = ? and heure_fin = ? and salle_id = ?',[1, $teacher->jour, $teacher->heure_debut, $teacher->heure_fin, $teacher->salle_id]);
                $teacher->save();
            }
            elseif ($statutSalle[0]->statut == 0 && $teacher->type_seance == "1") {
                DB::update('update salle_emplois set statut = ? where jour = ? and heure_debut = ? and heure_fin = ? and salle_id = ?',[1, $teacher->jour, $teacher->heure_debut, $teacher->heure_fin, $teacher->salle_id]);
                $teacher->save();
            }
            
            return $teacher;
        } 
        
        else {
            $statutSalle = DB::select('select statut from salle_emplois_2 where jour = ? and heure_debut = ? and heure_fin = ? and salle_id = ?',[$teacher->jour, $teacher->heure_debut, $teacher->heure_fin, $teacher->salle_id]);
        
            if ($statutSalle[0]->statut == 0 && $teacher->type_seance == "15") {
                DB::update('update salle_emplois_2 set statut = ? where jour = ? and heure_debut = ? and heure_fin = ? and salle_id = ?',[2, $teacher->jour, $teacher->heure_debut, $teacher->heure_fin, $teacher->salle_id]);
                $teacher->save();
            }
            elseif ($statutSalle[0]->statut == 2 && $teacher->type_seance == "15") {
                DB::update('update salle_emplois_2 set statut = ? where jour = ? and heure_debut = ? and heure_fin = ? and salle_id = ?',[1, $teacher->jour, $teacher->heure_debut, $teacher->heure_fin, $teacher->salle_id]);
                $teacher->save();
            }
            elseif ($statutSalle[0]->statut == 0 && $teacher->type_seance == "1") {
                DB::update('update salle_emplois_2 set statut = ? where jour = ? and heure_debut = ? and heure_fin = ? and salle_id = ?',[1, $teacher->jour, $teacher->heure_debut, $teacher->heure_fin, $teacher->salle_id]);
                $teacher->save();
            }
            
            return $teacher;
        }
        

        //$teacher->save();
        
        //Update Statut of salle
        // if ($request->input('type_seance') == 2) {
        //     DB::update('update salle_emplois set statut = ? where jour = ? and heure_debut = ? and heure_fin = ? and salle_id = ?',[2, $teacher->jour, $teacher->heure_debut, $teacher->heure_fin, $teacher->salle_id]);
        // } else {
        //     DB::update('update salle_emplois set statut = ? where jour = ? and heure_debut = ? and heure_fin = ? and salle_id = ?',[1, $teacher->jour, $teacher->heure_debut, $teacher->heure_fin, $teacher->salle_id]);
        // }
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
        //Update statut of salle
        $seance = EmploiTeacher::find($id);
        $seanceDebut = $seance->heure_debut;
        $seanceFin   = $seance->heure_fin;
        $seanceJour  = $seance->jour;
        $seanceSalle = $seance->salle_id;
        $type_seance = $seance->type_seance;
        
        $statutSalle = DB::select('select statut from salle_emplois where jour = ? and heure_debut = ? and heure_fin = ? and salle_id = ?',[$seanceJour, $seanceDebut, $seanceFin, $seanceSalle]);
        
        if ($statutSalle[0]->statut == 1 && $type_seance == "15") {
            DB::update('update salle_emplois set statut = ? where jour = ? and heure_debut = ? and heure_fin = ?
            and salle_id = ?',[2, $seanceJour, $seanceDebut, $seanceFin, $seanceSalle]);
        }
        elseif ($statutSalle[0]->statut == 2 && $type_seance == "15") {
            DB::update('update salle_emplois set statut = ? where jour = ? and heure_debut = ? and heure_fin = ?
            and salle_id = ?',[0, $seanceJour, $seanceDebut, $seanceFin, $seanceSalle]);
        }
        if ($statutSalle[0]->statut == 1 && $type_seance == "1") {
            DB::update('update salle_emplois set statut = ? where jour = ? and heure_debut = ? and heure_fin = ?
            and salle_id = ?',[0, $seanceJour, $seanceDebut, $seanceFin, $seanceSalle]);
        }
        
        //Delete seance
        return EmploiTeacher::destroy($id);
    }

    public function destroySeanceFromSemestre($id)
    {
        //Update statut of salle
        $seance = EmploiTeacher::find($id);
        $seanceDebut = $seance->heure_debut;
        $seanceFin   = $seance->heure_fin;
        $seanceJour  = $seance->jour;
        $seanceSalle = $seance->salle_id;
        $type_seance = $seance->type_seance;
        $mySemestre  = $seance->semestre;

        if ($mySemestre == "1") {
            $statutSalle = DB::select('select statut from salle_emplois where jour = ? and heure_debut = ? and heure_fin = ? and salle_id = ?',[$seanceJour, $seanceDebut, $seanceFin, $seanceSalle]);
        
            if ($statutSalle[0]->statut == 1 && $type_seance == "15") {
                DB::update('update salle_emplois set statut = ? where jour = ? and heure_debut = ? and heure_fin = ?
                and salle_id = ?',[2, $seanceJour, $seanceDebut, $seanceFin, $seanceSalle]);
            }
            elseif ($statutSalle[0]->statut == 2 && $type_seance == "15") {
                DB::update('update salle_emplois set statut = ? where jour = ? and heure_debut = ? and heure_fin = ?
                and salle_id = ?',[0, $seanceJour, $seanceDebut, $seanceFin, $seanceSalle]);
            }
            if ($statutSalle[0]->statut == 1 && $type_seance == "1") {
                DB::update('update salle_emplois set statut = ? where jour = ? and heure_debut = ? and heure_fin = ?
                and salle_id = ?',[0, $seanceJour, $seanceDebut, $seanceFin, $seanceSalle]);
            }
        } else {
            $statutSalle = DB::select('select statut from salle_emplois_2 where jour = ? and heure_debut = ? and heure_fin = ? and salle_id = ?',[$seanceJour, $seanceDebut, $seanceFin, $seanceSalle]);
        
            if ($statutSalle[0]->statut == 1 && $type_seance == "15") {
                DB::update('update salle_emplois_2 set statut = ? where jour = ? and heure_debut = ? and heure_fin = ?
                and salle_id = ?',[2, $seanceJour, $seanceDebut, $seanceFin, $seanceSalle]);
            }
            elseif ($statutSalle[0]->statut == 2 && $type_seance == "15") {
                DB::update('update salle_emplois_2 set statut = ? where jour = ? and heure_debut = ? and heure_fin = ?
                and salle_id = ?',[0, $seanceJour, $seanceDebut, $seanceFin, $seanceSalle]);
            }
            if ($statutSalle[0]->statut == 1 && $type_seance == "1") {
                DB::update('update salle_emplois_2 set statut = ? where jour = ? and heure_debut = ? and heure_fin = ?
                and salle_id = ?',[0, $seanceJour, $seanceDebut, $seanceFin, $seanceSalle]);
            }
        }
        
        //Delete seance
        return EmploiTeacher::destroy($id);
    }
}
