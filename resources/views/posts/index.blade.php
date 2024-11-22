@extends('layouts.app')

@section('content')
<div class="bg-white py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <div class="mx-auto max-w-2xl text-center">
        <h2 class="text-balance text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">From the blog</h2>
      </div>
      <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
        @if ($posts->isEmpty())
          <p>No posts found.</p>
        @else
          @foreach ($posts as $post)
              <x-post :post="$post" />
          @endforeach
        @endif
      </div>
      <div class="mt-10">
        {{ $posts->links() }}
      </div>

      <section id="authors" class="mt-16">
        <h3 class="text-2xl font-semibold tracking-tight text-gray-900">Authors who have published posts</h3>
        @if($authors->isNotEmpty())
          <ul class="mt-4 space-y-2">
              @foreach ($authors as $user)
                  <li class="text-lg text-gray-700">{{ $user->name }}</li>
              @endforeach
          </ul>
        @else
          <p>No authors found.</p>
        @endif
    </section>
    </div>
  </div>

@endsection


