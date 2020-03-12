<h1>Projet 5 OpenClassrooms parcours "Développeur d'applications PHP/Symfony"<h1>

  Le site est disponible en ligne à l'adresse suivante : http://blogphp.charlottesaury.fr/.
<hr>
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/908dff149a924213986556bde63c713d)](https://www.codacy.com/manual/CharlotteSaury/OCRP5POO?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=CharlotteSaury/OCRP5POO&amp;utm_campaign=Badge_Grade)

<h2>Informations</h2><br>

Ce blog a été développé par Charlotte SAURY dans le cadre du 5e projet OpenClassrooms du parcours "Développeur d'applciation PHP/Symfony". Plus d'informations ci-dessous.

<h2>Installation</h2><br>
<ul>
  <li><b>Etape 1 :</b> Transférer les fichiers dans le dossier racine de votre serveur web (en général "www/").</li>
  <li><b>Etape 2 :</b> Créer une base données sur votre SGDB (MySQL) et importer le fichier DB/phpblogp5.sql pour charger les tables du blog.</li>
  <li><b>Etape 3 :</b> Dans le fichier config/dev.php, modifiez les paramètres suivants en fonction de vos accès :</li>
</ul>
<ul>
  <li>define('DB_HOST', 'localhost');</li>
  <li>define('DB_USER', 'root');</li>
  <li>define('DB_PASS', '');</li>
  <li>define('DB_NAME', 'phpblogp5');</li>
</ul>

<h2>Paramétrage du formulaire de contact</h2><br>
Dans le fichier config/dev.php, modifiez le paramètre : define('CF_EMAIL', 'votre email');

<h2>Utilisation</h2>
<ul>
  <li>Vous pouvez créer un compte dans l'onglet "Se connecter" du menu.</li><br>
  <li>Ensuite, cliquez sur <em>s'inscrire</em> en haut du formulaire de login.</li>
</ul>

<h2>Obtenir un compte Super-Admin</h2><br>
<p><em>(Accès à toute la partie administration dont la gestion du formulaire de contact pour laquelle les "admin" n'ont pas accès)</em></p>
<ul>
  <li>Dans votre base de données et dans la table "user", modifier la colonne "user_role_id" de l'utilisateur que vous venez de créer et insérez la valeur 3.</li><br> 
  <li>Enregistrez la modification.</li><br>
<li>Vous disposez désormais d'un compte super-admin qui vous permettra de gérer l'intégralité des fonctionnalités du blog via la partie tableau de bord ! Pour y accéder, une fois connecté, vous avez accès au menu tableau de bord dans le menu principal. Un lien vers l'espace administration est également présent dans le footer.</li>

</ul>

<h3>Contexte</h3>
Ça y est, vous avez sauté le pas ! Le monde du développement web avec PHP est à portée de main et vous avez besoin de visibilité pour pouvoir convaincre vos futurs employeurs/clients en un seul regard. Vous êtes développeur PHP, il est donc temps de montrer vos talents au travers d’un blog à vos couleurs.

<h3>Description du besoin</h3>
Le projet est donc de développer votre blog professionnel. Ce site web se décompose en deux grands groupes de pages :

les pages utiles à tous les visiteurs ;
les pages permettant d’administrer votre blog.
Voici la liste des pages qui devront être accessibles depuis votre site web :

la page d'accueil ;
la page listant l’ensemble des blog posts ;
la page affichant un blog post ;
la page permettant d’ajouter un blog post ;
la page permettant de modifier un blog post ;
les pages permettant de modifier/supprimer un blog post ;
les pages de connexion/enregistrement des utilisateurs.
Vous développerez une partie administration qui devra être accessible uniquement aux utilisateurs inscrits et validés.

Les pages d’administration seront donc accessibles sur conditions et vous veillerez à la sécurité de la partie administration.

Commençons par les pages utiles à tous les internautes.

Sur la page d’accueil, il faudra présenter les informations suivantes :

votre nom et votre prénom ;
une photo et/ou un logo ;
une phrase d’accroche qui vous ressemble (exemple : “Martin Durand, le développeur qu’il vous faut !”) ;
un menu permettant de naviguer parmi l’ensemble des pages de votre site web ;
un formulaire de contact (à la soumission de ce formulaire, un e-mail avec toutes ces informations vous sera envoyé) avec les champs suivants :
nom/prénom,
e-mail de contact,
message,
un lien vers votre CV au format PDF ;
et l’ensemble des liens vers les réseaux sociaux où l’on peut vous suivre (GitHub, LinkedIn, Twitter…).
Sur la page listant tous les blogs posts (du plus récent au plus ancien), il faut afficher les informations suivantes pour chaque blog post :

le titre ;
la date de dernière modification ;
le châpo ;
et un lien vers le blog post.
Sur la page présentant le détail d’un blog post, il faut afficher les informations suivantes :

le titre ;
le chapô ;
le contenu ;
l’auteur ;
la date de dernière mise à jour ;
le formulaire permettant d’ajouter un commentaire (soumis pour validation) ;
les listes des commentaires validés et publiés.
Sur la page permettant de modifier un blog post, l’utilisateur a la possibilité de modifier les champs titre, chapô, auteur et contenu.

Dans le footer menu, il doit figurer un lien pour accéder à l’administration du blog.

<h3>Contraintes</h3>
Cette fois-ci, nous n’utiliserons pas WordPress. Tout sera développé par vos soins. Les seules lignes de code qui pourront provenir d’ailleurs seront celles du thème Bootstrap, que vous prendrez grand soin de choisir. La présentation, ça compte ! Il est également autorisé d’utiliser une ou plusieurs librairies externes à condition qu’elles soient intégrées grâce à Composer.

Attention, votre blog doit être navigable aisément sur un mobile (téléphone mobile, phablette, tablette…). C’est indispensable ! C’est indispensable :D
Nous vous conseillons vivement d’utiliser un moteur de templating tel que Twig, mais ce n’est pas obligatoire.

Sur la partie administration, vous veillerez à ce que seules les personnes ayant le droit “administrateur” aient l’accès ; les autres utilisateurs pourront uniquement commenter les articles (avec validation avant publication).

Important : Vous vous assurerez qu’il n’y a pas de failles de sécurité (XSS, CSRF, SQL Injection, session hijacking, upload possible de script PHP…).

Votre projet doit être poussé et disponible sur GitHub. Je vous conseille de travailler avec des pull requests. Dans la mesure où la majorité des communications concernant les projets sur GitHub se font en anglais, il faut que vos commits soient en anglais.

Vous devrez créer l’ensemble des issues (tickets) correspondant aux tâches que vous aurez à effectuer pour mener à bien le projet.

Veillez à bien valider vos tickets pour vous assurer que ceux-ci couvrent bien toutes les demandes du projet. Donnez une estimation indicative en temps ou en points d’effort (si la méthodologie agile vous est familière) et tentez de tenir cette estimation.

L’écriture de ces tickets vous permettra de vous accorder sur un vocabulaire commun. Il est fortement apprécié qu’ils soient écrits en anglais !

Nota Bene
Votre projet devra être suivi via SymfonyInsight, ou Codacy pour la qualité du code. Vous veillerez à obtenir une médaille d'argent au minimum (pour SymfonyInsight). En complément, le respect des PSR est recommandé afin de proposer un code compréhensible et facilement évolutif.

<h3>Objectifs du projet</h3>

- Estimer une tâche et tenir les délais
- Gérer ses données avec une base de données
- Proposer un code propre et facilement évolutif
- Assurer le suivi qualité d’un projet
- Choisir une solution technique adaptée parmi les solutions existantes si cela est pertinent
- Créer et maintenir l’architecture technique du site
- Analyser un cahier des charges
- Créer une page web permettant de recueillir les informations saisies par un internaute
- Conceptualiser l'ensemble de son application en décrivant sa structure (Entités / Domain Objects)
- Rédiger les spécifications détaillées du projet

<h3>Autres informations</h3>

Deux thèmes Bootstrap ont été utilisés pour ce projet. 
Pour la partie frontend : <a href="https://startbootstrap.com/themes/grayscale/" target="_blank">Thème Grayscale</a>
Pour la partie backend :  <a href="https://startbootstrap.com/themes/sb-admin-2/" target="_blank">Thème SB Admin 2</a>


