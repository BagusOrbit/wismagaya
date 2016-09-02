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
            {!! Form::label('namatyperoom', 'Tipe Kamar', ['class' => 'control-label col-md-2']) !!}
            <div class="col-md-4">
                {!! Form::text('namatyperoom', null, ['class' => 'form-control', 'placeholder' => 'Nama Tipe']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('Harga', 'Harga', ['class' => 'control-label col-md-2']) !!}
            <div class="col-md-4">
                {!! Form::text('Harga',null, ['class' => 'form-control', 'placeholder' => 'Harga']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('Fasilitas', 'Fasilitas', ['class' => 'control-label col-md-2']) !!}
            <div class="col-md-4">
                {!! Form::textarea('Fasilitas', null, ['class' => 'form-control', 'placeholder' => 'Fasilitas']) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-2 col-md-4">
                <button class="btn btn-flat btn-primary" type="submit">Simpan</button>
                <a href="{{ url('/typeroom') }}" class="btn btn-flat btn-default">Batal</a>
            </div>
        </div>
    </div>
</div>