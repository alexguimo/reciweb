<?php

namespace App\Http\Controllers;

use App\Models\useradmin;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class UseradminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('auth.register');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\useradmin  $useradmin
     * @return \Illuminate\Http\Response
     */
    public function show(useradmin $useradmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\useradmin  $useradmin
     * @return \Illuminate\Http\Response
     */
    public function edit(useradmin $useradmin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\useradmin  $useradmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, useradmin $useradmin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\useradmin  $useradmin
     * @return \Illuminate\Http\Response
     */
    public function destroy(useradmin $useradmin)
    {
        //
    }
}
