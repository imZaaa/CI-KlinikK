<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Penyakit</title>
    <!-- Optional: Include Bootstrap CSS or Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/logo.png')?>">

</head>
<body class="bg-gray-50">

    <div class="container mx-auto mt-10 p-6 bg-white rounded-lg shadow-lg max-w-lg">
        <h3 class="text-2xl font-semibold text-center text-[#00705a] mb-6">Edit Penyakit</h3>

        <!-- Form Edit -->
        <form action="<?= site_url('penyakit/edit/' . $penyakit->id); ?>" method="post">
            <div class="mb-4">
                <label for="nama_penyakit" class="block text-lg font-medium text-[#00705a]">Nama Penyakit</label>
                <input type="text" id="nama_penyakit" name="nama_penyakit" class="mt-2 p-3 w-full border-2 border-[#00705a] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#00705a]" 
                       value="<?= $penyakit->nama_penyakit ?>" required>
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block text-lg font-medium text-[#00705a]">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" class="mt-2 p-3 w-full border-2 border-[#00705a] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#00705a]" required><?= $penyakit->deskripsi ?></textarea>
            </div>

            <div class="mb-4">
                <label for="penyebab" class="block text-lg font-medium text-[#00705a]">Penyebab</label>
                <input type="text" id="penyebab" name="penyebab" class="mt-2 p-3 w-full border-2 border-[#00705a] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#00705a]" 
                       value="<?= $penyakit->penyebab ?>" required>
            </div>

            <div class="mb-4">
                <label for="gejala" class="block text-lg font-medium text-[#00705a]">Gejala</label>
                <input type="text" id="gejala" name="gejala" class="mt-2 p-3 w-full border-2 border-[#00705a] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#00705a]" 
                       value="<?= $penyakit->gejala ?>" required>
            </div>

            <div class="mb-4">
                <label for="ciri_ciri" class="block text-lg font-medium text-[#00705a]">Ciri-ciri</label>
                <input type="text" id="ciri_ciri" name="ciri_ciri" class="mt-2 p-3 w-full border-2 border-[#00705a] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#00705a]" 
                       value="<?= $penyakit->ciri_ciri ?>" required>
            </div>

            <div class="mb-4">
                <label for="pengobatan" class="block text-lg font-medium text-[#00705a]">Pengobatan</label>
                <input type="text" id="pengobatan" name="pengobatan" class="mt-2 p-3 w-full border-2 border-[#00705a] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#00705a]" 
                       value="<?= $penyakit->pengobatan ?>" required>
            </div>

            <div class="mb-4">
                <label for="kategori" class="block text-lg font-medium text-[#00705a]">Kategori</label>
                <input type="text" id="kategori" name="kategori" class="mt-2 p-3 w-full border-2 border-[#00705a] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#00705a]" 
                       value="<?= $penyakit->kategori ?>" required>
            </div>

            <div class="flex justify-between mt-6">
                <button type="submit" class="bg-[#00705a] text-black py-2 px-6 rounded-lg shadow-md hover:bg-[#005a43] focus:outline-none transition-all">
                    Update
                </button>
                <a href="<?= site_url('penyakit'); ?>" class="bg-gray-300 text-[#00705a] py-2 px-6 rounded-lg shadow-md hover:bg-gray-400 focus:outline-none transition-all">
                    Kembali
                </a>
            </div>
        </form>
    </div>

</body>
</html>
