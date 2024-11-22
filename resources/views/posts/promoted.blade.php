@extends('layouts.app')

@section("content")

    <section id="promoted-posts" class="mt-16 bg-gray-50 py-12 px-6 rounded-lg shadow-md">
        <h3 class="text-3xl font-bold tracking-tight text-gray-900 text-center border-b pb-4 border-gray-300">
            Promoted Posts
        </h3>
        @if($promotedPosts->isNotEmpty())
            <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($promotedPosts as $post)
                    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition duration-200">
                        <a href="{{ route('posts', $post->slug) }}">
                            <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-48 object-cover rounded-md mb-4">
                        </a>
                        <h4 class="text-xl font-semibold text-gray-800">
                            <a href="{{ route('post', $post->slug) }}" class="hover:text-blue-500 transition">
                                {{ $post->title }}
                            </a>
                        </h4>
                        <p class="mt-2 text-gray-600 text-sm">
                            {{ Str::limit($post->excerpt, 100) }}
                        </p>
                        <p class="mt-4 text-sm text-gray-500">
                            Published on {{ $post->published_at->format('F j, Y') }}
                        </p>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center mt-6 text-gray-700 text-lg">No promoted posts available at the moment.</p>
        @endif
    </section>
@endsection



