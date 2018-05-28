@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Riwayat Pembayaran DK</div>

                <div class="panel-body">
                    <table class="table table-hovered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>Kegiatan</th>
                                <th>Stambuk</th>
                                <th>Teller</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($dk as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                    <td>Melakukan Pembayaran Dana Kemahasiswaan</td>
                                    <td>{{ $item->mahasiswa->stambuk }}</td>
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
