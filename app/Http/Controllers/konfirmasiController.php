<?php

namespace App\Http\Controllers;

use App\Models\konfirmasi;
use Illuminate\Support\Facades\Http;
use App\Models\kiriman;
use App\Models\kiriman_manual;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class konfirmasiController extends Controller
{

    public function konfirmasi()
    {
        $data = konfirmasi::get()->sortByDesc('waktu_kirim');
        // dd($data);
        return view('kiriman.konfirmasi',compact('data'));
    }

    public function manual()
    {
        $data = User::get();
        return view('kiriman.manual',compact('data'));
    }

    public function manual_store(Request $request)
    {
        $user = User::findOrFail($request->id_santri);
        $user->saldo += $request->nominal;
        if($user->save()){
            $manual = new kiriman_manual;
            $manual->id_santri = $request->id_santri;
            $manual->nominal = $request->nominal;
            $manual->catatan = $request->catatan;
            $manual->save();
            $data = [
                'id_santri' => $request->id_santri,
                'nominal' => $request->nominal,
                'note' => $request->catatan,
                // tambahkan atribut lainnya sesuai kebutuhan
            ];
            $response = Http::post('localhost:1880/bot-notifier-kiriman-custom', $data);
        }
        return redirect('konfirmasi/manual');
    }

    public function terimaKonfirmasi($id)
    {
        // Mengambil data konfirmasi berdasarkan ID
        $konfirmasi = konfirmasi::findOrFail($id);

        // Menambahkan saldo user
        $user = User::findOrFail($konfirmasi->id_santri);
        $user->saldo += $konfirmasi->nominal;
        $user->save();

        // Menyimpan data ke dalam tabel kiriman dengan status diterima
        kiriman::create([
            'id_santri' => $konfirmasi->id_santri,
            'id_sender' => $konfirmasi->id_sender,
            'nominal' => $konfirmasi->nominal,
            'bukti' => $konfirmasi->bukti,
            'waktu_kirim' => $konfirmasi->waktu_kirim,
            'catatan' => $konfirmasi->catatan,
            'status' => 'diterima' // Mengatur status kiriman menjadi diterima
        ]);

        $data = [
            'santri' => $user->name,
            'nominal' => $konfirmasi->nominal,
            'id_sender' => $konfirmasi->id_sender,
            'saldo_akhir' => $user->saldo,
            'status' => 'diterima'
            // tambahkan atribut lainnya sesuai kebutuhan
        ];

        // Menjalankan permintaan POST ke endpoint API eksternal
        $response = Http::post('localhost:1880/bot-kiriman', $data);

        // Menghapus data konfirmasi dari tabel konfirmasi
        $konfirmasi->delete();

        return redirect()->back()->with('success', 'Konfirmasi berhasil diterima dan saldo user berhasil ditambahkan.');
    }

    public function tolakKonfirmasi($id)
    {
        
        // Mengambil data konfirmasi berdasarkan ID
        $konfirmasi = konfirmasi::findOrFail($id);
        $user = User::findOrFail($konfirmasi->id_santri);
        // Menyimpan data ke dalam tabel kiriman dengan status ditolak
        kiriman::create([
            'id_santri' => $konfirmasi->id_santri,
            'id_sender' => $konfirmasi->id_sender,
            'nominal' => $konfirmasi->nominal,
            'bukti' => $konfirmasi->bukti,
            'waktu_kirim' => $konfirmasi->waktu_kirim,
            'catatan' => $konfirmasi->catatan,
            'status' => 'ditolak' // Mengatur status kiriman menjadi ditolak
        ]);
        $data = [
            'santri' => $user->name,
            'nominal' => $konfirmasi->nominal,
            'id_sender' => $konfirmasi->id_sender,
            'saldo_akhir' => $user->saldo,
            'status' => 'diolak'
            // tambahkan atribut lainnya sesuai kebutuhan
        ];

        // Menjalankan permintaan POST ke endpoint API eksternal
        $response = Http::post('localhost:1880/bot-kiriman', $data);
        // Menghapus data konfirmasi dari tabel konfirmasi
        $konfirmasi->delete();

        return redirect()->back()->with('success', 'Konfirmasi berhasil ditolak.');
    }
}
