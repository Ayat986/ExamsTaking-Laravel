<?php

namespace App\Http\Controllers;
use Hash;

use Illuminate\Http\Request;
use App\Professor;

class ProfessorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $professors = \App\Professor::all();
        return view('professors.index',compact('professors'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('professors.create');
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

       $request->merge(['password' => Hash::make($request->password)]);
        
        $professor =\App\Professor::create($request->all());

        return redirect('/professors');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(\App\Professor $professor)
    {
        //
        return view('professors.show',compact('professor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Professor $professor)
    {
        //
        return view('professors.edit',compact('professor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,\App\Professor $professor)
    {
        //
        $request->merge(['password' => Hash::make($request->password)]);

      $professor->update($request->All());
      return redirect('/professors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\App\Professor $professor)
    {
        //
        $professor->delete();
        return redirect('/professors');
    }
}
