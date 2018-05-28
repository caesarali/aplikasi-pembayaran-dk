@extends('layouts.admin')

@section('content-admin')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Data Mahasiswa
                </div>

                <div class="panel-body">
                    @if (session('success'))
                        <div class="alert alert-info alert-dismissable fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Berhasil!</strong> {{ session('success') }} <i class="fa fa-fw fa-check"></i>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">
                                Tambah Mahasiswa <i class="fa fa-fw fa-plus"></i>
                            </a>
                        </div>
                        <div class="col-md-6 text-right">
                            <form action="{{ url()->current() }}" class="form-inline">
                                @if (url()->full() !== url()->current() and isset($key))
                                    <div class="form-group">
                                        <a href="{{ url()->current() }}" class="btn btn-default">
                                            <i class="fa fa-arrow-left"></i>
                                        </a>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" name="key" value="{{ $key or '' }}" class="form-control" placeholder="Cari mahasiswa...">
                                        <div class="input-group-btn">
                                            <button class="btn btn-default" type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Stambuk</th>
                                    <th>Nama</th>
                                    <th>Angkatan</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($mahasiswa as $mhs)
                                    <tr>
                                        <td>{{ $loop->iteration }}.</td>
                                        <td>{{ $mhs->stambuk }}</td>
                                        <td>{{ $mhs->nama }}</td>
                                        <td>{{ $mhs->angkatan->tahun }}</td>
                                        <td class="text-right">
                                            <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-edit" style="margin-right: 6px;"></i> <b>EDIT</b> 
                                            </a>
                                            <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" style="display: inline;">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="button" class="btn btn-sm btn-danger btn-delete">
                                                    <i class="fa fa-trash" style="margin-right: 6px;"></i> <b>HAPUS</b>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted"><i>Data tidak ditemukan.</i></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        {{ $mahasiswa->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.btn-delete').click(function(event) {
                event.preventDefault();
                var konfirmasi = confirm('Yakin ingin menghapus data ini ?');
                if (konfirmasi === true) {
                    $(this).parent('form').submit();
                }
            });

            $('input[name=key]').on('keyup', function(event) {
                event.preventDefault();
                if ($(this).val() === '') {
                    window.location.href = '{{ route('mahasiswa.index') }}'
                }
            });
        });
    </script>
@endsection
