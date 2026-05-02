<x-guest-layout>
    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200">Créer un compte</h2>
        <p class="text-gray-500 dark:text-gray-400 mt-2">Rejoignez notre communauté dès aujourd'hui</p>
    </div>

    <form method="POST" action="{{ route('inscription') }}">
        @csrf

        <!-- Nom Complet -->
        <div class="relative mt-4">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 dark:text-gray-500">
                <i class="fas fa-user"></i> <!-- Si vous avez FontAwesome, sinon utilisez un SVG -->
            </span>
            <x-text-input id="name" class="block  w-full pl-10 border-gray-200 focus:border-teal-500 focus:ring-teal-500 rounded-lg" type="text" name="name" :value="old('name')" required placeholder="Nom complet" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Adresse Email -->
        <div class="relative mt-4">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 dark:text-gray-500">
                <i class="fas fa-envelope"></i>
            </span>
            <x-text-input id="email" class="block  w-full pl-10 border-gray-200 focus:border-teal-500 focus:ring-teal-500 rounded-lg" type="email" name="email" :value="old('email')" required placeholder="Adresse e-mail" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Mot de passe -->
        <div class="relative mt-4">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 dark:text-gray-500">
                <i class="fas fa-lock"></i>
            </span>
            <x-text-input id="password" class="block  w-full pl-10 border-gray-200 focus:border-teal-500 focus:ring-teal-500 rounded-lg" type="password" name="password" required placeholder="Mot de passe" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirmation Mot de passe -->
        <div class="relative mt-4">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 dark:text-gray-500">
                <i class="fas fa-lock"></i>
            </span>
            <x-text-input id="password_confirmation" class="block mt-1 w-full pl-10 border-gray-200 focus:border-teal-500 focus:ring-teal-500 rounded-lg" type="password" name="password_confirmation" required placeholder="Confirmer le mot de passe" />
        </div>

        <div class="mt-8">
            <button class="w-full bg-teal-500 hover:bg-teal-600 text-white font-bold py-3 rounded-lg transition duration-300 shadow-lg">
                S'inscrire
            </button>
        </div>

        <div class="text-center mt-6">
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Déjà inscrit ? <a href="{{ route('connexion') }}" class="text-[#8b5cf6] dark:text-purple-400 font-bold hover:text-[#7c3aed] dark:hover:text-purple-300 hover:underline">Connectez-vous</a>
            </p>
        </div>
    </form>
</x-guest-layout>