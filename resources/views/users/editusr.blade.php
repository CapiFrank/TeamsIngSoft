<x-guest-layout>
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
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$user->name}}" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{$user->email}}" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="job" :value="__('Job')" />
                        <x-text-input id="job" class="block mt-1 w-full" type="text" name="job" value="{{$user->job}}" required autofocus autocomplete="job" />
                        <x-input-error :messages="$errors->get('job')" class="mt-2" />
                    </div>
            </div>
            <p class="pt-2"/>
            <x-primary-button type="submit">Enviar</x-primary-button>

            </form>
        </div>

    </div>
</x-guest-layout>
