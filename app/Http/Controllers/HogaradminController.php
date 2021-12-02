<?php

namespace App\Http\Controllers;

use App\Http\Requests\HogarEditRequest;
use App\Models\hogaradmin;
use App\Models\hogar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HogaradminController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['hogares']=hogar::join('users','hogars.user_id','=','users.id')
        ->orderBy('puntos', 'DESC')
        ->paginate();
        return view('admin.hogar.hogaradmin', $datos );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


     /*FALTA EL CREATE DE ADMIN*/
    public function create($id)
    {
        /*CREATE ANTIGUO
        $hogar['hogares']=User::Where('id','=',$id)
        ->first();
        return view('admin.hogar.hogarcreateadmin', $hogar);*/

        /*EDITAR
        $hogar=hogar::Where('id','=',$id)->first();
        return view('admin.hogar.hogarcreateadmin', compact('hogar'));*/
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosHogar = request()->except(['_token', 'tienehogar']);
        hogar::insert($datosHogar);

        User::where('id', '=', request('user_id'))->update(['tienehogar'=> request('tienehogar')]);

        $datos['usuarios']=User::all()->where('rol','<>','1');
        return view('admin.index', $datos);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\hogaradmin  $hogaradmin
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Crear Hogar desde Admin Index
        $hogar['hogar']=User::Where('id','=',$id)
        ->first();
        return view('admin.hogar.hogarcreateadmin', $hogar);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\hogaradmin  $hogaradmin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hogar=hogar::join('users','hogars.user_id','=','users.id')
        ->Where('id','=',$id)->first();
        return view('admin.hogar.hogareditadmin', compact('hogar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\hogaradmin  $hogaradmin
     * @return \Illuminate\Http\Response
     */
    public function update(HogarEditRequest $request, $id)
    {
        /*$datosHogar = request()->except(['_token','_method']);
        hogar::join('users','hogars.user_id','=','users.id')
        ->where('idhogar','=',$id)->update($datosHogar);
        return redirect('admin');*/

        $data = $request->only('id_hogar', 'direccion');

        hogar::where('idhogar','=',$id)->update($data);
        
        return redirect('admin');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\hogaradmin  $hogaradmin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        hogar::join('users','hogars.user_id','=','users.id')->where('user_id','=',$id)->update(['tienehogar'=> '0']);

        hogar::where('user_id','=',$id)->delete();
        return redirect('admin');
    }
}
