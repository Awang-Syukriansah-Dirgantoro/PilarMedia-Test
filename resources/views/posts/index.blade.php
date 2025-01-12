<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{ __("You're logged in!") }} --}}
                    <div class="container">
                        <div class="d-flex justify-content-between align-items-center mb-6">
                            <h1 class="mb-2">Approved Posts</h1>
                            @auth
                                <a href="{{ route('posts.create') }}" class="border p-1 px-3 rounded-full bg-green-500">Create Post</a>
                            @endauth
                        </div>

                        <table class="table-auto w-full border">
                            <thead class="">
                                <tr>
                                    <th class="border">Post</th>
                                    <th class="border">Comment</th>
                                    <th class="border">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        {{-- <div class="card mb-3"> --}}
                                        <td class="border p-1">
                                            <div class="">
                                                <h2>{{ $post->title }}</h2>
                                                <p>By: {{ $post->user->name }}</p>
                                                <p>{{ $post->content }}</p>
                                            </div>
                                        </td>
                                        <td class="border p-1">
                                            <div class="card-footer">
                                                <h4>Comments:</h4>
                                                @foreach ($post->comments as $comment)
                                                    <p><strong>{{ $comment->user->name }}</strong>:
                                                        {{ $comment->content }}</p>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td class="border p-1">
                                            <div>
                                                <a href="{{ route('posts.show', $post) }}" class="border p-1 px-3 rounded-full bg-green-500">View
                                                    Details</a>
                                                @if ($post->user_id === auth()->id())
                                                    <a href="{{ route('posts.edit', $post) }}"
                                                    class="border p-1 px-3 rounded-full bg-green-500">Edit</a>
                                                @endif
                                            </div>
                                        </td>
                                        {{-- </div> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
