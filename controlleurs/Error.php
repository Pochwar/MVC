<?php
namespace Blog\Controlleurs;
use Blog\Vues;
class Error
{
    public static function error($msgErreur){
        $vue = new Vues\Vue("Error");
        $vue->generer(['msgErreur' => $msgErreur]);
    }
}

?>
