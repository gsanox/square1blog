<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <!-- Create Post -->
                  <div>
                    <div class="flex flex-col items-center pt-6 sm:justify-center sm:pt-0">
                      <div class="w-full px-16 py-20 mt-6 overflow-hidden bg-white lg:max-w-4xl">
                        <div class="mb-4">
                          <h1 class="font-serif text-3xl font-bold decoration-gray-400">
                            Create Post
                          </h1>
                        </div>

                        <div class="w-full px-6 py-4 bg-whit shadow-md ">
                          <form method="post" action="storePost">

                          @csrf

                            <!-- Title -->
                            <div>
                              <label class="block text-sm font-bold text-gray-700" for="title">
                                Title
                              </label>

                              <input
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                type="text" name="title" placeholder="180" />
                            </div>

                            <!-- Description -->
                            <div class="mt-4">
                              <label class="block text-sm font-bold text-gray-700" for="password">
                                Description
                              </label>
                              <textarea name="description"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                rows="4" placeholder="400"></textarea>
                            </div>

                            <div class="flex items-center justify-start mt-4 gap-x-2">
                              <button type="submit"
                                class="px-6 py-2 text-sm font-semibold rounded-md shadow-md text-sky-100 bg-sky-500 hover:bg-sky-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                                Save
                              </button>
                              <button type="submit"
                                class="px-6 py-2 text-sm font-semibold text-gray-100 bg-gray-400 rounded-md shadow-md hover:bg-gray-600 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                                Cancel
                              </button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


    