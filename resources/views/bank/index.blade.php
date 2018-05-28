@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if (session('success'))
                <div class="alert alert-success alert-dismissable fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong><i class="fa fa-fw fa-check"></i></strong> {{ session('success') }}
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">Form Input Pembayaran DK</div>

                <div class="panel-body">
                    <div class="col-md-5">
                        <form action="{{ url()->current() }}" class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-sm-4">Stambuk</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="s" placeholder="Cari mahasiswa" required value="{{ $mahasiswa->stambuk or '' }}" {{ !isset($mahasiswa) ? 'autofocus' : '' }} onkeypress="return hanyaAngka(event)" maxlength="9">
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
                            </div>
                            @if (isset($mahasiswa))
                                <div class="form-group">
                                    <label class="control-label col-sm-4">Nama</label>
                                    <div class="col-sm-8">
                                        <p class="form-control-static">: {{ $mahasiswa->nama or ' - ' }}</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4">T.A.</label>
                                    <div class="col-sm-8">
                                        <p class="form-control-static">: {{ isset($mahasiswa) ? $mahasiswa->angkatan->tahun : ' - ' }}</p>
                                    </div>
                                </div>
                            @endif
                        </form>
                    </div>
                    <div class="col-md-7">
                        <form action="{{ route('bayar.dk') }}" method="POST" class="form-horizontal">
                            {{ csrf_field() }}
                            @if (isset($mahasiswa))
                                <input type="hidden" name="mahasiswa_id" value="{{ $mahasiswa->id }}">
                            @endif
                            <div class="form-group">
                                <label class="control-label col-sm-4">Tanggal</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{{ date('d / m / Y') }}" readonly>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('bayar') ? ' has-error' : '' }}">
                                <label class="control-label col-sm-4">Pembayaran</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp.</span>
                                        <input type="text" class="form-control" name="bayar" placeholder="Nominal pembayaran DK" maxlength="5" max="50000" onkeypress="return hanyaAngka(event)" required {{ !isset($mahasiswa) ? 'disabled' : 'autofocus' }}>
                                    </div>
                                    @if($errors->has('bayar'))
                                        <span class="help-block">{{ $errors->first('bayar') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-4">
                                    <button class="btn btn-primary btn-sm" type="submit" {{ !isset($mahasiswa) ? 'disabled' : '' }}>Submit Pembayaran <i class="fa fa-check fa-fw"></i></button>
                                    <a href="{{ url()->current() }}" class="btn btn-default btn-sm {{ !isset($mahasiswa) ? 'hidden' : '' }}">Batalkan</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Riwayat Pembayaran DK</div>

                <div class="panel-body">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Kegiatan</th>
                                <th>Stambuk</th>
                                <th>Penerima</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($dk as $item)
                                <tr>
                                    <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                    <td>Pembayaran Dana Kemahasiswaan oleh <b>"<i>{{ $item->mahasiswa->nama }}</i>"</b></td>
                                    <td><b>{{ $item->mahasiswa->stambuk }}</b></td>
                                    <td>{{ $item->user->name }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center text-muted" colspan="5"><i>Data tidak ditemukan.</i></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $dk->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
