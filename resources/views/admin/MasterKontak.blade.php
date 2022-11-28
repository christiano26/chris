@extends('admin.app')
@section('title', 'Master Kontak')
@section('content-title', 'Master Kontak')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('kontak.create') }}" class="btn btn-primary">Create</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Kontak Siswa</th>
                        <th>Jenis Kontak</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Kontak Siswa</th>
                        <th>Jenis Kontak</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($siswa as $s)
                        <tr>
                            <td>{{ $s->siswa->nama }}</td>
                            <td>{{ $s->jenis->jenis_kontak }}</td>
                            <td>{{ substr(strip_tags($s->deskripsi), 0, 40) }}....</td>
                            <td> 
                            <a href="{{ route('kontak.edit', ['kontak' => $s->id]) }}" class="btn btn-warning btn-circle btn-sm">
                                {{-- <i class="fas fa-exclamation-triangle"></i> --}}
                                <i class="fas fa-edit"></i>
                            </a>
                            <form id="form-delete{{ $s->id }}" action="{{ route('kontak.destroy', ['kontak' => $s->id]) }}"
                                    method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" onclick="what({{ $s->id }})" class="btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-skull-crossbones"></i>
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
@endsection
