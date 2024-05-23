<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>



    <div class="max-w-lg lg:ms-auto mx-auto text-center ">
        <div class="py-16 px-7 rounded-md bg-white">
            <div class="card-header">{{ __('Update Post') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="post" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="grid md:grid-cols-2 grid-cols-1 gap-6">
                        <div class="md:col-span-2">
                            <label for="subject" class="float-left block  font-normal text-gray-400 text-lg">Post Title
                                :</label>
                            <input type="text" name="title"
                                class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-700 "
                                placeholder="Enter post title" required value=" {{ $post -> title}}">
                        </div>

                        <div class="md:col-span-2">
                            <label for="subject" class="float-left block  font-normal text-gray-400 text-lg">Post
                                Description:</label>
                            <textarea cols="" name="description" placeholder="Enter post description"
                                class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-700" rows="10"
                                required >{{ $post->description }}</textarea>

                        </div>

                        <div class="md:col-span-2">
                            <label for="subject" class="float-left block  font-normal text-gray-400 text-lg">Key words
                                :</label>
                            <input type="text" name="slug"
                                class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-700 "
                                placeholder="Enter Key words"required value=" {{ $post->slug}}">
                        </div>

                        <div>
                            <label >Old Image</label>
                            <img style="margin:auto" height="250px" width="250px" src="{{asset('images/'.$post->image)  }}" >
                        </div>
                        <div class="md:col-span-2">
                            <label for="subject" class="float-left block  font-normal text-gray-400 text-lg">Update Old Image
                                :</label>

                            <input type="file" name="image" placeholder="Charger votre fichier"
                                class="peer block w-full appearance-none border-none   bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0">

                        </div>

                        <div class="md:col-span-2">

                            <label class=" font-normal text-gray-400 text-lg">Created On: </label>
                            <input type="date" name="date" value=" {{ $post -> date}}">
                        </div>


                        <div class="md:col-span-2">
                            <button type="submit"
                                class="py-3 text-base font-medium rounded text-white bg-blue-800 w-full hover:bg-blue-700 transition duration-300">UPDATE</button>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    </div>
</x-app-layout>
