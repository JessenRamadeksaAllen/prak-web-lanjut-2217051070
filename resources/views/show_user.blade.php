@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gradient-to-r from-blue-400 to-purple-500">
    <div class="text-center bg-white p-10 rounded-3xl shadow-lg transform transition duration-500 hover:scale-105 hover:shadow-2xl w-full max-w-lg">
        <!-- Logo Profile -->
        @php
            $defaultFoto = 'path/to/default-foto.jpg'; // Path ke foto default jika tidak ada foto user
            $userFoto = $user->foto ? Storage::url('uploads/' . $user->foto) : asset($defaultFoto);
        @endphp

        <img src="{{ $userFoto }}" alt="Profile Logo" class="mx-auto mb-6 rounded-full w-40 h-40 object-cover ring-4 ring-blue-500 shadow-lg transition duration-300 transform hover:scale-105">

        <!-- Tabel Data -->
        <div class="space-y-4">
            <div class="flex items-center justify-center bg-gradient-to-r from-blue-600 to-blue-700 p-4 rounded-lg shadow-md hover:from-blue-700 hover:to-blue-800 transition duration-300 transform hover:scale-105">
                <span class="text-white text-xl font-semibold">{{ $user->nama }}</span>
            </div>

            <div class="flex items-center justify-center bg-gradient-to-r from-teal-500 to-teal-600 p-4 rounded-lg shadow-md hover:from-teal-600 hover:to-teal-700 transition duration-300 transform hover:scale-105">
                <span class="text-white text-xl font-semibold">{{ $user->npm }}</span>
            </div>

            <div class="flex items-center justify-center bg-gradient-to-r from-indigo-500 to-indigo-600 p-4 rounded-lg shadow-md hover:from-indigo-600 hover:to-indigo-700 transition duration-300 transform hover:scale-105">
                <span class="text-white text-xl font-semibold">{{ $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan' }}</span>
            </div>
        </div>

        <div class="mt-8">
            <a href="{{ route('user.list') }}" class="px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-500 text-white text-lg font-bold rounded-full shadow-lg hover:from-purple-700 hover:to-pink-600 transition duration-300 transform hover:scale-110">
                Kembali ke Daftar
            </a>
        </div>
    </div>
</div>
@endsection
