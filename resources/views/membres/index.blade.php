<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Membres</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/membres/index.js'])
    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen p-6">
        <!-- Header -->
        <div class="max-w-7xl mx-auto mb-8">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <button class="p-2 hover:bg-gray-100 rounded-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    <div>
                        <h1 class="text-3xl font-bold text-blue-900">Gestion des Membres</h1>
                        <p class="text-gray-600 mt-1">Gérez tous les membres de l'église</p>
                    </div>
                </div>
                <button onclick="openModal()" class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg flex items-center gap-2 font-medium shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Nouveau Membre
                </button>
            </div>
        </div>

        <div class="max-w-7xl mx-auto">
            <!-- Filters -->
            <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
                <div class="flex gap-4">
                    <div class="flex-1 relative">
                        <svg class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <input 
                            type="text" 
                            id="search-membres"
                            placeholder="Rechercher par nom ou email..."
                            class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        >
                    </div>
                    <select id="filter-status" class="px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white">
                        <option value="all">Tous les statuts</option>
                        <option value="Actif">Actif</option>
                        <option value="Inactif">Inactif</option>
                    </select>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                <!-- Total Membres -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium mb-2">Total Membres</p>
                            <p id="total-membres" class="text-4xl font-bold text-blue-900">{{ $stats['total'] }}</p>
                        </div>
                        <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center">
                            <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Membres Actifs -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium mb-2">Membres Actifs</p>
                            <p class="text-4xl font-bold text-green-600">{{ $stats['actifs'] }}</p>
                        </div>
                        <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center">
                            <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Baptisés -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium mb-2">Baptisés</p>
                            <p class="text-4xl font-bold text-red-600">{{ $stats['baptises'] }}</p>
                        </div>
                        <div class="w-14 h-14 bg-red-100 rounded-xl flex items-center justify-center">
                            <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Nouveaux -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium mb-2">Nouveaux (2024)</p>
                            <p class="text-4xl font-bold text-purple-600">{{ $stats['nouveaux'] }}</p>
                        </div>
                        <div class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center">
                            <svg class="w-7 h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Members Table -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <!-- Table Header -->
                <div class="bg-gray-50 border-b border-gray-200">
                    <div class="grid grid-cols-12 gap-4 px-6 py-4 text-sm font-semibold text-gray-600 uppercase">
                        <div class="col-span-3">Nom</div>
                        <div class="col-span-3">Contact</div>
                        <div class="col-span-2">Ministère</div>
                        <div class="col-span-2">Date d'Adhésion</div>
                        <div class="col-span-1">Statut</div>
                        <div class="col-span-1 text-center">Actions</div>
                    </div>
                </div>

                <!-- Table Body -->
                <div class="divide-y divide-gray-200">
                    @foreach($membres as $membre)
                    <div class="membre-row grid grid-cols-12 gap-4 px-6 py-4 items-center hover:bg-gray-50 transition" 
                         data-name="{{ $membre['nom'] }}" 
                         data-email="{{ $membre['email'] }}" 
                         data-status="{{ $membre['statut'] }}">
                        <!-- Nom -->
                        <div class="col-span-3 flex items-center gap-3">
                            <div class="{{ $membre['color'] }} w-12 h-12 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                {{ $membre['initiales'] }}
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">{{ $membre['nom'] }}</p>
                                @if($membre['baptise'])
                                <div class="flex items-center gap-1 mt-1">
                                    <svg class="w-3 h-3 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-xs text-blue-600 font-medium">Baptisé</span>
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- Contact -->
                        <div class="col-span-3">
                            <p class="text-gray-900 text-sm">{{ $membre['email'] }}</p>
                            <p class="text-gray-500 text-sm mt-1">{{ $membre['telephone'] }}</p>
                        </div>

                        <!-- Ministère -->
                        <div class="col-span-2">
                            <span class="inline-flex px-3 py-1 rounded-full text-xs font-medium
                                @if($membre['ministere'] === 'Louange') bg-blue-100 text-blue-700
                                @elseif($membre['ministere'] === 'Intercession') bg-purple-100 text-purple-700
                                @elseif($membre['ministere'] === 'Jeunesse') bg-green-100 text-green-700
                                @elseif($membre['ministere'] === 'Enseignement') bg-orange-100 text-orange-700
                                @endif">
                                {{ $membre['ministere'] }}
                            </span>
                        </div>

                        <!-- Date d'Adhésion -->
                        <div class="col-span-2">
                            <p class="text-gray-900 text-sm">{{ $membre['date_adhesion'] }}</p>
                        </div>

                        <!-- Statut -->
                        <div class="col-span-1">
                            <span class="inline-flex px-3 py-1 rounded-full text-xs font-medium
                                @if($membre['statut'] === 'Actif') bg-green-100 text-green-700
                                @else bg-gray-100 text-gray-700
                                @endif">
                                {{ $membre['statut'] }}
                            </span>
                        </div>

                        <!-- Actions -->
                        <div class="col-span-1 flex items-center justify-center gap-2">
                            <button class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Voir">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                            <button class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Modifier">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </button>
                            <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition" title="Supprimer">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Nouveau Membre -->
    <div id="modal-nouveau-membre" class="hidden fixed inset-0 backdrop-blur-sm z-50 flex items-center justify-center p-4" style="background-color: rgba(0, 0, 0, 0.15);">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl max-h-[85vh] overflow-y-auto scrollbar-hide">
            <!-- Form -->
            <form action="#" method="POST" class="p-5">
                <!-- Header intégré -->
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-2xl font-bold text-blue-900">Nouveau Membre</h2>
                    <button type="button" onclick="closeModal()" class="text-gray-400 hover:text-gray-600 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Nom complet -->
                    <div>
                        <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">
                            Nom complet <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="nom" 
                            name="nom" 
                            required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm"
                            placeholder="Entrez le nom complet"
                        >
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="exemple@email.com"
                        >
                    </div>

                    <!-- Téléphone -->
                    <div>
                        <label for="telephone" class="block text-sm font-medium text-gray-700 mb-2">
                            Téléphone <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="tel" 
                            id="telephone" 
                            name="telephone" 
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="+243 06 1234 5678"
                        >
                    </div>

                    <!-- Date de naissance -->
                    <div>
                        <label for="date_naissance" class="block text-sm font-medium text-gray-700 mb-2">
                            Date de naissance
                        </label>
                        <input 
                            type="date" 
                            id="date_naissance" 
                            name="date_naissance"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        >
                    </div>

                    <!-- Ministère -->
                    <div>
                        <label for="ministere" class="block text-sm font-medium text-gray-700 mb-2">
                            Ministère <span class="text-red-500">*</span>
                        </label>
                        <select 
                            id="ministere" 
                            name="ministere" 
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white"
                        >
                            <option value="">Sélectionnez un ministère</option>
                            <option value="Louange">Louange</option>
                            <option value="Intercession">Intercession</option>
                            <option value="Jeunesse">Jeunesse</option>
                            <option value="Enseignement">Enseignement</option>
                            <option value="Média">Média</option>
                            <option value="Accueil">Accueil</option>
                        </select>
                    </div>

                    <!-- Statut -->
                    <div>
                        <label for="statut" class="block text-sm font-medium text-gray-700 mb-2">
                            Statut <span class="text-red-500">*</span>
                        </label>
                        <select 
                            id="statut" 
                            name="statut" 
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white"
                        >
                            <option value="Actif">Actif</option>
                            <option value="Inactif">Inactif</option>
                        </select>
                    </div>

                    <!-- Adresse -->
                    <div class="md:col-span-2">
                        <label for="adresse" class="block text-sm font-medium text-gray-700 mb-2">
                            Adresse
                        </label>
                        <textarea 
                            id="adresse" 
                            name="adresse" 
                            rows="4"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none"
                            placeholder="Entrez l'adresse complète"
                        ></textarea>
                    </div>

                    <!-- Baptisé -->
                    <div class="md:col-span-2">
                        <label class="flex items-center cursor-pointer">
                            <input 
                                type="checkbox" 
                                id="baptise" 
                                name="baptise" 
                                value="1"
                                class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-2 focus:ring-blue-500"
                            >
                            <span class="ml-3 text-sm font-medium text-gray-700">Baptisé</span>
                        </label>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-gray-200">
                    <button 
                        type="button"
                        onclick="closeModal()" 
                        class="px-6 py-3 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition font-medium"
                    >
                        Annuler
                    </button>
                    <button 
                        type="submit" 
                        class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium"
                    >
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('modal-nouveau-membre').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            document.getElementById('modal-nouveau-membre').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Fermer le modal en cliquant en dehors
        document.getElementById('modal-nouveau-membre').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // Fermer avec la touche Échap
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        });
    </script>
</body>
</html>
