<!-- resources/views/form.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Data</title>
    @vite('resources/css/app.css') <!-- Tailwind CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet"> <!-- Google Font -->
    <style>
        body {
            font-family: 'Poppins', sans-serif; /* Set the default font */
        }
    </style>
</head>
@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-r from-teal-400 to-blue-500 min-h-screen flex items-center justify-center">
    <div class="bg-gray-100 p-8 rounded-lg shadow-md w-full max-w-lg transform transition duration-500 hover:scale-105">
        <h2 class="text-4xl font-bold bg-gradient-to-r from-indigo-500 to-pink-500 text-transparent bg-clip-text text-center mb-6"> <!-- Gradient text -->
            Input Data Mahasiswa
        </h2>
        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="nama" class="block text-gray-800 text-lg font-semibold mb-1">Nama:</label>
                <input type="text" id="nama" name="nama" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-400 transition duration-300 ease-in-out text-gray-800">
                @foreach ($errors->get('nama') as $msg)
                    <p class="text-red-600 text-sm">{{ $msg }}</p>
                @endforeach
            </div>
    
            <div class="mb-4">
                <label for="npm" class="block text-gray-800 text-lg font-semibold mb-1">NPM:</label>
                <input type="text" id="npm" name="npm" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-400 transition duration-300 ease-in-out text-gray-800">
                @foreach ($errors->get('npm') as $msg)
                    <p class="text-red-600 text-sm">{{ $msg }}</p>
                @endforeach
            </div>
    
            <div class="mb-4">
                <label for="kelas_id" class="block text-gray-800 text-lg font-semibold mb-1">Kelas:</label>
                <select name="kelas_id" id="kelas_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-400 transition duration-300 ease-in-out text-gray-800">
                    @foreach($kelas as $kelasItem)
                        <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="foto" class="block text-gray-800 text-lg font-semibold mb-1">Foto:</label>
                <input type="file" id="foto" name="foto" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-400 transition duration-300 ease-in-out text-gray-800">
                @foreach ($errors->get('foto') as $msg)
                    <p class="text-red-600 text-sm">{{ $msg }}</p>
                @endforeach
            </div>
    
            <button type="submit"
                    class="w-full bg-gradient-to-r from-teal-500 to-blue-500 text-white font-bold py-2 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
                Submit
            </button>
        </form>
    </div>
</div>
@endsection
