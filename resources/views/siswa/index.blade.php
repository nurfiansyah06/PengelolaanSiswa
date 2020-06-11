@extends('layouts.main')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- TABLE HOVER -->
                    <div class="panel">
                        <div class="panel-heading">
                            @if (session('success'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <i class="fa fa-check-circle"></i> {{ session('success') }}
                            </div>
                            @endif
                            <h3 class="panel-title pt-3">Data Siswa</h3>
                            <div class="right">
                            <a type="button" style="color:white;font-size:12px;background-color:#1a75ff" class="btn btn-lg" data-toggle="modal" data-target="#exampleModal">
                                <i class="lnr lnr-plus-circle"> Tambah Data Siswa</i>
                            </a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>NAMA DEPAN</th>
                                        <th>NAMA BELAKANG</th>
                                        <th>JENIS KELAMIN</th>
                                        <th>AGAMA</th>
                                        <th>ALAMAT</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_siswa as $siswa)
                                    <tr>
                                        <td><a href="{{ route('siswa.show', $siswa->id) }}">{{ $siswa->nama_depan }}</a></td>
                                        <td><a href="{{ route('siswa.show', $siswa->id) }}">{{ $siswa->nama_belakang }}</a></td>
                                        <td>{{ $siswa->jenis_kelamin }}</td>
                                        <td>{{ $siswa->agama }}</td>
                                        <td>{{ $siswa->alamat }}</td>
                                        <td class="d-inline">
                                            <a href="{{ route('siswa.edit',$siswa->id) }}" class="btn btn-warning btn-xs">
                                                <i class="lnr lnr-pencil"></i>
                                            </a><br>
                                            <form action="{{ route('siswa.destroy',$siswa->id) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-xs">
                                                    <i class="lnr lnr-trash"></i>
                                                </button>
                                            </form>
                                            </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
</div>

    <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('siswa.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group{{ $errors->has('nama_depan') ? ' has-error' : '' }}">
                          <label for="exampleInputEmail1">Nama Depan</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama_depan" value="{{ old('nama_depan') }}" placeholder="Nama Depan">
                            @if ($errors->has('nama_depan'))
                                <span class="help-block">{{ $errors->first('nama_depan') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Belakang</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama_belakang" value="{{ old('nama_belakang') }}" placeholder="Nama Belakang">
                          </div>

                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{ old('email') }}" placeholder="Email">
                            @if ($errors->has('email'))
                                <span class="help-block">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                          
                        <div class="form-group{{ $errors->has('jenis_kelamin') ? ' has-error' : '' }}">
                            <label for="exampleInputEmail1">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" id="">
                                <option value="L"{{ (old('jenis_kelamin') == 'L') ? ' selected' : '' }}>Laki-laki</option>
                                <option value="P"{{ (old('jenis_kelamin') == 'P') ? ' selected' : '' }}>Perempuan</option>
                            </select>
                            @if ($errors->has('jenis_kelamin'))
                                <span class="help-block">{{ $errors->first('jenis_kelamin') }}</span>
                            @endif
                        </div>
                    
                        <div class="form-group{{ $errors->has('agama') ? ' has-error' : '' }}">
                            <label for="exampleInputEmail1">Agama</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="agama" value="{{ old('agama') }}" placeholder="Agama">
                            @if ($errors->has('agama'))
                                <span class="help-block">{{ $errors->first('agama') }}</span>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <textarea type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="alamat" placeholder="Alamat">{{ old('alamat') }}</textarea>
                        </div>

                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
                </div>
            </div>
    

@endsection
