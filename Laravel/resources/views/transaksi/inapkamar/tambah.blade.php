@extends('dashboard')

@section('title')
@include('flash::message')
    Detail Pemesanan Kamar
@endsection

@section('content')
    {!! Form::model($reservasi,['class' => 'form-horizontal']) !!}
    @include('transaksi.inapkamar.form')
    {!! Form::close() !!}
@endsection

@section('scripts')
    <script type="text/javascript">

    	var total = $('#totalakhir').val();

    	//pajak nominal
    	$('#pajaknominal').on('input',function(e){
	     var pajak = $('#pajaknominal').val();
	     var pot = $('#potongannominal').val();
	     var biaya = $('#biayalain').val();
	     var totalakhir = parseInt(biaya,10) + parseInt(total,10) + parseInt(pajak,10) - parseInt(pot,10);
	     $('#totalsemua').val(totalakhir);
	    });
	    $('#biayalain').on('input',function(e){
	    //biaya lain
        var pajak = $('#pajaknominal').val();
	     var pot = $('#potongannominal').val();
	     var biaya = $('#biayalain').val();
	     var totalakhir = parseInt(biaya,10) + parseInt(total,10) + parseInt(pajak,10) - parseInt(pot,10);
	     $('#totalsemua').val(totalakhir);
	    });
	    $('#potongannominal').on('input',function(e){
		//Potongan Nominal
		var pajakbaru = (total - $('#potongannominal').val()) * 0.1;
		$('#pajaknominal').val(pajakbaru);
        var pajak = $('#pajaknominal').val();
	     var pot = $('#potongannominal').val();
	     var biaya = $('#biayalain').val();

	     var totalakhir = parseInt(biaya,10) + parseInt(total,10) + parseInt(pajakbaru,10) - parseInt(pot,10);
	     $('#totalsemua').val(totalakhir);
	    });

    </script>
@endsection
