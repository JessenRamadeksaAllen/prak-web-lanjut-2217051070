<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;


    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index()
{
    $data = [
        'title' => 'List User',
        'users' => $this->userModel->getUser(),
    ];

    return view('list_user', $data);
}


public function create(){
    $kelasModel = new Kelas();

    // Mengambil data kelas menggunakan method getKelas
    $kelas = $kelasModel->getKelas();

    $data = [
        'title' => 'Create User',
        'kelas' => $kelas,
    ];

    return view('create_user', $data);
}

public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'nama' => 'required',
        'npm' => 'required',
        'kelas_id' => 'required',
        'foto' => 'image|file|max:2048', // Validasi foto
    ]);

    // Proses upload foto
    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('uploads', $filename); // Menyimpan file ke storage

        // Simpan data user ke database
        $this->userModel->create([
            'nama' => $request->input('nama'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
            'foto' => $filename, // Menyimpan nama file ke database
        ]);
    }

    // Redirect ke halaman daftar pengguna setelah penyimpanan
    return redirect()->route('user.index')->with('success', 'Pengguna berhasil ditambahkan');
}



}