<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data User
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-200 text-green-800 p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
              @if(session('error'))
                <div class="bg-red-200 text-red-800 p-4 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif
            <div class="mb-4">
                <a
                    href="{{ route('users.create') }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded"
                >
                    Tambah User
                </a>
            </div>
            <div class="bg-white shadow rounded overflow-hidden">
                <table class="w-full">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-4 text-left">Nama</th>
                            <th class="p-4 text-left">Username</th>
                            <th class="p-4 text-left">Role</th>
                            <th class="p-4 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr class="border-t">
                                <td class="p-4">
                                    {{ $user->name }}
                                </td>
                                <td class="p-4">
                                    {{ $user->username }}
                                </td>
                                <td class="p-4">
                                    {{ $user->role }}
                                </td>
                                <td class="p-4 flex gap-2">
                                    <a
                                        href="{{ route('users.edit', $user->id) }}"
                                        class="bg-yellow-400 px-3 py-1 rounded"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('users.destroy', $user->id) }}"
                                        method="POST"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            onclick="return confirm('Hapus user?')"
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
                                    Belum ada data user
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>