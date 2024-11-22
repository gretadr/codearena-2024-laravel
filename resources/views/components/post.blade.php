<article class="flex flex-col items-start justify-between">
    <div class="relative w-full">
      <img src="{{ $post->image }}" alt="" class="aspect-video w-full rounded-2xl bg-gray-100 object-cover sm:aspect-[2/1] lg:aspect-[3/2]">
      <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
    </div>
    <div class="max-w-xl">
      <div class="mt-8 flex items-center gap-x-4 text-xs">
        <time datetime="2020-03-16" class="text-gray-500">{{ $post->created_at->format("d M Y") }}</time>
      </div>
      <div class="group relative">
        <h3 class="mt-3 text-lg/6 font-semibold text-gray-900 group-hover:text-gray-600">
          <a href="{{ route('post', $post) }}">
            <span class="absolute inset-0"></span>
            {{ $post->title }}
          </a>
        </h3>
        <p class="mt-5 line-clamp-3 text-sm/6 text-gray-600">{{ $post->excerpt }}</p>
      </div>
      <div class="relative mt-8 flex items-center gap-x-4">
        <div class="text-sm/6">
          <p class="font-semibold text-gray-900">
            <a href="#">
              <span class="absolute inset-0"></span>
              {{ $post->author->name }}
            </a>
          </p>
        </div>
      </div>
    </div>
    <section class="col-span-8 col-start-5 mt-10 space-y-6">
      {{-- @include ('add_comment_form') --}}

      {{-- @foreach ($post->comments as $comment)
          <x-post-comment :comment="$comment"/>
      @endforeach --}}
      @foreach ($post->comments as $comment)
        <div>
            <p>{{ $comment->body }}</p>
            <p>By {{ $comment->name }}</p>
            <!-- Add a form with the Delete button -->
            <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
      @endforeach
    </section>

</article>
