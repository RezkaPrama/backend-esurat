<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluarDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratKeluarDetailController extends Controller
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
        //
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
    public function destroy($id, $userid)
    {
        $directory = 'public/surat_keluar/';
        $filePath = $directory . '/' . $userid . '/';

        $suratKeluarDetail = SuratKeluarDetail::findOrFail($id);
        // $image = Storage::disk('local')->delete('public/documents/'.basename($fileUsulanDetail->nama_file));
        $image = Storage::disk('local')->delete($filePath.basename($suratKeluarDetail->nama_file));
        $suratKeluarDetail->delete();

        if($suratKeluarDetail){
            return redirect()->back()->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            return redirect()->back()->with(['error' => 'Data Gagal Dihapus!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        if ($request->file('file') !== null) {

            $request->validate([
                'file'              => 'required|file|max:2000',
            ]);

            $userid = $request->input('users_id');
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();

            $destinationPath = 'public/surat_keluar'; // your desired destination path

            $filePath = $destinationPath . '/' . $userid . '/';

            $file->storeAs($filePath, $filename);

            $suratKeluarDetail = SuratKeluarDetail::create([
                'surat_keluar_id'            => $request->input('surat_keluar_id'),
                'users_id'                  => $userid,
                'nama_file'                 => $file->getClientOriginalName()
            ]);

            $suratKeluarDetail->save();

            return response()->json([
                'result' => 'success'
            ]);
        } else {
            return response()->json([
                'result' => 'error'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($userid, $filename)
    {
         // $filePath = 'public/documents/' . $filename; // Replace with the actual directory path

         $directory = 'public/surat_keluar/';
         $subPath = $directory . '/' . $userid . '/';
 
         $filePath = $subPath . $filename; // Replace with the actual directory path
 
         if (Storage::exists($filePath)) {
             return Storage::download($filePath);
         }
 
         // Handle case when the file doesn't exist
         abort(404, 'File Tidak ditemukan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function previewPdf($userid, $filename)
    {
        $directory = 'storage/surat_keluar/';
        $subPath = $directory . '/' . $userid . '/';

        $filePath = $subPath . $filename; // Replace with the actual directory path

        // Check if the file exists
        if (!file_exists($filePath)) {
            abort(404, 'The PDF file does not exist.');
        }

        // Set the appropriate content-type header
        $headers = [
            'Content-Type' => 'application/pdf',
        ];

        return response()->file($filePath, $headers);
    }
}
