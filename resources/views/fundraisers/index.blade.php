<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fundraisers') }}
        </h2>
    </x-slot>

    <div id="app" class="m-5">
        @foreach($fundraisers as $fundraiser)
            <fundraiser-card class="m-1" v-bind:fundraiser="{{json_encode($fundraiser)}}"></fundraiser-card>
        @endforeach
        <form
            action="{{route('fundraisers.store')}}"
            method="post"
            class="py-8 px-8 max-w-lg mx-auto bg-white rounded-xl3 shadow-md space-y-2 sm:py-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-6"
        >
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Fundraiser Name
                </label>
                <input required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name" type="text" placeholder="Fundraiser Name">
            </div>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Create Fundraiser</button>
        </form>
    </div>
    
</x-app-layout>
