<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Image') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex m-2">
                    <a href="{{ route('gallery.index') }}" class="btn btn-secondary text-lg"><i class="fas fa-solid fas fa-arrow-left"></i></a>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-center bg-slate-900">
                        <div class="w-64 rounded-lg hover:shadow-xl shadow-lg p-4 mx-2 my-2">
                            <img src="{{ asset('storage/'.$gallery->image) }}" alt="Image" style="width: 250px; height: 250px;">
                                <div class="p-4">
                                    <h2>Place Happened: {{ $gallery->place }}</h2>
                                    <p>Date Happened: {{ $gallery->datehappen }}</p>
                                </div>
                            <div class="text-center">
                                <a href="{{ route('gallery.edit',$gallery->id) }}">
                                <button class="btn btn-secondary me-2"><i class="fas fa-pen"></i></button>
                                </a>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </div>
</x-app-layout>
