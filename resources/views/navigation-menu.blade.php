<nav class="flex items-center justify-between py-3 px-6 border-b border-gray-100">
    <div id="nav-left" class="flex items-center">
        <a href="{{ route('home') }}">
            <x-application-mark/>
        </a>
        <div class="top-menu ml-10">
            <div class="flex space-x-4">


                {{-- <x-nav-link  href="{{ route('home') }}" :active="request()->routeIs('home')">
                    {{ __('Home') }}
                </x-nav-link> --}}
                <a class=" text-m w-auto hover:text-red-500  " href={{ route('home')}}>Home</a>


                {{-- <x-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')">
                    {{ __('Blog') }}
                </x-nav-link> --}}

                @if (Route::has('login'))

                @auth




                 <a class=" text-m w-auto hover:text-red-500  " href={{ route('saved-posts.index')}}>Saved Post</a>



                <a class="nav-link space-x-2 items-center hover:text-yellow-900 text-sm text-yellow-500" href={{ route('dashboard')}}> Create Post</a>



                <a class="nav-link space-x-2 items-center hover:text-yellow-900 text-sm text-yellow-500" href={{route('posts.all') }}> My Post</a>

                @else

                @endauth
                @endif



            </div>
        </div>
    </div>
    <div id="nav-right" class="flex items-center md:space-x-6">
       @auth
       @include('layouts.partials.header-right-auth')



       @else

       @include('layouts.partials.header-right-guest')

        @endauth
    </div>

</nav>


