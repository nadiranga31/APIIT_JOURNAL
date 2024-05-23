<x-app-layout>
    <div class="w-full grid grid-cols-4 gap-10">
        <div class="md:col-span-3 col-span-4">
            <livewire:post-list />
        </div>
        <div id="side-bar"
            class="border-t border-t-gray-100 md:border-t-none col-span-4 md:col-span-1 px-3 md:px-6  space-y-10 py-6 pt-10 md:border-l border-gray-100 h-screen sticky top-0">
            @include('posts.partials.search-box')

            <form action=" {{ url('/search') }}" method="get">
                <div class='flex items-center justify-center'>
                    <div class="flex rounded-full bg-[#0d1829] px-2 w-full max-w-[600px]">



                      <input name="search"
                        type="text"
                        class=" ml-9 w-full bg-[#0d1829] flex bg-transparent pl-2 text-[#cccccc] outline-0"
                        placeholder="Search Interesting Topics "
                      />
                      <button type="submit" name="" value="Search" class="relative p-2 bg-[#0d1829] rounded-full">
                        <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

              <g id="SVGRepo_bgCarrier" stroke-width="0"/>

              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>

              <g id="SVGRepo_iconCarrier"> <path d="M14.9536 14.9458L21 21M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="#999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/> </g>

              </svg>
                      </button>

                    </div>
              </div>
            </form>

            <div id="recommended-topics-box">
                <h3 class="text-lg font-semibold text-gray-900 mb-3">Recommended Topics</h3>
                <div class="topics flex flex-wrap justify-start">
                    <a href="#"
                        class="bg-red-400
                                    text-white
                                    rounded-xl px-2 py-1 text-base">
                        Tailwind</a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>










