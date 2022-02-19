<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @role('admin')
    <p>You're logged in As an Admin!</p>
    @endrole
    @role('pelapor')
    <p>You're logged in As a Pelapor!</p>
    @endrole
    @role('siswa')
    <p>You're logged in As a Siswa!</p>
    @endrole
</x-app-layout>
