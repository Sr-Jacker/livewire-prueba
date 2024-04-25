<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 mb-4">
        <form wire:submit="save">
            @csrf

            <!-- First Name -->
            <div>
                <x-input-label for="first_name" :value="__('First Name')" />
                <x-text-input wire:model="first_name" id="first_name" class="block mt-1 w-full" type="text"
                    name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" />
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>

            <!-- Last Name -->
            <div class="mt-4">
                <x-input-label for="last_name" :value="__('Last Name')" />
                <x-text-input wire:model="last_name" id="last_name" class="block mt-1 w-full" type="text"
                    name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            </div>

            <!-- Phone -->
            <div class="mt-4">
                <x-input-label for="phone" :value="__('Phone')" />
                <x-text-input wire:model="phone" id="phone" class="block mt-1 w-full" type="text" name="phone"
                    :value="old('phone')" required autofocus autocomplete="phone" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email"
                    :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input wire:model="password" id="password" class="block mt-1 w-full" type="password"
                    name="password" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-4">
                    {{ __('Create') }}
                </x-primary-button>
            </div>
        </form>
    </div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
        <table >
            <thead>
                <tr>
                    <th class="px-6">First name</th>
                    <th class="px-6">Last name</th>
                    <th class="px-6">Phone</th>
                    <th class="px-6">Email</th>
                    <th class="px-6">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="px-6">{{ $user->name }}</td>
                        <td class="px-6">{{ $user->last_name }}</td>
                        <td class="px-6">{{ $user->phone }}</td>
                        <td class="px-6">{{ $user->email }}</td>
                        <td class="px-6">
                            <form wire:submit="delete({{$user->id}})">
                                @csrf
                                <div class="flex items-center justify-end mt-4">
                                    <x-primary-button class="ms-4">
                                        {{ __('Delete') }}
                                    </x-primary-button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
