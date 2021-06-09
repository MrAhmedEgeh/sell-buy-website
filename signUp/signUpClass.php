<?php 
class members{
    private $userid;
    private $company_id;
    private $roll_id;

    // constructor
    function __construct($userid, $company_id, $roll_id) {
        $this->userid = $userid;
        $this->company_id = $company_id;
        $this->roll_id = $roll_id;
    }
    //userid
    public function get_userId(){
        return $this->userid;
    }
    public function set_userId($userid){
        $this->userid = $userid;
    }
    //company_id
    public function get_company_id(){
        return $this->company_id;
    }
    public function set_company_id($company_id){
        $this->company_id = $company_id;
    }
    //roll_id
    public function get_roll_id(){
        return $this->roll_id;
    }
    public function set_roll_id($roll_id){
        $this->roll_id = $roll_id;
    }
    public function insertToDB($userid, $company_id, $roll_id){
        include '../dbConnect.php';

        
        $query = "INSERT into members(`User_id`, `Company_Id`, `Roll_id`)VALUES('$userid', '$company_id', '$roll_id')";
        mysqli_query($conn, $query);

    }
}

class company{
    private $comp_id;
    private $comp_name;

    // constructor
    function __construct($comp_name) {
        $this->comp_id = time()+10;
        $this->comp_name = $comp_name;
    }
    // comp_id
    public function get_compId(){
        return $this->comp_id;
    }
    // comp_name
    public function get_compName(){
        return $this->comp_name;
    }
    public function set_compName($comp_name){
        $this->comp_name = $comp_name;
    }
    public function insertToDB($id, $name){
        include '../dbConnect.php';

        
        $query = "INSERT into companies(company_id, company_name)VALUES('$id', '$name')";
        mysqli_query($conn, $query);

    }
    public function checkCompDB($id){
        include '../dbConnect.php';
        $query = "SELECT * FROM companies WHERE company_id = '$id'";
        $result = mysqli_query($conn, $query);
        $rowcount=mysqli_num_rows($result);
        if($rowcount > 0){
            return ($id+1);
        }else{
            return $id;
        }
    }
}
class User{
    private $id;
    private $username;
    private $password;
    private $email;

    function __construct($username,$password, $email) {
        $this->id = time();
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }
    public function get_username(){
        return $this->username;
    }
    public function set_username($username){
        $this->username = $username;
    }
    public function get_password(){
        return $this->password;
    }
    public function set_password($password){
        $this->password = $password;
    }
   
    public function get_email(){
        return $this->email;
    }
    public function set_email($email){
        $this->email = $email;
    }
    public function get_id(){
        return $this->id;
    }
    public function insertToDB($id, $username, $pass, $email){
        include '../dbConnect.php';
  
        $query = "INSERT into theuser(userid, username, user_password, email)VALUES('$id', '$username', '$pass','$email')";
        mysqli_query($conn, $query);

    }

}







?>