<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Backup Database') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="text-right mb-6">

                        <a href="{{ route('backups.create') }}" class="inline-flex gap-1 items-center text-white rounded-lg bg-indigo-700 px-4 py-3">
                            <span class="material-symbols-outlined">
                                database
                            </span>
                            <span>Create Database</span>
                        </a>
                    </div>

                    <div class="flex gap-3 flex-wrap justify-between">

                        @foreach($backups as $backup)
                            <div class="bg-gray-50 shadow-md rounded-lg flex gap-4 px-4 py-3 max-sm:w-full w-[49%]">
                                <div class="w-16 h-16 bg-white p-2 rounded-lg self-center shadow-sm">
                                    <img src="{{ asset('assets/' . $backup->dbdriver . '.png') }}" alt="database driver">
                                </div>
                                <div class="flex justify-between w-full">
                                    <div class="">
                                        <p><strong>Database Host: </strong>{{ $backup->dbhost }}</p>
                                        <p><strong>Database Name: </strong>{{ $backup->dbname }}</p>
                                        <div class="flex gap-3">
                                            <p><strong>Database User: </strong>{{ $backup->dbuser }}</p>
                                            <p><strong>Status: </strong>{{ $backup->status ? 'Enabled' : 'Disabled' }}</p>
                                        </div>

                                    </div>
                                    <div class="dropdown dropdown-top">
                                        <label tabindex="0" class="cursor-pointer">
                                           <span class="material-symbols-outlined text-lg font-bold text-black">
                                                more_vert
                                            </span>
                                        </label>
                                        <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-white rounded-box w-52">
                                            <li>
                                                <form action="{{ route('backups.destroy', $backup) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button>Delete</button>
                                                </form>
                                            </li>
                                            <li><a href="{{ route('backups.toggle', $backup) }}">{{ $backup->status ? 'Enable' : 'Disable' }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
