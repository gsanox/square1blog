<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        @if (isset($post))  
          {{ $post->title }}
        @else
        <span class="text-red-500">Post not found</span>
        @endif
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <div>
                @if (isset($post))
                  <div class="flex flex-col items-center  pt-6  sm:justify-center sm:pt-0">
                    <div class="w-full px-16 py-20 mt-6 overflow-hidden bg-white rounded-lg lg:max-w-4xl">
                      <div >
                          <!-- Title -->
                          <div>
                            <h3 class="text-2xl font-semibold">{{ $post->title }}</h3>
                            <div class="flex items-center mb-4 space-x-2">
                              <span class="text-xs text-gray-500"> {{$post->publication_date}} </span><span class="text-xs text-gray-500">Created by
                              {{$post->user->name}}</span>
                            </div>
                            <p class="text-base text-gray-700">{{$post->description}}</p>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
            </div>
            @else
            <div class="flex items-center justify-center w-screen h-screen bg-gradient-to-r from-indigo-600 to-blue-400">
            <div class="px-40 py-20 bg-white rounded-md shadow-xl">
              <div class="flex flex-col items-center">
                <h1 class="font-bold text-blue-600 text-9xl">404</h1>
                <h6 class="mb-2 text-2xl font-bold text-center text-gray-800 md:text-3xl">
                  <span class="text-red-500">Oops!</span> Page not found
                </h6>
                <p class="mb-8 text-center text-gray-500 md:text-lg">
                  The page you’re looking for doesn’t exist.
                </p>
              </div>
            </div>
          </div>
            @endif
        </div>
    </div>
</x-app-layout>