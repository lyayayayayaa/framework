<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku_m;
use App\Models\Anggota_m;
use App\Models\Pinjam_m; 

class PinjamController extends Controller
{
    // Menampilkan DAFTAR Peminjaman
    public function index()
    {
        $query = Pinjam_m::select(
                    'pinjam.*', 
                    'mst_anggota.nim', 'mst_anggota.nama', 
                    'mst_buku.Judul'
                 )
                 ->join('mst_anggota', 'pinjam.ID_Anggota', '=', 'mst_anggota.ID_Anggota')
                 ->join('mst_buku', 'pinjam.ID_Buku', '=', 'mst_buku.ID_Buku')
                 ->paginate(5);

        $data = [
            'query' => $query
        ];

        return view('pinjam.list', $data);
    }

    // Form Tambah
    public function add(Buku_m $buku, Anggota_m $anggota)
    {
        $data = [
            'optanggota' => $anggota->opt_anggota(),
            'optbuku' => $buku->opt_buku()
        ];

        return view('pinjam.add', $data);
    }

    // Simpan Data Peminjaman
    public function save(Pinjam_m $pinjam, Request $request)
    {
        $rules = [
            'ID_Anggota' => 'required',
            'ID_Buku' => 'required',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date|after_or_equal:tgl_pinjam',
        ];

        $attributes = [
            'ID_Anggota' => 'Anggota',
            'ID_Buku'    => 'Buku',
            'tgl_pinjam' => 'Tanggal Pinjam',
            'tgl_kembali'=> 'Tanggal Kembali',
        ];

        $validated = $request->validate($rules, [], $attributes);

        $data['ID_Anggota'] = $request->ID_Anggota;
        $data['ID_Buku'] = $request->ID_Buku;
        $data['tgl_pinjam'] = $request->tgl_pinjam;
        $data['tgl_kembali'] = $request->tgl_kembali;

        if ($pinjam->insert_record($data)) {
            return redirect('pinjam');
        }
    }

    // =======================
    //  Fungsi DELETE Data
    // =======================
    public function delete($id)
    {
        $pinjam = Pinjam_m::find($id);

        if (!$pinjam) {
            return redirect('pinjam')->with('error', 'Data tidak ditemukan!');
        }

        if ($pinjam->delete()) {
            return redirect('pinjam')->with('success', 'Data berhasil dihapus!');
        }

        return redirect('pinjam')->with('error', 'Gagal menghapus data!');
    }
}
