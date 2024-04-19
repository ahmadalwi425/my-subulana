@extends('layouts.adminapp')
@section('content')

<div id="page-wrapper">   
    <div id="page-inner">
    <div class="row">
        <div class="col-md-6">
            <h3>Konfirmasi Kiriman Saldo Santri </h3>   
        </div>
    </div>  
        <div class="table-responsive">
            <table  data-toggle="table" data-pagination="true" data-search="true" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Santri</th>
                        <th>ID Telegram Pengirim</th>
                        <th>Nominal</th>
                        <th>Bukti</th>
                        <th>Waktu Kirim</th>
                        <th>Catatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $konfirmasi)
                    <tr>
                        <td>{{ $konfirmasi->santri->name }}</td>
                        <td>{{ $konfirmasi->id_sender }}</td>
                        <td>{{ 'Rp ' . number_format($konfirmasi->nominal, 0, ',', '.') }}</td>
                        <td><a href="{{url('bukti/'. $konfirmasi->id_konfirmasi)}}" target="_blank"></a>lihat bukti</td>
                        <td>{{ \Carbon\Carbon::parse($konfirmasi->waktu_kirim)->format('d M Y H:i') }}</td>
                        <td>{{ $konfirmasi->catatan }}</td>
                        <td>
                            <a class="btn btn-success" href="{{ url('konfirmasi/terima/' . $konfirmasi->id_konfirmasi) }}">Terima</a> 
                            <a class="btn btn-warning" href="{{ url('konfirmasi/tolak/' . $konfirmasi->id_konfirmasi) }}">Tolak</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
