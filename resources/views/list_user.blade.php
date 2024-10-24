@extends('layouts.app')

@section('content')
@section('title', 'List User')

<div class="container mx-auto p-6">
    <h1 class="text-4xl font-extrabold mb-8 text-center bg-gradient-to-r from-teal-400 to-blue-500 bg-clip-text text-transparent">
        Daftar Pengguna
    </h1>
    
    <a href="{{ route('user.create') }}" class="inline-block bg-gradient-to-r from-green-500 to-lime-500 text-white font-bold py-3 px-6 rounded-lg shadow-md hover:shadow-lg mb-6 transition duration-300">
        Tambah Pengguna Baru
    </a>    
    
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
        <table class="min-w-full border border-gray-300 rounded-lg overflow-hidden">
            <thead class="bg-gradient-to-r from-teal-500 to-blue-500 text-white">
                <tr>
                    <th class="px-6 py-3 text-center text-sm font-semibold uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold uppercase tracking-wider">Kelas</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold uppercase tracking-wider">Fakultas</th> <!-- Kolom Fakultas -->
                    <th class="px-6 py-3 text-center text-sm font-semibold uppercase tracking-wider">Jurusan</th> <!-- Kolom Jurusan -->
                    <th class="px-6 py-3 text-center text-sm font-semibold uppercase tracking-wider">Semester</th> <!-- Kolom Semester -->
                    <th class="px-6 py-3 text-center text-sm font-semibold uppercase tracking-wider">Foto</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>            
            <tbody>
                @foreach ($users as $user)
                    <tr class="bg-white hover:bg-gray-100 transition-colors duration-300 rounded-lg shadow-sm hover:shadow-md">
                        <td class="px-6 py-4 border-b border-gray-200 text-center">{{ $user['id'] }}</td>
                        <td class="px-6 py-4 border-b border-gray-200 text-center">{{ $user['nama'] }}</td>
                        <td class="px-6 py-4 border-b border-gray-200 text-center">{{ $user['nama_kelas'] }}</td>
                        <td class="px-6 py-4 border-b border-gray-200 text-center">{{ $user['nama_fakultas'] }}</td> <!-- Menampilkan Fakultas -->
                        <td class="px-6 py-4 border-b border-gray-200 text-center">{{ $user['jurusan'] }}</td> <!-- Menampilkan Jurusan -->
                        <td class="px-6 py-4 border-b border-gray-200 text-center">{{ $user['semester'] }}</td> <!-- Menampilkan Semester -->
                        <td class="px-6 py-4 border-b border-gray-200 text-center flex justify-center">
                            @if($user->foto)
                                <!-- Menampilkan gambar dengan Storage::url() -->
                                <img src="{{ Storage::url('uploads/' . $user->foto) }}" alt="Foto {{ $user->nama }}" class="w-20 h-20 object-cover rounded-lg shadow-sm">
                            @else
                                <span class="text-gray-500 italic">Tidak ada foto</span>
                            @endif
                        </td>                        
                        <td class="px-6 py-4 border-b border-gray-200 text-center">
                            <div class="flex justify-center space-x-2">
                                <a href="{{ route('user.show', $user['id']) }}" class="inline-block bg-gradient-to-r from-blue-500 to-blue-700 text-white px-4 py-2 rounded-lg shadow hover:shadow-lg transition duration-300">
                                    View
                                </a>

                                <a href="{{ route('user.edit', $user['id']) }}" class="bg-gradient-to-r from-yellow-500 to-yellow-700 text-white px-4 py-2 rounded-lg shadow hover:shadow-lg transition duration-300">
                                    Edit
                                </a>

                                <form action="{{ route('user.destroy', $user['id']) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-gradient-to-r from-red-500 to-red-700 text-white px-4 py-2 rounded-lg shadow hover:shadow-lg transition duration-300" onclick="return confirm('Apakah anda yakin ingin menghapus user ini?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
