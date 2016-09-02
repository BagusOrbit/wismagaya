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
            {!! Form::label('tanggal', 'Tanggal', ['class' => 'control-label col-md-2']) !!}
            <div class="col-md-4">
                {!! Form::text('tanggal', null, ['class' => 'form-control datepicker', 'placeholder' => 'Tanggal',]) !!}
            </div>
        </div>
        
        <div class="form-group">
            {!! Form::label('itembiayaid', 'Biaya', ['class' => 'control-label col-md-2']) !!}
            <div class="col-md-4">
                {!! Form::select('itembiayaid', $itembiaya,null, ['class' => 'form-control', 'placeholder' => 'Biaya','id' => 'state']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('nominal', 'Nominal', ['class' => 'control-label col-md-2']) !!}
            <div class="col-md-4">
                {!! Form::text('nominal',null, ['class' => 'form-control', 'placeholder' => 'Nominal']) !!}
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-md-offset-2 col-md-4">
                <button class="btn btn-flat btn-primary" type="submit">Simpan</button>
                <a href="{{ url('/biaya') }}" class="btn btn-flat btn-default">Batal</a>
            </div>
        </div>
    </div>
</div>
