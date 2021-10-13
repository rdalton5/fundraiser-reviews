{{-- @extends('layouts.app')
@section('content')
    
@stop --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fundraisers') }}
        </h2>
    </x-slot>

    {{-- <div class="py-12"> --}}
    <div id="app">
        <example-component></example-component>
        <h2>Fundraisers</h2>
        <ul>
            @foreach($fundraisers as $fundraiser)
                <fundraiser-card v-bind:fundraiser="{{json_encode($fundraiser)}}"></fundraiser-card>
                {{-- <li>
                    <p>{{$fundraiser->id}} {{$fundraiser->name}}</p>
                    <ul>
                        @foreach($fundraiser->reviews as $review)
                            <li>{{$review->rating}} {{$review->review}}</li>
                        @endforeach
                    </ul>
                </li> --}}
            @endforeach
        </ul>
        
    </div>
        
        
    {{-- </div> --}}
    <script src="{{ mix('/js/app.js') }}"></script>
</x-app-layout>
