<?php
session_start();
include_once("./config/db.php");
if(!isset($_SESSION['unique_id'])){
  header('login.php');
}
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php 
          $user_id =  $_GET['user_id'];
          $sql =  "SELECT * FROM users WHERE unique_id = {$user_id}";
          
         
        // select member from unique_id
          if(executeRows($sql)){
             $row = executeResult($sql,true);
          }else{
            header("location: users.php");
          }
        ?>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="./images/<?php echo $row['img']; ?>" alt="">
        <div class="details">
          <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
          <p><?php echo $row['status']; ?></p>
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area" >
      <!-- ma cua ng minh muon nt -->
        <input type="text" class="outgoing_id" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here...">
        <button><i class="fab fa-telegram-plane"></i></button>
       
      </form>
    </section>
  </div>

  <script src="javascrip/chat.js"></script>

</body>
</html>
