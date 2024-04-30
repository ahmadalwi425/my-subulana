@extends('layouts.adminapp') 
@section('content') 

<div id="page-wrapper">
    <div id="page-inner">
    <div class="table-responsive">
            <table  data-toggle="table" data-pagination="true" data-search="true" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Stok</th>
                        <th>Harga Jual</th>
                        <th>Barcode</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $barang)
                    <tr>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->stok }}</td>
                        <td>{{ 'Rp ' . number_format($barang->harga_jual, 0, ',', '.') }}</td>
                        <td>{{ $barang->barcode }}</td>
                        <td>
                        <form id="formTambahList_{{ $barang->id_barang }}" action="{{ url('kasir/tambahlist') }}" method="post" style="display: none;">
                            @csrf
                            <input type="hidden" name="id_barang" value="{{ $barang->id_barang }}">
                        </form>
                        <a class="btn btn-success" href="#" onclick="event.preventDefault(); document.getElementById('formTambahList_{{ $barang->id_barang }}').submit();">Masukkan</a>  
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <form method="post" action="{{ url('/kasir/bayar') }}" class="col-md-12">
            @csrf
            <table class="table table-striped table-bordered table-hover">
                <div class="row col-md-12"><h4>Summary</h4> </div>
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Harga Jual</th>
                        <th>Harga Total</th>
                        <th  style="width: 100px;">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                @if(!session()->has('listed'))
                    <tr>
                        <td colspan="3">Belum ada barang yang ditambahkan.</td>
                    </tr>
                @else
                    @foreach(session()->get('listed') as $barang)
                    <tr>
                        <input type="hidden" name="barang[{{ $loop->iteration }}]" value="{{ $barang[0]->id_barang }}">
                        <td>{{ $barang[0]->nama_barang }}</td>
                        <td>{{ 'Rp ' . number_format($barang[0]->harga_jual, 0, ',', '.') }}</td>
                        <input type="hidden" name="jumlah[{{ $loop->iteration }}]" value="{{$barang[1]}}">
                        <td>{{ 'Rp ' . number_format($barang[0]->harga_jual*$barang[1], 0, ',', '.') }}</td>
                        <td><input type="number" class="form-control" value="{{$barang[1]}}" disabled required></td>
                        
                    </tr>
                    @endforeach
                @endif


                </tbody>
            </table>
            @if(!session()->has('listed'))
                <button type="submit" class="btn btn-danger" disabled>Tambahkan Barang Terlebih Dahulu</button>
            @else
                <button type="submit" class="btn btn-primary">Lanjutkan ke Pembayaran</button>
            @endif
        </form>
        <a href="{{url('/kasir/custom')}}" style="margin:15px;" class="btn btn-primary">Pembelian Khusus</a>
    </div>
</div> 
@endsection
