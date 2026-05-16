<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Transaksi
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
                    href="{{ route('transactions.create') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded"
                >
                    Tambah Transaksi
                </a>
            </div>
            <div class="bg-white shadow rounded overflow-hidden">
                <table class="w-full">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-4 text-left">
                                Tanggal
                            </th>
                            <th class="p-4 text-left">
                                Barang
                            </th>
                            <th class="p-4 text-left">
                                Tipe
                            </th>
                            <th class="p-4 text-left">
                                Qty
                            </th>
                            <th class="p-4 text-left">
                                User
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transactions as $transaction)
                            <tr class="border-t">
                                <td class="p-4">
                                    {{ $transaction->tanggal }}
                                </td>
                                <td class="p-4">
                                    {{ $transaction->item->nama }}
                                </td>
                                <td class="p-4">
                                    @if($transaction->tipe === 'masuk')
                                        <span class="bg-green-200 text-green-800 px-2 py-1 rounded">
                                            Masuk
                                        </span>
                                    @else
                                        <span class="bg-red-200 text-red-800 px-2 py-1 rounded">
                                            Keluar
                                        </span>
                                    @endif
                                </td>
                                <td class="p-4">
                                    {{ $transaction->qty }}
                                </td>
                                <td class="p-4">
                                    {{ $transaction->user->name }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-4 text-center">
                                    Belum ada transaksi
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>