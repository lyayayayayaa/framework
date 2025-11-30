<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;    
use App\Models\Buku_m;

class BukuController extends Controller
{
    var $data;

    public function __construct()
    {
        $this->data['op_kategori'] = [
            '' => '-Pilih Salah Satu-',
            'Novel' => 'Novel',
            'Komik' => 'Komik',
            'Pemrograman' => 'Pemrograman'
        ];
    }

    public function index(Buku_m $buku)
{
    $data = [
        'query'        => $buku->get_records(),
        'optkategori'  => $this->data['op_kategori'] ?? []
    ];

    return view('buku.list', $data);
}

    public function add()
    {
        $data = [
            'is_update' => 0,
            'optkategori'=> $this->data['op_kategori'],
        ];
        return view('buku.add', $data);
    }

   public function save(Buku_m $buku, Request $request)
{
    $data['Judul'] = $request->input('Judul');
    $data['Pengarang'] = $request->input('Pengarang');
    $data['Kategori'] = $request->input('Kategori');
    $is_update = (int) $request->input('is_update', 0);

    if ($is_update == 0) 
        {
        if($buku->insert_record($data));
            return redirect('buku');
    } 
    else 
    {
        $id = $request->input('id');
        $buku->update_by_id($data, $id);
        return redirect('buku');
    }
}
    
    public function edit($id, Buku_m $buku)
    {
        $data = [
            'query' => $buku->get_records($id)->first(),
            'is_update' => 1,
            'optkategori' => $this->data['op_kategori']
        ];
        return view('buku.edit', $data);

    }

    public function delete($id, Buku_m $buku)
    {
        if ($buku->delete_by_id($id)) {
            return redirect('buku');
        }
    }
}
