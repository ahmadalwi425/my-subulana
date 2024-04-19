<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\barang;
use App\Models\User;
use App\Models\barang_keluar;
use App\Models\transaksi;

class kasirController extends Controller
{
    public function sessiondestroyer()
    {
        // dd(Session::get('listed'));
        Session::forget('listed');
    }

    public function testbot()
    {
        $data = [
            'id_santri' => 3,
            'nominal' => 20000,
            'id_barang' => "[[4,1],[3,2]]",
            // tambahkan atribut lainnya sesuai kebutuhan
        ];

        // Menjalankan permintaan POST ke endpoint API eksternal
        $response = Http::post('localhost:1880/bot-notifier', $data);
        dd($response->json());
    }

    public function index()
    {
        $data = barang::get()->sortBy('nama_barang');
        
        // dd(Session::get('listed'));
        // if (!Session::has('listed')) {
        //     Session::put('listed', null);
        //     // $listed = [[]];
        // }else{
        //     // $listed = Session::get('listed');
        // }
        
        // dd($data);
        return view('kasir.index',compact('data'));
    }

    public function store(Request $request)
    {
        $listbarang = [[]];
        $listed = Session::get('listed');
        $loop = 0;
        $statsantri = false;
        foreach($listed as $list){
            $listbarang[$loop][0] = $list[0]->id_barang;
            $listbarang[$loop][1] = $list[1];
            $loop++;
        }
        $total = $request->total;
        $listbarangString = json_encode($listbarang);
        // dd($listbarangString);
        $transaksi = new transaksi();
        $transaksi->id_pembeli = $request->pembeli;
        $transaksi->id_penjual = Auth::id();
        $transaksi->list_barang = $listbarangString;
        if($request->pembeli == 1){
            $transaksi->cash = $request->cash;
            $transaksi->transfer = $request->transfer;
            $transaksi->kembalian =  ($request->cash + $request->transfer)-$request->total;
        }else{
            $pembeli = User::findOrFail($request->pembeli);
            $pembeli->saldo -= $request->total;
            $pembeli->save();
            $transaksi->saldo_santri = $request->total;
            $statsantri = true;
        }
        if($transaksi->save()){
            if($request->pembeli != 1){
                $data = [
                    'id_santri' => $request->pembeli,
                    'nominal' => $request->total,
                    'id_barang' => $listbarangString,
                    // tambahkan atribut lainnya sesuai kebutuhan
                ];
                $response = Http::post('localhost:1880/bot-notifier', $data);
            }
            
    
            // Menjalankan permintaan POST ke endpoint API eksternal
            
            foreach($listed as $list){
                $barang = barang::findOrFail($list[0]->id_barang);
                $barang->stok -= $list[1];
                $barang->save();
                $barangKeluar = new barang_keluar();
                // $barangMasuk->waktu_masuk = now(); // Menggunakan waktu saat ini
                $barangKeluar->id_barang = $barang->id_barang; // Menggunakan ID barang yang dimasukkan
                $barangKeluar->jumlah = $list[1];
                $barangKeluar->status = "terjual";
                $barangKeluar->id_user = Auth::id(); 
                $barangKeluar->id_transaksi = $transaksi->id_transaksi;
                $barangKeluar->save();
                Session::forget('listed');
            }

        }
        $userpembeli = User::findOrFail($request->pembeli);
        return view('kasir.receipt',compact('transaksi','statsantri','userpembeli','total','listed'));
    }

    public function sumary(Request $request)
    {
        // dd($request->barang);
        $total = 0;
        $listed = Session::get('listed');
        foreach($listed as $list){
            $total += $list[0]->harga_jual*$list[1];
        }
        $user = User::get();
        return view('kasir.sumary',compact('user','total'));
    }

    public function tambahlist(Request $request)
    {
        $barang = Barang::find($request->id_barang); // Pastikan Anda mengganti "Barang" dengan nama model yang benar

        // Mengambil data array dari sesi
        $listed = Session::get('listed');

        // Flag untuk menandai apakah barang sudah ada dalam session
        $barangExists = false;

        // Jika tidak ada data di dalam array, tambahkan barang pertama ke dalam array
        if (empty($listed)) {
            $listed[] = [$barang, 1];
        } else {
            // Jika ada data, periksa setiap barang dalam session
            foreach ($listed as $key => $item) {
                // Jika ID barang sudah ada dalam session
                if ($item[0]->id_barang == $barang->id_barang) {
                    // Tambahkan jumlahnya
                    $listed[$key][1]++;
                    // Set flag untuk menandai bahwa barang sudah ada dalam session
                    $barangExists = true;
                    break; // Keluar dari loop karena barang sudah ditemukan
                }
            }
            
            // Jika barang belum ada dalam session, tambahkan ke dalam array
            if (!$barangExists) {
                $listed[] = [$barang, 1];
            }
        }

        // Menyimpan kembali data array yang telah diperbarui ke dalam sesi
        Session::put('listed', $listed);

        // Debug untuk memastikan data telah ditambahkan dengan benar
        // dd(Session::get('listed'));

        return redirect('kasir');
    }
}
