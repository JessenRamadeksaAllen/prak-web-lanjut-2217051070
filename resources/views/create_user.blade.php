<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Mahasiswa</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Form Input Mahasiswa</h2>

            <form action="{{ route('user.store') }}" method="POST">
                @csrf
                <!-- Input Nama -->
                <div class="mb-4">
                    <label for="nama" class="block text-gray-700 font-semibold mb-2">Nama:</label>
                    <input type="text" id="nama" name="nama" placeholder="Masukkan Nama" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                </div>

                <!-- Input NPM -->
                <div class="mb-4">
                    <label for="npm" class="block text-gray-700 font-semibold mb-2">NPM:</label>
                    <input type="text" id="npm" name="npm" placeholder="Masukkan NPM" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                </div>

                <!-- Input Kelas -->
                <div class="mb-4">
                    <label for="kelas" class="block text-gray-700 font-semibold mb-2">Kelas:</label>
                    <input type="text" id="kelas" name="kelas" placeholder="Masukkan Kelas" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 rounded-lg transition duration-300">Submit</button>
            </form>
        </div>
    </div>

</body>
</html>
