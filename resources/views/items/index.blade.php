<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Barang
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-200 text-green-800 p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
            <div class="mb-4">
                <a
                    href="{{ route('items.create') }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded"
                >
                    Tambah Barang
                </a>
            </div>
            <div class="bg-white shadow rounded overflow-hidden">
                <table class="w-full">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-4 text-left">Nama</th>
                            <th class="p-4 text-left">Kode</th>
                            <th class="p-4 text-left">Stok</th>
                            <th class="p-4 text-left">Lokasi Rak</th>
                            <th class="p-4 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($items as $item)
                            <tr class="border-t">
                                <td class="p-4">
                                    {{ $item->nama }}
                                </td>
                                <td class="p-4">
                                    {{ $item->kode }}
                                </td>
                                <td class="p-4">
                                    <span
                                        id="stock-{{ $item->id }}"
                                        class="
                                            px-2 py-1 rounded
                                            {{ $item->stok < 10
                                                ? 'bg-red-200 text-red-800'
                                                : 'bg-green-200 text-green-800'
                                            }}
                                        "
                                    >
                                        {{ $item->stok }}
                                    </span>

                                </td>
                                <td class="p-4">
                                    {{ $item->lokasi_rak }}
                                </td>
                                <td class="p-4 flex gap-2">
                                    <a
                                        href="{{ route('items.edit', $item->id) }}"
                                        class="bg-yellow-400 px-3 py-1 rounded"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('items.destroy', $item->id) }}"
                                        method="POST"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            onclick="return confirm('Hapus barang?')"
                                            class="bg-red-500 text-white px-3 py-1 rounded"
                                        >
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-4 text-center">
                                    Belum ada data barang
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            window.Echo
                .channel('stocks')
                .listen('.StockUpdated', (e) => {
                    
                    const item = e.item;
                    const stockElement = document.getElementById(`stock-${item.id}`);

                    if (!stockElement) return;

                    //angka
                    stockElement.innerText = item.stok;

                    //warna
                    stockElement.classList.remove(
                        'bg-red-200',
                        'text-red-800',
                        'bg-green-200',
                        'text-green-800'
                    );

                    //logika warna
                    if (item.stok < 10) {
                        stockElement.classList.add(
                            'bg-red-200',
                            'text-red-800'
                        );
                    } else {
                        stockElement.classList.add(
                            'bg-green-200',
                            'text-green-800'
                        );
                    }

                    //efek highlight
                    stockElement.classList.add('ring-4');
                    setTimeout(() => {
                        stockElement.classList.remove('ring-4');
                    }, 500);

                });

        });
    </script>
    
</x-app-layout>