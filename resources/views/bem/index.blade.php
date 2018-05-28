@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6" style="padding-top: 7px">
                            <span class="hidden-xs">Mahasiswa Fakultas Ilmu Komputer</span>
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
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Stambuk</th>
                                    <th>Nama</th>
                                    <th class="text-center">Angkatan</th>
                                    <th class="text-center">Semester</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($mahasiswa as $mhs)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $mhs->stambuk }}</td>
                                        <td>{{ $mhs->nama }}</td>
                                        <td class="text-center">{{ $mhs->angkatan->tahun }}</td>
                                        <td class="text-center">{{ $mhs->cekSemester() }}</td>
                                        <td class="text-right">
                                            <a href="{{ url('/cek-pembayaran-dk').'?s='.$mhs->stambuk }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-fw fa-money" style="margin-right: 3px"></i> Cek Pembayaran
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-muted text-center"><i>Data tidak ditemukan.</i></td>
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
