<?php

namespace App\Http\Controllers;

use App\Models\JenisPelanggarans;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Validator;

class JenisPelanggaransController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.jenispel');
    }

    /**
     * Get the data for listing in yajra.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getJenpel(Request $request, JenisPelanggarans $jenpel)
    {
        $data = $jenpel->getData();
        return \DataTables::of($data)
            ->addColumn('Actions', function($data) {
                return '<button type="button" class="btn btn-success btn-sm" id="getEditArticleData" data-id="'.$data->id.'">Edit</button>
                    <button type="button" data-id="'.$data->id.'" data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>';
            })
            ->rawColumns(['Actions'])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, JenisPelanggarans $jenpel)
    {
        $validator = Validator::make($request->all(), [
            'jenis_pelanggaran' => 'required',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $jenpel->storeData($request->all());

        return response()->json(['success'=>'Jenis Pelanggaran added successfully']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisPelanggarans  $jenpel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenpel = new JenisPelanggarans;
        $data = $jenpel->findData($id);

        $html = '<div class="form-group">
                    <label for="Title">Title:</label>
                    <input type="text" class="form-control" name="title" id="editTitle" value="'.$data->title.'">
                </div>
                <div class="form-group">
                    <label for="Name">Description:</label>
                    <textarea class="form-control" name="description" id="editDescription">'.$data->description.'                        
                    </textarea>
                </div>';

        return response()->json(['html'=>$html]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisPelanggarans  $jenpel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'jenis_pelanggaran' => 'required',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $jenpel = new JenisPelanggarans;
        $jenpel->updateData($id, $request->all());

        return response()->json(['success'=>'Jenis Pelanggaran updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisPelanggarans  $jenpel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenpel = new JenisPelanggarans;
        $jenpel->deleteData($id);

        return response()->json(['success'=>'Jenis Pelanggaran deleted successfully']);
    }
}