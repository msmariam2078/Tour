<?php




class CustomerController{
    use test;
private $model;
public function __construct($db){
    $this->model = new CustomerModel($db);
    $this->booking = new BookingModel($db);
   $this->rating = new RatingModel($db);
}

public function getCustomers(){


$res=$this->model->getCustomers();
$data=array();
 foreach($res as $key=>$value ){

array_push($data,$value['name']);
}
  $this->testing($data);

}


public function updateCustomer($id){

    if($_SERVER['REQUEST_METHOD']=='POST')
     {
      $data=['name'=>$_POST['name'],
      'mobile'=>$_POST['mobile'],
      'gender'=>$_POST['gender'],
      'email'=>$_POST['email']
   ];
      $result=$this->model->updateCustomer($id,$data);
     $this->testing($result);

     }else{
     
        echo json_encode(["status"=>'no data in post']);
         

     }
  }



    public function deleteCustomer()
{  
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $id=$_POST['id'];
   

    $this->booking->deleteBookByIdCustomer($id);
    $this->rating->deleteRatingCustomer($id);
   $res=$this->model->deleteCustomer($id);

   $this->testing($res);



}else{
   echo json_encode(['status'=>'no data in post']);
}


}























}