<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Transaksi
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow rounded">
                @if($errors->has('error'))
                    <div class="bg-red-200 text-red-800 p-3 rounded mb-4">
                        {{ $errors->first('error') }}
                    </div>
                @endif
                <form
                    method="POST"
                    action="{{ route('transactions.store') }}"
                >
                    @csrf
                    <div class="mb-4">
                        <label class="block mb-1">
                            Barang
                        </label>
                        <select
                            name="item_id"
                            class="w-full border-gray-300 rounded"
                        >
                            @foreach($items as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->nama }}
                                    (stok: {{ $item->stok }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1">
                            Tipe
                        </label>
                        <select
                            name="tipe"
                            class="w-full border-gray-300 rounded"
                        >
                            <option value="masuk">
                                Barang Masuk
                            </option>

                            <option value="keluar">
                                Barang Keluar
                            </option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1">
                            Qty
                        </label>
                        <input
                            type="number"
                            name="qty"
                            class="w-full border-gray-300 rounded"
                        >
                    </div>
                    <button class="bg-blue-600 text-white px-4 py-2 rounded">
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>