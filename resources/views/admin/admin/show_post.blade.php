@extends('admin.layouts.app')

@section('style')
@endsection

@section('content')
<div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All Post </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">All Post </li>
            </ol>
          </div>
        </div>
      </div>
    </div>


    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">


            <!-- /.card -->
            <body class="flex items-center justify-center">
                <div class="container">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="table table-hover bg-white rounded-lg shadow-lg my-5">
                        <thead class="thead-light">
                            <tr class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                                <th class="p-3 text-left border">#</th>
                                <th class="p-3 text-left border"> Post by</th>
                                <th class="p-3 text-left border"> Title</th>
                                <th class="p-3 text-left border" width="110px">Image</th>
                                <th class="p-3 text-left border">Description</th>
                                <th class="p-3 text-left border">User Type</th>
                                <th class="p-3 text-left border" width="110px">Actions</th>
                                <th class="p-3 text-left border">Post Status</th>
                                <th class="p-3 text-left border">Status Accept</th>

                                <th class="p-3 text-left border">Status Reject</th>





                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($posts as $post)
                            <tr>
                                <th class="border" scope="row">{{ $post->id }}</th>
                                <th  class="border" scope="row">{{ $post->name }}</th>
                                <td class="border">{{ $post->title }}</td>
                                <td><img src="{{ asset('images/' . $post->image) }}" alt="Image" class="img-thumbnail border" style="width: 90px; height: auto;"></td>
                                <td class="border"  style="max-width: 3000px;">{{ $post->description }}</td> <!-- Adjust max-width as needed -->
                                <td style="max-width: 300px;">{{ $post->usertype  }}</td> <!-- Adjust max-width as needed -->
                                 <td class="border-grey-light border hover:bg-gray-100 p-3 text-red-400 hover:text-red-600 hover:font-medium cursor-pointer">

                                    <button class="bg-red-600 text-white uppercase rounded" type="button">
                                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    </button>

                                    <button class="bg-green-500 text-white uppercase  rounded" type="button">
                                        <a href="{{ route('posts.delete', $post->id) }}" class="btn btn-sm btn-danger" onclick="confirmation(event)">Delete</a>
                                    </button>


                                </td>
                                <td  class="border" style="max-width: 300px;">{{ $post->post_status  }}</td> <!-- Adjust max-width as needed -->
                                <td class="border">
                                    <a href="{{ url('accept_post',$post->id) }}" class="btn btn-outline-secondary" onclick=" return confirm('Are you sure to accept this post?')">Accept</a>
                                </td>
                                <td class="border">
                                    <a href="{{ url('reject_post',$post->id) }}"  class="btn btn-primary " onclick=" return confirm('Are you sure to reject this post?')" >Reject</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </body>





            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->

          <!-- /.col-md-6 -->

        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>

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

  @endsection


@section('script')
<script src="{{ asset('assets/dist/js/pages/dashboard3.js') }}"></script>
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
@endsection




