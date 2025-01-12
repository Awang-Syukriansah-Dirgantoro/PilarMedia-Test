<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{ __("You're logged in!") }} --}}
                    <div class="container">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h1>Approved Posts</h1>
                            @auth
                                <a href="{{ route('posts.create') }}" class="btn btn-success">Create Post</a>
                            @endauth
                        </div>
                    
                        @foreach ($posts as $post)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h2>Title: {{ $post->title }}</h2>
                                    <p>Content: {{ $post->content }}</p>
                                    <p>By: {{ $post->user->name }}</p>
                                    <a href="{{ route('posts.show', $post) }}" class="btn btn-primary">View Details</a>
                                    @if ($post->user_id === auth()->id())
                                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Edit</a>
                                    @endif
                                </div>
                                <div class="card-footer">
                                    <h4>Comments:</h4>
                                    @foreach ($post->comments as $comment)
                                        <p><strong>{{ $comment->user->name }}</strong>: {{ $comment->content }}</p>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>