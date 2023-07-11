<?php

namespace App\Services;

class Statistiques {
    // calcule toutes les permutations possibles de valeurs d'un array
        /**
         * 
         * @param type $items
         * @param type $perms
         * @return type array (toutes les permutations - combinaisons 
         * ou l'ordre compte)
         */
        function permutations($items, $perms = array( )) {
            if (empty($items)) {
                $return = array($perms);
            }  else {
                $return = array();
                for ($i = count($items) - 1; $i >= 0; --$i) {
                     $newitems = $items;
                     $newperms = $perms;
                 list($foo) = array_splice($newitems, $i, 1);
                     array_unshift($newperms, $foo);
                     $return = array_merge($return, $this->permutations($newitems, $newperms));
                 }
            }
            return $return;
        }
}
