<?php

namespace App\Http\Controllers;

use App\Models\DevoirStudent;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DevoirController extends Controller
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
        $response = Http::get($this->getUrlServer().'/getAllDevoirs');
        $devoirs = json_decode($response);

        foreach ($devoirs as $key => $value) {
            foreach ($value as $key => $item) {
                $codes = $item;
            }
        }

        //return view('devoir.index', ['devoirs' => $devoirs, 'codes' => $codes]);
        //return $devoirs;
        return view('devoir.index', ['devoirs' => $devoirs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response1 = Http::get($this->getUrlServer().'/matieres');
        $matieres = json_decode($response1);
        $response2 = Http::get($this->getUrlServer().'/all-classes');
        $classes = json_decode($response2);
        $response3 = Http::get($this->getUrlServer().'/teachers');
        $teachers = json_decode($response3);

        return view('devoir.create', ['teachers' => $teachers, 'matieres' => $matieres, 'classes' => $classes]);
    }

    public function getMatiereDevoir(Request $request)
    {
        $states = DB::table("matiere_classes")
                ->select('matiere_classes.matiere_id', 'matieres.subjectLabel', 'matieres.description', 'matieres.semestre')
                ->join('matieres','matieres.id','=','matiere_classes.matiere_id')
                ->where("matiere_classes.classe_id", $request->classe_id) //->where("classe_id", 1)
                ->where("matieres.semestre", "=", $request->semestre)
                ->get("matiere_classes.matiere_id", "matieres.subjectLabel", "matieres.description");
                error_log($states);
                //return ($states);
        return response()->json($states);
    }

/*     public function getMatiere(Request $request)
    {
        $states = DB::table("matiere_classes")
                ->select('matiere_classes.matiere_id', 'matieres.subjectLabel', 'matieres.description')
                ->join('matieres','matieres.id','=','matiere_classes.matiere_id')
                ->where("matiere_classes.classe_id", $request->classe_id) //->where("classe_id", 1)
                ->get("matiere_classes.matiere_id", "matieres.subjectLabel", "matieres.description");
                error_log($states);
                //return ($states);
        return response()->json($states);
    } */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = Http::post($this->getUrlServer().'/devoirs', [
            'annee'       => $request->input('annee'),
            'semestre'    => $request->input('semestre'),
            'session'     => $request->input('session'),
            'type_devoir' => $request->input('type_devoir'),
            'classe_id'   => $request->input('classe_id'),
            'matiere_id'  => $request->input('matiere_id'),
            'teacher_id'  => $request->input('teacher_id'),
        ]);
        return redirect('/devoirs')->with('message', 'Devoir est ajouté avec succés');
    }

    public function addCodesToStudents(Request $request)
    {
        $now = new \DateTime();
        $ID_Devoir  = $request->devoir_id;
        $ID_Student = $request->student_id;
        $code   = $request->code;

        foreach ($ID_Student as $key => $insert) {
            $datasave = [
                'devoir_id'  => $ID_Devoir,
                'student_id' => $ID_Student[$key],
                'code'       => $code[$key],
                'created_at' => $now,
                'updated_at' => $now,
            ];
            DB::table('devoir_students')->insert($datasave);
        }
        
        $response = Http::get($this->getUrlServer().'/getAllDevoirs');
        $devoirs = json_decode($response);   
        return view('devoir.index', ['devoirs' => $devoirs]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response = Http::get($this->getUrlServer().'/agenda/'.$id);
        $agenda = json_decode($response);

        return view('agenda.show', ['agenda' => $agenda]);
    }

    public function affecterDevoir($id, $classe)
    {
        $response1 = Http::get($this->getUrlServer().'/devoirWithStudentsById/'.$id);
        $devoirs = json_decode($response1);
        $response2 = Http::get($this->getUrlServer().'/students-classesRandom/'.$classe);
        $students  = json_decode($response2);

        return view('devoir.affecter', ['devoirs' => $devoirs, 'students' => $students]);
    }

    public function modifierCodeDevoir($id, $classe)
    {
        $response1 = Http::get($this->getUrlServer().'/devoirWithStudentsById/'.$id);
        $devoirs = json_decode($response1);
        $response2 = Http::get($this->getUrlServer().'/students-classes/'.$classe);
        $students  = json_decode($response2);

        foreach ($devoirs as $key => $value) {
            foreach ($value as $key => $item) {
                $codes = $item;
            }
        }
        return view('devoir.code', ['devoirs' => $devoirs, 'students' => $students, 'codes' => $codes]);
    }

    public function saisirNoteDevoir($id, $classe)
    {
        $response1 = Http::get($this->getUrlServer().'/devoirWithStudentsById/'.$id);
        $devoirs = json_decode($response1);
        $response2 = Http::get($this->getUrlServer().'/students-classes/'.$classe);
        $students  = json_decode($response2);

        foreach ($devoirs as $key => $value) {
            foreach ($value as $key => $item) {
                $codes = $item;
            }
        }
        return view('devoir.teacher', ['devoirs' => $devoirs, 'students' => $students, 'codes' => $codes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $response1 = Http::get($this->getUrlServer().'/matieres');
        $matieres = json_decode($response1);
        $response2 = Http::get($this->getUrlServer().'/all-classes');
        $classes = json_decode($response2);
        $response3 = Http::get($this->getUrlServer().'/teachers');
        $teachers = json_decode($response3);
        $response4 = Http::get($this->getUrlServer().'/devoirWithStudentsById/'.$id);
        $devoirs = json_decode($response4);

        return view('devoir.edit', ['teachers' => $teachers, 'matieres' => $matieres, 'classes' => $classes, 'devoirs' => $devoirs]);
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
        $response = Http::put($this->getUrlServer().'/update-devoir/'.$id, [
            'annee'       => $request->input('annee'),
            'semestre'    => $request->input('semestre'),
            'session'     => $request->input('session'),
            'type_devoir' => $request->input('type_devoir'),
            'classe_id'   => $request->input('classe_id'),
            'matiere_id'  => $request->input('matiere_id'),
            'teacher_id'  => $request->input('teacher_id'),
        ]);
        return redirect()->back()->with('message', 'Devoir est modifié avec succés'); 
    }

    public function modifierCodeStudentByIdCode(Request $request, $id)
    {
        $code = DevoirStudent::find($id);
        $code->code = $request->input('code');

        $code->update();
        return redirect()->back(); 
    }

    public function addNotesToStudentsByTeacher(Request $request)
    {
        $ID_Student = $request->student_id;
        $note       = $request->note;
        $idNote     = $request->idNote;
        $idDevoir   = $request->idDevoir;

        foreach ($ID_Student as $key => $insert) {
            $datasave = [
                'note' => $note[$key],
            ];
            DB::table('devoir_students')->where('id', '=', $idNote[$key])->update($datasave);
        }
        DB::table('devoirs')->where('id', '=', $idDevoir)->update(['statut' => '1']);

        return redirect()->back()->with('message', 'Les notes sont ajoutés avec succés'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Http::delete($this->getUrlServer().'/delete-devoirNote/'.$id);
        return redirect()->back(); 
    }
}
