@extends('dashboard')

@section('title')
@include('flash::message')
Data Menginap
@endsection

@section('content')

<div class="box">
        <!-- <div class="box-header">
            <div class="form-group">
                {!! $inap->render() !!}
            </div>
        </div> -->
        <div class="box-body table-responsive no-padding">
        <div>
        {!! $inap->render() !!}    
        </div>
        
            <table class="table table-condensed table-bordered table-hover table-striped">
                <tbody>
                <tr>
                    <th>No</th>
                    <th>No Pemesanan</th>
                    <th>Nama</th>
                    <th>No Identitas</th>
                    <th>Alamat</th>
                    <th>No Telpon</th>
                    <th style="min-width: 320px;width: 320px"></th>
                </tr>
                <?php $no = 1 ; ?>
                @forelse($inap as $key => $u)

                    <tr>
                        <td>{!! $no++ !!}</td>
                        <td>{!! $u->nopesanan !!}</td>
                        <td>{!! $u->namapesanan !!}</td>
                        <td>{!! $u->noidentitas !!}</td>
                        <td>{!! $u->alamat !!}</td>
                        <td>{!! $u->notelp !!}</td>
                        <td>
                            <a href="{{ url('inapkamar/detail', ['id' => $u->id]) }}" class="btn btn-flat btn-sm btn-success"><i class="fa fa-edit"></i> Details</a>
                            <a href="{{ url('inapkamar/bayar', ['id' => $u->id]) }}" class="btn btn-flat btn-sm btn-info"><i class="fa fa-edit"></i> Bayar</a>
                            <a href="{{ url('inapkamar/tambahdetail', ['id' => $u->id]) }}" class="btn btn-flat btn-sm btn-warning"><i class="fa fa-plus"></i> Tambah</a>
                            <a href="{{ url('inapkamar/hapus', ['id' => $u->id]) }}" class="btn btn-flat btn-sm btn-danger"><i class="fa fa-warning"></i> Hapus</a>
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