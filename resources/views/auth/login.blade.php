<x-guest-layout>
    <!-- Titre et Sous-titre -->
    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200">Se Connecter</h2>
        <p class="text-gray-500 dark:text-gray-400 mt-2">Rejoignez notre communauté dès aujourd'hui</p>
    </div>

    <!-- Statut de session (ex: après réinitialisation de mot de passe) -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('connexion') }}">
        @csrf

        <!-- Adresse E-mail -->
        <div class="relative mt-4">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400 dark:text-gray-500">
                <i class="fas fa-envelope"></i>
            </span>
            <x-text-input id="email" 
                class="block w-full pl-10 border-gray-200 focus:border-teal-500 focus:ring-teal-500 rounded-lg py-3" 
                type="email" 
                name="email" 
                :value="old('email')" 
                required 
                autofocus 
                placeholder="Adresse e-mail" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Mot de passe -->
        <div class="relative mt-4">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400 dark:text-gray-500">
                <i class="fas fa-lock"></i>
            </span>
            <x-text-input id="password" 
                class="block w-full pl-10 border-gray-200 focus:border-teal-500 focus:ring-teal-500 rounded-lg py-3" 
                type="password" 
                name="password" 
                required 
                autocomplete="current-password" 
                placeholder="Mot de passe" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Se souvenir de moi & Mot de passe oublié -->
        <div class="flex items-center justify-between mt-4 px-1">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 dark:border-gray-600 text-teal-500 shadow-sm focus:ring-teal-500 dark:focus:ring-teal-400" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">Se souvenir de moi</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-teal-600 dark:text-teal-400 hover:text-teal-800 dark:hover:text-teal-300 hover:underline" href="{{ route('password.request') }}">
                    Mot de passe oublié ?
                </a>
            @endif
        </div>

        <!-- Bouton Connexion -->
        <div class="mt-8">
            <button type="submit" class="w-full bg-teal-500 hover:bg-teal-600 text-white font-bold py-3 rounded-lg transition duration-300 shadow-lg transform hover:-translate-y-0.5 uppercase">
                Connexion
            </button>
        </div>

        <!-- Lien vers Inscription -->
        <div class="text-center mt-8">
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Pas de compte ? 
                <a href="{{ route('inscription') }}" class="text-[#8b5cf6] dark:text-purple-400 font-bold hover:text-[#7c3aed] dark:hover:text-purple-300 hover:underline">
                    Créer un compte
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>