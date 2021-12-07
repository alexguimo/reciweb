<?php

namespace App\Http\Controllers;

use App\Http\Requests\HogarEditRequest;
use App\Models\hogar;
use App\Models\peticiones;
use App\Models\User;
use Database\Seeders\HogaradminSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;
use Symfony\Component\Console\Logger\ConsoleLogger;

class HogarController extends Controller
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
        
        $datos['hogares']=hogar::join('users','hogars.user_id','=','users.id')
            ->Where('user_id','=',Auth::user()->id)->paginate();
        return view('hogar.index', $datos );
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hogar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HogarEditRequest $request)
    {
        /*$hognuevo=request('id_hogar');
        $actual=hogar::Where('user_id','=',Auth::user()->id);*/

        $datosHogar = $request->except(['_token', 'tienehogar']);
        hogar::insert($datosHogar);

        User::where('id', '=', request('user_id'))->update(['tienehogar'=> request('tienehogar')]);
        return redirect('hogar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\hogar  $hogar
     * @return \Illuminate\Http\Response
     */
    public function show(hogar $hogar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\hogar  $hogar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hogar=hogar::Where('idhogar','=',$id)->first();
        return view('hogar.edit', compact('hogar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\hogar  $hogar
     * @return \Illuminate\Http\Response
     */
    public function update(HogarEditRequest $request, $id)
    {
        $data = $request->except(['_token', '_method', 'tienehogar']);

        hogar::where('idhogar','=',$id)->update($data);
        
        return redirect('hogar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\hogar  $hogar
     * @return \Illuminate\Http\Response
     */

     //Falta borrar todas las peticiones con el hogar
    public function destroy($id)
    {

        hogar::join('users','hogars.user_id','=','users.id')->where('idhogar','=',$id)->update(['tienehogar'=> '0']);

        peticiones::join('hogars','peticiones.hogar_id','=','hogars.idhogar')->where('idhogar', '=',$id)->delete();
        hogar::where('idhogar','=',$id)->delete();
        return redirect('hogar');
    }
}
