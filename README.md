# EGLISE EVANGELIQUE DIEU D'ALLIANCE

## Premier Module
Développer les **interfaces CRUD** pour la gestion des membres de l'église via le rôle **gestionnaire**.  
**Pour le moment :** nous travaillons uniquement sur les **interfaces (front-end)**, pas encore sur la base de données ni le backend.

Le backend sera fait uniquement quand tout le monde confirmera avoir téléchargé le projet sans problème.


## Prérequis
- **PHP** ≥ 8.1
- **Composer** ≥ 2.x
- **Node.js** ≥ 18.x
- **NPM** ≥ 8.x


## Emplacement
- Pour **Laragon** : mettre le projet dans le dossier `www`
- Pour **XAMPP** : mettre le projet dans le dossier `htdocs`


## Installation du projet
1. **Cloner le dépôt et se déplacer dans le dossier :**
`git clone https://github.com/semkasanga/eglise-Dieu-d-alliance.git`
`cd eglise-Dieu-d-alliance`


2. **Installer les dépendances PHP :**
`composer install`


3. **Installer les dépendances JS :**
`npm install`

4. **Copier le fichier `.env.example` en `.env` :**
`cp .env.example .env`

5. **Générer la clé Laravel :**
`php artisan key:generate`


6. **Lancer le serveur Laravel :**
`php artisan serve`

7. **Lancer le serveur front (Vite) :**
`npm run dev`

##  Workflow Git
 **Ne pas pousser sur `main` directement.**  
Nous utilisons des branches pour le développement.

### Branches à créer :
- `feature/membres-list` : interface liste des membres
- `feature/membres-create` : interface ajout membre
- `feature/membres-edit` : interface modification membre
- `feature/layout` : layout & navigation pour le gestionnaire
- `feature/login` : interface de connexion

### Commandes utiles :
- **Créer une branche :**
`git checkout -b feature/membres-list`
- **Se mettre à jour avec la branche principale :**
`git pull origin main`
- **Pousser votre branche :**
`git push origin feature/membres-list`

Ensuite, créez une **Pull Request** sur GitHub pour fusionner votre branche dans `main`.


## Ce qui doit être fait maintenant
- Créer les interfaces CRUD pour les membres (UI uniquement).
- Utiliser **Tailwind CSS** pour le design.
- Pas encore de logique backend ni base de données.

## Pour ce qui est des couleur referez vous à la page deja faite
## Respecter un peu l'ordre des dossiers comme deja fait
