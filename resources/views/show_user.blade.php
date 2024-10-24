<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil Pengguna</title>
  @vite('resources/css/app.css')
</head>

<body class="flex items-center justify-center h-screen bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-600">

  <div class="max-w-sm rounded-3xl overflow-hidden shadow-2xl bg-white p-8 transform hover:scale-105 transition-all duration-500 ease-in-out">
    <!-- Foto Profil Lingkaran -->
    <div class="relative flex justify-center mb-6">
      <div class="w-32 h-32 rounded-full overflow-hidden border-8 border-gradient-to-r from-pink-400 to-purple-500 shadow-lg">
        <img class="w-full h-full object-cover"
             src="{{ asset('storage/uploads/' . $user->foto) }}" alt="Foto Profil"> <!-- Menggunakan foto dari database -->
      </div>
    </div>

    <!-- Nama, Semester, Kelas, Fakultas, dan Jurusan -->
    <div class="text-center space-y-4">
      <h2 class="text-3xl font-bold text-gray-800 tracking-wide">{{ $user->nama }}</h2>

      <p class="text-gray-600 text-sm bg-purple-100 px-4 py-2 rounded-full inline-block shadow-sm">
        <span class="font-semibold">Semester:</span> {{ $user->semester }}
      </p>

      <p class="text-gray-600 text-sm bg-blue-100 px-4 py-2 rounded-full inline-block shadow-sm">
        <span class="font-semibold">Kelas:</span> {{ $nama_kelas ?? 'Kelas tidak ditemukan' }}
      </p>

      <p class="text-gray-600 text-sm bg-green-100 px-4 py-2 rounded-full inline-block shadow-sm">
        <span class="font-semibold">Fakultas:</span> {{ $nama_fakultas ?? 'Fakultas tidak ditemukan' }}
      </p>

      <p class="text-gray-600 text-sm bg-yellow-100 px-4 py-2 rounded-full inline-block shadow-sm">
        <span class="font-semibold">Jurusan:</span> {{ $user->jurusan }}
      </p>
    </div>

    <!-- Divider -->
    <div class="border-t-2 border-gray-100 mt-6"></div>

  </div>

</body>
</html>
