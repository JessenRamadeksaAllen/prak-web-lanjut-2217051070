<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Mahasiswa</title>
    @vite('resources/css/app.css')
</head>
@extends('layouts.app')
@section('content')
<div class="bg-gradient-three-colors min-h-screen flex items-center justify-center">
    <div class="bg-white p-10 rounded-lg shadow-2xl w-full max-w-lg transform transition duration-500 hover:scale-105">
        <h2 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-pink-500 text-center mb-10">
            Input Data Mahasiswa
        </h2>
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="nama" class="block text-gray-700 text-lg font-semibold mb-2">Nama:</label>
                <input type="text" id="nama" name="nama" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-4 focus:ring-purple-300 focus:border-transparent transition duration-300 ease-in-out">
                @foreach ($errors -> get('nama') as $msg )
                    <p class="text-red-500">{{ $msg }}</p>
                @endforeach
            </div>
    
            <div class="mb-6">
                <label for="npm" class="block text-gray-700 text-lg font-semibold mb-2">NPM:</label>
                <input type="text" id="npm" name="npm" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-4 focus:ring-purple-300 focus:border-transparent transition duration-300 ease-in-out">
                @foreach ($errors -> get('npm') as $msg )
                    <p class="text-red-500">{{ $msg }} </p>
                @endforeach
            </div>
    
            <div class="mb-6">
                <label for="id_kelas" class="block text-gray-700 text-lg font-semibold mb-2">Kelas:</label>
                <select name="kelas_id" id="kelas_id" required>
                    @foreach($kelas as $kelasItem)
                    <option value="{{$kelasItem->id}}">{{$kelasItem->nama_kelas}}</option>
                    @endforeach
                </select>
            </div>
    
            <button type="submit"
                    class="w-full bg-gradient-to-r from-purple-500 to-pink-500 text-white font-bold py-3 rounded-lg shadow-lg hover:shadow-2xl hover:from-purple-600 hover:to-pink-600 transform hover:-translate-y-1 transition duration-500 ease-in-out">
                Submit
            </button>
        </form>
    </div>
</div>

@endsection