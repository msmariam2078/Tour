<?php
require 'Helper.php';




class CityController{
    use test;
private $model;
public function __construct($db){
    $this->model = new CityModel($db);
   $this->admin = new AdminModel($db);
}




public function getCities()
{  
    
       
    $data=$this->model->getCity();

    $this->testing($data);
  
  
 

}

public function getCityById($id)
{       
   
    $data=$this->model->getCityById($id);
    $this->testing($data);
}
    
     public function deleteCity(){
               

    if($_SERVER['REQUEST_METHOD']=='POST'){
     $id=$_POST['id'];
    
    $data=$this->model->deleteCity($id);
    $this->testing($data);}




}


}












?>
