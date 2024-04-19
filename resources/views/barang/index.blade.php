@extends('layouts.adminapp')
@section('content')

<div id="page-wrapper">   
    <div id="page-inner">
    <div class="row">
        <div class="col-md-6">
            <h3>DATA BARANG </h3>   
        </div>
        <div class="col-md-6">
            <a href="{{url('barang/create')}}" class="btn btn-success">Tambah Barang</a>   
        </div>
    </div>  
        <div class="table-responsive">
            <table  data-toggle="table" data-pagination="true" data-search="true" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Stok</th>
                        <th>Harga Pokok</th>
                        <th>Harga Jual</th>
                        <th>Aksi</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $barang)
                    <tr>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->stok }}</td>
                        <td>{{ $barang->harga_pokok }}</td>
                        <td>{{ $barang->harga_jual }}</td>
                        <td>
                            <a class="btn btn-success" href="{{url('barang/tambah/'.$barang->id_barang)}}">Tambah</a> 
                            <a class="btn btn-warning" href="{{url('barang/kurang/'.$barang->id_barang)}}">Kurang</a>  
                        </td>
                        <td>
                            <form method="POST" action="{{ url('barang/hapus/'.$barang->id_barang) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
