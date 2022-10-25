@extends('admin.app')
@section('title', 'Create Project')
@section('content-title', 'Create Project')
@section('konten')
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-body">
                @if(count($errors) >0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div> 
                @endif
                <form method="POST" enctype="multipart/form-data" action="{{ route('masterproject.store') }}">
                    @csrf
                    <div class="form-group">
                        @foreach ($siswa as $item)
                            <input type="hidden" name="siswa_id" value="{{ $item->id }}">
                        @endforeach
                    </select>
                        </div>
                    <div class="form-group">
                        <label for="nama">Nama Projek</label>
                        <input type="text" class="form-control" id="nama_projek" name="nama_projek" value="{{ old('nama_projek')}}">
                    </div>
                    <div class="form-group">
                        <label for="email">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ old('deskripsi')}}">
                    </div>
                    <div class="form-group">
                        <label for="tanggal">tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal')}}">
                    </div>
                    <div class="form-group">
                        <label for="foto">foto Projek</label>
                        <input type="file" class="form-control" id="foto" name="foto" >
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="simpan" >
                        <a href="{{route ('masterproject.index') }}" class="btn btn-danger">Batal</a>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>

@endsection