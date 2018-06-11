Comparative taxes
=================

## Informations
- Projet Symfony 3.4 avec autowire.
- Il se peut que le projet nécessite quelques modifications avant d'être fonctionnel.
- Les CDN de jQuery et de Bootstrap ont été ajoutés dans la vue par défaut.
- Le WebServer de Symfony est pré-integré et est utilisable.

## Objectifs
- Créer un formulaire d'ajout d'un Article dans une vue Twig comprenant un montant HT et afficher les valeurs pour le taux 1 TVA à **17%** et le taux 2 TVA à **20%**.
- Visualiser ces valeurs calculées dans une vue Twig avec du responsive design basé sur la grille Bootstrap.
- Tester unitairement ou fonctionnellement les résultats de calculs.
- Le travail devra être commité et pushé dans la branche master.

## Suppléments 
- Utilisation de Form Validator et des champs de FormType adaptés aux Entités.
- Pratique d'atomicité des commits pour une meilleure lisibilité des étapes de développement.
- Utilisation d'Extensions Twig et/ou de Services.
- Pratique des Standard de Symfony 3.

## Données à saisir pour les Articles
<table>
    <thead>
        <tr>
            <th>Attributs</th>
            <th>Type</th>
            <th>Contrainte</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Intitulé</td>
            <td>String (100)</td>
            <td>Not null</td>
        </tr>
        <tr>
            <td>Description</td>
            <td>Text</td>
            <td>-</td>
        </tr>
        <tr>
            <td>Montant HT</td>
            <td>Float</td>
            <td>Not null and > 0</td>
        </tr>
        <tr>
            <td>Date de création</td>
            <td>DateTime</td>
            <td>Current DateTime</td>
        </tr>
    </tbody>
</table>

## Formules de calcul
- Montant TTC taux 1 = MontantHT * 1,17<br />
- Montant TTC taux 2 = MontantHT * 1,20

## Vue à obtenir
Filtre : <br />
Liste de sélection : <br /> 
- Tout (défault)
- Montant TTC taux 1 seulement 
- Montant TTC taux 2 seulement 

_Date de création_ – _Label_<br />
_Afficher la description s'il y en a une_<br />
- Montant HT : _xxx_ €
- Montant TTC taux 1 : _yyy_ € 	
- Montant TTC taux 2 : _zzz_ €	

## Informations complémentaires
- Exemple de test unitaire : ```phpunit --bootstrap tests/Email.php tests/EmailTest.php```
