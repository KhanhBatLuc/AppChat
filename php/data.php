<?php
$loop = executeResult($sql);
foreach($loop as $item){
    $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = '{$item['unique_id']}' OR outgoing_msg_id = '{$item['unique_id']}')
    AND (outgoing_msg_id = '{$outgoing_id}' OR incoming_msg_id = '{$outgoing_id}' ) ORDER BY msg_id DESC LIMIT 1";
 
    $row2 = executeResult($sql2,true);
    // lay doan mess gan vo result neu chua nhan thi tra ve no mess
    (executeRows( $sql2) > 0) ? $result = $row2['msg'] : $result ="No message available";
        // dem so ki tu trong chuoi do neu dai hon 28 ki tu thi se cat ngan lai va gan them ...
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) .'...' : $msg = $result;

        if(isset($row2['outgoing_msg_id'])){
            ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
        }else{
            $you = "";
        }
     // check xem da offline hay chuwa
     ($item['status'] == "Offline now") ? $offline = "offline" : $offline = "";
     ($outgoing_id == $item['unique_id']) ? $hid_me = "hide" : $hid_me = "";
       
        if($item['unique_id'] ==$outgoing_id ){
            $output .= "";
        }else{

      
    $output .= '<a href="chat.php?user_id='. $item['unique_id'] .'">
    <div class="content">
    <img src="./images/'. $item['img'] .'" alt="">
    <div class="details">
        <span>'. $item['fname']. " " . $item['lname'] .'</span>
        <p>'. $you . $msg .'</p>
    </div>
    </div>
    <div class="status-dot '.$offline .'"><i class="fas fa-circle"></i></div>
</a>';
}
}
?>
