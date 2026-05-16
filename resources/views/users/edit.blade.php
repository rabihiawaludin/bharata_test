<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit User
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow rounded">
                <form
                    method="POST"
                    action="{{ route('users.update', $user->id) }}"
                >
                    @csrf
                    @method('PUT')
                    @include('users.form')
                </form>
            </div>
        </div>
    </div>
</x-app-layout>