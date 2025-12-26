@extends('layouts.gestion-membre')

@section('title', 'Dashboard - Église Dieu d\'Alliance')

@section('content')
    {{-- En-tête avec Fil d'Ariane --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl font-extrabold text-gray-900 tracking-tight">Tableau de bord</h1>
            <p class="text-sm text-gray-500 mt-1">Bienvenue, voici un résumé de votre communauté.</p>
        </div>
        <div class="flex items-center gap-3">
            <button
                class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-gray-50 transition shadow-sm">
                Exporter PDF
            </button>
            <a href="{{ url('/backoffice/gestion-membre/create') }}"
                class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition shadow-md shadow-indigo-200 font-semibold text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Nouveau membre
            </a>
        </div>
    </div>
@endsection
