@extends('dashboard')

@section('title')
@include('flash::message')
Data Kamar
    <div class="pull-right">
        <!-- <button class="btn btn-flat btn-sm btn-primary" id="load-data-asli"><i class="glyphicon glyphicon-leaf"></i> Lihat Data Asli</button> -->
        <a href="{{ url('room/tambah') }}" class="btn btn-flat btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Kamar</a>
    </div>
@endsection

@section('content')

<div class="box">
        
        <div class="box-body table-responsive no-padding">
            <table class="table table-condensed table-bordered table-hover table-striped">
                <tbody>
                <tr>
                    
                    <th>No</th>
                    <th>No Kamar / Room</th>
                    <th>Nama Kamar / Room</th>
                    <th>Tipe Kamar</th>
                    <th>Fasilitas</th>
                    <th>Harga</th>
                    <th style="min-width: 150px;width: 150px"></th>
                </tr>
                <?php $no = 1; ?>
                @forelse($data as $key => $u)
                    <tr>
                        
                        <td>{!! $no++ !!}</td>
                        <td>{!! $u->noroom !!}</td>
                        <td>{!! $u->namaroom !!}</td>
                        <td>{!! $u->present()->idtyperoom !!}</td>
                        <td>{!! $u->fasilitas !!}</td>
                        <td>{!! $u->harga !!}</td>
                        <td>
                            <a href="{{ url('room/edit', ['id' => $u->idroom]) }}" class="btn btn-flat btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>
                            <a href="{{ url('room/hapus', ['id' => $u->idroom]) }}" class="btn btn-flat btn-sm btn-warning"><i class="fa fa-remove"></i> Hapus</a>
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