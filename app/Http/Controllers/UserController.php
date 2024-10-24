<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;
use App\Models\Fakultas;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;
    public $fakultasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
        $this->fakultasModel = new Fakultas();
    }

    public function index()
    {
        $data = [
            'title' => 'List User',
            'users' => $this->userModel->getUser(),
        ];

        return view('list_user', $data);
    }

    public function create()
    {
        // Mengambil data kelas dan fakultas
        $kelas = $this->kelasModel->all();
        $fakultas = $this->fakultasModel->all(); // Ambil semua data fakultas

        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
            'fakultas' => $fakultas, // Kirim data fakultas ke view
        ];

        return view('create_user', $data);
    }

    public function store(Request $request) 
    { 
        // Validasi input termasuk fakultas_id, jurusan, dan semester
        $request->validate([
            'nama' => 'required|string|max:255',
            'kelas_id' => 'required|integer',
            'fakultas_id' => 'required|exists:fakultas,id',
            'jurusan' => 'required|in:fisika,kimia,biologi,matematika,ilmu komputer',
            'semester' => 'required|integer|min:1|max:14',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Proses upload foto jika ada
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . '_' . $foto->getClientOriginalName();
            $foto->storeAs('public/uploads', $fotoName);
        } else {
            $fotoName = null;
        }

        // Simpan data user ke database
        $this->userModel->create([
            'nama' => $request->input('nama'),
            'kelas_id' => $request->input('kelas_id'),
            'fakultas_id' => $request->input('fakultas_id'),
            'jurusan' => $request->input('jurusan'),
            'semester' => $request->input('semester'),
            'foto' => $fotoName,
        ]);

        return redirect()->to('/')->with('success', 'User berhasil ditambahkan');
    }

    public function edit($id)
    {
        $user = UserModel::findOrFail($id);
        $kelas = $this->kelasModel->all();
        $fakultas = $this->fakultasModel->all();

        $data = [
            'title' => 'Edit User',
            'user' => $user,
            'kelas' => $kelas,
            'fakultas' => $fakultas
        ];

        return view('edit_user', $data);
    }

    public function update(Request $request, $id)
    {
        $user = UserModel::findOrFail($id);

        // Validasi input termasuk fakultas_id, jurusan, dan semester
        $request->validate([
            'nama' => 'required|string|max:255',
            'kelas_id' => 'required|integer',
            'fakultas_id' => 'required|exists:fakultas,id',
            'jurusan' => 'required|in:fisika,kimia,biologi,matematika,ilmu komputer',
            'semester' => 'required|integer|min:1|max:14',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Update data user
        $user->nama = $request->input('nama');
        $user->kelas_id = $request->input('kelas_id');
        $user->fakultas_id = $request->input('fakultas_id');
        $user->jurusan = $request->input('jurusan');
        $user->semester = $request->input('semester');

        // Proses upload foto jika ada
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($user->foto) {
                Storage::delete('public/uploads/' . $user->foto);
            }

            // Simpan foto baru
            $foto = $request->file('foto');
            $newFilename = time() . '_' . $foto->getClientOriginalName();
            $foto->storeAs('public/uploads', $newFilename);

            // Update nama file foto
            $user->foto = $newFilename;
        }

        $user->save();

        return redirect()->route('user.list')->with('success', 'User Berhasil di Update');
    }

    public function destroy($id)
    {
        $user = UserModel::findOrFail($id);

        // Hapus foto dari storage
        if ($user->foto) {
            Storage::delete('public/uploads/' . $user->foto);
        }

        // Hapus user dari database
        $user->delete();

        return redirect()->to('/')->with('success', 'User Berhasil di Hapus');
    }

    public function show($id)
    {
        $user = UserModel::findOrFail($id);
        $kelas = Kelas::find($user->kelas_id);
        $fakultas = Fakultas::find($user->fakultas_id); // Mengambil fakultas sesuai dengan id

        return view('show_user', [
            'title' => 'Show User',
            'user' => $user,
            'nama_kelas' => $kelas ? $kelas->nama_kelas : null,
            'nama_fakultas' => $fakultas ? $fakultas->nama_fakultas : null, // Menampilkan nama fakultas
        ]);
    }
}
