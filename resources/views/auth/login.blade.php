<x-guest-layout>
 
    <!-- Session Status -->
    <x-auth-session-status :status="session('status')" />
    
   
    <form method="POST" action="#" class="space-y-4 bg-white p-6 ">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Adresse email')" />
            <x-text-input id="email" class="block mt-1 w-full text-black" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mot de passe')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Options -->
        <div class="flex items-center justify-between text-sm mb-6 py-8 ">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300"" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Se souvenir de moi') }}</span>
            </label>
             <a href="#" class="text-blue-600 hover:underline">
            Mot de passe oublié ?
          </a>
        </div> 

  
        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Se connecter') }}
            </x-primary-button>
        </div>
 <!-- Aide -->
        <p class="text-sm mt-6 text-gray-500 pl-12">
          Besoin d'aide ?
          <a href="#" class="text-blue-900 font-medium hover:underline">
            Contactez l'administrateur
          </a>
        </p>

    </form>  
</x-guest-layout>
