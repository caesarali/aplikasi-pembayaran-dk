@extends('layouts.admin')

@section('content-admin')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    User Akun BANK UIT
                </div>

                <div class="panel-body">
                    @if (session('success'))
                        <div class="alert alert-info alert-dismissable fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Berhasil!</strong> {{ session('success') }} <i class="fa fa-fw fa-check"></i>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Level</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}.</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ ucwords($user->level->name) }}</td>
                                        <td class="text-right">
                                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-edit" style="margin-right: 6px;"></i> <b>EDIT</b> 
                                            </a>
                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display: inline;">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="button" class="btn btn-sm btn-danger btn-delete" data-level="{{ $user->level->name }}">
                                                    <i class="fa fa-trash" style="margin-right: 6px;"></i> <b>HAPUS</b>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted"><i>Data tidak ditemukan.</i></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        {{ $users->links() }}
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
                if ($(this).data('level') == 'teller') {
                    var konfirmasi = confirm('Perhatian: Menghapus akun user TELLER dapat menyebabkan rusaknya data pembayaran yang ditangani / diterima oleh teller tersebut. Yakin ingin menghapus akun user akun ini ?');   
                } else {
                    var konfirmasi = confirm('Yakin ingin menghapus akun user akun ini ?');
                }
                if (konfirmasi === true) {
                    $(this).parent('form').submit();
                }
            });
        });
    </script>
@endsection