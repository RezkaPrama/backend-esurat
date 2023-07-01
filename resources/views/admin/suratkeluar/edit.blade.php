@extends('layouts.master')
@section('title') Edit Surat Keluar @endsection

@section('css')
<link href="{{ URL::asset('assets/libs/choices.js/choices.js.min.css') }}" rel="stylesheet" type="text/css" />
{{--
<link href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css" /> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css" />
{{--
<link rel="stylesheet" href="{{ URL::asset('assets/libs/gridjs/gridjs.min.css') }}"> --}}
<link href="{{ URL::asset('assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
@endsection

@section('content')
@component('components.breadcrumb')
@slot('li_1') Edit @endslot
@slot('title') Edit Surat Keluar @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div id="addproduct-accordion" class="custom-accordion">

            <div class="card">
                <a href="#addproduct-productinfo-collapse" class="text-dark" data-bs-toggle="collapse"
                    aria-expanded="true" aria-controls="addproduct-productinfo-collapse">
                    <div class="p-4">

                        <div class="d-flex align-items-center">

                            <div class="flex-grow-1 overflow-hidden">
                                <h5 class="font-size-16 mb-1">Edit Surat Keluar</h5>
                                <p class="text-muted text-truncate mb-0">Isi semua informasi di bawah ini</p>
                            </div>
                            <div class="flex-shrink-0">
                                <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                            </div>
                        </div>
                    </div>
                </a>

                <div id="addproduct-productinfo-collapse" class="collapse show" data-bs-parent="#addproduct-accordion">
                    <div class="p-4 border-top">
                        <form action="{{ route('admin.suratkeluar.update', $suratkeluar->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label" for="no_surat">No Surat</label>
                                <input id="no_surat" name="no_surat" placeholder="Masukan no_surat" type="text"
                                    value="{{ old('suratkeluar', $suratkeluar->no_surat) }}"
                                    class="form-control @error('no_surat') is-invalid @enderror">

                                @error('no_surat')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="jenis_surat">Jenis Surat</label>
                                <input id="jenis_surat" name="jenis_surat" placeholder="Masukan jenis_surat"
                                    value="{{ old('suratkeluar', $suratkeluar->jenis_surat) }}" type="text"
                                    class="form-control @error('jenis_surat') is-invalid @enderror">

                                @error('jenis_surat')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="mb-3">

                                        <label class="form-label" for="tanggal_pembuatan"> Tanggal Pembuatan</label>
                                        <input id="tanggal_pembuatan" name="tanggal_pembuatan"
                                            value="{{ old('suratkeluar', $suratkeluar->tanggal_pembuatan) }}"
                                            placeholder="Masukan Tanggal Penerimaan Surat" type="text"
                                            class="form-control flatpickr-input @error('tanggal_pembuatan') is-invalid @enderror">

                                        @error('tanggal_pembuatan')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="tanggal_surat"> Tanggal Surat</label>
                                        <input id="tanggal_surat" name="tanggal_surat"
                                        value="{{ old('suratkeluar', $suratkeluar->tanggal_surat) }}"
                                            placeholder="Masukan Tanggal Surat" type="text"
                                            class="form-control flatpickr-input @error('tanggal_surat') is-invalid @enderror">

                                        @error('tanggal_surat')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="asal_surat"> Dari</label>
                                        <input id="asal_surat" name="asal_surat" placeholder="Masukan Pengirim Surat"
                                            type="text" value="{{ old('suratkeluar', $suratkeluar->asal_surat) }}"
                                            class="form-control flatpickr-input @error('asal_surat') is-invalid @enderror">

                                        @error('asal_surat')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="tujuan_surat"> Kepada</label>
                                        <input id="tujuan_surat" name="tujuan_surat"
                                            placeholder="Masukan Penerima Surat" type="text" value="{{ old('suratkeluar', $suratkeluar->tujuan_surat) }}"
                                            class="form-control flatpickr-input @error('tujuan_surat') is-invalid @enderror">

                                        @error('tujuan_surat')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-0">
                                <label class="form-label" for="perihal">Perihal</label>
                                <textarea class="form-control @error('perihal') is-invalid @enderror" name="perihal"
                                    id="perihal" placeholder="Enter Perihal" rows="4">{{ old('suratkeluar', $suratkeluar->perihal) }}</textarea>

                                @error('ket')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="row mb-4 mt-4">
                                <div class="col text-end me-4">
                                    <a href="{{ route('admin.suratkeluar.index') }}" class="btn btn-danger"> <i
                                            class="bx bx-x me-1"></i> Batal </a>
                                    <button class="btn btn-success" type="submit"><i class="fa fa-paper-plane"></i>
                                        Update</button>
                                </div> <!-- end col -->
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div id="fileDokumen-accordion" class="custom-accordion">

            <div class="card">
                <a href="#fileDokumen-dokumeninfo-collapse" class="text-dark" data-bs-toggle="collapse"
                    aria-expanded="true" aria-controls="fileDokumen-dokumeninfo-collapse">
                    <div class="p-4">

                        <div class="d-flex align-items-center">

                            <div class="flex-grow-1 overflow-hidden">
                                <h5 class="font-size-16 mb-1">File Dokumen</h5>
                            </div>
                            <div class="flex-shrink-0">
                                <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                            </div>
                        </div>
                    </div>
                </a>

                <div id="fileDokumen-dokumeninfo-collapse" class="collapse show"
                    data-bs-parent="#fileDokumen-accordion">
                    <div class="p-4 border-top">
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th class="fw-bold text-center" style="width: 70px;">No.</th>
                                        <th class="fw-bold text-center">Nama File</th>
                                        <th class="fw-bold text-center">Action</th>
                                    </tr>
                                </thead><!-- end thead -->
                                <tbody>

                                    @forelse ($suratKeluarDetail as $item => $row)
                                    <tr>
                                        <td class="text-center">{{$item + 1}}</td>
                                        <td class="text-center">{{$row->nama_file}}</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.suratKeluarDetail.download', ['userid' => auth()->user()->id, 'filename' => $row->nama_file ]) }}"
                                                class="btn btn-primary w-sm"><i
                                                    class="bx bx-download me-2"></i>Download</a>
                                            <a href="{{ route('admin.suratKeluarDetail.previewPdf', ['userid' => auth()->user()->id, 'filename' => $row->nama_file ]) }}"
                                                class="btn btn-dark w-sm"><i
                                                    class="bx bxs-file-pdf me-2"></i>Preview</a>
                                            <a href="{{ route('admin.suratKeluarDetail.destroy', ['id' => $row->id, 'userid' => auth()->user()->id ]) }}"
                                                class="btn btn-danger w-sm"><i
                                                    class="bx bxs-eraser-pdf me-2"></i>Hapus</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <div class="alert alert-danger">
                                        File Dokumen Belum Tersedia!
                                    </div>
                                    @endforelse
                                    <!-- end tr -->

                                </tbody><!-- end tbody -->
                            </table><!-- end table -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div id="uploadDokumen-accordion" class="custom-accordion">

            <div class="card">
                <a href="#uploadDokumen-dokumeninfo-collapse" class="text-dark" data-bs-toggle="collapse"
                    aria-expanded="true" aria-controls="uploadDokumen-dokumeninfo-collapse">
                    <div class="p-4">

                        <div class="d-flex align-items-center">

                            <div class="flex-grow-1 overflow-hidden">
                                <h5 class="font-size-16 mb-1">Upload Dokumen</h5>
                            </div>
                            <div class="flex-shrink-0">
                                <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                            </div>
                        </div>
                    </div>
                </a>

                <div id="uploadDokumen-dokumeninfo-collapse" class="collapse show"
                    data-bs-parent="#uploadDokumen-accordion">
                    <div class="p-4 border-top">
                        <div>
                            <form action="#" class="dropzone" method="POST" id="surat-keluar-dropzone"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="fallback">
                                    <input name="file" type="file" multiple="multiple">
                                </div>

                                <input id="surat_keluar_id" name="surat_keluar_id" type="hidden" value="{{ $suratkeluar->id }}" class="form-control">
                                <input id="users_id" name="users_id" type="hidden" value="{{ auth()->user()->id }}" class="form-control">

                                <div class="dz-message needsclick">
                                    <div class="mb-3">
                                        <i class="display-4 text-muted mdi mdi-cloud-upload"></i>
                                    </div>

                                    <h4>Drop file disini atau klik untuk upload.</h4>
                                </div>
                            </form>
                        </div>

                        <div class="text-center mt-4">
                            <button type="button" id="submit-all" class="btn btn-primary waves-effect waves-light"><i
                                    class="fa fa-paper-plane"></i> Upload File</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>


@endsection
@section('script')
<script src="{{ URL::asset('assets/libs/choices.js/choices.js.min.js') }}"></script>
{{-- <script src="{{ URL::asset('assets/libs/dropzone/dropzone.min.js') }}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
<script src="{{ URL::asset('assets/js/pages/ecommerce-choices.init.js') }}"></script>
<script src="{{ URL::asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/app.js') }}"></script>

<script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css"
    rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
    
            // Swal.fire("Hello, SweetAlert!");
            flatpickr('#tanggal_pembuatan', {
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
            });
    
            flatpickr('#tanggal_surat', {
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
            });
    
            @if (session()->has('success'))
    
                Swal.fire({
                    type: "success",
                    icon: "success",
                    title: "BERHASIL!",
                    text: "{{ session('success') }}",
                    timer: 1500,
                    showConfirmButton: false,
                    showCancelButton: false,
                    buttons: false,
                });
            @elseif (session()->has('error'))
    
                Swal.fire({
                    type: "error",
                    icon: "error",
                    title: "GAGAL!",
                    text: "{{ session('error') }}",
                    timer: 1500,
                    showConfirmButton: false,
                    showCancelButton: false,
                    buttons: false,
                });
            @endif
    
        });
    
</script>
<script>
    // Step 1: Initialize Dropzone.js
  Dropzone.autoDiscover = false;
  var myDropzone = new Dropzone("#surat-keluar-dropzone", {
    url: "{{ route('admin.suratKeluarDetail.upload') }}",
    autoProcessQueue: false, // prevent automatic uploading
    paramName: "file",
    maxFilesize: 5, // MB
    acceptedFiles: ".pdf",
    addRemoveLinks: true,
    dictDefaultMessage: 'Drop file disini atau klik untuk upload',
    dictRemoveFile: 'Hapus',
  });

  // Step 4: Add an event listener to the button
  document.querySelector("#submit-all").addEventListener("click", function () {
    myDropzone.processQueue();
  });

  // Step 5: Handle the file upload
  myDropzone.on("success", function (file, response) {
    console.log(response.result);
    if (response.result == "success") {
        Swal.fire({
        type: "success",
            icon: "success",
            title: "BERHASIL!",
            text: "File Berhasil di Upload",
            timer: 1500,
            showConfirmButton: false,
            showCancelButton: false,
            buttons: false,
        }); 

        location.reload();
    } else {
        Swal.fire({
            type: "error",
            icon: "error",
            title: "GAGAL!",
            text: "File Gagal Di upload!",
            timer: 1500,
            showConfirmButton: false,
            showCancelButton: false,
            buttons: false,
        });

        location.reload();
    }
  });
</script>
@endsection