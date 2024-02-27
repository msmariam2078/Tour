<?php



class CompanyController{
use test;
private $model;
public function __construct($db) {
    $this->model = new CompanyModel($db);
}

public function getCompany()
{
$data=$this->model->getCompany();
     $this->testing($data);

}



public function getCompanyByTitle(){


if($_SERVER['REQUEST_METHOD']=='POST'){
$data=$this->model->getCompanyByTitle($_POST['title']);
$this->testing($data);

}else{

    echo json_decode(['status'=>'no data in post']);
}


}



public function updateCompany($id){
   
    if($_SERVER['REQUEST_METHOD']=='POST'){
     
    $d=[
    'address'=>$_POST['address'],
    'phone'=>$_POST['phone']

];
    $data=$this->model->updateCompany($id,$d);
    $this->testing($data);
    
    }
  

}


// public function deleteCompany(){

// if($_SERVER['REQUEST_METHOD']=='POST'){
 

// $data=$this->model->deleteCompany($_POST['id']);
// $this->testing($data);

// }else{
//  echo json_encode(['status'=>'nodata in post']);

// }}


public function addCompany(){
   
    if($_SERVER['REQUEST_METHOD']=='POST'){
     
    $d=['title'=>$_POST['title'],
    'address'=>$_POST['address'],
    'phone'=>$_POST['phone']

];
    $data=$this->model->addCompany($d);
    $this->testing($data);
    
    }
  

}


}







?>