@extends('dashboard')

@section('title')
@include('flash::message')
Data Tipe Kamar
<div class="pull-right">
        <!-- <button class="btn btn-flat btn-sm btn-primary" id="load-data-asli"><i class="glyphicon glyphicon-leaf"></i> Lihat Data Asli</button> -->
        <a href="{{ url('typeroom/tambah') }}" class="btn btn-flat btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Tipe Kamar</a>
    </div>
@endsection

@section('content')

<div class="box">
        
        <div class="box-body table-responsive no-padding">
            <table class="table table-condensed table-bordered table-hover table-striped">
                <tbody>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Fasilitas</th>
                    <th>Harga</th>
                    <th style="min-width: 150px;width: 150px"></th>
                </tr>
                <?php $no = 1 ; ?>
                @forelse($data as $key => $u)

                    <tr>
                        <td>{!! $no++ !!}</td>
                        <td>{!! $u->namatyperoom !!}</td>
                        <td>{!! $u->Fasilitas !!}</td>
                        <td>{!! number_format($u->Harga,0) !!}</td>
                        <td>
                            <a href="{{ url('typeroom/edit', ['id' => $u->idtyperoom]) }}" class="btn btn-flat btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>
                            <a href="{{ url('typeroom/hapus', ['id' => $u->idtyperoom]) }}" class="btn btn-flat btn-sm btn-warning"><i class="fa fa-remove"></i> Hapus</a>
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