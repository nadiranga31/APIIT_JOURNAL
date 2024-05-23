<x-app-layout>


   

    <div class="container mx-auto my-10">
        <div class="bg-white shadow rounded-lg p-6">
            <div class="flex items-center space-x-4">
                <img class="w-16 h-16 rounded-full" src="{{ $user->profile_photo_url }}" alt="User Image">
                <div>
                    <h2 class="text-2xl font-semibold">{{ $user->name }}</h2>
                    <p class="text-gray-600">{{ $user->email }}</p>
                </div>
            </div>
        </div>

        <div class="mt-10">
            <h3 class="text-xl font-semibold mb-4">Posts by {{ $user->name }}</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($posts as $post)
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <img class="w-full h-40 object-cover rounded-lg mb-4" src="{{ asset('images/' . $post->image) }}" alt="Post Image">
                        <h4 class="text-lg font-semibold mb-2">{{ $post->title }}</h4>
                        <p class="text-gray-600">{{ Str::limit($post->description, 100) }}</p>
                        <a href="{{ route('posts.show', $post->id) }}" class="text-blue-500 mt-4 inline-block">Read More</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>









</x-app-layout>



