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
                    <div class="container">
                        <h1>{{ $post->title }}</h1>
                        <p>{{ $post->content }}</p>
                        <p>By: {{ $post->user->name }}</p>

                        <hr>
                        <h2>Comments</h2>
                        @foreach ($comments as $comment)
                            <div class="mb-3">
                                <strong>{{ $comment->user->name }}</strong>: {{ $comment->content }}
                            </div>
                        @endforeach

                        <form action="{{ route('comments.store', $post) }}" method="POST">
                            @csrf
                            <textarea name="content" class="form-control" rows="3" required></textarea>
                            <button type="submit" class="btn btn-primary mt-3">Add Comment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
