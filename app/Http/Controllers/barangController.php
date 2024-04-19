<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;
use App\Models\barang_keluar;
use App\Models\barang_masuk;
use Illuminate\Support\Facades\Auth;

class barangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = barang::get()->sortBy('nama_barang');
        // dd($data);
        return view('barang.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required|string|max:50',
            'barcode' => 'required|string|max:20',
            'harga_pokok' => 'required|integer',
            'harga_jual' => 'required|integer',
            'stok' => 'required|integer',
        ]);

        // Buat instansi baru dari model Barang
        $barang = new barang();
        $barang->nama_barang = $request->nama_barang;
        $barang->deskripsi = $request->deskripsi;
        $barang->barcode = $request->barcode;
        $barang->harga_pokok = $request->harga_pokok;
        $barang->harga_jual = $request->harga_jual;
        $barang->stok = $request->stok;

        // Simpan data barang ke dalam database
        $barang->save();

        $barangMasuk = new barang_masuk();
        // $barangMasuk->waktu_masuk = now(); // Menggunakan waktu saat ini
        $barangMasuk->id_barang = $barang->id_barang; // Menggunakan ID barang yang baru disimpan
        $barangMasuk->jumlah = $request->stok;
        $barangMasuk->id_user = Auth::id(); // Menggunakan ID pengguna yang sedang login

        // Simpan data barang masuk ke dalam database
        $barangMasuk->save();
        return redirect('barang');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function tambah(string $id)
    {
        $data = barang::find($id);
        return view('barang.tambah',compact('data'));
    }

    public function tambah_proses(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'jumlah_tambah' => 'required|integer|min:1',
        ]);

        // Ambil data barang yang akan dimasukkan
        $barang = Barang::findOrFail($request->id_barang);

        // Menambah stok barang
        $barang->stok += $request->jumlah_tambah;
        $barang->save();

        // Membuat data baru di tabel barang_masuk
        $barangMasuk = new barang_masuk();
        // $barangMasuk->waktu_masuk = now(); // Menggunakan waktu saat ini
        $barangMasuk->id_barang = $barang->id_barang; // Menggunakan ID barang yang dimasukkan
        $barangMasuk->jumlah = $request->jumlah_tambah;
        $barangMasuk->id_user = Auth::id(); // Menggunakan ID pengguna yang sedang login

        // Simpan data barang masuk ke dalam database
        $barangMasuk->save();

        // Redirect ke halaman yang sesuai setelah menyimpan data
        return redirect('barang')->with('success', 'Data barang masuk berhasil disimpan.');
    }

    public function kurang(string $id)
    {
        $data = barang::find($id);
        return view('barang.kurang',compact('data'));
    }

    public function kurang_proses(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'jumlah_kurang' => 'required|integer|min:1',
            'status' => 'required',
        ]);

        // Ambil data barang yang akan dimasukkan
        $barang = barang::findOrFail($request->id_barang);

        // Menambah stok barang
        $barang->stok -= $request->jumlah_kurang;
        $barang->save();

        // Membuat data baru di tabel barang_masuk
        $barangKeluar = new barang_keluar();
        // $barangMasuk->waktu_masuk = now(); // Menggunakan waktu saat ini
        $barangKeluar->id_barang = $barang->id_barang; // Menggunakan ID barang yang dimasukkan
        $barangKeluar->jumlah = $request->jumlah_kurang;
        $barangKeluar->status = $request->status;
        $barangKeluar->id_user = Auth::id(); // Menggunakan ID pengguna yang sedang login
        // Simpan data barang masuk ke dalam database
        $barangKeluar->save();

        // Redirect ke halaman yang sesuai setelah menyimpan data
        return redirect('barang')->with('success', 'Data barang masuk berhasil disimpan.');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = Barang::findOrFail($id);

        // Hapus barang
        $barang->delete();
        return redirect('barang');
    }
}
