<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="mt-4">
                <x-label for="nis" :value="__('ID (NIM/NUPTK)')" />

                <x-input id="nis" class="block mt-1 w-full" type="text" name="nis" :value="old('nis')" required />
            </div>

            <!-- Role Selection -->
            <div class="mt-4">
                <x-label for="role_id" value="{{ __('Register as:') }}" />
                <select name="role_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sn">
                    <option value="admin">Admin</option>
                    <option value="pelapor">Pelapor</option>
                    <!-- <option value="siswa">Siswa</option> -->
                </select>
            </div>

            <!-- <div class="mt-4">
                <x-label for="kelas" value="{{ __('Register as:') }}" />
                <select name="kelas" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sn">
                    <option value="XII - RPL 1">XII - RPL 1</option>
                    <option value="xii - RPL 2">XII - RPL 2</option>
                    <option value="XII - RPL 3">XII - RPL 3</option>
                    <option value="xii - TKJ 1">XII - TKJ 1</option>
                    <option value="XII - TKJ 2">XII - TKJ 2</option>
                    <option value="xii - MM">XII - MM</option>
                    <option value="XII - ">XII -</option>
                    <option value="xii - ">XII - </option>
                    <option value="XII - ">XII - </option>
                    <option value="xii - ">XII - </option>
                    <option value="XII - ">XII - </option>
                    <option value="xii - ">XII - </option>
                    <option value="XII - ">XII - </option>
                    <option value="siswa">Siswa</option>
                </select>
            </div> -->

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
