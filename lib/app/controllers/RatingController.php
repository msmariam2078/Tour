<?php

require __DIR__.'/../models/RatingModel.php';


class   RatingController{
    use test;
    private $model;
    public function __construct($db){
    $this->model = new  RatingModel($db);
   $this->customer = new CustomerModel($db);
   $this->Hotel = new HotelModel($db);
}


    public function addRating($idhotel){
   
    if($_SERVER['REQUEST_METHOD']=='POST'){
       $customEmail=$_POST['custom_email'];
       $rating=$_POST['rating'];
       $comment=$_POST['comment'];

     if($customData=$this->customer->getCustomerByEmail($customEmail)){
        $d=[
        'hotel_id'=>$idhotel,    
        'customer_id'=>$customData['id'],
         'rate'=>$rating,
         'comment'=>$comment
        ];
        
        $data=$this->model->addRating($d);
        $this->testing($data);
     }else{

        echo json_encode(['status'=>'no such customer']);
     }

    }else{

        echo json_encode(['status'=>'no data in post']);
    }



}

public function getRatingByHotelId($id){
  
   $arr=$this->model->getRatingByHotelId($id);

   $data=array();
   foreach($arr as $val){
    $custo= $this->customer->getCustomerById($val['customer_id']);
    $hotel=$this->Hotel->getHotelById($val['hotel_id']);
    $d=[
    'customer_name'=>$custo['name'],
    'hotel_name'=>$hotel['name'],
    'rate'=>$val['rate'],
    'comment'=>$val['comment']
    ];
   
       array_push($data,$d); }

    $res=[
        'data'=>$data,
        'status'=>"success"
     ];
    echo json_encode($res);
  
}



    public function updateRating($id){
  
  
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $d=[
       'rate'=>$_POST['rate'],
       'comment'=>$_POST['comment']
      ];

    $data=$this->model->updateRating($id,$d);
    $this->testing($data);
    } else{

        echo json_encode(['status'=>'no data in post']);
    }

}









}