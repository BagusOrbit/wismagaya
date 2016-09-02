@extends('dashboard')

@section('title')
@include('flash::message')
Data Biaya - Biaya
    <div class="pull-right">
        <!-- <button class="btn btn-flat btn-sm btn-primary" id="load-data-asli"><i class="glyphicon glyphicon-leaf"></i> Lihat Data Asli</button> -->
        <a href="{{ url('biaya/tambah') }}" class="btn btn-flat btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Biaya</a>
    </div>
@endsection

@section('content')

<div class="box">
        
        <div class="box-body table-responsive no-padding">
            <table class="table table-condensed table-bordered table-hover table-striped">
                <tbody>
                <tr>
                    
                    <th>No</th>
                    <th>Biaya</th>
                    <th>Tanggal</th>
                    <th>Nominal</th>
                    
                    <th style="min-width: 150px;width: 150px"></th>
                </tr>
                <?php $no = 1; ?>
                @forelse($biaya as $key => $u)
                    <tr>
                        
                        <td>{!! $no++ !!}</td>
                        <td>{!! $u->nama !!}</td>
                        <td>{!! $u->tanggal !!}</td>
                        <td>{!! number_format( $u->nominal,0 )!!}</td>
                        
                        <td>
                            <a href="{{ url('biaya/edit', ['id' => $u->id]) }}" class="btn btn-flat btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>
                            <a href="{{ url('biaya/hapus', ['id' => $u->id]) }}" class="btn btn-flat btn-sm btn-warning"><i class="fa fa-remove"></i> Hapus</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9">Tidak ada data</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection