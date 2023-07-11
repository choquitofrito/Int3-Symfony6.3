<?php

// src/Services/StatistiquesLog.php
namespace App\Services;

use Psr\Log\LoggerInterface;

class StatistiquesLog {
   
    
    
    function __construct (private LoggerInterface $logger){
        $this->logger = $logger;
    }
        
    function permutations($items, $perms = array( )) {
        if (empty($items)) {
            $res = array($perms);
        }  else {
            $res = array();
            for ($i = count($items) - 1; $i >= 0; --$i) {
                 $newitems = $items;
                 $newperms = $perms;
             list($foo) = array_splice($newitems, $i, 1);
                 array_unshift($newperms, $foo);
                 $res = array_merge($res, $this->permutations($newitems, $newperms));
             }
        }
        // on utilise le service de log
        $this->logger->info ("De permutations ont été calculées");
        return $res;
    }
}
