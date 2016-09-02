@extends('dashboard')

@section('title')
@include('flash::message')
Data Pemesanan Kamar
<div class="pull-right">
        <a href="{{ url('cekkamar') }}" class="btn btn-flat btn-sm btn-success"><i class="glyphicon glyphicon-leaf"></i> Cek Kamar</a>
        <a href="{{ url('reservasi/tambah') }}" class="btn btn-flat btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Pemesanan Kamar</a>
    </div>
@endsection

@section('content')

<div class="box">
        
        <div class="box-body table-responsive no-padding">
            <table class="table table-condensed table-bordered table-hover table-striped">
                <tbody>
                <tr>
                    <th>No</th>
                    <th>No Pemesanan</th>
                    <th>Nama</th>
                    <th>No Identitas</th>
                    <th>Alamat</th>
                    <th>No Telpon</th>
                    <th style="min-width: 300px;width: 300px"></th>
                </tr>
                <?php $no = 1 ; ?>
                @forelse($reservasi as $key => $u)

                    <tr>
                        <td>{!! $no++ !!}</td>
                        <td>{!! $u->nopesanan !!}</td>
                        <td>{!! $u->namapesanan !!}</td>
                        <td>{!! $u->noidentitas !!}</td>
                        <td>{!! $u->alamat !!}</td>
                        <td>{!! $u->notelp !!}</td>
                        <td>
                            <a href="{{ url('reservasi/edit', ['id' => $u->id]) }}" class="btn btn-flat btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>
                            <a href="{{ url('reservasidetail/tambah', ['id' => $u->id]) }}" class="btn btn-flat btn-sm btn-info"><i class="fa fa-edit"></i> Detail</a>
                            <a href="{{ url('inapkamar/tambah', ['id' => $u->id]) }}" class="btn btn-flat btn-sm btn-warning"><i class="fa fa-plus"></i> Inap</a>
                            <a href="{{ url('reservasi/hapus', ['id' => $u->id]) }}" class="btn btn-flat btn-sm btn-danger"><i class="fa fa-remove"></i> Hapus</a>
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