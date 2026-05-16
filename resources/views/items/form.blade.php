<div class="mb-4">
    <label class="block mb-1">
        Nama Barang
    </label>
    <input
        type="text"
        name="nama"
        value="{{ old('nama', $item->nama ?? '') }}"
        class="w-full border-gray-300 rounded"
    >
</div>

<div class="mb-4">
    <label class="block mb-1">
        Kode Barang
    </label>
    <input
        type="text"
        name="kode"
        value="{{ old('kode', $item->kode ?? '') }}"
        class="w-full border-gray-300 rounded"
    >
</div>

<div class="mb-4">

    <label class="block mb-1">
        Stok
    </label>
    <input
        type="number"
        name="stok"
        value="{{ old('stok', $item->stok ?? 0) }}"
        class="w-full border-gray-300 rounded"
    >

</div>

<div class="mb-4">
    <label class="block mb-1">
        Lokasi Rak
    </label>
    <input
        type="text"
        name="lokasi_rak"
        value="{{ old('lokasi_rak', $item->lokasi_rak ?? '') }}"
        class="w-full border-gray-300 rounded"
    >
</div>

<button class="bg-blue-500 text-white px-4 py-2 rounded">
    Simpan
</button>