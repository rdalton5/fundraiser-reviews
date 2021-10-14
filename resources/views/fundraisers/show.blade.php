<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fundraiser') }}
        </h2>
    </x-slot>

    <div id="app" class="m-5">
        <fundraiser-with-reviews class="m-1" v-bind:fundraiser="{{json_encode($fundraiser)}}"></fundraiser-with-reviews>
    </div>
    
</x-app-layout>
