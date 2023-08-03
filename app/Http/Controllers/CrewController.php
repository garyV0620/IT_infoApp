<?php

namespace App\Http\Controllers;

use App\Http\Requests\CrewInfoRequest;
use App\Models\It_crew;
use Illuminate\Http\Request;

class CrewController extends Controller
{

    public function dashboard()
    {
        //get all the crews
        $crews = It_crew::orderByDesc('updated_at')->orderByDesc('created_at')->get();
        return view('pages.dashboard',['crews'=>$crews]);
    }
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
        return view('pages.crewAdd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CrewInfoRequest $request)
    {
        //validate all inputs
        $crewInfo = $request->validated();
        //insert new crew to the DB
        $crew = It_crew::create($crewInfo);
        return redirect()->route('dashboard')->with('message', 'Crew '.$crew->lastname.' Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //find crew base on id
        $crew = It_crew::with('documents')->findOrFail($id);
        return view('pages.crewInfo',['crew' => $crew]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find crew base on id
        $crew = It_crew::findOrFail($id);
        return view('pages.crewEditInfo',['crew' => $crew]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CrewInfoRequest $request, $id)
    {
        //validated all inputs
        $crewInfo = $request->validated();
        //find crew base on id
        $crew = It_crew::findOrfail($id);
        //update crew informations
        $crew->update($crewInfo);
        return redirect()->route('dashboard')->with('message', 'Crew '.$crew->lastname.' Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find crew base on id
        $crew = It_crew::findOrFail($id);
        //delete crew on the DB
        $crew->delete();
        return redirect()->route('dashboard')->with('message', 'Crew Deleted Successfully');
    }
}
