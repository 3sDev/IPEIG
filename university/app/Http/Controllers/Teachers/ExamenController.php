<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Models\Examen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ExamenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $response = Examen::where("id", "=", $id)->get();
        $data = json_decode($response);
        return $data;
    }

    public function getAllExamens()
    {
        $response = Examen::with('classe', 'matiere', 'teacher', 'students')->orderBy("created_at", "DESC")->get();
        $data = json_decode($response);
        return $data;
    }

    public function examenWithStudentsById($id)
    {
        $response = Examen::with('classe', 'matiere', 'teacher', 'students')->where("id", "=", $id)->get();
        $data = json_decode($response);
        return $data;
    }

    public function getAllExamensByIdTeacher($id)
    {
        $response = Examen::with('classe', 'matiere', 'teacher', 'students')->where("teacher_id", "=", $id)->get();
        $data = json_decode($response);
        return $data;
    }

    //count
    public function getCountExamenTeacherByStatut($statut)
    {
        $response = Examen::where("statut", "=", $statut)->count();
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
        $examen = new Examen;
        $examen->annee       = $request->input('annee');
        $examen->semestre    = $request->input('semestre');
        $examen->session     = $request->input('session');
        $examen->description = $request->input('description');
        $examen->classe_id   = $request->input('classe_id');
        $examen->matiere_id  = $request->input('matiere_id');
        $examen->teacher_id  = $request->input('teacher_id');

        $examen->save();
        return $examen;
    }

    public function storeExamen(Request $request)
    {
        $ID_Examen  = $request->examen_id;
        $ID_Student = $request->student_id;
        $note       = $request->note;
        $code       = $request->code;

        foreach ($ID_Student as $key => $insert) {
            $datasave = [
                'student_id' => $ID_Student[$key],
                'code'       => $code[$key],
                'note'       => $note[$key],
                'examen_id'  => $ID_Examen,
                'created_at' => now(),
                'updated_at' => now(),
            ];
            DB::table('examen_students')->insert($datasave);
        }
        DB::table('examens')->where('id', '=', $ID_Examen)->update(['statut' => '1']);
    }

    public function saisirNoteExamen($id, $classe)
    {
        $response1 = Http::get($this->getUrlServer().'/examenWithStudentsById/'.$id);
        $examens = json_decode($response1);
        $response2 = Http::get($this->getUrlServer().'/students-classes/'.$classe);
        $students  = json_decode($response2);

        foreach ($examens as $key => $value) {
            foreach ($value as $key => $item) {
                $codes = $item;
            }
        }
        //return view('examen.teacher', ['examens' => $examens, 'students' => $students, 'codes' => $codes]);
    }

    public function addNotesToStudentsByTeacher(Request $request)
    {
        $ID_Student = $request->student_id;
        $note       = $request->note;
        $idNote     = $request->idNote;
        $idExamen   = $request->idExamen;

        foreach ($ID_Student as $key => $insert) {
            $datasave = [
                'note' => $note[$key],
            ];
            DB::table('examen_students')->where('id', '=', $idNote[$key])->update($datasave);
        }
        DB::table('examens')->where('id', '=', $idExamen)->update(['statut' => '1']);
        return response()->json([
            'message' => 'Les notes sont ajoutés avec succés.'
        ]);
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
        $examen = Examen::find($id);
        $examen->annee       = $request->input('annee');
        $examen->semestre    = $request->input('semestre');
        $examen->session     = $request->input('session');
        $examen->description = $request->input('description');
        $examen->classe_id   = $request->input('classe_id');
        $examen->matiere_id  = $request->input('matiere_id');
        $examen->teacher_id  = $request->input('teacher_id');

        $examen->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Examen::destroy($id);
    }
}
