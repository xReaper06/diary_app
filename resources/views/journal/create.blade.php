<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Diary Journal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post" action="{{ route('journal.store') }}" enctype="multipart/form-data">
                        @csrf
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
                        <div class="container text-center">
                            <div class="form-group mb-4 p-3">
                                <label for="journaltitle">Title</label>
                                <input class="form-control" type="text" name="journaltitle" id="journaltitle" placeholder="Write the title of your Journal">
                            </div>
                            <div class="form-group mb-4 p-3">
                                <label for="eventhappen">Event Happen</label>
                                <input class="form-control" type="dateTime-local" name="eventhappen" id="eventhappen">
                            </div>
                            <div class="form-group mb-4 p-3">
                                <label for="discriptions">The Message</label>
                                <input class="form-control pb-5" type="text" name="discriptions" id="discriptions" placeholder="Write your Message here....">
                            </div>
                            <button type="submit" class="border-solid bg-sky-800 hover:text-lg">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
