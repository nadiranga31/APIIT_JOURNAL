<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>APIIT JOURNAL</title>

        <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased {{ session('theme', 'light') }}">
        <nav >



                <button id="theme-toggle"
                class=" w-20 h-10 rounded-full bg-white-500 flex items-center transition duration-300 focus:outline-none shadow p-4 m-3"
                onclick="toggleTheme()">
                <div
                    id="switch-toggle"
                    class="w-8 h-8 relative rounded-full transition duration-500 transform bg-yellow-500 -translate-x-2 p-1 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
            </button>

        </nav>
        <x-banner />


        @include('layouts.partials.header')


        @yield('hero')

            <main class="container mx-auto px-5 flex flex-grow">
                    {{ $slot }}
            </main>

            @include('layouts.partials.footer')


        @stack('modals')

        @livewireScripts

        <script src="{{ asset('js/app.js') }}"></script>
    <script>
        document.getElementById('theme-toggle').addEventListener('click', function () {
            let currentTheme = document.body.classList.contains('dark') ? 'dark' : 'light';
            let newTheme = currentTheme === 'dark' ? 'light' : 'dark';

            document.body.classList.remove(currentTheme);
            document.body.classList.add(newTheme);

            fetch('/toggle-theme', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ theme: newTheme })
            });
        });
    </script>

        <script type="text/javascript">

            function confirmation(ev)

            {
                ev.preventDefault();

                var urlToRedirect=ev.currentTarget.getAttribute('href');

                console.log(urlToRedirect)
                swal(
                    {
                        title:"Are you Sure to Delete this ?",

                        text:"You won't be able to revert this dalete",

                        icon:"warning",

                        buttons : true,

                        dangerMode : true,
                    }
                )

                .then((willCancel)=>{
                    if(willCancel)
                    {
                        window.location.href=urlToRedirect;
                    }
                });
            }

            </script>



<script>
    const switchToggle = document.querySelector('#switch-toggle');
    let isDarkmode = false

    const darkIcon = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
    </svg>`

    const lightIcon = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
    </svg>`

    function toggleTheme (){
      isDarkmode = !isDarkmode
      localStorage.setItem('isDarkmode', isDarkmode)
      switchTheme()
    }

    function switchTheme (){
      if (isDarkmode) {
        switchToggle.classList.remove('bg-yellow-500','-translate-x-2')
        switchToggle.classList.add('bg-gray-700','translate-x-full')
        setTimeout(() => {
          switchToggle.innerHTML = darkIcon
        }, 250);
      } else {
        switchToggle.classList.add('bg-yellow-500','-translate-x-2')
        switchToggle.classList.remove('bg-gray-700','translate-x-full')
        setTimeout(() => {
          switchToggle.innerHTML = lightIcon
        }, 250);
      }
    }

    switchTheme()
    </script>

    </body>
</html>

