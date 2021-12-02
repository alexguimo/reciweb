<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEditRequest;
use App\Models\administracion;
use App\Models\hogar;
use App\Models\peticiones;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;


class AdministracionController extends Controller
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
        $datos['usuarios']=User::all()->where('rol','<>','1');
        return view('admin.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function create()
    {
        return view('auth.registeradmin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$datosUser = request()->except(['_token']);
        //administracion::insert($datosUser);

        //return redirect('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\administracion  $administracion
     * @return \Illuminate\Http\Response
     */
    public function show(administracion $administracion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\administracion  $administracion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario=User::Where('id','=',$id)->first();
        return view('admin.usuario.adminshowuser', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\administracion  $administracion
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        /*$request->validate([
            'name' => ['required', 'string', 'max:255'],
            'cedula' => ['required', 'string', 'min:10', 'max:10', 'unique:users', Rule::unique('users')->ignore($request->id)],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', Rule::unique('users')->ignore($request->id)],
            'password' => ['required', 'string']
        ]);

        User::where('id','=',$id)->update($request->only('name', 'cedula', 'email', 'password')
        + [
            'password' => Hash::make($request->input('password')),
        ]);

        $datosUser = request()->except(['_token','_method']);
        User::where('id','=',$id)->update($datosUser);*/

        $data = $request->only('name', 'cedula', 'email');
        $password= $request->input('password');
        if($password)
            $data['password'] = Hash::make($password);

        User::where('id','=',$id)->update($data);

        return redirect('admin');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\administracion  $administracion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        peticiones::join('hogars','peticiones.hogar_id','=','hogars.idhogar')->where('user_id', '=',$id)->delete();
        hogar::where('user_id','=',$id)->delete();
        User::where('id','=',$id)->delete();
        return redirect('/');
    }
}
