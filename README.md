# CRUD de test effectué avec api-platform (symfony 4.4) et json:api
## Pré-requis
Voici la liste des logiciels nécessaires (disponible pour Windows, MacOS et Linux):
- PHP (version > 7.x.x): https://www.php.net/
- Git: https://git-scm.com/
- Composer: https://getcomposer.org/
- Navigateur Internet:
>- Mozilla Firefox: https://www.mozilla.org/fr/firefox/
>- Google Chrome: https://www.google.com/intl/fr/chrome/
>- Microsoft Edge (pas multiplateforme )
## Installation de l'api
Dans un terminal, effectuer ces commandes:
```bash
# Récupération du projet
git clone https://github.com/gilles-bertrand/apiplatform.git
cd apiplatform/
# Installation des dépendances
composer install 
# Initialisation de la db (sqlite par défaut)
php bin/console doctrine:database:create
php bin/console doctrine:schema:create
# Chargement des données pré-encodées
php bin/console doctrine:fixtures:load
```
## Utilisation de l'api
Dans un terminal, effectuer ces commandes:
```bash
# Démarrage du serveur PHP
php -S 127.0.0.1:8000 -t public
```
Ouvrir un navigateur internet et mettre l'adresse suivante dans celui-ci : 
> http://127.0.0.1:8000/api

Le fichier "insomnia.json" contient des exemples de HTTP Request en utilisant la spécification json:api (https://jsonapi.org/) et cela, grâce au programme insomnia (https://insomnia.rest/)