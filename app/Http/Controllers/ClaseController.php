<?php

namespace App\Http\Controllers;

use App\Clases;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ClaseController extends Controller
{
    public function index()
    {

    $datos = DB::table('clases')
     ->select('clases.id','clases.clase','clases.clase')
     ->get();
    
  
    

        return view('clases.index',compact('datos'));


    }

    public function create()
    {

        return view('clases.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     

        $datosClases=request()->except('_token');
        Clases::insert($datosClases);

        return redirect('clases')->with('success','Clase creada.');
    
    }



    public function destroy( $id)
    {
        //
        Clases::destroy($id);
        return redirect('clases')->with('warning','Clase eliminada.');

    }
}
