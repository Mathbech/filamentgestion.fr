# Filament Gestion

## Installation

1. Si docker compose n'est pas installé, [Installer Docker Compose](https://docs.docker.com/compose/install/) (v2.10+)
2. Exécuter `make build` pour build le projet
3. Exécuter `make start` pour lancer le proket
4. Ouvrir si vous êtes en local `https://localhost` ou si vous êtes sur un serveur `Url donné pour le serveur`  dans votre navigateur favoris [accepter le certificat TLS auto-généré](https://stackoverflow.com/a/15076602/1352334)
5. Exécuter `make stop` pour stopper les container.

# Pour l'utilisation d'ApiPlatform

Afin de permettre la connexion via un token JWT il est impratif d'ajouter un certificat de sécurité
Pour générer ce certificat, il faut :
1. Aller dans le dossier config du projet  `cd %racine du projet%/config`
2. Créer un dossier nommé jwt `mkdir jwt`
3. Aller sur la console du container php `make sh`
4. Générer le certificat `$ php bin/console lexik:jwt:generate-keypair`
Il devrais y avoir deux fichiers de créé `private.pem et public.pem`

# Le projet est fin prêt a fonctionner