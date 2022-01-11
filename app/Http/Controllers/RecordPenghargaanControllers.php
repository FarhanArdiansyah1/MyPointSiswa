<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecordPenghargaan;

class RecordPenghargaanControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtPenghargaan=RecordPenghargaan::all();
        return view('admin.penghargaan.record', compact('dtPenghargaan'));
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
        RecordPenghargaan::create([
            'penghargaan' => $request->penghargaan, 
            'poin_penghargaan'=> $request->poin, 
            'keterangan'=> $request->keterangan
        ]);
        return redirect('admin/penghargaan/record');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pnghrgnn = RecordPenghargaan::findorfail($id);
        $dtPenghargaan=RecordPenghargaan::all();
        return view('admin.penghargaan.record', compact('dtPenghargaan', 'pnghrgnn'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
