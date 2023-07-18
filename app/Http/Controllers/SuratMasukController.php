<?php

namespace App\Http\Controllers;

use App\Exports\SuratMasukExport;
use App\Models\SuratMasuk;
use App\Models\SuratMasukDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = SuratMasuk::query();

        if ($request->has('jenis_surat')) {
            $query->orWhere('jenis_surat', $request->jenis_surat);
        }

        if ($request->has('tanggal_surat_dari') && $request->has('tanggal_surat_sampai')) {
            $query->orWhereBetween('tanggal_surat', [$request->input('tanggal_surat_dari'), $request->input('tanggal_surat_sampai')]);
        }

        $suratmasuk = $query->paginate(10);

        return view('admin.suratmasuk.index', compact('suratmasuk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.suratmasuk.create');
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
            'tanggal_penerimaan'        => 'required',
            'no_agenda'                 => 'required',
            'tanggal_surat'             => 'required',
            'asal_surat'                => 'required',
            'tujuan_surat'              => 'required',
            'perihal'                   => 'required'
        ]);

        // Example: Create a new user and store it in the database
        $suratmasuk = SuratMasuk::create([

            'no_surat'               => $request->input('no_surat'),
            'jenis_surat'            => $request->input('jenis_surat'),
            'tanggal_penerimaan'     => $request->input('tanggal_penerimaan'),
            'no_agenda'              => $request->input('no_agenda'),
            'tanggal_surat'          => $request->input('tanggal_surat'),
            'asal_surat'             => $request->input('asal_surat'),
            'tujuan_surat'           => $request->input('tujuan_surat'),
            'perihal'                => $request->input('perihal')

        ]);

        if ($suratmasuk) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.suratmasuk.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.suratmasuk.index')->with(['error' => 'Data Gagal Disimpan!']);
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
        $suratMasukDetail = SuratMasukDetail::where('surat_masuk_id', $id)->get();

        $suratmasuk = SuratMasuk::findOrFail($id);

        return view('admin.suratmasuk.edit', compact('suratmasuk', 'suratMasukDetail'));
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
            'tanggal_penerimaan'        => 'required',
            'no_agenda'                 => 'required',
            'tanggal_surat'             => 'required',
            'asal_surat'                => 'required',
            'tujuan_surat'              => 'required',
            'perihal'                   => 'required'
        ]);

        $suratmasuk = SuratMasuk::findOrFail($id);

        $suratmasuk->update([
            'no_surat'               => $request->input('no_surat'),
            'jenis_surat'            => $request->input('jenis_surat'),
            'tanggal_penerimaan'     => $request->input('tanggal_penerimaan'),
            'no_agenda'              => $request->input('no_agenda'),
            'tanggal_surat'          => $request->input('tanggal_surat'),
            'asal_surat'             => $request->input('asal_surat'),
            'tujuan_surat'           => $request->input('tujuan_surat'),
            'perihal'                => $request->input('perihal')
        ]);

        if ($suratmasuk) {
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
        $suratmasuk = SuratMasuk::findOrFail($id);

        // Delete transaction details
        $suratmasuk->suratMasukDetail()->delete();

        // Delete the transaction
        $suratmasuk->delete();

        return response()->json(['success' => true]);
    }

    /**
     * filter export the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function exportExcel(Request $request, $userid)
    {
        $jenis_surat = $request->input('jenis_surat');
        $tanggal_surat_dari = $request->input('tanggal_surat_dari');
        $tanggal_surat_sampai = $request->input('tanggal_surat_sampai');

        $query = SuratMasuk::query();

        if ($jenis_surat != null) {
            $query->where('jenis_surat', $jenis_surat);
        }

        if ($tanggal_surat_dari && $tanggal_surat_sampai) {
            $query->orWhereBetween('tanggal_surat', [$tanggal_surat_dari, $tanggal_surat_sampai]);
        }

        $results = $query->get();

        return Excel::download(new SuratMasukExport($results), 'surat_masuk.xlsx');
    }

    /**
     * filter export the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function exportFilterExcel(Request $request)
    {

        $data = $request->json()->all();

        $userid = $data['userid'];
        $jenis_surat = $data['jenis_surat'];
        $tanggal_surat_dari = $data['tanggal_surat_dari'];
        $tanggal_surat_sampai = $data['tanggal_surat_sampai'];

        $query = SuratMasuk::query();

        if ($jenis_surat != null) {
            $query->where('jenis_surat', $jenis_surat);
        }

        if ($tanggal_surat_dari && $tanggal_surat_sampai) {
            $query->orWhereBetween('tanggal_surat', [$tanggal_surat_dari, $tanggal_surat_sampai]);
        }

        $results = $query->get();

        return Excel::download(new SuratMasukExport($results), 'surat_masuk.xlsx');

        // return response()->json([
        //     'result' => $results,
        //     'jenis_surat' => $jenis_surat,
        // ]);
    }
}
