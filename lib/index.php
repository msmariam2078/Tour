<?php
require_once __DIR__.'/config/config.php';

require_once __DIR__. '/lib/DB/MysqliDb.php';
require_once __DIR__. '/app/controllers/TicketController.php';
require_once __DIR__. '/app/controllers/CityController.php';
require_once __DIR__. '/app/controllers/Helper.php';
require_once __DIR__. '/app/controllers/BookingController.php';
require_once __DIR__. '/app/controllers/CompanyController.php';
require_once __DIR__. '/app/controllers/HotelController.php';
require_once __DIR__. '/app/controllers/RatingController.php';
require_once __DIR__. '/app/controllers/AdminController.php';
require_once __DIR__. '/app/controllers/CustomerController.php';
$config = require 'config/config.php';
$db = new MysqliDb(
    $config['db_host'],
    $config['db_user'],
    $config['db_pass'],
    $config['db_name']
);

$contTicket= new TicketController($db);
$contBooking= new BookingController($db);
$contCompany= new CompanyController($db);
$contCity= new CityController($db);
$contHotel= new HotelController($db);
$contRating= new RatingController($db);
$contAdmin= new AdminController($db);
$contCustomer= new CustomerController($db);
$request= $_SERVER['REQUEST_URI'];

$contAdmin->login();




define('PAGE_PATH','/mvc/');

switch ($request) {
    case PAGE_PATH:
        $contTicket->index();
        break;
    case PAGE_PATH . 'viewticket?id=' . $_GET['id']:
        $contTicket->getTicketById($_GET['id']);
        break;
    case PAGE_PATH . 'viewticketcity?id='. $_GET['id']:
        $contTicket->getTicketByCityId( $_GET['id']);
        break;
    case PAGE_PATH . 'viewticketompany?id='.$_GET['id']:
        $contTicket->getTicketByCompanyId($_GET['id']);
        break;
    case PAGE_PATH . 'viewticketdateanddate':
        $contTicket->getTicketDateAndCity();
        break;
    case PAGE_PATH . 'newbooking?id='. $_GET['id']:
        $contBooking->addBooking($_GET['id']);
        break;
    case PAGE_PATH . 'ticketbook?id='. $_GET['id']:
        $contBooking->getBookingByTicketId($_GET['id']);
        break;
   
     case PAGE_PATH . 'viewbooking?id='. $_GET['id']:
        $contBooking->getBookingById($_GET['id']);
        break;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
    case PAGE_PATH . 'viewcustombooking':
       $contBooking->getBookingByCustomName() ;                 
       break;
    case PAGE_PATH .'viewCompany' :
        $contCompany->getCompany();
       break;
   case PAGE_PATH .'viewCity' :
       $contCity->getCities();
       break;
   case PAGE_PATH .'viewoneCity?id='. $_GET['id'] :
       $contCity->getCityById($_GET['id']);
       break; 
   case PAGE_PATH .'viewcities' :
       $contCity->getCities();
       break; 

   case PAGE_PATH .'deleteCity' :
       $contCity->deleteCity();
       break;          
    
    case PAGE_PATH .'newhotel' :
        $contHotel->addHotel();
                         break;
    case PAGE_PATH .'removehotel' :
        $contHotel->deletehotel();
                             break; 
     case PAGE_PATH .'viewhotels?id='.$_GET['id']  :
    $contHotel->indexHotel($_GET['id'] );
                           break; 
     case PAGE_PATH .'viewhotelscity' :
         $contHotel->getHotelsByCityId();
                             break;  
    case PAGE_PATH .'viewcompanies' :
        $contCompany->getCompany();
                            break; 
    case PAGE_PATH .'searchcompanies' :
       $contCompany->getCompanyByTitle();
                                 break;
    case PAGE_PATH .'removecompanies' :
        $contCompany->deleteCompany();
    case PAGE_PATH .'newcompanies' :
          $contCompany->addCompany();
                             break;   
     case PAGE_PATH .'newRate?id='.$_GET['id'] :
         $contRating->addRating($_GET['id']);
      break;                      
      case PAGE_PATH .'viewhotelrating?id='.$_GET['id'] :
        $contRating->getRatingByHotelId($_GET['id']);
     break; 
     case PAGE_PATH .'editrate?id='.$_GET['id'] :
        $contRating->updateRating($_GET['id']);
     break; 
     case PAGE_PATH .'logout':
        $contAdmin->logout();
     break; 
     case PAGE_PATH .'addadmin':
        $contAdmin->addAdmin();
     break; 
     case PAGE_PATH .'deleteadmin':
        $contAdmin->deleteAdmin();
     break; 
     case PAGE_PATH .'editadmin?id='.$_GET['id']:
        $contAdmin->updateAdmin($_GET['id']);
     break; 
     case PAGE_PATH .'updateCustomer?id='.$_GET['id']:
        $contAdmin->updateCustomer($_GET['id']);
     break; 
     case PAGE_PATH .'removeCustomers':
        $contCustomer->deleteCustomer();
     break; 
     case PAGE_PATH .'viewCustomers':
        $contCustomer->getCustomers();
     break; 
     
            
     }      
   

      
    
    
    
    










?>