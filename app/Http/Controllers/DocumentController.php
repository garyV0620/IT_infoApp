<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use App\Models\It_document;
use Illuminate\Http\Request;

class DocumentController extends Controller
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
    public function create($crew_id)
    {
        return view('pages.documentAdd',['id'=>$crew_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentRequest $request)
    {
        //validate all inputs
        $documentInfo = $request->validated();
        //insert new document to the DB
        $document = It_document::create($documentInfo);
        return redirect()->route('showCrew', $document->it_crew_id)->with('message', 'Document '.$document->name.' Added Successfully');
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
        $document = It_document::findOrFail($id);
        return view('pages.documentInfo',['document' => $document]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find document base on id
        $document = It_document::findOrFail($id);
        return view('pages.documentEditInfo',['document' => $document]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DocumentRequest $request, $id)
    {
        //validated all inputs
        $documentInfo = $request->validated();
        //find document base on id
        $document = It_document::findOrfail($id);
        //update document informations
        $document->update($documentInfo);
        return redirect()->route('showCrew', $document->it_crew_id)->with('message', 'Document '.$document->name.' Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find document base on id
        $document = It_document::findOrFail($id);
        //delete document on the DB
        $document->delete();
        return redirect()->route('showCrew', $document->it_crew_id)->with('message', 'Document Deleted Successfully');
    }
}
