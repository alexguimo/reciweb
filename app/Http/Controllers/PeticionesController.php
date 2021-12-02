<?php

namespace App\Http\Controllers;

use App\Models\peticiones;
use App\Models\hogar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PeticionesController extends Controller
{

    public function __construct()
    {
        $this->middleware('user');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$datos['hogares']=hogar::join('users','hogars.user_id','=','users.id')
        //    ->Where('user_id','=',Auth::user()->id)->paginate(3);
        //return view('hogar.index', $datos );

        $datos['peticiones']=peticiones::join('hogars','peticiones.hogar_id','=','hogars.idhogar')
        ->join('users','hogars.user_id','=','users.id')
        ->Where('user_id','=',Auth::user()->id)
        ->where('estado_peticion', '<>','Finalizada')
        //->where('estado_peticion', '<>','Activa')
        ->orderBy('idpeticiones', 'DESC')
        ->paginate();
        return view('peticiones.index', $datos );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datos['peticiones']=hogar::join('users','hogars.user_id','=','users.id')
        ->Where('user_id','=',Auth::user()->id)->paginate();
        return view('peticiones.create', $datos );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosPeticion = request()->except(['_token']);
        peticiones::insert($datosPeticion);
        return redirect('peticiones');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\peticiones  $peticiones
     * @return \Illuminate\Http\Response
     */
    public function index2()
    {
        $datos['peticiones']=peticiones::join('hogars','peticiones.hogar_id','=','hogars.idhogar')
        ->join('users','hogars.user_id','=','users.id')
        ->Where('user_id','=',Auth::user()->id)
        ->where('estado_peticion', '=','Finalizada')
        ->orderBy('idpeticiones', 'DESC')
        ->paginate();
        return view('peticiones.list', $datos );
    }

    public function show(peticiones $peticiones){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\peticiones  $peticiones
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peticiones=peticiones::join('hogars','peticiones.hogar_id','=','hogars.idhogar')->where('idpeticiones', '=',$id)->first();
        return view('peticiones.edit', compact('peticiones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\peticiones  $peticiones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosPeticion = request()->except(['_token','_method']);
        peticiones::where('idpeticiones','=',$id)->update($datosPeticion);
        return redirect('peticiones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\peticiones  $peticiones
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        peticiones::where('idpeticiones','=',$id)->delete();
        return redirect('peticiones');
    }
}
