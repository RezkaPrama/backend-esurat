@extends('layouts.master')
@section('title') Surat Masuk @endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('assets/libs/gridjs/gridjs.min.css') }}">
<link href="{{ URL::asset('assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css">
<!-- Sweet Alert-->
<link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/choices.js/choices.js.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
@component('components.breadcrumb')
@slot('li_1') Surat @endslot
@slot('title') Surat Masuk @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">

            <div class="card-header">
                <form action="{{ route('admin.suratmasuk.index') }}" method="GET">

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Jenis Surat</label>
                        <div class="col-sm-4">
                            <select class="form-control @error('jenis_surat') is-invalid @enderror" data-trigger
                                name="jenis_surat" id="jenis_surat">
                                <option value="">Pilih Jenis Surat</option>
                                <option value="Surat Perintah">Surat Perintah</option>
                                <option value="Surat B">Surat B</option>
                                <option value="ST">ST</option>
                                <option value="STR">STR</option>
                                <option value="SE">SE</option>
                                <option value="Nota Dinas">Nota Dinas</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">user id</label>
                        <div class="col-sm-4">
                            <input id="userid" name="userid" type="text" value="{{auth()->user()->id}}"
                                class="form-control ">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-week-input" class="col-md-2 col-form-label">Tanggal Surat</label>
                        <div class="col-sm-2">
                            <input id="tanggal_surat_dari" name="tanggal_surat_dari" placeholder="Filter Tanggal Usulan"
                                type="text" class="form-control flatpickr-input">
                        </div>
                        <div class="col-sm-2">
                            <input id="tanggal_surat_sampai" name="tanggal_surat_sampai"
                                placeholder="Filter Tanggal Usulan" type="text" class="form-control flatpickr-input">
                        </div>
                        <button type="submit" class="btn btn-success mb-4 col-sm-2 me-1"><i
                                class="mdi mdi-filter me-1"></i>
                            Filter</button>
                        <a id="export-excel" class="btn btn-success mb-4 col-sm-2 "><i
                                class="mdi mdi-microsoft-excel me-1"></i>
                            Export</a>
                        {{-- <a href="{{ route('admin.suratmasuk.exportExcel', auth()->user()->id) }}"
                            class="btn btn-success mb-4 col-sm-2 "><i class="mdi mdi-microsoft-excel me-1"></i>
                            Export</a> --}}
                    </div>
                    <div class="text-end">
                        <a href="{{ route('admin.suratmasuk.create') }}" class="btn btn-success mb-4"><i
                                class="mdi mdi-plus me-1"></i> Tambah</a>
                    </div>
                </form>
            </div>

            <!-- card-body start// -->
            <div class="card-body mt-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <form action="" method="post" class="form-produk">
                                @csrf
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            {{-- <th class="text-center">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="checkboxesMain" />
                                                </div>
                                            </th> --}}
                                            <th>No.</th>
                                            <th>No Surat</th>
                                            <th>Jenis Surat</th>
                                            <th style="width:120px;">Tanggal Penerimaan</th>
                                            <th style="width:120px;">No Agenda</th>
                                            <th>Tanggal Surat</th>
                                            <th>Dari</th>
                                            <th>Kepada</th>
                                            <th>Perihal</th>
                                            <th class="text-center">Upload</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($suratmasuk as $item => $row)
                                        <tr>
                                            {{-- <td class="text-center">
                                                <div class="form-check">
                                                    <input class="form-check-input checkbox" type="checkbox" value=""
                                                        data-id="{{ $row->id }}" />
                                                </div>
                                            </td> --}}
                                            <td>{{ $item + 1 }}</td>
                                            <td>{{ $row->no_surat }}</td>
                                            <td>{{ $row->jenis_surat }}</td>
                                            <td>{{ $row->tanggal_penerimaan }}</td>
                                            <td class="text-center">{{ $row->no_agenda }}</td>
                                            <td>{{ $row->tanggal_surat }}</td>
                                            <td>{{ $row->asal_surat }}</td>
                                            <td>{{ $row->tujuan_surat }}</td>
                                            <td>{{ $row->perihal }}</td>

                                            <td class="text-center">
                                                <a href="{{ route('admin.suratmasuk.edit', $row->id) }}"><i
                                                        class="bx bx-upload icon nav-icon"></i></a>
                                            </td>
                                        </tr>
                                        @empty
                                        <div class="alert alert-danger">
                                            Data Belum Tersedia!
                                        </div>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div style="text-align: center">
                                    {{ $suratmasuk->links("vendor.pagination.bootstrap-4") }}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- card-body end// -->

        </div>
    </div>
</div>

@endsection
@section('script')
<script src="{{ URL::asset('assets/libs/gridjs/gridjs.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/app.js') }}"></script>
<script src="{{ URL::asset('assets/libs/choices.js/choices.js.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/ecommerce-choices.init.js') }}"></script>

<script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {

        document.getElementById('export-excel').addEventListener('click', function() {
            
            var jenis_surat = null;
            var tanggal_surat_dari = null;
            var tanggal_surat_sampai = null;
            var urlParams = new URLSearchParams(window.location.search);
            
            if (urlParams.has('jenis_surat') || urlParams.has('tanggal_surat_dari') || urlParams.has('tanggal_surat_sampai') ) {
                
                const param = document.getElementById('userid').value;
                var jenis_surat = urlParams.get('jenis_surat');
                var tanggal_surat_dari = urlParams.get('tanggal_surat_dari');
                var tanggal_surat_sampai = urlParams.get('tanggal_surat_sampai');

                var data = {
                    userid: param,
                    jenis_surat: jenis_surat,
                    tanggal_surat_dari: tanggal_surat_dari,
                    tanggal_surat_sampai: tanggal_surat_sampai,
                };

                // fetch(`{{ route("admin.suratmasuk.exportFilterExcel", "") }}/${param}`, {
                // method: 'GET',
                // headers: {
                // 'Content-Type': 'application/json',
                // 'X-CSRF-TOKEN': '{{ csrf_token() }}'
                // },
                // body: JSON.stringify(data),
                
                // })
                // .then(response => {
                //     console.log('Sukses');
                //     // window.location.href = `{{ route("admin.suratmasuk.exportFilterExcel", "") }}/${param}`;
                // })
                // .catch(error => {
                //     console.log('gagal');
                // });

            } else {
                
                const param = document.getElementById('userid').value;
                window.location.href = `{{ route("admin.suratmasuk.exportExcel", "") }}/${param}`;
            }
    });

        // Swal.fire("Hello, SweetAlert!");

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
    flatpickr('#tanggal_surat_dari', {
    altInput: true,
    altFormat: "F j, Y",
    dateFormat: "Y-m-d",
    });

    flatpickr('#tanggal_surat_sampai', {
    altInput: true,
    altFormat: "F j, Y",
    dateFormat: "Y-m-d",
    });
</script>
@endsection