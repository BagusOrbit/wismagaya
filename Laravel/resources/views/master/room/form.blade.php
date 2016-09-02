<div class="box box-primary">
    <div class="box-body">
    @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-group">
            {!! Form::label('noroom', 'Nomor Kamar', ['class' => 'control-label col-md-2']) !!}
            <div class="col-md-4">
                {!! Form::text('noroom', null, ['class' => 'form-control', 'placeholder' => 'Nomor Kamar']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('namaroom', 'Nama Kamar', ['class' => 'control-label col-md-2']) !!}
            <div class="col-md-4">
                {!! Form::text('namaroom',null, ['class' => 'form-control', 'placeholder' => 'namakamar']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('idtyperoom', 'Tipe Kamar', ['class' => 'control-label col-md-2']) !!}
            <div class="col-md-4">
                {!! Form::select('idtyperoom', $typeroom,null, ['class' => 'form-control', 'placeholder' => 'Tipe Kamar','id' => 'state']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('harga', 'Harga', ['class' => 'control-label col-md-2']) !!}
            <div class="col-md-4">
                {!! Form::text('harga',null, ['class' => 'form-control', 'placeholder' => 'Harga']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('fasilitas', 'Fasilitas', ['class' => 'control-label col-md-2']) !!}
            <div class="col-md-4">
                {!! Form::textarea('fasilitas', null, ['class' => 'form-control', 'placeholder' => 'Fasilitas']) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-2 col-md-4">
                <button class="btn btn-flat btn-primary" type="submit">Simpan</button>
                <a href="{{ url('/room') }}" class="btn btn-flat btn-default">Batal</a>
            </div>
        </div>
    </div>
</div>
