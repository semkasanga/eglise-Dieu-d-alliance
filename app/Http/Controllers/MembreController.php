<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MembreController extends Controller
{
    /**
     * Afficher la liste des membres
     */
    public function index()
    {
        // Pour le moment, on utilise des données fictives (pas de DB)
        $membres = [
            [
                'id' => 1,
                'nom' => 'Kaluba Sierra',
                'email' => 'mustafabinamin@jiad.com',
                'telephone' => '+242 06 1234 5678',
                'ministere' => 'Louange',
                'date_adhesion' => '15/01/2020',
                'date_naissance' => '15/03/1985',
                'statut' => 'Actif',
                'baptise' => true,
                'initiales' => 'MS',
                'color' => 'bg-blue-600',
                'adresse' => '12 Rue de la Paix, 75001 Paris'
            ],
            [
                'id' => 2,
                'nom' => 'Keran Koskunoblu',
                'email' => 'woobie@woobie.com',
                'telephone' => '+243 06 8765 4321',
                'ministere' => 'Intercession',
                'date_adhesion' => '20/06/2019',
                'date_naissance' => '22/08/1990',
                'statut' => 'Actif',
                'baptise' => true,
                'initiales' => 'KV',
                'color' => 'bg-blue-600',
                'adresse' => '45 Avenue des Champs, 75008 Paris'
            ],
            [
                'id' => 3,
                'nom' => 'Buddah',
                'email' => 'Buddah@god.com',
                'telephone' => '+243 06 1122 3344',
                'ministere' => 'Jeunesse',
                'date_adhesion' => '10/03/2021',
                'date_naissance' => '05/12/1995',
                'statut' => 'Actif',
                'baptise' => true,
                'initiales' => 'B',
                'color' => 'bg-blue-600',
                'adresse' => '78 Boulevard Saint-Michel, 75006 Paris'
            ],
            [
                'id' => 4,
                'nom' => 'Scpice ',
                'email' => 'ice@scpice.com',
                'telephone' => '+243 06 4433 2211',
                'ministere' => 'Enseignement',
                'date_adhesion' => '05/11/2018',
                'date_naissance' => '18/07/1988',
                'statut' => 'Inactif',
                'baptise' => true,
                'initiales' => 'IS',
                'color' => 'bg-blue-600',
                'adresse' => '23 Rue de Rivoli, 75004 Paris'
            ],
            [
                'id' => 5,
                'nom' => 'Latto',
                'email' => 'latto@oppai.com',
                'telephone' => '+243 06 5566 7788',
                'ministere' => 'Louange',
                'date_adhesion' => '12/09/2022',
                'date_naissance' => '30/01/1992',
                'statut' => 'Actif',
                'baptise' => true,
                'initiales' => 'L',
                'color' => 'bg-blue-600',
                'adresse' => '56 Rue de la République, 69002 Lyon'
            ],
        ];

        $stats = [
            'total' => 5,
            'actifs' => 4,
            'baptises' => 4,
            'nouveaux' => 12
        ];

        return view('membres.index', compact('membres', 'stats'));
    }

    /**
     * Afficher le formulaire de création d'un nouveau membre
     */
    public function create()
    {
        $ministeres = [
            'Louange',
            'Intercession',
            'Jeunesse',
            'Enseignement',
            'Média',
            'Accueil'
        ];

        return view('membres.create', compact('ministeres'));
    }

    /**
     * Afficher les détails d'un membre
     */
    public function show($id)
    {
        // Récupérer les données fictives (même structure que dans index)
        $membres = [
            [
                'id' => 1,
                'nom' => 'Kaluba Sierra',
                'email' => 'mustafabinamin@jiad.com',
                'telephone' => '+242 06 1234 5678',
                'ministere' => 'Louange',
                'date_adhesion' => '15/01/2020',
                'date_naissance' => '15/03/1985',
                'statut' => 'Actif',
                'baptise' => true,
                'initiales' => 'MS',
                'color' => 'bg-blue-600',
                'adresse' => '12 Rue de la Paix, 75001 Paris'
            ],
            [
                'id' => 2,
                'nom' => 'Keran Koskunoblu',
                'email' => 'woobie@woobie.com',
                'telephone' => '+243 06 8765 4321',
                'ministere' => 'Intercession',
                'date_adhesion' => '20/06/2019',
                'date_naissance' => '22/08/1990',
                'statut' => 'Actif',
                'baptise' => true,
                'initiales' => 'KV',
                'color' => 'bg-blue-600',
                'adresse' => '45 Avenue des Champs, 75008 Paris'
            ],
            [
                'id' => 3,
                'nom' => 'Buddah',
                'email' => 'Buddah@god.com',
                'telephone' => '+243 06 1122 3344',
                'ministere' => 'Jeunesse',
                'date_adhesion' => '10/03/2021',
                'date_naissance' => '05/12/1995',
                'statut' => 'Actif',
                'baptise' => true,
                'initiales' => 'B',
                'color' => 'bg-blue-600',
                'adresse' => '78 Boulevard Saint-Michel, 75006 Paris'
            ],
            [
                'id' => 4,
                'nom' => 'Scpice ',
                'email' => 'ice@scpice.com',
                'telephone' => '+243 06 4433 2211',
                'ministere' => 'Enseignement',
                'date_adhesion' => '05/11/2018',
                'date_naissance' => '18/07/1988',
                'statut' => 'Inactif',
                'baptise' => true,
                'initiales' => 'IS',
                'color' => 'bg-blue-600',
                'adresse' => '23 Rue de Rivoli, 75004 Paris'
            ],
            [
                'id' => 5,
                'nom' => 'Latto',
                'email' => 'latto@oppai.com',
                'telephone' => '+243 06 5566 7788',
                'ministere' => 'Louange',
                'date_adhesion' => '12/09/2022',
                'date_naissance' => '30/01/1992',
                'statut' => 'Actif',
                'baptise' => true,
                'initiales' => 'L',
                'color' => 'bg-blue-600',
                'adresse' => '56 Rue de la République, 69002 Lyon'
            ],
        ];

        // Trouver le membre par ID
        $membre = collect($membres)->firstWhere('id', (int)$id);

        if (!$membre) {
            abort(404, 'Membre non trouvé');
        }

        return view('membres.show', compact('membre'));
    }
}
