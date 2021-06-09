<?php error_reporting(0);?> 
<nav id="mynav" class="site-header sticky-top py-1">

    <div class="container d-flex flex-column flex-md-row justify-content-between">
        <a class="py-2" href="http://localhost/InvMGMT/index.php" aria-label="Product">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img" viewBox="0 0 24 24" ><title>Product</title><circle cx="12" cy="12" r="10"/><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/></svg>
        </a>
        <a class="py-2 d-none d-md-inline-block " href="http://localhost/InvMGMT/index.php">Home</a>
        <a class="py-2 d-none d-md-inline-block" href="http://localhost/InvMGMT/Product.php">Product</a>          

        <a class="py-2 d-none d-md-inline-block" href="http://localhost/InvMGMT/cart.php">Cart</a>
    
        
        <?php 
            session_start();

                    if(isset($_SESSION['login_admin'])){
                    echo "
                    <form class='py-2' method=\"POST\">
                    <input style=\"background-color: #ffc107;   color: black;   border-radius: 10px; border: none;  outline: 0;\" name=\"logg\" type=\"submit\" value=\"Log out\">
                    <button style=\"background-color: #ffc107;   color: black;   border-radius: 10px; border: none;  outline: 0;\"> <a style=\"color: black;\" href=\"http://localhost/InvMGMT/Dashboard/dash.php\">Dashboard</a></button>
                </form>
                    ";
                }
                else if(isset($_SESSION['login_user']))
                {
                    $id = $_SESSION['userid'];
            
                    echo "<form action='http://localhost/InvMGMT/Navbar/Navbar.php' style='margin-right: 0; padding-right: 0; ' class='py-2' method='POST'>
                    <input style='background-color: #ffc107;   color: black; margin-left: 0;   border-radius: 10px; border: none;  outline: 0;' name='logg' type='submit' value='Log out'>
                    <input style='background-color: #ffc107; color: black;  margin-left: 0;  border-radius: 5px; border: none;  outline: 0;'  id='apply' name='apply' type='submit' value='Apply for Company'>
                    </form>";
                         
                }
                else{
                    echo '
                    <div class="dropdown py-2 d-none d-md-inline-block">
                    <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sign In/up
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdown">
                        <a class="text-sm-center" href="http://localhost/InvMGMT/signIn/SignIn.php"><button type="button" class="dropdown-item">Sign In</button></a>
                        <a class="text-sm-center" href="http://localhost/InvMGMT/signUp/SignUp.php"><button type="button" class="dropdown-item">Sign up</button></a>
                    </div>
                    </div>
                    
                    ';
                }

                if(isset($_POST['logg'])){    
                    session_destroy();
                    header('location: http://localhost/InvMGMT/index.php');
                    }

 
                ?>


</nav>
<?PHP
$apply = $_POST['apply'];
if(isset($apply))
{
header('Location:http://localhost/InvMGMT/apply.php ');

}

?>