@extends('layouts.authenticated')

@section('content')
    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Data Tingkat</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#!">Sekolah</a></li>
                                <li class="breadcrumb-item"><a href="#!">Data Tingkat</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- subscribe start -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-sm btn-round has-ripple"
                                style="background-color: #0f52ba; color: #ffffff;" data-toggle="modal"
                                data-target="#modal-report"><i class="feather icon-plus"></i> Tingkat</button>
                            <a href="{{ route('master.datatingkat.erase') }}"
                                style="background-color: #FF0000; color: #ffffff;"
                                class="btn btn-sm btn-round has-ripple"><i class="fa fa-download"></i>Kosongkan Tingkat</a>

                            @if (Session::has('created'))
                                <div class="col-xl-6 alert alert-info mt-2">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    <strong>{{ Session::get('created') }}</strong>
                                </div>
                            @elseif(Session::has('updated'))
                                <div class="col-xl-6 alert alert-info mt-2">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    <strong>{{ Session::get('updated') }}</strong>
                                </div>
                            @elseif(Session::has('imported'))
                                <div class="col-xl-6 alert alert-info mt-2">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    <strong>{{ Session::get('imported') }}</strong>
                                </div>
                            @elseif(Session::has('deleted'))
                                <div class="col-xl-6 alert alert-info mt-2">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    <strong>{{ Session::get('deleted') }}</strong>
                                </div>
                            @endif
                        </div>

                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="report-table" class="table table-bordered table-striped mb-0">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($datatingkat as $no => $res)
                                            <tr>
                                                <td class="text-center">{{ $no + 1 }}</td>
                                                <td class="text-center">{{ $res->nama_tingkat }}</td>
                                                <td class="text-center">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#modal-edittingkat{{ $res->id_tingkat }}"
                                                        style="background-color: #01605A; color: #ffffff;"
                                                        class="btn btn-icon btn-sm"><i class="feather icon-edit"></i></a>
                                                    <a href="{{ route('master.datatingkat.destroy', $res) }}"
                                                        class="btn btn-icon btn-sm tombol-hapus"
                                                        style="background-color: #FF0000; color: #ffffff;"><i
                                                            class="feather icon-trash-2"></i></a>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="modal-edittingkat{{ $res->id_tingkat }}"
                                                tabindex="-1" role="dialog"
                                                aria-labelledby="myExtraLargeModalLabel"aria-hidden="true">
                                                <div class="modal-dialog modal-md">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Data Tingkat</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('master.datatingkat.update', $res) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('put')
                                                                <div class="row">

                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label class="floating-label"
                                                                                for="nama_tingkat">Nama Tingkat</label>
                                                                            <input type="text" class="form-control"
                                                                                name="nama_tingkat"
                                                                                value="{{ $res->nama_tingkat }}"
                                                                                oninput="this.value = this.value.toUpperCase()"
                                                                                autocomplete="off">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <button class="btn"
                                                                            style="background-color: #037823; color: #ffffff;">Perbaharui</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- subscribe end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>





    <div class="modal fade" id="modal-report" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Tingkat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('master.datatingkat.store') }}" method="post" enctype="multipart/form-data"
                        role="form">
                        @csrf
                        <div class="row">

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="floating-label" for="nama_tingkat">Nama Tingkat</label>
                                    <input type="text" class="form-control" name="nama_tingkat" placeholder="X"
                                        oninput="this.value = this.value.toUpperCase()" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <button class="btn" style="background-color: #037823; color: #ffffff;"
                                    id="pnotify-success">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <!-- [ Main Content ] end -->
@endsection
