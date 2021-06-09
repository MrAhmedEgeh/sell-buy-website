<?php



if(isset($_POST['acceptUserId'])){
    include '../dbConnect.php';

    $id = $_POST['acceptUserId'];
    // SELECT DATA BEFORE DELETION (NOTIFICATION TABLE)
    $selectUserfromNoti = "Select * from notification where user_id = $id";
    $result = mysqli_query($conn, $selectUserfromNoti);
    // EXTRACT THE SELECTED DATA (NOTIFICATION TABLE)
    while($rows = $result->fetch_assoc()){
            $userId = $rows['user_id'];
            $companyId = $rows['company_id'];
    }
    if(isset($userId) && isset($companyId)){
        include '../dbConnect.php';
 
            $checkFirst = "Select * from members where User_id = $id";
            $first = mysqli_query($conn, $checkFirst);
            $checkrowcount=mysqli_num_rows($first);
            if($checkrowcount <= 0){
            // EXTRACTED INFO INSERTED TO THE SECOND (MEMBERS TABLE)
            $inserMember = "INSERT into members(`User_id`, `Company_Id`, `Roll_id`)VALUES('$userId', '$companyId', '2')";
            $member = mysqli_query($conn, $inserMember);
            if($member){
                // DELETE FROM (NOTIFICATION TABLE)
             $deleteMember = "Delete from notification where user_id = $id";
             $delMember = mysqli_query($conn, $deleteMember);
         }
            }

    }


    

}
?>