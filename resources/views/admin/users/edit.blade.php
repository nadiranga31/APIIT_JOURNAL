<!-- resources/views/admin/users/edit.blade.php -->

<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Edit User</h1>

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" class="mt-1 p-2 block w-full border rounded-md shadow-sm">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" class="mt-1 p-2 block w-full border rounded-md shadow-sm">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="mt-1 p-2 block w-full border rounded-md shadow-sm">
                <small class="text-gray-500">Leave blank to keep current password.</small>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update User</button>
        </form>
    </div>
</x-app-layout>
