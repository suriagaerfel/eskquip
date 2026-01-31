<?php
require '../../initialize.php';
require '../../database.php';



if (isset($_POST['status_promotion_submit'])) {

  $promotionId = htmlspecialchars($_POST['promotion_id']);
  $toDo = htmlspecialchars($_POST['to_do']);
  $duration = (int) htmlspecialchars($_POST['promotion_duration']);
  $status = '';

  if ($toDo == 'publish') {
    $status ="Published";

  }

  if ($toDo == 'unpublish') {
    $status ="Unpublished";
  }



  $sqlPromotionInfo = "SELECT * FROM promotions WHERE promotionId = '$promotionId'";

  $sqlPromotionInfoResult = mysqli_query($conn,$sqlPromotionInfo);
  $promotionInfo = $sqlPromotionInfoResult->fetch_assoc();

  $promotionDate = $promotionInfo ['promotionDate'] !='0000-00-00 00:00:00' ? $promotionInfo ['promotionDate'] : date("Y-m-d H:i:s", $currentTime);

  $promotionExpiry = $promotionInfo ['promotionExpiry'] !='0000-00-00 00:00:00' ? $promotionInfo ['promotionExpiry'] : date ("Y-m-d H:i:s", strtotime($promotionDate) + ($duration * 86400));


  $sqlUpdatePromotionStatus = "UPDATE promotions 
                      SET promotionStatus = ?,
                      promotionDate = ?,
                      promotionExpiry = ?
                      WHERE promotionId =  $promotionId";

  
  $stmt = mysqli_stmt_init($conn);
  $prepareStmt = mysqli_stmt_prepare($stmt, $sqlUpdatePromotionStatus);
  
  if ($prepareStmt) {
  mysqli_stmt_bind_param($stmt,"sss", $status,$promotionDate,$promotionExpiry);
  mysqli_stmt_execute($stmt);

  echo 'Promotion Status Updated';
  }
                       
}




