@extends('layouts.master')
@section('title') Surat Keluar @endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('assets/libs/gridjs/gridjs.min.css') }}">
<link href="{{ URL::asset('assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css">
<!-- Sweet Alert-->
<link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
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
            <div class="card-body">
                <div class="position-relative">
                    <div class="modal-button mt-2">
                        <div class="row align-items-start">
                            <div class="col-sm">
                                <div>
                                    <a href="{{ route('admin.suratkeluar.create') }}" class="btn btn-success mb-4"><i
                                        class="mdi mdi-plus me-1"></i> Tambah</a>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                </div>
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
                                            <th >Kepada</th>
                                            <th>Perihal</th>
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

<script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {

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
    flatpickr('#tanggal_usulan', {
    altInput: true,
    altFormat: "F j, Y",
    dateFormat: "Y-m-d",
    });

    flatpickr('#tahun', {
    altInput: true,
    altFormat: "F j, Y",
    dateFormat: "Y-m-d",
    });
</script>
@endsection