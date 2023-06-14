<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 bg-white">
            <div class="py-4 border-b">
                <a href="{{ route('create') }}">
                    <x-primary-button>{{ __('Create User') }}</x-primary-button>
                </a>
            </div>
            <form action="{{ route('users.filter') }}" method="GET">
                <div class="py-4 border-b">
                    <label for="search" class="block font-semibold text-gray-700">Filter by Name or Email:</label>
                    <input type="text" name="search" id="search" class="border border-gray-300 rounded px-3 py-2 w-full" value="{{ request()->query('search') }}">
                </div>
                <div class="py-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('Apply Filter') }}
                    </button>
                </div>
            </form>
            <ul role="list" class="divide-y divide-gray-100">
                @foreach ($users as $user)
                    <li class="flex justify-between gap-x-6 py-5">
                        <div class="flex gap-x-4">
                            <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="https://ui-avatars.com/api/?name={{ $user->name }}" alt="">
                            <div class="min-w-0 flex-auto">
                                <a href="{{ url('user/edit/'.$user->id) }}" ><p class="text-sm font-semibold leading-6 text-gray-900 hover:text-blue-400">{{ $user->name }}</p></a>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $user->email }}</p>

                                
                            </div>
                        </div>
                        <div class="hidden sm:flex sm:flex-col sm:items-end">
                            <p class="text-sm leading-6 text-gray-900">{{ $user->job }}</p>
                            <p class="mt-1 text-xs leading-5 text-gray-500">Last seen <time datetime="2023-01-23T13:23Z">3h ago</time></p>
                        </div>
                        <form action="{{ route('users.destroy', $user)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
