@extends('admin.app')
@section('title', 'Master Project')
@section('content-title', 'Master Project')
@section('konten')

<div class="row">
    <a class="btn btn-success" href="{{ route('masterproject.create') }}">Tambah data</a>
    <div class="col-lg-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
            </div>
            <div class="card-body text-center">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Action</th>
                            @foreach($data as $i=> $item)
                        </tr>
                        <th scope="row">{{ ++$i }}</th>
                        <td>{{$item->nama}}</td>
                        <td>
                               <a onclick="show({{ $item->id }})" class="btn btn-sm btn-info"><i class="fas fa-folder-open"></i></a>
                               <a href="{{ route('masterproject.create') }}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tr>
                    </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Project siswa</h6>
            </div>
            <div id="projek"class="card-body">
                <h6 class="text_center">Pilih siswa terlebih dahulu</h6>
            </div>
        </div>
    </div>
</div>
<script>
    
</script>
@endsection