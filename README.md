Rest Test
=======

### Routes :

| URI | Méthode HTTP | Content-Type | Description |
|-----|--------------|--------------|-------------|
| [/posts](http://localhost:8000/posts) | GET | application/json | retourne une liste de Post |
| [/posts](http://localhost:8000/posts) | POST | application/json | enregistre un Post |

### Entités :

#### Post
**id** : int, **name** : string, **message** : string

### Les dépendances :

Télécharger Composer :
[https://getcomposer.org/download/](https://getcomposer.org/download/)

Installer les librairies :
```
php composer.phar install
```

### Base de données :
Modifier **/app/config/parameters.yml** avec la configuration de votre base de données

Création de la BDD :
```
php bin/console doctrine:database:create
```

Création des tables :
```
php bin/console doctrine:schema:update --force
```

### Lancer le serveur :
Run :
```
php bin/console server:run
```