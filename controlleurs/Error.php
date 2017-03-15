<?php
namespace Blog\Controlleurs;
use Whitebear\Vues;
class Error
{
    public static function error($msgErreur){
        $vue = new Vues\Vue("Error", "gabarit_error");
        $vue->generer(['msgErreur' => $msgErreur]);
    }
}

?>
