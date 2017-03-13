<?php
class ControlleurError
{
    public function error($msgErreur){
        $vue = new Vue("Error");
        $vue->generer(['msgErreur' => $msgErreur]);
    }
}

?>
