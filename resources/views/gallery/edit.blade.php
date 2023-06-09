<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Picture') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-5 text-center text-bold text-xl">
                        <form method="post" action="{{ route('gallery.update',$gallery->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('error'))
                            <div class="alert alert-error">
                                {{ session('error') }}
                            </div>
                        @endif
                        <img src="{{ asset('storage/'.$gallery->image) }}" alt="Image" style="width: 250px; height: 250px;">
                            <div class="form-group mb-3 mt-4">
                                <label for="place">Place of Event</label>
                                <input class="" type="text" name="place" value="{{ $gallery->place }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="datehappen">Date of Event</label>
                                <input class="" type="date" name="datehappen" id="datehappen" value="{{ $gallery->datehappen }}">
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary text-black">Submit</button>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="flex">

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
