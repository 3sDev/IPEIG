<?php

namespace App\Http\Controllers;

use App\Models\Departements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $response = Departements::where("id", "=", $id)->get();
        $data = json_decode($response);
        return $data;
    }

    public function getAllDepartements()
    {
        $response = Departements::all();
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
        //return view('departement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Service Convert Image
        $extImage  = $request->extensionImg;
        $dataImage = base64_decode($request->signature_chef_dep); //decode base64 string
        $nameImage = time().".$extImage";
        $file      = "upload/departements/signature/".$nameImage;
        $moveImage = file_put_contents($file, $dataImage);

        $department = new Departements;
        $department->departmentLabel    = $request->input('departmentLabel');
        $department->description        = $request->input('description');
        $department->nom_chef_dep       = $request->input('nom_chef_dep');
        $department->signature_chef_dep = $nameImage;

        $department->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Departements $departement)
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
        $departement=Departements::find($id);
        $departement->update($request->all());
    }

    //Signature chef département
    public function updateSignatureChefDep(Request $request, $id)
    {
        $signature = Departements::find($id);
        //Service Convert File
        if ($request->extensionFile != '') {
            File::delete('upload/departements/signature/'.$signature->signature_chef_dep);
            $extFile   = $request->extensionFile;
            $dataImage = base64_decode($request->signature_chef_dep); //decode base64 string
            $nameFile1 = time().".$extFile";
            $file      = "upload/departements/signature/".$nameFile1;
            $moveImage = file_put_contents($file, $dataImage);
        }
        else { $nameFile1 = $signature->signature_chef_dep; }
        $signature->signature_chef_dep = $nameFile1;
        $signature->update();   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departements $departement, $id)
    {
        return Departements::destroy($id); 
    }
}
