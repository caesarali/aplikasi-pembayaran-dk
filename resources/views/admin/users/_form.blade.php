<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label class="control-label col-sm-3">Nama</label>
    <div class="col-sm-8">
        @if (isset($user))
            <input type="text" class="form-control" name="name" placeholder="Nama akun" value="{{ old('name') ?? $user->name }}" required>
        @else
            <input type="text" class="form-control" name="name" placeholder="Nama akun" value="{{ old('name') }}" required>
        @endif
        @if($errors->has('name'))
            <span class="help-block">{{ $errors->first('name') }}</span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
    <label class="control-label col-sm-3">Username</label>
    <div class="col-sm-8">
        @if (isset($user))
            <input type="text" class="form-control" name="username" value="{{ old('username') ?? $user->username }}" placeholder="Username akun" required>
        @else
            <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username akun" required>
        @endif
        @if($errors->has('username'))
            <span class="help-block">{{ $errors->first('username') }}</span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
    <label class="control-label col-sm-3">Level User</label>
    <div class="col-sm-8">
        @foreach($levels as $level)
            <label class="radio-inline">
                <input type="radio" name="level" value="{{ $level->id }}" {{ isset($user) && $user->level_id === $level->id ? 'checked="checked"' : $loop->first ? 'checked="checked"' : '' }} required>
                {{ ucwords($level->name) }}
            </label>
        @endforeach
        @if($errors->has('level'))
            <span class="help-block">{{ $errors->first('level') }}</span>
        @endif
    </div>
</div>
<hr>
<div class="form-group">
    <div class="col-sm-8 col-sm-offset-3">
        <button class="btn btn-primary" type="submit">Simpan <i class="fa fa-fw fa-check"></i></button>
        <a href="{{ route('user.index', $user->level->name ?? 'teller') }}" class="btn btn-default">Batal</a>
    </div>
</div>