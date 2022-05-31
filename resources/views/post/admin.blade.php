<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <div>


                    <form method="get" action="posts">
                    <select name="order" class="form-select appearance-none
                        px-3
                        py-1.5
                        text-base
                        font-normal
                        text-gray-700
                        bg-white bg-clip-padding bg-no-repeat
                        border border-solid border-gray-300
                        rounded
                        transition
                        ease-in-out
                        m-0
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                    <option value="asc">Asc</option>
                    <option value="desc">Desc</option>
                    </select>
                    <input type="submit" value="order" class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded">
                    </form>

                    <div class="w-full px-16 py-20 mt-6 overflow-hidden bg-white rounded-lg lg:max-w-4xl">

                    @foreach($posts as $post)
                        <div class="mb-5 w-full px-6 py-4 bg-white  ring-1 ring-gray-900/10">
                            <!-- Title -->
                            <div>
                                <h3 class="text-2xl font-semibold">
                                <a href="{{ url("/showPost/{$post->id}") }}"> <span class="text-xs">🔗</span> </a>
                                {{$post->title}} 
                                </h3>
                                <div class="flex items-center mb-4 space-x-2">
                                <span class="text-xs text-gray-500"> {{$post->publication_date}}</span><span class="text-xs text-gray-500">Created by
                                    {{$post->user->name}}</span>
                                </div>
                                <p class="text-base text-gray-700">{{$post->description}}</p>
                            </div>
                        </div>
                    @endforeach

                    </div>
                    </div>

                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

