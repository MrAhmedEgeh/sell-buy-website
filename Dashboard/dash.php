<?php
    include '../Navbar/Navbar.php'; 
    if (!isset($_SESSION['login_admin']))
    {
        header('location: http://localhost/InvMGMT/index.php');
    }
    else
    {
        
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="form.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="dashboard.css" rel="stylesheet" type="text/css"/>
    <link href="../css Files/product.css" rel="stylesheet" type="text/css"/>
    <title>Dashboard page </title>
    <style>
        #customers {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 70%;
          margin: 0 auto;
        }

        #customers td, #customers th {
          border: 1px solid #ddd;
          padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #262626;
          color: white;
        }
        .delBtn,
        .editBtn {
          border: 1px solid #262626;
          background-color: #262626;
          border-radius: 20px;
          color: #fff;
        }
        .delBtn:hover,
        .editBtn:hover {
          cursor: pointer;
        }
        .delBtn{
            color: black;
            background-color: #fabd06;
        }
        .myText{
          width: 100%;
          padding: 12px;
          border: 1px solid #ccc;
          border-radius: 4px;
          box-sizing: border-box;
          margin-top: 6px;
          margin-bottom: 16px;
          resize: vertical;
        }

        .mySubmit {
          background-color: #ffc107;;
          color: white;
          padding: 12px 20px;
          border: none;
          border-radius: 4px;
          cursor: pointer;
        }

        .mySubmit:hover {
          background-color: #45a049;
        }

        .mycontainer {
          border-radius: 5px;
          background-color: #f2f2f2;
          padding: 20px;
          width: 50%;
          margin: 0 auto; 
        }
        .spin{
          animation: rotation 2s infinite linear;
        }
        @keyframes rotation{
    from{
        transform: rotate(0deg);
    }
    to{
        transform: rotate(359deg);
    }
}
h6{
      color: white;
    }
    </style>
        
    <title>Dashboard</title>
</head>

    <body>
        
        <table  width="100%" border="0">
            <tr>
                
                
                <td style="width: 15%; height: 680px; vertical-align: top" class="sidebar">
                    <div class="container" "> 
                    <img src ="inventorylogo.jpg" class="profile_image" alt=""> 
                    <h4>Company <?php echo $_SESSION['CompanyName']; ?></h4>
                    <h6><?php echo $_SESSION['company']; ?></h6>
                    <button id="sell" class="btn btn-dark btn-lg btn-block" ><i class="fas fa-desktop"></i><span>Add/sell product</span></button>
                    <button id="sold" class="btn btn-dark btn-lg btn-block" ><i class="fas fa-table"></i><span>Sold Items</span></button>
                    <button id="mprofile"  data-id="<?php echo $_SESSION['userid'];?>" class="btn btn-dark btn-lg btn-block" ><i class="fas fa-th"></i><span>Manage profile</span></button>
                    <?php 
                    include '../dbConnect.php';
                    $id = $_SESSION['userid'];

                    $checkRole = "SELECT Roll_id from members WHERE User_id = $id";
                    $checkresult = mysqli_query($conn, $checkRole);
                    while($rows = $checkresult->fetch_assoc()){
                          if($rows['Roll_id'] === '1'){
                            echo '
                            <button id="users" class="btn btn-dark btn-lg btn-block" ><i class="fas fa-sliders-h"></i><span>Manage Users</span></button>
                            <button id="notification" class="btn btn-dark btn-lg btn-block" ><i class="fas fa-sliders-h"></i><span>Notifications</span></button>
                            ';
                          }
                    }
                    
                    
                    ?>

                    </div>
                </td>
                <td id="fram" class="test" style="vertical-align: central; text-align: center; background: none; color: none">
                 <p id="page"> 
                
                    </p> 
                        
           

                </td>
            </tr>
        </table>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="buttons.js" type="text/javascript"></script>
    </body>
</html>