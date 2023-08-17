<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Database') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class=" text-right my-4">
                        <a href="{{ route('backups.index') }}" class="inline-flex gap-1 items-center text-white rounded-lg bg-indigo-700 px-4 py-3">
                            <span class="material-symbols-outlined">
                                format_list_bulleted
                            </span>
                            <span>Database Lists</span>
                        </a>
                    </div>
                        <form method="POST" action="{{ route('backups.store') }}" >
                            @csrf
                            <div >
                                <x-input-label for="dbhost" :value="__('Database Host')" />
                                <x-text-input id="dbhost" class="block mt-1 w-full" type="text" name="dbhost" :value="old('dbhost')"  required autofocus autocomplete="dbhost" />
                                <x-input-error :messages="$errors->get('dbhost')" class="mt-2" />
                            </div>

                            <div class="mt-4">
                                <x-input-label for="dbdriver" :value="__('Database Driver')" />
                                <select class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" id="dbdriver" name="dbdriver" required >
                                    <option value="" disabled selected>Choose Driver</option>
                                    <option value="mysql">MySQL</option>
                                    <option value="pgsql" >PgSQL</option>
                                    <option value="sqlite" >SQLite</option>
                                </select>
                                <x-input-error :messages="$errors->get('dbdriver')" class="mt-2" />
                            </div>


                            <div class="mt-4">
                                <x-input-label for="dbname" :value="__('Database Name')" />
                                <x-text-input id="dbname" class="block mt-1 w-full" type="text" name="dbname" :value="old('dbname')"  required autofocus autocomplete="dbname" />
                                <x-input-error :messages="$errors->get('dbname')" class="mt-2" />
                            </div>
                            <div class="mt-4">
                                <x-input-label for="dbuser" :value="__('Database Username')" />
                                <x-text-input id="dbuser" class="block mt-1 w-full" type="text" name="dbuser" :value="old('dbuser')"  required autofocus autocomplete="dbuser" />
                                <x-input-error :messages="$errors->get('dbuser')" class="mt-2" />
                            </div>
                            <div class="mt-4">
                                <x-input-label for="dbfolder" :value="__('Folder Name')" />
                                <x-text-input id="dbfolder" class="block mt-1 w-full" type="text" name="dbfolder" :value="old('dbfolder')"  required autofocus autocomplete="dbfolder" />
                                <x-input-error :messages="$errors->get('dbfolder')" class="mt-2" />
                            </div>
                            <div class="mt-4">
                                <x-input-label for="dbpass" :value="__('Database Password')" />
                                <x-text-input id="dbpass" class="block mt-1 w-full" type="password" name="dbpass" :value="old('dbpass')" autofocus autocomplete="dbpass" />
                                <x-input-error :messages="$errors->get('dbpass')" class="mt-2" />
                            </div>

                            <div class="mt-4">
                                <x-primary-button type="submit" >
                                    {{ __('Create Database') }}
                                </x-primary-button>
                            </div>

                        </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
