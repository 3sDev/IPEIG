<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;


class AttendanceController extends Controller
{
    use Services\MyTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departementAdmin  = Auth::user()->departement_id;
        if (Auth::user()->departement_id == '1') {
            $response = Http::get($this->getUrlServer().'/teachers');
            $teachers = json_decode($response); 
        } else {
            $response = Http::get($this->getUrlServer().'/teachersWithDepartement/'.$departementAdmin);
            $teachers = json_decode($response); 
        }

        $response2 = Http::get($this->getUrlServer().'/attendances-teachers');
        $attendances = json_decode($response2); 

        return view('attendance.class', ['teachers' => $teachers, 'attendances' => $attendances]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $dateAbs = $request->attendance_date;
        
        $mySemestre   = $request->attendance_date;
        $semestreTest = date('m-d', strtotime($mySemestre));
        $Semestre_1_DateBegin = date('m-d', strtotime('09/01'));
        $Semestre_1_DateEnd   = date('m-d', strtotime('12/31'));
        if ($semestreTest >= $Semestre_1_DateBegin && $semestreTest <= $Semestre_1_DateEnd){
            $semestre = "1";
        }
        else {
            $semestre = "2";
        }
        //$seanceAbs = $request->seanceattendance;
        $thisDay = date('l', strtotime($dateAbs));
        if ($thisDay == 'Monday') {
            $seanceAbs = 'Lundi';
        }
        elseif ($thisDay == 'Tuesday') {
            $seanceAbs = 'Mardi';
        }
        elseif ($thisDay == 'Wednesday') {
            $seanceAbs = 'Mercredi';
        }
        elseif ($thisDay == 'Thursday') {
            $seanceAbs = 'Jeudi';
        }
        elseif ($thisDay == 'Friday') {
            $seanceAbs = 'Vendredi';
        }
        elseif ($thisDay == 'Saturday') {
            $seanceAbs = 'Samedi';
        }
        else {
            $seanceAbs = 'Dimanche';
        }
        $IdTeacher      = $request->teacher_id;
        $Jour           = $seanceAbs;
        $DateAttendance = $request->attendance_date;

        $response = Http::get($this->getUrlServer().'/teacher-profile/'.$IdTeacher);
        $teacherResult = json_decode($response);

        $response2 = Http::get($this->getUrlServer().'/emploi-teacher-day-semestre/'.$IdTeacher.'/'.$Jour.'/'.$semestre);
        $emploiTeacher = json_decode($response2);

        $response3 = Http::get($this->getUrlServer().'/attendances-teacher/'.$IdTeacher.'/'.$Jour.'/'.$DateAttendance );
        $attendanceTeachers = json_decode($response3);

        return view('attendance.create', ['IdTeacher' => $IdTeacher, 'Jour' => $Jour, 'semestre' => $semestre,
        'DateAttendance' => $DateAttendance, 'teacherResult' => $teacherResult, 
        'emploiTeacher' => $emploiTeacher, 'attendanceTeachers' => $attendanceTeachers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $now = Carbon::now();
        $Jour = $request->jour;
        $DateAttendance = $request->attendance_date;
        $mySemestre     = $request->attendance_date;
        $semestreTest   = date('m-d', strtotime($mySemestre));
        $Semestre_1_DateBegin = date('m-d', strtotime('09/01'));
        $Semestre_1_DateEnd   = date('m-d', strtotime('12/31'));
        if ($semestreTest >= $Semestre_1_DateBegin && $semestreTest <= $Semestre_1_DateEnd){
            $semestre = "1";
        }
        else {
            $semestre = "2";
        }

        $ID_Seance    = $request->seance_id;
        $ID_Teacher   = $request->teacher_id;
        $Nom_Matiere  = $request->nom_matiere;
        $Type_Matiere = $request->type_matiere;
        $Heure_Debut  = $request->heure_debut;
        $Heure_Fin    = $request->heure_fin;
        $Salle        = $request->salle;
        $Presence     = $request->presence;
        
        foreach ($ID_Seance as $key => $insert) {
            
            if ($Presence[$key] == 'A') {
                $datasave = [
                    'nom_matiere'       => $Nom_Matiere[$key],
                    'type_matiere'      => $Type_Matiere[$key],
                    'jour'              => $Jour,
                    'salle'             => $Salle[$key],
                    'heure_debut'       => $Heure_Debut[$key],
                    'heure_fin'         => $Heure_Fin[$key],
                    'attendance_date'   => $DateAttendance,
                    'attendance_statut' => 'A',
                    'teacher_id'        => $ID_Teacher,
                    'seance_id'         => $ID_Seance[$key],
                    'created_at'        => $now,
                    'updated_at'        => $now,
                ];
                DB::table('attendance_teachers')->insert($datasave);
            }
        }

        $DateNow = Carbon::now()->format('Y-m-d');

        $response = Http::get($this->getUrlServer().'/teacher-profile/'.$ID_Teacher);
        $teacherResult = json_decode($response);

        $response2 = Http::get($this->getUrlServer().'/emploi-teacher-day-semestre/'.$ID_Teacher.'/'.$Jour.'/'.$semestre);
        $emploiTeacher = json_decode($response2);

        $response3 = Http::get($this->getUrlServer().'/attendances-teacher/'.$ID_Teacher.'/'.$Jour.'/'.$DateAttendance );
        $attendanceTeachers = json_decode($response3);

        return view('attendance.create', ['IdTeacher' => $ID_Teacher, 'Jour' => $Jour, 'teacherResult' => $teacherResult, 
        'emploiTeacher' => $emploiTeacher, 'attendanceTeachers' => $attendanceTeachers, 'DateAttendance' => $DateAttendance]);   
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
        $response = Http::get($this->getUrlServer().'/attendance-details-teacher/'.$id);
        $attendances = json_decode($response);

        return view('attendance.edit', ['attendances' => $attendances]);
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
        $response = Http::put($this->getUrlServer().'/update-attendance-teacher/'.$id, [
            'attendance_date'    => $request->input('attendance_date'),
            'heure_debut'        => $request->input('heure_debut'),
            'heure_fin'          => $request->input('heure_fin'),
            'jour'               => $request->input('jour'),
            'justification'      => $request->input('justification'),
            'date_justification' => $request->input('date_justification'),
        ]);
        error_log('----------------------------------------'.$response);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Http::delete($this->getUrlServer().'/delete-attendance-teacher/'.$id);
        
        $response = Http::get($this->getUrlServer().'/teachers');
        $teachers = json_decode($response); 

        $response2 = Http::get($this->getUrlServer().'/attendances-teachers');
        $attendances = json_decode($response2); 

        return view('attendance.class', ['teachers' => $teachers, 'attendances' => $attendances]);
    }

    public function destroyPageCreate(Request $request, $id)
    {
        $response = Http::delete($this->getUrlServer().'/delete-attendance-teacher/'.$id);
        
        $IdTeacher      = $request->teacher_id;
        $Jour           = $request->jour;
        $DateAttendance = $request->attendance_date;
        $mySemestre     = $request->attendance_date;
        $semestreTest   = date('m-d', strtotime($mySemestre));
        $Semestre_1_DateBegin = date('m-d', strtotime('09/01'));
        $Semestre_1_DateEnd   = date('m-d', strtotime('12/31'));
        if ($semestreTest >= $Semestre_1_DateBegin && $semestreTest <= $Semestre_1_DateEnd){
            $semestre = "1";
        }
        else {
            $semestre = "2";
        }

        $response = Http::get($this->getUrlServer().'/teacher-profile/'.$IdTeacher);
        $teacherResult = json_decode($response);

        $response2 = Http::get($this->getUrlServer().'/emploi-teacher-day-semestre/'.$IdTeacher.'/'.$Jour.'/'.$semestre);
        $emploiTeacher = json_decode($response2);

        $response3 = Http::get($this->getUrlServer().'/attendances-teacher/'.$IdTeacher.'/'.$Jour.'/'.$DateAttendance );
        $attendanceTeachers = json_decode($response3);

        return view('attendance.create', ['IdTeacher' => $IdTeacher, 'Jour' => $Jour, 
        'DateAttendance' => $DateAttendance, 'teacherResult' => $teacherResult, 
        'emploiTeacher' => $emploiTeacher, 'attendanceTeachers' => $attendanceTeachers]);
    }
}
