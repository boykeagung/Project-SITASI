<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Yudisium;
use App\Models\Notifikasi;

class YudisiumController extends Controller
{
    public function index()
    {
        $yudisium = DB::table('yudisium')->join('mahasiswa', 'yudisium.nrp', '=', 'mahasiswa.nrp')->get();
        return view('yudisium.dashboard-list-pengajuan-yudisium', ['yudisium' => $yudisium]);
    }

    public function lihatBerkasMahasiswa($id)
    {
        $data = DB::table('yudisium')->join('mahasiswa', 'yudisium.nrp', '=', 'mahasiswa.nrp')->where('mahasiswa.nrp', '=', $id)->get();
        return view('yudisium.dashboard-berkas-yudisium', ['data' => $data]);
    }

    public function aksiBerkasMahasiswa(Request $req)
    {
        $by = $req->input('inputBy');
        $nrp = $req->input('inputNrp');
        $komentar = $req->input('inputKomentar');
        $keputusan = $req->input('inputKeputusan');
        if ($by == 'tu') {
            Yudisium::where('nrp', $nrp)->update(['status_yudisium' => $keputusan, 'tanggal_modifikasi_tu' => now(), 'komentar_tu' => $komentar]);
            if ($keputusan == 'Mengisi') {
                Notifikasi::insert(
                    array(
                        [
                            'notifikasi_milik' => $nrp,
                            'notifikasi_pesan' => 'Pengajuan yudisium anda ditolak TU, cek komentar TU',
                            'notifikasi_link' => 'dashboard-mahasiswa-yudisium',
                            'notifikasi_waktu' => now(),
                            'notifikasi_baca' => 0
                        ],
                        [
                            'notifikasi_milik' => '162019035',
                            'notifikasi_pesan' => 'Anda menolak permintaan Yudisium oleh mahasiswa ' . $nrp . ']',
                            'notifikasi_link' => 'dashboard-tata-usaha-yudisium/berkas/' . $nrp,
                            'notifikasi_waktu' => now(),
                            'notifikasi_baca' => 0
                        ]
                    )
                );
            } else if ($keputusan == 'Dikonfirmasi TU') {
                Notifikasi::insert(
                    array(
                        [
                            'notifikasi_milik' => $nrp,
                            'notifikasi_pesan' => 'Pengajuan yudisium anda dikonfirmasi TU, tunggu keputusan koordinator Yudisium',
                            'notifikasi_link' => 'dashboard-mahasiswa-yudisium',
                            'notifikasi_waktu' => now(),
                            'notifikasi_baca' => 0
                        ],
                        [
                            'notifikasi_milik' => '11',
                            'notifikasi_pesan' => 'Tata Usaha telah selesai cek pengajuan Yudisium oleh [' . $nrp . '], lihat detail',
                            'notifikasi_link' => 'dashboard-koordinator-yudisium/berkas/' . $nrp,
                            'notifikasi_waktu' => now(),
                            'notifikasi_baca' => 0
                        ]
                    )
                );
            }
            return redirect()->back();
        } else if ($by == 'koor') {
            Yudisium::where('nrp', $nrp)->update(['status_yudisium' => $keputusan, 'tanggal_modifikasi_koordinator' => now(), 'komentar_koordinator' => $komentar]);
            if ($keputusan == 'Mengisi') {
                Notifikasi::insert(
                    array(
                        [
                            'notifikasi_milik' => $nrp,
                            'notifikasi_pesan' => 'Pengajuan yudisium anda ditolak Koordinator Yudisium, cek komentar Koordinator Yudisium',
                            'notifikasi_link' => 'dashboard-mahasiswa-yudisium',
                            'notifikasi_waktu' => now(),
                            'notifikasi_baca' => 0
                        ],
                        [
                            'notifikasi_milik' => '11',
                            'notifikasi_pesan' => 'Anda menolak permintaan Yudisium oleh mahasiswa [' . $nrp . ']',
                            'notifikasi_link' => 'dashboard-koordinator-yudisium/berkas/' . $nrp,
                            'notifikasi_waktu' => now(),
                            'notifikasi_baca' => 0
                        ]
                    )
                );
            } else if ($keputusan == 'Diterima') {
                Notifikasi::insert(
                    array(
                        [
                            'notifikasi_milik' => $nrp,
                            'notifikasi_pesan' => 'Pengajuan yudisium anda telah berhasil, cek laman untuk tata cara selanjutnya',
                            'notifikasi_link' => 'dashboard-mahasiswa-yudisium/tentang-yudisium',
                            'notifikasi_waktu' => now(),
                            'notifikasi_baca' => 0
                        ],
                        [
                            'notifikasi_milik' => '11',
                            'notifikasi_pesan' => 'Anda menerima permintaan Yudisium oleh mahasiswa [' . $nrp . ']',
                            'notifikasi_link' => 'dashboard-koordinator-yudisium/berkas/' . $nrp,
                            'notifikasi_waktu' => now(),
                            'notifikasi_baca' => 0
                        ]
                    )
                );
            }
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}