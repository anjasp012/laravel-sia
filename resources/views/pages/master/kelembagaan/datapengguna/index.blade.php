@extends('layouts.authenticated')

@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Data Pengguna</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#!">Sekolah</a></li>
                                <li class="breadcrumb-item"><a href="#!">Data Pengguna</a></li>
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
                                data-target="#modal-report"><i class="feather icon-plus"></i>Pengguna</button>
                        </div>

                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="report-table" class="table table-bordered table-striped mb-0"">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Role</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($datapengguna as $res)
                                            <tr>
                                                <td class="text-center">{{ $res->id_user }}</td>
                                                <td>
                                                    <div class="d-inline-block align-middle">
                                                        <img src="/resources/images/pengguna/default.png" alt="user image"
                                                            class="img-radius align-top" style="width:45px;">
                                                        <div class="d-inline-block">
                                                            <h6 class="m-b-0">{{ $res->nama_user }}</h6>
                                                            <p class="m-b-0">{{ $res->email }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">{{ $res->username }}</td>
                                                <td class="text-center">{{ $res->role }}</td>
                                                <td class="text-center">
                                                    <a href="" data-toggle="modal"
                                                        data-target="#modal-report2{{ $res->id_user }}"
                                                        class="btn btn-icon btn-sm"
                                                        style="background-color: #01605A; color: #ffffff;"><i
                                                            class="feather icon-edit"></i></a>
                                                    <a href="" class="btn btn-icon btn-sm tombol-hapus"
                                                        style="background-color: #FF0000; color: #ffffff;"><i
                                                            class="feather icon-trash-2"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                    <!-- Update Data Pengguna Start -->
                                    @foreach ($datapengguna as $res)
                                        <div class="modal fade" id="modal-report2{{ $res->id_user }}" tabindex="-1"
                                            role="dialog" aria-labelledby="myExtraLargeModalLabel"aria-hidden="true">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Data Pengguna</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <form
                                                            action="{{ route('master.datapengguna.update', $res->id_user) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('put')
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label class="floating-label"
                                                                            for="nama_user">Nama</label>
                                                                        <input type="text" class="form-control"
                                                                            id="nama_user" name="nama_user"
                                                                            value="{{ $res->nama_user }}">
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label class="floating-label"
                                                                            for="username">Username</label>
                                                                        <input type="text" class="form-control"
                                                                            id="username" name="username"
                                                                            value="{{ $res->username }}">
                                                                    </div>
                                                                </div>

                                                                <div class="col-xl-6">
                                                                    <div class="form-group">
                                                                        <label class="floating-label"
                                                                            for="role">Role</label>
                                                                        <select class="mb-3 form-control" name="role"
                                                                            id="role">
                                                                            <option value="{{ $res->role }}">Pilihan
                                                                                Saat
                                                                                ini <span
                                                                                    class="font-weight-bolder">({{ $res->role }})</span>
                                                                            </option>
                                                                            <option value="admin">ADMIN</option>
                                                                            <option value="operator">OPERATOR</option>
                                                                            <option value="bendahara">BENDAHARA</option>
                                                                            <option value="bk">BAGIAN BK</option>
                                                                            <option value="sarpras">BAGIAN SARPRAS</option>
                                                                            <option value="resepsionis">RESEPSIONIS
                                                                            </option>
                                                                            <option value="perpustakaan">PERPUSTAKAAN
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label class="floating-label"
                                                                            for="email">Email</label>
                                                                        <input type="text" class="form-control"
                                                                            id="email" name="email"
                                                                            value="{{ $res->email }}"
                                                                            placeholder="info@exampremium.co.id">
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label class="floating-label" for="notelp">No
                                                                            Telp</label>
                                                                        <input type="text" class="form-control"
                                                                            id="notelp" name="notelp"
                                                                            value="{{ $res->notelp }}"
                                                                            placeholder="081222913903">
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
                                    <!-- Update Data Pengguna End -->
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>



            <div class="modal fade" id="modal-report" tabindex="-1" role="dialog"
                aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Pengguna</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('master.datapengguna.store') }}" method="post"
                                enctype="multipart/form-data" enctype="multipart/form-data" role="form">
                                @csrf
                                <input type="hidden" class="form-control" id="id_user" name="id_user"
                                    value="">
                                <div class="row">

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="floating-label" for="nama_user">Nama</label>
                                            <input type="text" class="form-control" id="nama_user" name="nama_user"
                                                placeholder="Nama Pengguna">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="floating-label" for="username">Username</label>
                                            <input type="text" class="form-control" id="username" name="username"
                                                placeholder="Username">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="floating-label" for="password">Password</label>
                                            <input type="text" class="form-control" id="password" name="password"
                                                placeholder="Password">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="floating-label" for="email">Email</label>
                                            <input type="text" class="form-control" id="email" name="email"
                                                placeholder="E-Mail">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="floating-label" for="notelp">No Telp</label>
                                            <input type="text" class="form-control" id="notelp" name="notelp"
                                                placeholder="Nomor Telp">
                                        </div>
                                    </div>


                                    <div class="col-xl-12 col-md-6 mb-5">
                                        <div class="form-group">
                                            <label class="floating-label" for="role">Role</label>
                                            <select class="mb-3 form-control" name="role" id="role">
                                                <option value="admin">ADMIN</option>
                                                <option value="operator">OPERATOR</option>
                                                <option value="bendahara">BENDAHARA</option>
                                                <option value="bk">BAGIAN BK</option>
                                                <option value="sarpras">BAGIAN SARPRAS</option>
                                                <option value="resepsionis">RESEPSIONIS</option>
                                                <option value="perpustakaan">PERPUSTAKAAN</option>
                                            </select>
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
        </div>
    </div>
@endsection
