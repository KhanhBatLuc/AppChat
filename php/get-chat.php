<?php
session_start();
include_once('../config/db.php');
if(isset($_SESSION['unique_id'])){
    $chinhminh = $_POST['outgoing_id'];
    $ngminhmuonnhan = $_POST['incoming_id'];
    $output = "";
    $sql = "SELECT * FROM  messages 
    LEFT JOIN users ON users.unique_id =  messages.incoming_msg_id
     WHERE (outgoing_msg_id = '$chinhminh' AND incoming_msg_id = ' $ngminhmuonnhan')
    OR (outgoing_msg_id = '$ngminhmuonnhan' AND incoming_msg_id = '$chinhminh') ORDER BY msg_id ASC
   ";
    if(executeRows($sql)>0){
        $rows = executeResult( $sql);
        foreach($rows as $items){
              
                if($items['outgoing_msg_id'] == $chinhminh )
                {
                    $output .= '<div class="chat outgoing">
                    <div class="details">
                        <p>'. $items['msg'] .'</p>
                    </div>
                    </div>';
                }
                else{
                    $output .= '<div class="chat incoming">
                    <img src="./images/'.$items['img'].'" alt="">
                    <div class="details">
                        <p>'. $items['msg'] .'</p>
                    </div>
                    </div>';
                }
        }

    }
echo $output;
}
else{
    header("../login.php");
}
?>