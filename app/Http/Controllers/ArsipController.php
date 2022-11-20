<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Models\Arsip;

use Redirect;

use Session;

class ArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = arsip::where('judul', 'LIKE', '%'.$request->search.'%')->paginate(5);
        }else {
            $data = arsip::paginate(5);   
        }
            
            return view('layouts.arsip.index',compact('data'));
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = new Arsip; 
        return view('layouts.arsip.tambaharsip',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'dokumen'=> 'mimes:pdf',
        ]
    );

    $dokumen = $request->file('dokumen');
    $nama_dokumen = 'FT'.date('Ymdhis').'.'.$request->file('dokumen')->getClientOriginalExtension();
    $dokumen->move('dokument',$nama_dokumen);
        
        $data = new Arsip;
            $data->no_surat = $request->no_surat;
            $data->kategori = $request->kategori;
            $data->judul = $request->judul;
            $data->dokumen = $nama_dokumen;
        $data->save();
        return Redirect('/arsip')->with('message', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data= Arsip::find($id);
        return view('layouts.arsip.viewarsip',compact('data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function delete($id)
    {
        $data= Arsip::findorfail($id);
        
        $dokumen = 'dokument'.$data->dokumen;

        if (file_exists($dokumen)) {
            @unlink($file);
        }
        $data->delete();
        return back();
    }
}
