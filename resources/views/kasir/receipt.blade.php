@extends('layouts.adminapp') 
@section('content') 
<style>
        /* CSS untuk styling nota */
        body {
            font-family: Arial, sans-serif;
        }
        .nota {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .nota h2 {
            text-align: center;
        }
        .info {
            margin-bottom: 20px;
        }
        .info p {
            margin: 5px 0;
        }
        .total {
            font-weight: bold;
            text-align: right;
        }
    </style>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="nota">
            <h2>Nota Transaksi</h2>
            <div class="info">
                <p><strong>Nota</strong> </p>
                <!-- Ganti dengan informasi lain yang diperlukan -->
            </div>
            <table>
            <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th  style="width: 100px;">Jumlah</th>
                        <th>Harga Total</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @if($transaksi->type == "toko")
                    @foreach($listed as $barang)
                    <tr>
                        <input type="hidden" name="barang[{{ $loop->iteration }}]" value="{{ $barang[0]->id_barang }}">
                        <td>{{ $barang[0]->nama_barang }}</td>
                        <td>{{ $barang[1] }}</td>
                        <td>{{ 'Rp ' . number_format($barang[0]->harga_jual*$barang[1], 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                    @elseif($transaksi->type == "jt")
                    <p>{{$transaksi->note}}</p>
                    @endif
                </tbody>
            </table>
            <div class="total">
                @if($statsantri)
                    <p><strong>Total Belanja:</strong>{{ 'Rp ' . number_format($total, 0, ',', '.') }}</p>
                    <p><strong>Sisa saldo:</strong>{{ 'Rp ' . number_format($userpembeli->saldo, 0, ',', '.') }}</p>
                @else
                    <p><strong>Total Belanja:</strong>{{ 'Rp ' . number_format($total, 0, ',', '.') }}</p>
                    <p><strong>Uang Pembayaran:</strong> {{ 'Rp ' . number_format($transaksi->cash + $transaksi->transfer, 0, ',', '.') }}</p>
                    <p><strong>Kembalian:</strong>{{ 'Rp ' . number_format($transaksi->kembalian, 0, ',', '.') }}</p>
                @endif
            </div>
            <a href="{{url('kasir')}}" class="btn btn-primary">Kembali ke kasir</a>
        </div>
    </div>
</div> 

@endsection
