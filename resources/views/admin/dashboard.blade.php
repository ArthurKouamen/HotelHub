
<link rel="stylesheet" href="{{ asset('css/dashboard-admin.css') }}">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Administateur') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
                <div>
                    <p class="gestion-hotel"><i class="fas fa-hotel"></i> Gestion des Hotels</p>
                    <a href="{{ asset('hotels/create')}}">
                        <button type="button" class="btn-ajouter">
                            Ajouter un hôtel
                        </button>
                    </a>
                    <a href="{{ asset('#')}}">
                        <button type="button" class="btn-ajouter">
                            Modifier un hotel
                        </button>
                    </a>
                        <a href="{{ asset('#')}}">
                        <button type="button" class="btn-ajouter">
                            Supprimer un hotel
                        </button>
                    </a>
                </div>
                <div>
                    <p class="gestion-chambre"><i class="fas fa-bed"></i> Gestion des Chambres</p>
                    <a href="{{ asset('chambre/create')}}">
                        <button type="button" class="btn-ajouter">
                            Ajouter une chambre
                        </button>
                    </a>
                    <a href="{{ asset('#')}}">
                        <button type="button" class="btn-ajouter">
                            Modifier une chambre
                        </button>
                    </a>
                    <a href="{{ asset('#')}}">
                        <button type="button" class="btn-ajouter">
                            Supprimer une chambre
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>