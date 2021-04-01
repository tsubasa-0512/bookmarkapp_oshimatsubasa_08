<?php 
  while($row = mysqli_fetch_array($sql)) {
      $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
      OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
      OR outgoing_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
      $query2 = mysqli_query($con,$sql2);
      $row2 = mysqli_fetch_assoc($query2);
      if(mysqli_num_rows($query2) > 0) {
        $result = $row2['msg'];
      }else {
        $result = "メッセージなし";
      }
      
      (strlen($result) > 28) ? $msg = substr($result, 0 , 28).'...' : $msg = $result;
      
      ($row['status'] == "オフライン") ? $offline="offline": $offline="";
      
      $output .= '<a href="chat.php?user_id='.$row['unique_id'].'">
                  <div class="content">
                  <img src="php/img/'.$row['img'].'" alt="">
                  <div class="details">
                      <span>'.$row['lname']." ".$row['fname'].'</span>
                      <p>'.$msg.'</p>
                  </div>
                  </div>
                  <div class="status '.$offline.'"><i class="fas fa-circle"></i></div>
              </a>';
  }
?>