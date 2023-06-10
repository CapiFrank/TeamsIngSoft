<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    {{$user->name}}
                </div>
            </div>

            <form action="{{ url('user/update/'.$user->id)}}" method='POST'>
                @csrf
                @method('PUT')
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <x-input-label value="Name"/>
                    <x-text-input value="{{$user->name}}" name="name"/>
                </div>
                <div class="max-w-xl pt-2">
                    <x-input-label value="Email"/>
                    <x-text-input value="{{$user->email}}" name="email"/>
                </div>
            </div>
            <p class="pt-2"/>
            <x-primary-button type="submit">Enviar</x-primary-button>

            </form>
        </div>

    </div>
</x-app-layout>
