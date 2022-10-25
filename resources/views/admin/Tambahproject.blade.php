@extends('admin.app')
@section('title', 'Tambah Project')
@section('content-title', 'Tambah Project')
@section('konten')

<div class="row">
    <div class="col-lg-12">
        <div class="card-shadow mb-4">
            <div class="card-body">
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="POST" enctype="multiple/form-data" action="{{ route('masterproject.store')}}">
                @csrf
                <div class="form-group">
                    @foreach ($siswa as $item)
                    <input type="hidden" name="id_siswa" value="{{ $item->id }}">
                </div>
                </form>
            </div>
        </div>
    </div>
</div>