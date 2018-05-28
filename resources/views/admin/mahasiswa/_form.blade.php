<div class="form-group{{ $errors->has('stambuk') ? ' has-error' : '' }}">
    <label class="control-label col-sm-3">Stambuk</label>
    <div class="col-sm-8">
        @if (isset($mahasiswa))
            <input type="text" name="stambuk" class="form-control" placeholder="Stambuk / NIM" list="prefixList" value="{{ old('stambuk') ?? $mahasiswa->stambuk }}" onkeypress="return hanyaAngka(event)" maxlength="9" required>
        @else
            <input type="text" name="stambuk" class="form-control" placeholder="Stambuk / NIM" list="prefixList" value="{{ old('stambuk') }}" onkeypress="return hanyaAngka(event)" maxlength="9" required>
        @endif
        <datalist id="prefixList">
            @foreach($taList as $ta)
                <option value="{{ substr($ta->tahun, 2) }}1401">
            @endforeach
        </datalist>
        @if ($errors->has('stambuk'))
            <span class="help-block">{{ $errors->first('stambuk') }}</span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
    <label class="control-label col-sm-3">Nama</label>
    <div class="col-sm-8">
        @if (isset($mahasiswa))
            <input type="text" name="nama" class="form-control" placeholder="Nama Mahasiswa" value="{{ old('nama') ?? $mahasiswa->nama }}" required>
        @else
            <input type="text" name="nama" class="form-control" placeholder="Nama Mahasiswa" value="{{ old('nama') }}" required>
        @endif
        @if ($errors->has('nama'))
            <span class="help-block">{{ $errors->first('nama') }}</span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('ta') ? ' has-error' : '' }}">
    <label class="control-label col-sm-3">Tahun Akademik</label>
    <div class="col-sm-8">
        @if (isset($mahasiswa))
            <input type="text" name="ta" class="form-control" placeholder="Contoh: 2014" list="prefixList" value="{{ old('ta') ?? $mahasiswa->angkatan->tahun }}" onkeypress="return hanyaAngka(event)" maxlength="9" required>
        @else
            <input type="text" name="ta" class="form-control" placeholder="Contoh: 2014" list="prefixList" value="{{ old('ta') }}" onkeypress="return hanyaAngka(event)" maxlength="4" min="4" required>
        @endif
        <datalist id="taList">
            @foreach($taList as $ta)
                <option value="{{ $ta->tahun }}">
            @endforeach
        </datalist>
        @if ($errors->has('ta'))
            <span class="help-block">{{ $errors->first('ta') }}</span>
        @endif
    </div>
</div>
<hr>
<div class="form-group">
    <div class="col-sm-8 col-sm-offset-3">
        <button class="btn btn-primary" type="submit">Simpan <i class="fa fa-fw fa-check"></i></button>
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-default">Batal</a>
    </div>
</div>