# SOFT RESET

On a fait un ou plusieurs possibles mauvais commits, et en plus on a continuer à developper.
On veut revenir dans notre dernier bon commit MAIS on ne veut pas perdre:
- ni ce qu'on a developpé après les possibles mauvais commits
- ni le code modifié par ces mauvais commits
En plus, on veut conserver le staging area dans le même état

On pourra maintenant réviser le code pour voir qu'est-ce qu'on veut garder de ces "mauvais commits" 
ainsi que du code developpé entre temps. Une fois tout est clair on fera un commit et on continue 
le parcours normal. 


# MIXED RESET (par défaut)

On a fait un ou plusieurs possibles mauvais commits, et en plus on a continuer à developper.
On veut revenir dans notre dernier bon commit MAIS on ne veut pas perdre:
- ni ce qu'on a developpé après les possibles mauvais commits
- ni le code modifié par ces mauvais commits
MAIS dans ce cas on ne veut pas conserver ce qu'il y a dans le staging area car on ne compte pas de le committer

On pourra maintenant réviser le code pour voir qu'est-ce qu'on veut garder de ces "mauvais commits" 
ainsi que du code developpé entre temps, mais nos fichiers ne seront plus dans la stage area. 
Une fois tout est clair on fera un commit et on continue le parcours normal. 


# HARD RESET (attention)

On a fait un ou plusieurs possibles mauvais commits, et en plus on a continuer à developper.
On veut revenir dans notre dernier bon commit et on veut tout perdre (les commits + le code developpé après les commits)
Le disque sera modifié et il n'y aura rien dans le stage area.

# REVERTIR!

Dans tous les resets, les commits ne sont pas effacés mais cachés, on peut les voir en cliquant sur "Repository Settings" (Rouelle) et
"Include commits only mentioned by reflogs". Si on veut revenir sur eux, on peut utiliser:

    git branch nomBranche <ici le hash de commit>
    git branch mabranche 234234

et git créera une nouvelle branche à partir de ce commit. Puis on peut faire un merge avec la main si on veut vraiment conserver ces commits
