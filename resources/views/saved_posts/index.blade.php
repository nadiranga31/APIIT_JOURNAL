<x-app-layout>

    <div class="saved-posts   ">
        <div class=" w-full  rounded-lg p-6 ">
            <div class="flex flex-col gap-8 ">
                <h1 class=" font-sans text-4xl font-semibold   ">
                    Saved Posts</h1>
            </div>
        </div>
     <div class=" flex ">
        @foreach ($savedPosts as $post)
            <div class="bg-white p-6 rounded-lg shadow-md m-10">
                <div class="flex items-center mb-0 mt-2">
                    <p class="mr-2">{{ $loop->iteration }}).</p>

                    <h3 class="mr-2">
                        <a class="text-xl font-bold text-black-900" href="{{ route('posts.show', $post->id) }}">
                            {{ $post->title }}
                        </a>
                    </h3>
                    <div class="text-sm text-gray-500"> Blogger: {{ $post->name }}</div>
                </div>
                <img class="w-full h-40 object-cover rounded-lg mb-4" src="{{ asset('images/' . $post->image) }}"
                    alt="Post Image">
                <a href="{{ route('posts.show', $post->id) }}" class="text-blue-500 mt-4 inline-block">Read More</a>
            </div>
        @endforeach
     </div>



</x-app-layout>
