<?php
trait show {




    public function show1($arr) {
        $data=array();
        //var_dump($arr);
        foreach($arr as $val){
            $city=$this->city->getCityById($val['city_id']);
            //var_dump($city);
            
           $d = [
                'name'=>$val['name'],
                'city_name'=>$city
            ];

            array_push($data,$d);
    }
        $res=[
        'data'=>$data,
        'status'=>"success"
        ];
        echo json_encode($res);
    }











    public function show2($arr){

        $city=$this->city->getCityById($arr['city_id']);
        $data=[
            'name'=> $arr['name'],
            'city_name'=> $city['name']

                ];
        
        
        $res=[
            'data'=>$data,
            'status'=>"success"
                 ];
        echo json_encode($res);}}


class HotelController{
use test,show;
public function __construct($db) {
    $this->model = new HotelModel($db);
    $this->city = new CityModel($db);
}


public function indexHotel($id) {
    $hotels = $this->model->getHotelById($id);
    
    $this->show2($hotels);
    //var_dump($hotels);
}

public function addHotel(){
if($_SERVER['REQUEST_METHOD']=='POST'){

$data=[
'name'=>$_POST['name'],
'city_id'=>$_POST['city_id']
];
$result=$this->model->addHotel($data);
$this->testing($result);
}else{
    echo json_encode(["status"=>'no data in post']);

}}


public function deletehotel(){
    if($_SERVER['REQUEST_METHOD']=='POST'){
       $data=$this->model->deleteHotel($_POST['id']);
       $this->testing($data);
  
        }else{
              echo json_encode(["status"=>'no data in post']);
        }



}
public function getHotelsByCityId(){
    if($_SERVER['REQUEST_METHOD']=='POST'){

      $data=$this->model->getHotelByCityId($_POST['city_id']);
       $this->show1($data);
     }
     else{
        echo json_encode(["status"=>'no data in post']);;
    }



}












}


?>