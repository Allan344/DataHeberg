<?php
class GestionFile {

public static function afficherTailleFile($taillefile) {
        if ($taillefile >536870912){
            $taillefile/1073741824;
            echo (round(($taillefile/1073741824),2)) ?> Go<?php ;
        }
        elseif($taillefile >524288){
            $taillefile/1048576;
            echo (round(($taillefile/1048576),2)) ?> Mo<?php ;
        }
        elseif($taillefile >500 ){
            $taillefile/1024 ;
            echo (round(($taillefile/1024 ),2)) ?> Ko<?php ;
        }
        else{
            echo (round(($taillefile),2)) ?> Octets<?php ;
        }
    }

public static function GetTailleDossier($path){
        $bytestotal = 0;
        $path = realpath($path);
        if($path!==false && $path!='' && file_exists($path)){
            foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS)) as $object){
                $bytestotal += $object->getSize();
            }
        }
        return $bytestotal;
    }
}
?>