<?php
         
namespace App\Http\Controllers;
          
use App\Models\JenisPelanggaran;
use Illuminate\Http\Request;
use DataTables;
        
class JenisPelanggaranController extends Controller
{
    /**
     * Display a listings of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
   
        $jenpels = JenisPelanggaran::latest()->get();
        
        if ($request->ajax()) {
            $data = JenisPelanggaran::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editJenpel">Edit</a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteJenpel">Delete</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('admin.pelanggaran.jenis',compact('jenpels'));
    }
     
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        JenisPelanggaran::updateOrCreate(
                ['id' => $request->jenis_id],
                ['jenis_pelanggaran' => $request->jenis])
            ;        
   
        return response()->json(['success'=>'Jenis Pelanggaran saved successfully.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JenisPelanggaran  $jenpel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenpels = JenisPelanggaran::find($id);
        return response()->json($jenpels);
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JenisPelanggaran  $jenpel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JenisPelanggaran::find($id)->delete();
     
        return response()->json(['success'=>'Jenis Pelanggaran deleted successfully.']);
    }
}