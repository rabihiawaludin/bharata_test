<div class="mb-4">
    <label class="block mb-1">
        Name
    </label>
    <input
        type="text"
        name="name"
        value="{{ old('name', $user->name ?? '') }}"
        class="w-full border-gray-300 rounded"
    >
</div>
<div class="mb-4">
    <label class="block mb-1">
        Username
    </label>
    <input
        type="text"
        name="username"
        value="{{ old('username', $user->username ?? '') }}"
        class="w-full border-gray-300 rounded"
    >
</div>

<div class="mb-4">
    <label class="block mb-1">
        Password
    </label>
    <input
        type="password"
        name="password"
        class="w-full border-gray-300 rounded"
    >
</div>

<div class="mb-4">
    <label class="block mb-1">
        Role
    </label>
    <select
        name="role"
        class="w-full border-gray-300 rounded"
    >
        <option value="admin">Admin</option>
        <option value="operator">Operator</option>
    </select>
</div>

<button class="bg-blue-600 text-white px-4 py-2 rounded">
    Simpan
</button>