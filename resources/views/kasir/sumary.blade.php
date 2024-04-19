@extends('layouts.adminapp') 
@section('content') 

<div id="page-wrapper">
    <div id="page-inner">
        <form method="post" action="{{ url('/kasir/store') }}" class="col-md-12">
            @csrf
            <div class="row">
                <h3>Sumary</h3>
            </div>
            <div class="form-group col-md-6">
                <label for="pembeli">Pembeli</label>
                <select class="form-control" id="pembeli" name="pembeli" required>
                    @foreach($user as $users)
                    <option value="{{ $users->id }}">{{ $users->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="total">Total</label>
                <input type="number" class="form-control" value="{{$total}}" required disabled>
                <input type="hidden" class="form-control" id="total" name="total" value="{{$total}}">
            </div>
            <div class="form-group col-md-6">
                <label for="cash">Cash</label>
                <input type="number" class="form-control" id="cash" name="cash" value="0" required>
            </div>
            <div class="form-group col-md-6">
                <label for="transfer">Transfer</label>
                <input type="number" class="form-control" id="transfer" name="transfer" value="0" required>
            </div>
            
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
    </div>
</div> 
@endsection
