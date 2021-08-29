<!DOCTYPE html>
<html>
    <head>
        <title>Programme - Plan de classe</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="assets/css/main.css" />
        <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
    </head>
    <body class="is-preload">
    
        <?php
    if (isset($_POST['mot_de_passe']) AND $_POST['mot_de_passe'] ==  "admin0" AND isset($_POST['identifiants']) AND $_POST['identifiants'] ==  "admin") // Si le mot de passe est bon
    {
    // On affiche les codes
    ?>

        <!-- Wrapper -->
            <div id="wrapper">

                <!-- Header -->
                    <header id="header" class="alt">
                        <a href="index.html" class="logo"><strong>Noé</strong> <span>Identité visuelle</span></a>
                        <nav>
                            <a href="#menu">Menu</a>
                        </nav>
                    </header>

                <!-- Menu -->
                    <nav id="menu">
                        <ul class="links">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="moi.html">Moi</a></li>
                            <li><a href="compétences.html">Compétences</a></li>
                            <li><a href="projets.html">Mes projets</a></li>
                            <li><a href="cours.html">Cours</a></li>
                            <li><a href="elements.html">Elements</a></li>
                        </ul>
                        <ul class="actions stacked">
                            <li><a href="#" class="button primary fit">Get Started</a></li>
                            <li><a href="#" class="button fit">Log In</a></li>
                        </ul>
                    </nav>

                <!-- Main -->
                    <div id="main" class="alt">

                        <!-- One -->
                            <section id="one">
                                <div class="inner">
                                    <header class="major">
                                        <h1>Programme Plan de classe.</h1>
                                    </header>
                                    
                                    <h3>Code Python associé - <a href="index.html" target="_blan">Retour au menu principal (Click)</a></h3>
                                                    <div class="a1"><pre><code>"""Programme Plan de Classe - Noé"""

"""Ce PROGRAMME NE MARCHE QUE POUR DES CLASSES PAIRES !"""

import os
from random import *

#Importation du fichier texte avec les noms des élèves de la classes
dico = open("Classe.txt", "r")
contenu = dico.read()
liste_eleves = contenu.split("\n")

#Suppression des espaces vides entres les noms
del liste_eleves[1]
del liste_eleves[2]

filles = liste_eleves[0]
garcons = liste_eleves[1]


filles = filles.split(" - ")
garcons = garcons.split(" - ")
print("Filles >>", filles)
print("Garçons >>", garcons)

#Vérification de la mixité entre filles & garçons.
if len(filles) == len(garcons):
    print("\nIl y a autant de filles que de garçons")
    nb_duos_r = len(filles)
elif len(filles) < len(garcons):
    print("\nIl y a plus de garçons")
    nb_duos_r = (len(garcons) - len(filles))/2
else:
    print("\nIl y a plus de filles")
    nb_duos_r = (len(filles) - len(garcons))/2


nb_eleves = len(filles) + len(garcons)

print("\nIl y aura donc {} tables non mixtes".format(nb_duos_r))
print("Il y aura donc {} tables mixtes".format((nb_eleves/2) - nb_duos_r))
print("Pour un total de {} élèves.".format(nb_eleves))

filles_c = filles
garcons_c = garcons

nb_no_mix = nb_eleves/2 - nb_duos_r
nb_no_mix = int(nb_no_mix)

duos = []

for i in range(nb_no_mix):
    f = choice(filles_c)
    filles_c.remove(f)
    g = choice(garcons_c)
    garcons_c.remove(g)
    alea = random()
    if alea < 0.5:
        add = "(Gauche) " + g + " & " + f + " (Droite)"
    else:
        add = "(Gauche) " + f + " & " + g + " (Droite)"
    duos.append(add)

print(duos)

for i in range(int(nb_duos_r)):

    if len(filles) > len(garcons):
        a1 = choice(filles_c)
        filles_c.remove(a1)
        a2 = choice(filles_c)
        filles_c.remove(a2)

        alea = random()
        if alea < 0.5:
            add = "(Gauche) " + a1 + " & " + a2 + " (Droite)"
        else:
            add = "(Gauche) " + a2 + " & " + a1 + " (Droite)"
        duos.append(add)

    else:
        a1 = choice(garcons_c)
        garcons_c.remove(a1)
        a2 = choice(garcons_c)
        garcons_c.remove(a2)

        alea = random()
        if alea < 0.5:
            add = "(Gauche) " + a1 + " & " + a2 + " (Droite)"
        else:
            add = "(Gauche) " + a2 + " & " + a1 + " (Droite)"
        duos.append(add)

print("Avec non mixtes inclus >>", duos)

nb_col = int(input("Nombre de divisions [2 ou 3] ?"))


print("\nIl y a donc {} rangées.".format(nb_col))

nb_lignes1 = (nb_eleves/2)//nb_col
print(nb_lignes1)
nb_lignes2 = (nb_eleves/2)%nb_col
print(nb_lignes2)

tri = []
tri2 = []
#1ère colonne :
for j in range(int(nb_col)):
    tri = []
    for i in range(int(nb_lignes1)):
        choix = choice(duos)
        duos.remove(choix)
        tri.append(choix)
    tri2.append(tri)

print(tri2)

#Si il n'y a pas le même nombre de tables par colonne
while len(duos) != 0:

    choix = choice(duos)
    duos.remove(choix)
    tri2[0].append(choix)

    if len(duos) == 0:
        break

    choix = choice(duos)
    duos.remove(choix)
    tri2[1].append(choix)

    if len(duos) == 0:
        break

    if nb_col == 3:
        choix = choice(duos)
        duos.remove(choix)
        tri2[2].append(choix)

print(tri2)

print("\n ==============================")
print("\nVoici la géneration aléatoire : \n")


for i in range(len(tri2)):
    print(i + 1, "Colonne :")
    for elt in tri2[i]:
        place = str(tri2[i].index(elt) + 1) + " Rangée :"
        print("  ", place, str(elt))

"""Fin du programme"""

</code></pre></div>

<style>
                    .a1 code {
                        height: 600px;
                        }
                </style>
<p>Ne pas oublier de créer un fichier texte nommé Classe.txt de cette forme : 
</p>
<div class="a2"><pre><code>    
Alice - Lucie - Iris - Noemiemie - Julie - Rose

Noe - Jean - Gérard - Jean - Georges - Matthieu - Hugo
</code></pre></div>
                <style>
                    .a2 code {
                        height: 150px;
                        }
                </style>
                                </div>
                            </section>

                    </div>

                <!-- Footer -->
                    <footer id="footer">
                        <div class="inner">
                            <ul class="icons">
                                <li><a href="#" class="icon brands alt fa-twitter"><span class="label">Twitter</span></a></li>
                                <li><a href="#" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
                                <li><a href="#" class="icon brands alt fa-github"><span class="label">GitHub</span></a></li>
                            </ul>
                            <ul class="copyright">
                                <li>&copy; Noé Daniel</li><li>Tous droits réservés</li>
                            </ul>
                        </div>
                    </footer>

            </div>
        </div>
        </body>
        <?php
    }
    else // Sinon, on affiche un message d'erreur
    {
        echo '<p>Mot de passe incorrect</p>';
    }
    ?>
        
        
</html>