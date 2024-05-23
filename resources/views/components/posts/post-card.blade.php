@props(['post'])
<style>
    .truncate-description {
        display: -webkit-box;
        -webkit-line-clamp: 3; /* Number of lines to show */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    </style>

<div>



            <div>
                {{-- <img class="w-full rounded-xl" src="{{assets('storage/profile-photos/'.user()->name) }}"> --}}

                <img class="w-full rounded-xl"
                        src="{{asset('images/'.$post->image)  }}"
                        alt="Image">
            </div>

        <div class="mt-3">
            <div class="flex items-center justify-between">
            <h3 class="mb-0 mt-2">
                <a class="text-xl font-bold text-gray-900" href="#">{{ $post->title }}</a>
              </h3>

                <livewire:like-button :key="'like-' . $post->id" :$post />
            </div>

              <div class="text-sm text-gray-500">{{ $post->date }}</div>
              <div class="text-sm text-gray-500">{{ $post->name }}</div>


              <div class="flex items-center mb-2">
                <p class="card-text mb-auto truncate-description">{{ $post->description }}</p>
            </div>



           


            <button >
            <a href="{{ route('posts.show',$post->id) }}" class="inline-block text-white font-bold py-2 px-4 rounded-full bg-gradient-to-r from-pink-500 to-purple-800 border border-transparent transform hover:scale-110 hover:border-white transition-transform duration-3000 ease-in-out">Continue reading</a>    </div>
        </button>
    </div>

