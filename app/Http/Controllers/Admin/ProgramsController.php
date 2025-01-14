<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Programs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProgramsRequest;
use Symfony\Component\HttpFoundation\Response;

class ProgramsController extends Controller
{
    /* Display a listing of the resource*/
    public function index()
    {
        $programs = Programs::all();

        return view('admin.programs.index')->with('programs', $programs);
    }

    /*Show the form for creating a new resource */
    public function create()
    {
        $users = User::all();
        return view('admin.programs.create', compact('users'));
    }

    /* Store a newly created resource in storage*/
    public function store(StoreProgramsRequest $request)
    {
        $input = $request->all();
        Programs::create($input);
        return redirect()->route('admin.programs.index');
    }

    /* Display the specified resource*/
    public function show($id)
    {
        $programs = Programs::find($id);
        $users = User::all();
        return view('admin.programs.show')->with('programs', $programs)->with('users', $users);
    }

    /*Show the form for editing the specified resource.*/
    public function edit($id)
    {
        $programs = Programs::find($id);
        $users = User::all();
        return view('admin.programs.edit')->with('programs', $programs)->with('users', $users);
    }

    /* Update the specified resource in storage*/
    public function update(Request $request, $id)
    {
        $programs = Programs::find($id);
        $input = $request->all();
        $programs->update($input);
        return redirect()->route('admin.programs.index');
    }

    /*Remove the specified resource from storage.*/
    public function destroy($id)
    {
        Programs::destroy($id);
        return redirect()->route('admin.programs.index');  
    }

}