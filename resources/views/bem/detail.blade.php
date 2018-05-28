@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-3 hidden-xs">
                            <a href="{{ route('home') }}" class="btn btn-link"><i class="fa fa-arrow-left fa-fw"></i> Kembali</a>
                        </div>
                        <div class="col-md-5 text-center" style="padding-top: 7px">
                            <span class="hidden-xs">Pembayaran DK</span>
                        </div>
                        <div class="col-md-4">
                            <form action="{{ url()->current() }}" class="form-inline">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="s" placeholder="Cari mahasiswa" required value="{{ $mahasiswa->stambuk or '' }}" {{ !isset($mahasiswa) ? 'autofocus' : '' }} onkeypress="return hanyaAngka(event)" minlength="9" maxlength="9">
                                        <div class="input-group-btn">
                                            <button class="btn btn-default" type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @if(isset($error))
                                        <span class="help-block">{{ $error }}</span>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="form-horizontal row">
                        <label class="control-label col-sm-2">Nama</label>
                        <div class="col-sm-10">
                            <p class="form-control-static">: {{ $mahasiswa->nama or ' - ' }}</p>
                        </div>
                        <label class="control-label col-sm-2">Angkatan</label>
                        <div class="col-sm-10">
                            <p class="form-control-static">: {{ isset($mahasiswa) ? $mahasiswa->angkatan->tahun : ' - ' }}</p>
                        </div>
                        <label class="control-label col-sm-2">Semester</label>
                        <div class="col-sm-10">
                            <p class="form-control-static">: {{ isset($mahasiswa) ? $mahasiswa->cekSemester() : ' - ' }}</p>
                        </div>
                    </div>

                    <h4 class="page-header" style="margin-top: 22px; margin-bottom: 0;">Riwayat Pembayaran DK</h4>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Nominal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($mahasiswa))
                                    @forelse($mahasiswa->dk as $dk)
                                        <tr>
                                            <td>{{ $loop->iteration }}.</td>
                                            <td>{{ $dk->created_at->format('d/m/Y') }}</td>
                                            <td><label class="label label-success">Sudah dibayar.</label></td>
                                            <td>Rp. {{ number_format($dk->bayar,0,',','.') }},-</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-muted">Mahasiswa belum pernah membayar dana kemahasiswaan.</td>
                                        </tr>
                                    @endforelse
                                @else
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">Data tidak ditemukan.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
