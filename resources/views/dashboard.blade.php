<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <div class="flex items-center gap-4">
                <div class="mt-8">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('candidat.create') }}" class="btn btn-sm btn-primary w-50 me-2">Candidat</a>
                        <a href="{{ route('entreprise.index') }}" class="btn btn-sm btn-success w-50 ms-2">Recruteur</a>
                    </div>
                </div>  
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-red-600 hover:text-red-800" type="submit">Déconnexion</button>
                </form>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                <x-welcome />

                

            </div>
        </div>
    </div>
</x-app-layout>
