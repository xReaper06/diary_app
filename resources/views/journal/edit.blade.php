<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Journal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-5 text-center text-bold text-xl">
                        <form method="post" action="{{ route('journal.update',$journal->id) }}" enctype="multipart/form-data">
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
                        <div class="container text-center">
                            <div class="form-group mb-4 p-3">
                                <label for="journaltitle">Title</label>
                                <input class="form-control" type="text" name="journaltitle" id="journaltitle" placeholder="Write the title of your Journal" value="{{ $journal->title }}">
                            </div>
                            <div class="form-group mb-4 p-3">
                                <label for="eventhappen">Event Happen</label>
                                <input class="form-control" type="dateTime-local" name="eventhappen" id="eventhappen" value="{{ $journal->eventhappen }}">
                            </div>
                            <div class="form-group mb-4 p-3">
                                <label for="discriptions">The Message</label>
                                <input class="form-control pb-5" type="text" name="discriptions" id="discriptions" placeholder="Write your Message here...." value="{{ $journal->discriptions }}">
                            </div>
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
