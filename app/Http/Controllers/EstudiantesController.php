<?php

namespace App\Http\Controllers;

use App\Estudiantes;
use App\Clases;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datos = DB::table('estudiantes')
     ->select('estudiantes.id','estudiantes.nombre_estudiante','clases.clase', 'estudiantes.fecha_nacimiento')
     ->join('clases', 'estudiantes.clases', '=', 'clases.id')

     ->get();

    return view('estudiantes.index',compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('estudiantes.create');
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
        //$datosEstudiante=request() ->all();

        $datosEstudiante=request()->except('_token');
        Estudiantes::insert($datosEstudiante);
       // return redirect('estudiantes');
        return redirect('estudiantes')->with('success','Estudiante Creado.');
        //clases::insert($datosEstudiante);
        //return redirect('estudiantes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estudiantes  $estudiantes
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiantes $estudiantes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estudiantes  $estudiantes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $estudiantes= Estudiantes::findOrFail($id);
        return view('estudiantes.edit',compact('estudiantes'));
       

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estudiantes  $estudiantes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $datosEstudiante=request()->except(['_token','_method']);
        Estudiantes::where('id','=',$id)->update($datosEstudiante);

        $estudiantes= Estudiantes::findOrFail($id);
      //  return view('estudiantes.index',compact('estudiantes'));
        //return redirect();
        return redirect('estudiantes')->with('update','Edición completa.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estudiantes  $estudiantes
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        Estudiantes::destroy($id);
        return redirect('estudiantes')->with('warning','Estudiante Eliminado.');

    }


}
