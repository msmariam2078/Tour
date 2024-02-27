<?php

require __DIR__.'/../models/BookingModel.php';
require __DIR__.'/../models/CustomerModel.php';
require __DIR__.'/../models/HotelModel.php';
  trait results {
  public function show($arr){
  $data=array();
  foreach($arr as $val){
  $cutomer=$this->customer->getCustomerById($val['customer_id']);
  $hotel=$this->hotel->getHotelById($val['hotel_id']);
  $d=[
  'customer_name'=>$cutomer['name'],
  'hotel_name'=>$hotel['name']
     ];
       
  array_push($data,$d); }

  $res=[
    'data'=>$data,
    'status'=>"success"
       ];
  echo json_encode($res);
     
       
        
}

}
  class BookingController{
   use test,results;
   private $model;
  
   public function __construct($db) {
      
  $this->model = new BookingModel($db);
  $this->customer=new CustomerModel($db);
  $this->hotel=new HotelModel($db);
  $this->admin=new AdminModel($db);
        }



  public function addBooking($idTicket){

    $card=getallheaders();

  if($_SERVER['REQUEST_METHOD']=='POST')
            {
  $data=[
  'name'=>$_POST['name'],
  'mobile'=>$_POST['mobile'],
  'gender'=>$_POST['gender'],
  'email'=>$_POST['email']
   
         ];
  if($this->customer->addCustomer($data))
             {
   $idcusto=$this->customer->getCustomerByEmail($_POST['email']);

  $addbooking=$this->model->addBook(['ticket_id'=>$idTicket,
  'customer_id'=>$idcusto['id'],
  'hotel_id'=>$_POST['hotel_id']]);

  if($addbooking){
    echo json_encode(['status'=>'success']);
  }
  else{
    $this->customer->deleteCustomer($idcusto['id']);
    echo json_encode(['status'=>'falied']);
  }

   }
  else{
  echo json_encode(['status'=>'nodata']);

     }}
  else{
  echo json_encode(['status'=>'nodata in post']);

   }}


            public function getBookingByTicketId($id){
              
                $res=$this->model->getBookByTicketId($id);
                $this->show($res);
             
            }


            public function getBookingByCityId($id){
           
                $res=$this->model->getBookByCitytId($id);
                $this->show($res);

            }


            public function getBookingById($id){
              
             
                $res=$this->model->getBookById($id);
                $this->show($res);

            }


            public function getBookingByCustomName(){
             
              if($_SERVER['REQUEST_METHOD']=='POST'){
                $name=$_POST['name'];
              if($customData=$this->customer->getCustomerByName($name))
              {
              $res=$this->model->getBookByCustomId($customData['id']);
              $this->show($res);}
              else{
                echo json_encode(['status'=>'no such customer']);
              }
              }else
              {
                echo json_encode(['status'=>'no data in post']);
              }

          }




            public function updateHotelBooking($id){
           
            if($_SERVER['REQUEST_METHOD']=='POST')
             {
              $data=['hotel_id'=>$_POST['hotel_id']];
              $result=$this->model->updateBook($id,$data);
             $this->testing($result);

             }else{
             
                echo json_encode(["status"=>'no data in post']);
                 

             }
            
            }
}
?>