<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Models\Devoir;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DevoirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $response = Devoir::where("id", "=", $id)->get();
        $data = json_decode($response);
        return $data;
    }

    public function getAllDevoirs()
    {
        $response = Devoir::with('classe', 'matiere', 'teacher', 'students')->orderBy("created_at", "DESC")->get();
        $data = json_decode($response);
        return $data;
    }

    public function devoirWithStudentsById($id)
    {
        $response = Devoir::with('classe', 'matiere', 'teacher', 'students')->where("id", "=", $id)->get();
        $data = json_decode($response);
        return $data;
    }

    public function getAllDevoirsByIdTeacher($id)
    {
        $response = Devoir::with('classe', 'matiere', 'teacher', 'students')->where("teacher_id", "=", $id)->get();
        $data = json_decode($response);
        return $data;
    }

    //count
    public function getCountDevoirTeacherByStatut($statut)
    {
        $response = Devoir::where("statut", "=", $statut)->count();
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
        $devoir = new Devoir;
        $devoir->annee       = $request->input('annee');
        $devoir->semestre    = $request->input('semestre');
        $devoir->session     = $request->input('session');
        $devoir->type_devoir = $request->input('type_devoir');
        $devoir->classe_id   = $request->input('classe_id');
        $devoir->matiere_id  = $request->input('matiere_id');
        $devoir->teacher_id  = $request->input('teacher_id');

        $devoir->save();
        return $devoir;
    }

    public function storeDevoir(Request $request)
    {
        $ID_Devoir  = $request->devoir_id;
        $ID_Student = $request->student_id;
        $note       = $request->note;

        foreach ($ID_Student as $key => $insert) {
            $datasave = [
                'student_id' => $ID_Student[$key],
                'note'       => $note[$key],
                'devoir_id'  => $ID_Devoir,
                'created_at' => now(),
                'updated_at' => now(),
            ];
            DB::table('devoir_students')->insert($datasave);
        }
        DB::table('devoirs')->where('id', '=', $ID_Devoir)->update(['statut' => '1']);
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
        $devoir = Devoir::find($id);
        $devoir->annee       = $request->input('annee');
        $devoir->semestre    = $request->input('semestre');
        $devoir->session     = $request->input('session');
        $devoir->type_devoir = $request->input('type_devoir');
        $devoir->classe_id   = $request->input('classe_id');
        $devoir->matiere_id  = $request->input('matiere_id');
        $devoir->teacher_id  = $request->input('teacher_id');

        $devoir->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Devoir::destroy($id);
    }
}
