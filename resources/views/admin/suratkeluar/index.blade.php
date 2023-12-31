@extends('layouts.master')
@section('title') Surat Keluar @endsection

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
@slot('title') Surat Keluar @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">

            <!-- card-header default start// -->
            <div class="card-header">
                <form action="{{ route('admin.suratkeluar.index') }}" method="GET">

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

                    {{-- <label class="col-sm-2 col-form-label">user id</label> --}}
                    <input id="userid" name="userid" type="hidden" value="{{auth()->user()->id}}"
                    class="form-control ">

                    <div class="mb-3 row">
                        <label for="example-week-input" class="col-md-2 col-form-label">Tanggal Surat</label>
                        <div class="col-sm-2">
                            <input id="tanggal_surat_dari" name="tanggal_surat_dari" placeholder="Tanggal Surat dari"
                                type="text" class="form-control flatpickr-input">
                        </div>
                        <div class="col-sm-2">
                            <input id="tanggal_surat_sampai" name="tanggal_surat_sampai"
                                placeholder="Tanggal Surat ke" type="text" class="form-control flatpickr-input">
                        </div>
                        <button type="submit" class="btn btn-success mb-4 col-sm-2 me-1"><i
                                class="mdi mdi-filter me-1"></i>
                            Filter</button>
                        <a id="export-excel" class="btn btn-success mb-4 col-sm-2 "><i class="mdi mdi-microsoft-excel me-1"></i>
                            Export</a>
                        {{-- <a href="{{ route('admin.trans.export') }}" type="submit"
                            class="btn btn-success mb-4 col-sm-2 "><i class="mdi mdi-microsoft-excel me-1"></i>
                            Export</a> --}}
                    </div>
                    <div class="text-end">
                        <a href="{{ route('admin.suratkeluar.create') }}" class="btn btn-success mb-4"><i
                                class="mdi mdi-plus me-1"></i> Tambah</a>
                    </div>
                </form>
            </div>
            <!-- card-header default end// -->

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
                                            <th style="width:120px;">Tanggal Pembuatan</th>
                                            <th>Tanggal Surat</th>
                                            <th>Dari</th>
                                            <th>Kepada</th>
                                            <th>Perihal</th>
                                            <th>Action</th>
                                            <th class="text-center">Upload</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($suratkeluar as $item => $row)
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
                                            <td>{{ $row->tanggal_pembuatan }}</td>
                                            <td>{{ $row->tanggal_surat }}</td>
                                            <td>{{ $row->asal_surat }}</td>
                                            <td>{{ $row->tujuan_surat }}</td>
                                            <td>{{ $row->perihal }}</td>
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-danger btn-delete" data-id="{{ $row->id }}">Hapus</button>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.suratkeluar.edit', $row->id) }}"><i
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
                                    {{ $suratkeluar->links("vendor.pagination.bootstrap-4") }}
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
    // Menggunakan event delegation untuk mengikat event ke tombol Delete
    $(document).on('click', '.btn-delete', function (e) {
        e.preventDefault();
        var id = $(this).data('id');

        // Menggunakan SweetAlert untuk konfirmasi
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Anda yakin ingin menghapus data ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                
                $.ajax({
                    url: '/admin/suratkeluar/' + id, 
                    type: 'DELETE',
                    dataType: 'json',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function (data) {
                        
                        Swal.fire(
                            'Sukses!',
                            'Data berhasil dihapus.',
                            'success'
                        ).then(() => {
                            
                            window.location.reload();
                        });
                    },
                    error: function (data) {
                        
                        Swal.fire(
                            'Error!',
                            'Terjadi kesalahan saat menghapus data.',
                            'error'
                        );
                    }
                });
            }
        });
    });
</script>
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

                window.location.href = `{{ route("admin.suratkeluar.exportExcel", "") }}/${param}`;

            } else {
                
                const param = document.getElementById('userid').value;
                window.location.href = `{{ route("admin.suratkeluar.exportExcel", "") }}/${param}`;
                
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

    // document.getElementById("destroy").addEventListener("click", function() {
    //         var id = this.getAttribute('data-id');
    //         var token = '{{ csrf_token() }}';
    //         console.log(id);


    //         Swal.fire({
    //             title: "Apakah anda yakin ?",
    //             text: "untuk menghapus data ini!",
    //             icon: "warning",
    //             showCancelButton: !0,
    //             confirmButtonColor: "#2B8972",
    //             cancelButtonColor: "#f34e4e",
    //             confirmButtonText: "Yes, hapus!",
    //         }).then(function(result) {
    //             if (result.isConfirmed == true) {
                    
    //                 //ajax delete
    //                 jQuery.ajax({
    //                     url: "/admin/manageFile/" + id,
    //                     data: {
    //                         "id": id,
    //                         "_token": token
    //                     },
    //                     type: 'DELETE',
    //                     success: function(response) {
    //                         if (response.status == "success") {
    //                             swal.fire({
    //                                 title: 'BERHASIL!',
    //                                 text: 'DATA BERHASIL DIHAPUS!',
    //                                 icon: 'success',
    //                                 timer: 1000,
    //                                 showConfirmButton: false,
    //                                 showCancelButton: false,
    //                                 buttons: false,
    //                             }).then(function() {
    //                                 location.reload();
    //                             });
    //                         } else {
    //                             swal.fire({
    //                                 title: 'GAGAL!',
    //                                 text: 'DATA GAGAL DIHAPUS!',
    //                                 icon: 'error',
    //                                 timer: 1000,
    //                                 showConfirmButton: false,
    //                                 showCancelButton: false,
    //                                 buttons: false,
    //                             }).then(function() {
    //                                 location.reload();
    //                             });
    //                         }
    //                     }
    //                 });

    //             } else {
    //                 return true;
    //             }
    //         })
        // });

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