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
    </div>
    
    <script src="{{ mix('/js/app.js') }}"></script>
</x-app-layout>
