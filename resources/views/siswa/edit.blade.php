@extends('layouts.main')

@section('content')

<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                @if (session('success'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <i class="fa fa-check-circle"></i> {{ session('success') }}
                                </div>
                                @endif
                                <h1>Edit Data {{ $siswa->nama_depan }} {{ $siswa->nama_belakang }}</h1>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('siswa.update', $siswa->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Nama Depan</label>
                                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama_depan" value="{{ $siswa->nama_depan }}" placeholder="Nama Depan">
                                </div>
                        
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Belakang</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama_belakang" value="{{ $siswa->nama_belakang }}" placeholder="Nama Belakang">
                                  </div>
                                  
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" id="">
                                        <option value="L" @if ($siswa->jenis_kelamin == 'L')
                                            selected
                                        @endif>Laki-laki</option>
                                        <option value="P" @if ($siswa->jenis_kelamin == 'P')
                                            selected
                                        @endif>Perempuan</option>
                                    </select>
                                </div>
                            
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Agama</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="agama" value="{{ $siswa->agama }}" placeholder="Agama">
                                  </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Alamat</label>
                                    <textarea type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="alamat" placeholder="Alamat">{{ $siswa->alamat }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Avatar</label>
                                    <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="avatar" value="" placeholder="Agama">
                                  </div>
                                <button type="submit" class="btn btn-warning">Ubah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
