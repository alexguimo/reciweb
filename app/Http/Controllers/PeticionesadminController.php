<?php

namespace App\Http\Controllers;

use App\Models\peticionesadmin;
use App\Models\peticiones;
use App\Models\hogar;
use Illuminate\Http\Request;

class PeticionesadminController extends Controller
{
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
        ->where('estado_peticion', '<>','Finalizada')
        ->orderBy('idpeticiones', 'DESC')
        ->paginate();
        return view('admin.peticiones.peticionesadmin', $datos );
    }

    public function indexlist()
    {
        $datos['peticiones']=peticiones::join('hogars','peticiones.hogar_id','=','hogars.idhogar')
        ->join('users','hogars.user_id','=','users.id')
        ->where('estado_peticion', '=','Finalizada')
        ->orderBy('idpeticiones', 'DESC')
        ->paginate();
        return view('admin.peticiones.listadmin', $datos );
    }
    public function indexuser($id)
    {

        $peticiones=peticiones::join('hogars','peticiones.hogar_id','=','hogars.idhogar')
        ->join('users','hogars.user_id','=','users.id')
        ->where('estado_peticion', '<>','Finalizada')
        ->where('hogar_id', '=',$id)
        ->orderBy('idpeticiones', 'DESC')
        ->paginate();

        return view('admin.peticiones.peticionesuseradmin',  compact('peticiones', 'id') );
    }

    public function indexuserlist($id)
    {
        $peticiones=peticiones::join('hogars','peticiones.hogar_id','=','hogars.idhogar')
        ->Where('hogar_id','=',$id)
        ->where('estado_peticion', '=','Finalizada')
        ->orderBy('idpeticiones', 'DESC')
        ->paginate();
        return view('admin.peticiones.peticioneslistadmin', compact('peticiones', 'id') );
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
        $datosPeticion = request()->except(['_token']);
        peticiones::insert($datosPeticion);
        return redirect('peticionesadmin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\peticionesadmin  $peticionesadmin
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $peticiones=hogar::join('users','hogars.user_id','=','users.id')
        ->Where('idhogar','=',$id)->first();

        return view('admin.peticiones.peticionescreateadmin', compact('peticiones') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\peticionesadmin  $peticionesadmin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peticiones=peticiones::join('hogars','peticiones.hogar_id','=','hogars.idhogar')->where('idpeticiones', '=',$id)->first();
        return view('admin.peticiones.peticioneseditadmin', compact('peticiones'));
    }

    public function estado($id)
    {
        $peticiones=peticiones::join('hogars','peticiones.hogar_id','=','hogars.idhogar')
        ->where('idpeticiones', '=',$id)->first();
        return view('admin.peticiones.peticionesestadoadmin', compact('peticiones'));
    }

    public function update(Request $request, $id)
    {
        $datosPeticion = request()->except(['_token','_method']);
        peticiones::where('idpeticiones','=',$id)->update($datosPeticion);
        return redirect('peticionesadmin');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\peticionesadmin  $peticionesadmin
     * @return \Illuminate\Http\Response
     */
    public function updateestado(Request $request, $id, $hog)
    {
        $datosPeticion = request()->except(['_token','_method']);
        peticiones::where('idpeticiones','=',$id)->update($datosPeticion);

        $totalpuntos= peticiones::where('hogar_id','=',$hog)
        ->sum('puntospeticiones');

        $totalpeso = peticiones::where('hogar_id','=',$hog)
        ->sum('pesopeticiones');


        peticiones::join('hogars','peticiones.hogar_id','=','hogars.idhogar')
        ->where('hogar_id','=',$hog)
        ->update([
            'total_peso_reciclado'=> $totalpeso,
            'puntos' => $totalpuntos, 
            'peso_ultimo_reciclado' => request('pesopeticiones'),
            'puntos_ultimo_reciclado' => request('puntospeticiones')
            
        ]);
        //'puntos_ultimo_reciclado'=> request('puntospeticiones'),
        //->update(['puntos'=> peticiones::sum('puntospeticiones'),'puntos_ultimo_reciclado'=> request('puntospeticiones')]);
        //->update(['peso_ultimo_reciclado'=> request('pesopeticiones')])
        //->update(['total_peso_reciclado'=> peticiones::sum('puntospeticiones')]);
        
        return redirect('peticionesadmin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\peticionesadmin  $peticionesadmin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        peticiones::where('idpeticiones','=',$id)->delete();
        return redirect('peticionesadmin');
    }

    
}
