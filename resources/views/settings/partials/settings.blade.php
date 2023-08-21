<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Settings') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Customize your Schedule.') }}
        </p>
    </header>

    <form method="post" action="{{ route('backups.settings') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="form-control w-52">
            <x-input-label for="status" :value="__('Change Backup Status')" />
            <input type="checkbox" class="toggle bg-indigo-700" name="status" @if($settings?->status) checked @endif  />
        </div>

        <div>
            <x-input-label for="period" :value="__('Period')" />
            <select name="period" value="{{ old('period', $settings?->period) }}" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" id="period"  required >
                <option value="" disabled @if(!$settings?->status) selected @endif>Select Period</option>
                <option value="everyFiveMinutes">Every Five Minutes</option>
                <option value="weekly">Weekly</option>
                <option value="weekend">Weekend</option>
                <option value="monthly">Monthly</option>
            </select>
            <x-input-error :messages="$errors->get('period')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="time" :value="__('Time to Run (Every Minute excepted)')" />
            <x-text-input  value="{{ old('period', $settings?->time) }}" id="time" name="time" type="text" class="mt-1 block w-full" autocomplete="time" placeholder="e.g 6:00" />
            <x-input-error :messages="$errors->get('time')" class="mt-2" />
        </div>

        <h2 class="font-bold">Cleanup Setup</h2>
        <div>
            <x-input-label for="cleanupPeriod" :value="__('Period')" />
            <select name="cleanupPeriod" value="{{ old('cleanupPeriod', $settings?->cleanup_period) }}" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" id="period"  required >
                <option value="" disabled @if(!$settings?->status) selected @endif>Select Period</option>
                <option value="everyFiveMinutes">Every Five Minutes</option>
                <option value="weekly">Weekly</option>
                <option value="weekend">Weekend</option>
                <option value="monthly">Monthly</option>
            </select>
            <x-input-error :messages="$errors->get('cleanupPeriod')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="cleanupTime" :value="__('Time to Run (Every Minute excepted)')" />
            <x-text-input value="{{ old('period', $settings?->cleanup_time) }}" id="cleanupTime" name="cleanupTime" type="text" class="mt-1 block w-full" placeholder="e.g 6:00" />
            <x-input-error :messages="$errors->get('cleanupTime')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
