<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use App\Models\SuratKeluarDetail;
use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suratkeluar = SuratKeluar::latest()->when(request()->q, function ($jenis) {
            $jenis = $jenis->where('id', 'like', '%' . request()->q . '%');
        })->paginate(10);

        return view('admin.suratkeluar.index', compact('suratkeluar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.suratkeluar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation passed, proceed to save data to the database
        $this->validate($request, [
            'no_surat'                  => 'required',
            'jenis_surat'               => 'required',
            'tanggal_pembuatan'         => 'required',
            'tanggal_surat'             => 'required',
            'asal_surat'                => 'required',
            'tujuan_surat'              => 'required',
            'perihal'                   => 'required'
        ]);

        // Example: Create a new user and store it in the database
        $suratkeluar = SuratKeluar::create([

            'no_surat'               => $request->input('no_surat'),
            'jenis_surat'            => $request->input('jenis_surat'),
            'tanggal_pembuatan'      => $request->input('tanggal_pembuatan'),
            'tanggal_surat'          => $request->input('tanggal_surat'),
            'asal_surat'             => $request->input('asal_surat'),
            'tujuan_surat'           => $request->input('tujuan_surat'),
            'perihal'                => $request->input('perihal')

        ]);

        if ($suratkeluar) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.suratkeluar.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.suratkeluar.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
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
        $suratKeluarDetail = SuratKeluarDetail::where('surat_keluar_id', $id)->get();

        $suratkeluar = SuratKeluar::findOrFail($id);

        return view('admin.suratkeluar.edit', compact('suratkeluar', 'suratKeluarDetail'));
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
        // Validation passed, proceed to save data to the database
        $this->validate($request, [
            'no_surat'                  => 'required',
            'jenis_surat'               => 'required',
            'tanggal_pembuatan'         => 'required',
            'tanggal_surat'             => 'required',
            'asal_surat'                => 'required',
            'tujuan_surat'              => 'required',
            'perihal'                   => 'required'
        ]);

        $suratkeluar = SuratKeluar::findOrFail($id);

        $suratkeluar->update([
            'no_surat'               => $request->input('no_surat'),
            'jenis_surat'            => $request->input('jenis_surat'),
            'tanggal_pembuatan'      => $request->input('tanggal_pembuatan'),
            'tanggal_surat'          => $request->input('tanggal_surat'),
            'asal_surat'             => $request->input('asal_surat'),
            'tujuan_surat'           => $request->input('tujuan_surat'),
            'perihal'                => $request->input('perihal')
        ]);

        if ($suratkeluar) {
            return redirect()->back()->with(['success' => 'Data Berhasil DiUpdate!']);
        } else {
            return redirect()->back()->with(['error' => 'Data Gagal Di Update!']);
        }
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