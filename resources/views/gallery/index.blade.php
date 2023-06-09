<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gallery') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container flex justify-end">
                        <a href="{{ route('gallery.create') }}" class="btn btn-success" title="Add Image to the gallery"><i class="fas fa-solid fas fa-plus"></i><span class="pe-3"></span><i class="fas fa-solid fas fa-image"></i></a>
                     </div>
                     @if (count($galleries) == 0)
                     <div class="text-center text-bold text-xl text-cyan-700">
                        {{ __('Empty Gallery') }}
                     </div>
                     @else
                     <div class="flex flex-wrap bg-slate-900">
                         @foreach($galleries as $gallery)
                         <a href="{{ route('gallery.show',$gallery->id) }}">
                            <div class="w-64 rounded-lg shadow-lg p-4 mx-2 my-2">
                                <img src="{{ asset('storage/'.$gallery->image) }}" alt="Image" style="width: 250px; height: 250px;">
                                <div class="p-4">
                                    <h2>Place Happened: {{ $gallery->place }}</h2>
                                    <p>Date Happened: {{ $gallery->datehappen }}</p>
                                </div>
                                <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-black hover:text-blue-300 btn btn-danger">
                                        <i class="fas fa-solid fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </a>
                    @endforeach
                    </div>
                     @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
