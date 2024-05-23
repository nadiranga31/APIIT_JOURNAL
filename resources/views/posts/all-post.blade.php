<x-app-layout>
    <body class="flex items-center justify-center">
        <div class="container">


            @if (session('status'))
            <div class="alert alert-success bg-yellow-200 text-yellow-900 border-l-4 border-yellow-600 p-4 rounded shadow mb-6" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <table class="table table-hover bg-white rounded-lg shadow-lg my-5">
                <thead class="thead-light">
                    <tr class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                        <th class="p-3 text-left">#</th>
                        <th class="p-3 text-left"> Title</th>
                        <th class="p-3 text-left" width="110px">Image</th>
                        <th class="p-3 text-left">Description</th>
                        <th class="p-3 text-left" width="110px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <th scope="row" class="border">{{ $post->id }}</th>
                        <td class="border">{{ $post->title }}</td>
                        <td><img src="{{ asset('images/' . $post->image) }}" alt="Image" class="img-thumbnail border" style="width: 90px; height: auto;"></td>
                        <td  class="border" >{{ $post->description }}</td> <!-- Adjust max-width as needed -->
                        <td class=" border hover:bg-gray-100 p-3 text-red-400 hover:text-red-600 hover:font-medium cursor-pointer">
                            <button class="bg-blue-500 text-white uppercase px-3 py-1 rounded m-5" type="button">
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary m-3 ">Edit</a>
                            </button>

                            <button class="bg-red-500 text-white uppercase px-3 py-1 rounded m-5" type="button">
                                <a href="{{ route('posts.delete', $post->id) }}" class="btn btn-outline-secondary "   onclick="confirmation(event)" >Delete</a>
                            </button>
                            {{-- onclick="return confirm('Are You sure to Delete this?')" --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
    <style>
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }

        .table th, .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .table-hover tbody tr:hover {
            color: #212529;
            background-color: #f8f9fa;
        }

        .btn-sm {



            font-size: 0.875rem;

            border-radius: 0.2rem;
        }

        img.img-thumbnail {
            width: auto;
            max-height: 60px; /* maintain aspect ratio */
        }

        @media (max-width: 768px) {
            .table-responsive-sm {
                display: block;
                width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }
        }
    </style>

</x-app-layout>
