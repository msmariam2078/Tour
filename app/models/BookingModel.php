<?php
class BookingModel{
    private $db;
public function __construct($db) {
    $this->db = $db;
}

public function getBooks()
{

return $this->db->get("bookings");


}
public function getBookById($id)
{

return $this->db->where('id',$id)->get("bookings");


}
public function getBookByCustomId($id)
{

return $this->db->where('customer_id',$id)->get("bookings");


}

public function getBookByBookDate($date)
{

return $this->db->where('book_date',$date)->get("bookings");


}
public function getBookByTicketId($id)
{

return $this->db->where('ticket_id',$id)->get("bookings");


}
public function addBook($data)
{


return $this->db->insert("bookings",$data);



}
public function updateBook($id,$data)
{


return $this->db->where('id',$id)->update("bookings",$data);



}
public function deleteBook($id)
{


return $this->db->where('id',$id)->delete("bookings");



}

public function deleteBookByIdCustomer($id)
{


return $this->db->where('customer_id',$id)->delete("bookings");



}
















}






?>