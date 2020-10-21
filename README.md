# Gestion PC
Gestion PC, version 2020, petit vin.

## Installation
1. `composer check-platform-reqs`
2. `composer install`
6. Copier le fichier `.env` en `.env.local` et renseigner les valeurs manquantes ou les modifier si besoin

**Note**: Concernant la variable `DATABASE_URL`, il est recommandé de spécifier la version du SGBD utilisé afin que Doctrine fonctionne sans comportement inattendu. Donc pour mon cas, j'ai dû renseigner la version dans le paramètre `serverVersion` comme ceci :
```
DATABASE_URL=mysql://<user>:<pwd>@<host>/<dbname>?serverVersion=mariadb-10.3.22
```

### Données pour l'environnement developpement.
Des fixtures ont été crées afin de remplir la base de données pour démarrer rapidement sur le projet.
Les données seront insérées en base lorsque vous lancerez cette commande :
```
php bin/console doctrine:fixtures:load
```

#### Informations supplémentaires
**UserFixtures** créera les utilisateurs suivants (email / mot de passe) lors de son exécution :
- admin@gestion.re / admin

