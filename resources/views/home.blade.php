<x-app-layout>
    @section('hero')
        <div class="w-full text-center py-32">
            <form action="{{ url('/search') }}" method="get">
                <div class='flex items-center justify-center'>
                    <div class="flex rounded-full  px-2 w-full max-w-[600px]">
                        <input name="search"
                            type="text"
                            class="ml-9 w-full  flex bg-transparent pl-2 text-[#cccccc] "
                            placeholder="Search Interesting Topics"
                            value="{{ request('search') }}" />
                        <button type="submit" class="relative p-2 bg-[#0d1829] rounded-full">
                            <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M14.9536 14.9458L21 21M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="#999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                            </svg>
                        </button>
                    </div>

                </div>
            </form>
<br><br>
            <h1 class="text-2xl md:text-3xl font-bold text-center lg:text-5xl text-dark">
                Welcome to <span class="text-red-500">APIIT</span> <span class="text-dark-900"> JOURNAL</span>
            </h1>
            <br>
            <p class="text-dark text-lg mt-1">"While enjoying a great learning experience you will have enjoyable university life at APIIT. University offers many opportunities to enjoy yourself and to meet local and foreign Students."</p>
            {{-- <a class="px-3 py-2 text-lg text-white bg-gray-800 rounded mt-5 inline-block" href="http://127.0.0.1:8000/blog">Start Reading</a> --}}
        </div>
    @endsection

    <div class="mb-10 w-full">
        <div class="mb-16">
            <h2 class="mt-16 mb-5 text-3xl text-green-600 font-bold">Featured Posts</h2>
            <div class="w-full">
                <div class="grid grid-cols-3 gap-10 w-full">

                    @foreach ($posts as $post)
                        <div class="md:col-span-1 col-span-3">
                            <x-posts.post-card :post="$post" />
                        </div>
                    @endforeach
                </div>
            </div>
            <a class="mt-10 block text-center text-lg text-red-500 font-semibold" href="http://127.0.0.1:8000/blog">More Posts</a>
        </div>
    </div>
</x-app-layout>
