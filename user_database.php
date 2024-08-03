<?php

class User_database{
    private $user_number;
    private $user_photo;
    private $first_name;
    private $last_name;
    private $email;
    private $dob;
    private $pass;
    private $phone;
    private $user_name;

    private $fake_user_photo;
    private $fake_user_name;

    public function session_insert(){
        $_SESSION["user_name"]=$this->user_name;
        $_SESSION["user_photo"]=$this->user_photo;
    }
    public function session_recieve(){
        if (isset($_SESSION["user_name"]) && ($_SESSION["user_photo"])){
            $this->user_name=$_SESSION["user_name"];
            $this->user_photo=$_SESSION["user_photo"];
        }
        else{
            $this->user_name="SignIn";
            $this->user_photo= "../bookmark_images/img_avatar1.png";
        }
    }
    public function show_user_name(){
        echo"".$this->user_name."";
    }
    public function show_user_photo(){
        echo "".$this->user_photo."";
    }
    public function insert_user_values(){
        $ran= rand();
        /* user photo */
        
        $target_path= "C:/xampp/htdocs/BookMark.com/book_images_and_files/";
        $target_path = $target_path .$ran. basename($_FILES['user_photo']['name']) ;
        move_uploaded_file($_FILES['user_photo']['tmp_name'], $target_path);
        $u_photo="../book_images_and_files/" .$ran. $_FILES["user_photo"]["name"];
        $this->user_photo=$u_photo;

        /*first name*/
        if(isset($_REQUEST['first_name'])){
        $f_name=trim($_REQUEST["first_name"]);
        $f_name=str_replace("'","\'",$f_name);
        $f_name=str_replace('"','\"',$f_name);
        $this->first_name=$f_name;
        }

        /*last name */
        if(isset($_REQUEST['last_name'])){
        $l_name=trim($_REQUEST["last_name"]);
        $l_name=str_replace("'","\'",$l_name);
        $l_name=str_replace('"','\"',$l_name);
        $this->last_name=$l_name;
        }

        /*user name */
        if(isset($_REQUEST['user_name'])){
        $u_name=trim($_REQUEST["user_name"]);
        $u_name=str_replace("'","\'",$u_name);
        $u_name=str_replace('"','\"',$u_name);
        $this->user_name=$u_name;
        }

        /*phone */
        if(isset($_REQUEST['phone'])){
        $p_number=$_REQUEST["phone"];
        $this->phone=$p_number;
        }else{
            $this->phone=null;
        }

        /*email */
        if(isset($_REQUEST['email'])){
        $e_mail=trim($_REQUEST["email"]);
        $e_mail=str_replace("'","\'",$e_mail);
        $e_mail=str_replace('"','\"',$e_mail);
        $this->email=$e_mail;
        }

        /*date of birth */
        if(isset($_REQUEST['dob'])){
        $d_ob=$_REQUEST["dob"];
        $this->dob=$d_ob;
        }

        /*password */
        if(isset($_REQUEST['pass'])){
        $password=trim($_REQUEST["pass"]);
        $password=str_replace("'","\'",$password);
        $password=str_replace('"','\"',$password);
        $this->pass=$password;
        }
    }

    public function insert_user(){
        // obj is database connection obj.
        $obj= new connection();
        $sql="INSERT INTO users
        (user_photo,
        first_name,
        last_name,
        user_name,
        email,
        dob,
        pass,
        phone) 
        VALUES('$this->user_photo',
        '$this->first_name',
        '$this->last_name',
        '$this->user_name',
        '$this->email',
        '$this->dob',
        '$this->pass',
        $this->phone)";


        if($obj->conn->query($sql)){
            $str="User Inserted Successfully. <i class='fa-solid fa-check text_stroke'></i>";
        }

        $obj->conn->close();
        $this->fake_user_name=$this->user_name;
        $this->fake_user_photo=$this->user_photo;
    }
    public function login_user(){
        // obj is database connection obj.
        $obj= new connection();
        /*user name */
        if(isset($_REQUEST['user_name'])){
            $u_name=trim($_REQUEST["user_name"]);
            $u_name=str_replace("'","\'",$u_name);
            $u_name=str_replace('"','\"',$u_name);
            $this->user_name=$u_name;
        }
        if(isset($_REQUEST['pass'])){
            $password=trim($_REQUEST["pass"]);
            $password=str_replace("'","\'",$password);
            $password=str_replace('"','\"',$password);
            $this->pass=$password;
        }
        $this->fake_user_name=$this->user_name;
    
        $this->fake_user_photo=$this->user_photo;
        $sql="SELECT * FROM users WHERE user_name='$this->user_name' AND pass='$this->pass'";
        $result=$obj->conn->query($sql);
        if($result->num_rows> 0){
            if($row=$result->fetch_assoc()){
                $this->user_number=$row["user_number"];
                $this->user_photo=$row["user_photo"];
                $this->first_name=$row["first_name"];
                $this->last_name=$row["last_name"];
                $this->email=$row["email"];
                $this->dob=$row["dob"];
                $this->phone=$row["phone"];
        }
       }
       $obj->conn->close();
    }


    public function user_profile_page(){
        $linker=$_REQUEST['linker'];
        $obj= new connection();
        $sql= "SELECT * FROM users WHERE user_name='".$linker."'";
        $result=$obj->conn->query($sql);
        if($result->num_rows> 0){
            while($row=$result->fetch_assoc()){
               echo " <div style='width: 100%; min-height:200px; background-color:white;border-radius:12px; overflow:hidden;' class='mb-5 mt-5'>

                    <div style='display:inline-block; min-height:330px; width:90%; margin-top:10px; color:#332d2d; min-width:500px;'>
                    <h2 class='border-bottom'><i style='color:#332d2d;'>".$row['user_name']."</i></h2>          
                    <table class='table'>
                    <tbody>
                    <tr>
                    <td id='table_element' rowspan='8'>
                    <div style='height:330px; width:209px; background-color:aqua; border-radius:8px;'>
                    <img src='".$row['user_photo']."' style='height:330px; width:209px;'>
                    </div>
                    </td>
                    </tr>
                    <tr>
        
                    <td style='width: 20%;'><h5><i style='color:#332d2d;'>First name:</i></h5></td>
                    <td style='width: 90%;'><i style='color:#332d2d;'>".$row['first_name']."</i></td>
                    </tr>
                    <tr>
                    <td style='width: 20%;'><h5><i style='color:#332d2d;'>Last name:</i></h5></td>
                    <td style='width: 90%;'><i style='color:#332d2d;'>".$row['last_name']."</i></td>
                    </tr>
                    <tr>
                    <td style='width: 20%;'><h5><i style='color:#332d2d;'>User name:</i></h5></td>
                    <td style='width: 90%;'><i style='color:#332d2d;'>".$row['user_name']."</i></td>
                    </tr>
                    
                    <tr>
                    <td style='width: 20%;'><h5><i style='color:#332d2d;'>Email:</i></h5></td>
                    <td style='width: 90%;'><i style='color:#332d2d;'>".$row['email']."</i></td>
                    </tr>

                    <tr>
                    <td style='width: 20%;'><h5><i style='color:#332d2d;'>Date of birth:</i></h5></td>
                    <td style='width: 90%;'><i style='color:#332d2d;'>".$row['dob']."</i></td>
                    </tr>
                    <td style='width: 20%;'><h5><i style='color:#332d2d;'>Phone no:</i></h5></td>
                    <td style='width: 90%;'><i><p style='color:#332d2d;'>".$row['phone']."</p></i></td>
                    </tr>
                    <tr>
                    <td colspan='2'><input type='submit' class='btn' style='background-color:#332d2d; color:#dee2e6;' value='Logout' name='sub'></td>
                    </tr>
                    </tbody>
                    </table>

                    </div>
                    </div>";
            }
        }
        $obj->conn->close();
    }
}
?>