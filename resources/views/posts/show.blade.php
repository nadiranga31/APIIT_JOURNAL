<x-app-layout>

<style>
    .toggle-checkbox:checked {
    right: 0;
    border-color: #68D391;
}

.toggle-checkbox:checked + .toggle-label {
    background-color: #68D391;
}
</style>

<!-- stylesheet -->
<link
  rel="stylesheet"
  href="https://unpkg.com/@material-tailwind/html@latest/styles/material-tailwind.css"
/>

<!-- Ripple Effect from cdn -->
<script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>
    <article class="col-span-4 md:col-span-3 mt-10 mx-auto py-5 w-full" style="max-width:700px">
        <img class="w-full my-2 rounded-lg" src="{{ asset('images/' . $post->image) }}" alt="Image">
        <h1 class="text-4xl font-bold text-left text-gray-800">
            {{ $post->title }}
        </h1>
        <p>Posted by: {{ $userName }}</p>

        <!-- redirect to the user post page -->
        <button
            class="group relative h-auto w-auto overflow-hidden rounded-2xl bg-gradient-to-r from-yellow-700 to-yellow-200 text-lg font-bold text-gray-700 m-1">
            <a href="{{ route('posts.userall-posts', $post->user->id) }}" class="m-9">Other Posts By
                {{ $post->user->name }}</a>
        </button>



        <div class="mt-2 flex justify-between items-center">
            <div class="flex py-5 text-base items-center">

                <span class="text-gray-500 text-sm">{{ $post->getReadingTime() }} min read</span>
            </div>
            <div class="post">


                @auth



                    <button id="save-post-btn" data-post-id="{{ $post->id }}" data-ripple-dark="true" class="text-xs text-gray-700 middle none center rounded-lg py-3 px-6 font-sans  font-bold uppercase  transition-all hover:bg-pink-500/10 active:bg-pink-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">Save Post</button>
                    <button id="unsave-post-btn" data-post-id="{{ $post->id }}" style="display: none; " class="text-xs middle none center mr-3 rounded-lg bg-gradient-to-tr from-pink-600 to-pink-400 py-3 px-6 font-sans  font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ">Unsave
                        Post</button>


                @endauth
            </div>

            {{-- <div class="post">
                @auth
                    <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                        <input type="checkbox" name="toggle" id="toggle-{{ $post->id }}" data-post-id="{{ $post->id }}"
                               class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer" />
                        <label for="toggle-{{ $post->id }}"
                               class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                    </div>
                @endauth
            </div> --}}

            <div class="flex items-center">
                <span class="text-gray-500 mr-2">{{ $post->date }} days ago</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.3"
                    stroke="currentColor" class="w-5 h-5 text-gray-500">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>

        <div
            class="article-actions-bar my-6 flex text-sm items-center justify-between border-t border-b border-gray-100 py-4 px-2">
            <div class="flex items-center">
                <livewire:like-button :key="$post->id" :$post />
            </div>
            <div>
                <div class="flex items-center">


                </div>
            </div>
        </div>

        <div class="article-content py-3 text-gray-800 text-lg text-justify">
            {{ $post->description }}
        </div>

        <div class="flex items-center space-x-4 mt-10">
            <a href="#" class="bg-blue-400 text-white rounded-xl px-3 py-1 text-base">
                {{ $post->slug }}</a>

        </div>



        <div class="mt-10 comments-box border-t border-gray-100 pt-10">
            <h2 class="text-2xl font-semibold text-gray-900 mb-5">Discussions</h2>

            @auth
                <form action="{{ route('comments.store', $post) }}" method="POST">
                    @csrf
                    <textarea name="content"
                        class="w-full rounded-lg p-4 bg-gray-50 focus:outline-none text-sm text-gray-700 border-gray-200 placeholder:text-gray-400"
                        cols="30" rows="7" required></textarea>
                    <button
                        class="mt-3 inline-flex items-center justify-center h-10 px-4 font-medium tracking-wide text-gray transition duration-200 bg-gray-300 rounded-lg hover:bg-gray-800 focus:shadow-outline focus:outline-none">
                        Post Comment
                    </button>
                </form>
            @else
                <p class="text-yellow-900">Login to post a comment.</p>
            @endauth

            <div class="user-comments px-3 py-2 mt-5">
                @forelse ($post->comments as $comment)
                    <div class="comment [&:not(:last-child)]:border-b border-gray-100 py-5">
                        <div class="user-meta flex mb-4 text-sm items-center">
                            <img class="w-7 h-7 rounded-full mr-3" src="{{ $comment->user->profile_photo_url }}"
                                alt="{{ $comment->user->name }}">
                            <span class="mr-1">{{ $comment->user->name }}</span>
                            <span class="text-gray-500">. {{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="text-justify text-gray-700 text-sm">
                            {{ $comment->content }}
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-center">No comments yet.</p>
                @endforelse
            </div>
        </div>

    </article>

    <script>
        document.getElementById('save-post-btn').addEventListener('click', function() {
            let postId = this.getAttribute('data-post-id');

            fetch(`/posts/${postId}/save`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }).then(response => response.json()).then(data => {
                if (data.status === 'Post saved') {
                    document.getElementById('save-post-btn').style.display = 'none';
                    document.getElementById('unsave-post-btn').style.display = 'block';
                }
            });
        });

        document.getElementById('unsave-post-btn').addEventListener('click', function() {
            let postId = this.getAttribute('data-post-id');

            fetch(`/posts/${postId}/unsave`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }).then(response => response.json()).then(data => {
                if (data.status === 'Post unsaved') {
                    document.getElementById('unsave-post-btn').style.display = 'none';
                    document.getElementById('save-post-btn').style.display = 'block';
                }
            });
        });
    </script>



</x-app-layout>
