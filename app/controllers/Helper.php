<?php
trait test{
    public function testing($res){
     echo json_encode(['status'=>$res?'success':'failed',
    'data'=>$res]);

}



}
?>