<?php
require __DIR__.'/../models/AdminModel.php';

class AdminController{
    use test;
    private $model;
    public function __construct($db) {
        $this->model = new AdminModel($db);
    }

public function addAdmin(){

    if($_SERVER['REQUEST_METHOD']=='POST'){
$d=['name'=>$_POST['name'],
'email'=>$_POST['email'],
'password'=>$_POST['password']];


$data=$this->model->addAdmin($d);
$this->testing($data);}
else{

echo json_encode(['status'=>'no data in post']);
}


}


public function deleteAdmin(){
    if($_SERVER['REQUEST_METHOD']=='POST'){
     $id=$_POST['id'];
    
    $data=$this->model->deleteAdmin($id);
    $this->testing($data);
}
}

public function updateAdmin($id){
    if($_SERVER['REQUEST_METHOD']=='post')
     {
      $data=['name'=>$_POST['name'],
      'email'=>$_POST['email'],
      'password'=>$_POST['password']];
      $result=$this->model->updateAdmin($id,$data);
     $this->testing($result);

     }else{
     
        echo json_encode(["status"=>'no data in post']);
         

     }}

     public function login(){
        $card=getallheaders();
        if(isset($card['card']) && $this->model->getAdminByCard($card['card']))
        {
         return ;
        }
        
        if($_SERVER['REQUEST_METHOD']=='POST'){
           if(!empty($_POST['email'])&&!empty($_POST['password'])){
        if($data=$this->model->getAdminByEmailPassword($_POST['email'],$_POST['password']))
        {   $card=rand();

            $res=[
             'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>$data['password'],
            'card'=>$card
            ];

        $this->model->updateAdmin($data['id'],$res);
        $res=[
          "status"=>'success',
          'card'=>$card
         ];
        echo json_encode($res);
        }else{
        echo json_encode(['status'=>"no such admin"]);
        }
        }else{
        echo json_encode(['status'=>"please enter email and password"]);
        exit();
        }
    }
        }
    
    



    public function logout(){

    $card=getallheaders();
    if($res=$this->model->getAdminByCard($card['card']))
    {
    $data=['card'=>' '];
    $updating=$this->model->updateAdmin($res['id'],$data);
    $this->testing($updating);
    }else{
    echo json_encode(['status'=>'no such card']); 
     }


    }

}
?>