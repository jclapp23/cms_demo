 <?php

 echo '<div id="services-wrapper" class="main"> ';
    echo '<h1>Services';
    if( $user_id = security::get_user_id() )
    {  
    echo '<a href="'.$home_url.'add-services/"><img class="icon" src="'.$home_url.'images/add.png" title="add a new service area"/></a>';   
      } 
    echo'</h1>' ;  
    echo '<div id="services">';
             $result = services::listServices();
             $count = 0;
             $new_div = true;
             foreach($result as $row)
               {
                   echo '<div class="service_columns">';
                   echo '<ul>';
                   echo '<li class="main_service"> '. $row->title;
                   if( $user_id = security::get_user_id() ){  
                    echo '<a href="'.$home_url.'edit-service?id='.$row->id.'"><img class="icon" src="'.$home_url.'images/pencil.jpg" title="edit"/></a>';
                    echo '<a class="delete" href="'.$home_url.'new-hampshire-stone-mason-services/?service_id='.$row->id.'"><img class="icon" src="'.$home_url.'images/delete.jpg" title="delete"/></a>';
                   };
                   services::listSubServicesByServiceId($row->id);
                   echo '</li>';
                   echo '</ul>';
                   echo '</div>';
               }//end foreach

   echo '<div class="clear"></div>';
    echo '</div>'; //--end services -->
  echo '<div class="clear"></div>';
  echo '</div>'; //--end services-wrapper -->

?>