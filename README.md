# StadLine Technical Test

## Présentation générale

### Tâche

Le sujet de base est simple : il faut créer un site permettant la gestion de sorties de courses à pied.

Une sortie de course à pied est définie comme ceci :
* Utilisateur
* Type de sortie (entraînement, course, loisirs, etc.)
* Date et heure de début
* Durée
* Distance
* Commentaire

Lors de la création ou modification d'une sortie, il faut calculer et enregistrer :
* la vitesse moyenne (en km/h, 11.1km/h par exemple, on pourra donc enregistrer "11.1")
* l'allure moyenne (en min/km, 5'24" par exemple, on pourra donc enregistrer "324")


Le site doit être sécurisé. Une authentification via http basic auth sur un provider in memory est amplement suffisante. 

Une fois l'utilisateur connecté, différents **écrans** doivent permettre de :
* lister les sorties (affichage des principales informations dont la vitesse moyenne et l'allure moyenne)
* ajouter / modifier une sortie
* supprimer une sortie

Une **API** doit être mise à disposition. Cette **API ne doit pas être sécurisée**. Par le biais de cette API, il doit être possible de :
* lister toutes les sorties
* lister les sorties d'un utilisateur
* récupérer le détail d'une sortie


### Les Pré-requis

* PHP >= 7.1
* Symfony >= 4
* On attend aussi de vous que le **code** soit **testable et testé**.
* Il est conseillé de finir les points requis avant de s'attaquer au bonus.
* Il est aussi conseillé de faire un maximum de commit pour bien détailler les étapes de votre raisonnement au cours du développement.
* Le temps est libre mais il est tout de même conseillé de passer moins de 4h sur le sujet (temps de setup d'environnement compris)


### Libertés

* Le choix de votre environnement PHP ainsi que du serveur d'application associé reste à votre discrétion
* Le moyen de stockage des données reste à votre discrétion
* Vous pouvez **utiliser tout bundle ou composants Sf qui pourrait vous être utile**
* Sécurisation du site, ne pas passer trop de temps sur ce sujet, faire au plus simple
* La charte graphique n'est pas imposée, **vous ne serez pas jugés sur ce point**


### Bonus

Toutes les fonctionnalités que vous aurez le temps d'ajouter seront bonnes à prendre. Soyez créatifs !!

Voici quelques idées (liste non ordonnée) :

* Ecran : permettre la gestion des types de sorties (lister, ajouter, modifier, supprimer)
* Ecran : permettre à l'utilsiateur de lister ses records (1km, 5km, 10km) :

Pour le calcul du record, on admet que l'utilisateur court de manière très régulière

Exemple : sortie de 2h pour 20km, les records de l'utilisateur **pour cette sortie** sont :
    
* 1km : 6min (120min / 20)
* 5km : 30min (120min / 4)
* 10km : 1h (120min / 2)

Reste donc à calculer les meilleurs temps pour chaque distance et chaque utilisateur.


* API : liste des activités d'un type de sortie
* API : liste des activités d'un type de sortie et d'un utilisateur
* API : liste des types de sorties disponibles (dépend du bonus de gestion des types)
* API : liste des records (dépend du bonus sur le calcul des records)
* API : liste des records pour un utilisateur (dépend du bonus sur le calcul des records)
* API : Sécuriser
* Design : Utilisation d'une lib ou d'un framework (Twitter Bootstrap ou autre)


### Délivrabilité

* Forkez le projet sur GitHub et codez directement dans le projet forké.
* Commitez aussi souvent que possible et commentez vos commits pour détailler votre chemin de pensée.
* Votre application doit être **facilement testable par nos équipes**.
* Mettez à jour le README pour ajouter le temps passé et tout ce que vous jugerez nécessaire de nous faire savoir.
* Envoyez le lien avec le projet à recrutement@stadline.com.

Bonne chance !
