@extends('layouts.master')
@section('title') Tambah Surat Keluar @endsection

@section('css')
<link href="{{ URL::asset('assets/libs/choices.js/choices.js.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
{{--
<link rel="stylesheet" href="{{ URL::asset('assets/libs/gridjs/gridjs.min.css') }}"> --}}
<link href="{{ URL::asset('assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
@endsection

@section('content')
@component('components.breadcrumb')
@slot('li_1') Surat @endslot
@slot('title') Tambah Surat Keluar @endslot
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
                                <h5 class="font-size-16 mb-1">Tambah Surat Keluar</h5>
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
                        <form action="{{ route('admin.suratkeluar.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label" for="no_surat">No Surat</label>
                                <input id="no_surat" name="no_surat" placeholder="Masukan no_surat" type="text"
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
                                    type="text" class="form-control @error('jenis_surat') is-invalid @enderror">

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
                                        <input id="asal_surat" name="asal_surat"
                                            placeholder="Masukan Pengirim Surat" type="text"
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
                                            placeholder="Masukan Penerima Surat" type="text"
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
                                <textarea class="form-control @error('perihal') is-invalid @enderror" name="perihal" id="perihal"
                                    placeholder="Input Perihal" rows="4"></textarea>

                                @error('ket')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col text-end">
        <a href="{{ route('admin.suratkeluar.index') }}" class="btn btn-danger"> <i class="bx bx-x me-1"></i> Batal </a>
        {{-- <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#success-btn"> <i
                class=" bx bx-file me-1"></i> Simpan </a> --}}
        <button class="btn btn-success" type="submit"><i class="fa fa-paper-plane"></i> Simpan</button>

    </div> <!-- end col -->
</div>
</form>

@endsection
@section('script')
<script src="{{ URL::asset('assets/libs/choices.js/choices.js.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/dropzone/dropzone.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/ecommerce-choices.init.js') }}"></script>
<script src="{{ URL::asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/app.js') }}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css"
    rel="stylesheet" />


<script>
    $("#datepicker").datepicker({
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years"
});
  
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
</script>
@endsection