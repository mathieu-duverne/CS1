<?php 
require_once('includes/Model.php');
require_once('includes/Controller.php');

class View extends Controller{
    
   public function build($month, $year){
    $models = new Model();
    $bookings = $models->selectbooks($month, $year);
    $daysOfWeek = ['Dimanche','Lundi', 'Mardi','Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
    //setter
    $firstDayOfMonth = mktime(0,0,0, $month,1,$year);

    $numberDays = date('t', $firstDayOfMonth);

    $dateComponents = getdate($firstDayOfMonth);

    $monthName = $dateComponents['month'];
    
    $dayOfWeek = $dateComponents['wday'];
    $datetoday = date('Y-m-d');
    $calendrier = "<table class='table table-bordered'>";
    $calendrier.="<center><h2>$monthName $year</h2>";
    $calendrier.="<a class='btn btn-xs btn-primary' href='?month=".date('m', mktime(0,0,0, $month-1,1,$year))."&year=".date('Y', mktime(0,0,0, $month-1,1,$year))."'>Last month</a>";
    //       var_dump($calendrier);
    $calendrier.="<a class='btn btn-xs btn-primary' href='?month=".date('m')."&year=".date('Y')."'>This month</a>";
    //       var_dump($calendrier);
    $calendrier.="<a class='btn btn-xs btn-primary' href='?month=".date('m', mktime(0,0,0, $month+1,1,$year))."&year=".date('Y', mktime(0,0,0, $month+1,1,$year))."'>Next month</a></center></br>";
    $calendrier.="<tr>";
    foreach($daysOfWeek as $day){
      $calendrier.= "<th class='header'>$day</th>";
    }
    $currentDay = 1;
  $calendrier.= "</tr><tr>";
    if ($dayOfWeek > 0) {
        for ($k=0; $k < $dayOfWeek; $k++) { 
                $calendrier.="<td class='empty'></td>"; 
        }
    }
    $month = str_pad($month, 2, "O", STR_PAD_LEFT);
    while($currentDay <= $numberDays){
        if ($dayOfWeek == 7) {
            $dayOfWeek = 0;
            $calendrier.="<tr></tr>";
        }
        $currentDayRel = str_pad($currentDay, 2, 0, STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";
        $dayName = strtolower(date("l",strtotime($date)));
        $eventNum = 0;
       
        $today = $date == date('Y-m-d')?"today" : ""; 
        $jourdebooks=null;
             for($u=0;isset($bookings[$u]);$u++){         
        $moments = date('Y-m-d', strtotime($bookings[$u]));
            if($moments>=date('Y-m-d')){   
                if($moments == $date){
                   $jourdebooks=$moments;
                }
            } 
        }
                 if($date<date('Y-m-d')){        
            $calendrier.="<td><h4>$currentDay</h4><button class='btn btn-danger btn-sm'>Expired</button>";
       }
       elseif($jourdebooks==$date){
           $calendrier.="<td class='$today' ><h4>$currentDay</h4><a class='btn btn-outline-warning' href='reservation-form.php?date=".$date."'>Reservation</a><br>";
       }
       elseif(date('Y-m-d')==$date){
           $calendrier.="<td class='$today' ><h4>$currentDay</h4><a href='reservation-form.php?date=".$date."' class='btn btn-success'>Reserved</a>";
       }  
        else{
            $calendrier.="<td class='$today'><h4>$currentDay</h4><a href='reservation-form.php?date=".$date."' class='btn btn-success'>Reserved</a>";
        }
       for($i=0;isset($bookings[$i]);$i++){
  $heurecompare = date('d', strtotime($bookings[$i]));
    $jouresa = date('d', strtotime($bookings[$i]));
    $moments = date('Y-m-d', strtotime($bookings[$i]));
    $heuredebut = date('H a', strtotime($bookings[$i]));
    $i++;
    $heurefin = date('H a', strtotime($bookings[$i]));
    $i++;        
    $titrebooks = $bookings[$i];
    $i++;
    $id_user = $bookings[$i];
    $i++;
    $id_event = $bookings[$i];
        $tableUser = $models->selectid($id_user);
    $loginUser = $tableUser['login'];
           if($moments == $date){    
            $calendrier.="<a href='evenement.php?id=$id_event' class='btn btn-outline-info btn-sm'><strong>$titrebooks</strong> Reserved at<br><strong> $heuredebut and $heurefin</strong> it's <strong>$loginUser</strong></a>";
        }  
    }              
        $calendrier.="</td>";
        $currentDay++;
        $dayOfWeek++;
    }   
    if ($dayOfWeek != 7) {
        $restejour = 7-$dayOfWeek;
        for ($i=0; $i < $restejour; $i++) { 
            $calendrier.="<td class='empty'></td>";
        }
    }
    $calendrier.="</tr>";
    $calendrier.="</table>";
   return $calendrier;
}   
    
}