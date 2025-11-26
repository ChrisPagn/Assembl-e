# Dashboard Administrateur - Assemblée Évangélique de Hogne

## Vue d'ensemble

Le dashboard administrateur a été développé avec succès ! Il permet de gérer tous les contenus du site web.

## Accès au Dashboard

### URL de connexion
```
http://votre-domaine/login
```

### Comptes de test créés

**Administrateur**
- Email: `christopher.pagnotta.testapp@gmail.com`
- Mot de passe: `Admin2024!`
- Rôle: Admin (accès complet)

**Modérateur**
- Email: `moderateur@assemblee-hogne.be`
- Mot de passe: `Moderateur2024!`
- Rôle: Modérateur (accès limité)

## Fonctionnalités par Rôle

### Administrateur (Accès complet)
- ✅ Gestion des pages CMS
- ✅ Gestion des événements
- ✅ Gestion des versets bibliques
- ✅ Visualisation des messages de contact
- ✅ Suppression des messages de contact
- ✅ Gestion de la timeline/historique

### Modérateur (Accès limité)
- ✅ Gestion des pages CMS
- ✅ Gestion des événements
- ✅ Visualisation des messages de contact
- ❌ Gestion des versets (Admin uniquement)
- ❌ Suppression des messages (Admin uniquement)
- ❌ Gestion de la timeline (Admin uniquement)

## Modules Disponibles

### 1. Dashboard Principal
- Vue d'ensemble avec statistiques
- Messages récents
- Événements à venir
- Raccourcis rapides

### 2. Pages CMS
**Route:** `/admin/pages`
- Liste toutes les pages du site
- Création de nouvelles pages
- Modification du contenu HTML avec éditeur WYSIWYG (TinyMCE)
- Suppression de pages

**Champs:**
- Slug (URL de la page)
- Titre
- Contenu HTML (éditeur visuel)

### 3. Événements
**Route:** `/admin/events`
- Gestion complète du calendrier des événements
- Création, modification, suppression
- Filtrage par visibilité (public/privé)

**Champs:**
- Titre
- Description
- Date de début
- Date de fin (optionnel)
- Lieu
- Visibilité (public/privé)

### 4. Versets Bibliques (Admin uniquement)
**Route:** `/admin/versets`
- Gestion des 365 versets quotidiens
- Un verset par jour de l'année

**Champs:**
- Jour de l'année (1-365)
- Référence biblique
- Texte du verset

### 5. Messages de Contact
**Route:** `/admin/contacts`
- Visualisation de tous les messages reçus
- Détail complet de chaque message
- Lien direct pour répondre par email
- Suppression (Admin uniquement)

**Informations affichées:**
- Nom de l'expéditeur
- Email
- Sujet
- Message complet
- Date de réception

### 6. Timeline / Historique (Admin uniquement)
**Route:** `/admin/timeline`
- Gestion de la chronologie de l'assemblée
- Upload d'images
- Ordre d'affichage configurable

**Champs:**
- Année
- Titre
- Description
- Image (optionnel)
- Ordre d'affichage

## Architecture Technique

### Middlewares créés
- `IsAdmin`: Vérifie que l'utilisateur est administrateur
- `IsAdminOrModerator`: Vérifie que l'utilisateur est admin ou modérateur

### Contrôleurs Admin
```
app/Http/Controllers/Admin/
├── DashboardController.php
├── PageController.php
├── EventController.php
├── VersetController.php
├── ContactMessageController.php
└── TimelineController.php
```

### Routes Admin
Toutes les routes admin sont protégées et préfixées par `/admin/`:
- Dashboard: `/admin/dashboard`
- Pages: `/admin/pages`
- Événements: `/admin/events`
- Versets: `/admin/versets`
- Contacts: `/admin/contacts`
- Timeline: `/admin/timeline`

### Vues Admin
```
resources/views/admin/
├── layouts/
│   └── admin.blade.php (Layout principal)
├── dashboard.blade.php
├── pages/
│   ├── index.blade.php
│   ├── create.blade.php
│   └── edit.blade.php
├── events/
│   ├── index.blade.php
│   ├── create.blade.php
│   ├── edit.blade.php
│   ├── show.blade.php
│   └── _form.blade.php
├── versets/
│   ├── index.blade.php
│   ├── create.blade.php
│   ├── edit.blade.php
│   └── show.blade.php
├── contacts/
│   ├── index.blade.php
│   └── show.blade.php
└── timeline/
    ├── index.blade.php
    ├── create.blade.php
    ├── edit.blade.php
    └── show.blade.php
```

### Modèles créés/mis à jour
- `User` (mis à jour avec rôle + méthodes helper)
- `Page` (existant)
- `Event` (existant)
- `Verset` (existant)
- `ContactMessage` (existant)
- `TimelineEvent` (nouveau)

### Migrations exécutées
- `add_role_to_users_table` - Ajout du champ role (admin/moderateur)
- `create_timeline_events_table` - Table pour la timeline

## Éditeur WYSIWYG

TinyMCE est intégré dans les pages d'édition des contenus HTML:
- Éditeur visuel complet
- Gestion des images
- Formatage de texte avancé
- Prévisualisation du code HTML
- Interface en français

## Seeders disponibles

```bash
# Créer l'administrateur et le modérateur
php artisan db:seed --class=AdminUserSeeder

# Créer les données de test (pages, événements, versets)
php artisan db:seed --class=InitialDataSeeder
```

## Commandes utiles

```bash
# Accéder au dashboard
php artisan serve
# Puis naviguer vers: http://localhost:8000/login

# Créer un nouvel utilisateur admin via Tinker
php artisan tinker
>>> $user = new App\Models\User;
>>> $user->name = 'Nom';
>>> $user->email = 'email@example.com';
>>> $user->password = bcrypt('motdepasse');
>>> $user->role = 'admin';
>>> $user->save();

# Lister toutes les routes admin
php artisan route:list --path=admin

# Créer le lien symbolique pour les images (déjà fait)
php artisan storage:link
```

## Sécurité

- Toutes les routes admin sont protégées par authentification
- Les middlewares vérifient les rôles avant d'autoriser l'accès
- Les tokens CSRF sont utilisés sur tous les formulaires
- Les mots de passe sont hashés avec bcrypt
- Validation des données côté serveur

## Design

- Interface moderne avec Bootstrap 5
- Sidebar fixe avec navigation
- Design responsive (mobile, tablette, desktop)
- Icônes Bootstrap Icons
- Thème professionnel avec dégradés
- Messages flash pour les notifications

## Prochaines étapes suggérées

1. Modifier les mots de passe par défaut
2. Configurer l'envoi d'emails pour les notifications de contact
3. Ajouter la gestion des utilisateurs dans le dashboard
4. Implémenter un système de logs des actions admin
5. Ajouter des statistiques avancées au dashboard
6. Créer des sauvegardes automatiques de la base de données

## Support

En cas de problème:
1. Vérifier les logs Laravel: `storage/logs/laravel.log`
2. Vérifier que toutes les migrations ont été exécutées: `php artisan migrate:status`
3. Vider le cache: `php artisan cache:clear && php artisan config:clear && php artisan route:clear`

---

Développé pour l'Assemblée Évangélique de Hogne
Date: Novembre 2025
