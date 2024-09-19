<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil Pengguna</title>
  @vite('resources/css/app.css')
</head>
<body class="flex items-center justify-center h-screen bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-600">

  <div class="max-w-sm rounded-xl overflow-hidden shadow-lg bg-white p-8 transform hover:scale-105 transition-all duration-300">
    <!-- Foto Profil Lingkaran -->
    <div class="flex justify-center mb-4">
      <img class="w-32 h-32 rounded-full border-4 border-gray-200 object-cover shadow-md"src="{{ asset('assets/img/jamet.jpg') }}" alt="Foto Profil">
    </div>
    
    <!-- Nama, Kelas, dan NPM -->
    <div class="text-center">
      <h2 class="text-2xl font-semibold text-gray-800">{{$nama}}</h2>
      <p class="text-gray-600 mt-2">{{$npm}}</p>
      <p class="text-gray-600 mt-1">{{$kelas}}</p>
    </div>

    <!-- Divider -->
    <div class="border-t-2 border-gray-100 mt-6"></div>

    <!-- Tombol Interaktif -->
    <div class="mt-6 flex justify-center space-x-4">
      <button class="px-4 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600 transition duration-200">Edit Profil</button>
      <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition duration-200">Log Out</button>
    </div>
  </div>

</body>
</html>