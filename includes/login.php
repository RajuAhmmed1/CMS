<?php

include "db.php";

?>
<?php session_start(); ?>

<?php

if(isset($_POST['login']))
   {
       $db_username=$_POST['username'];
       $db_password=$_POST['password'];
       
       $d_username=mysqli_real_escape_string($connection,$db_username);
       $d_password=mysqli_real_escape_string($connection,$db_password);
       
       
       
       $query="SELECT * FROM users WHERE username='{$d_username}'";
       $user_login_query=mysqli_query($connection,$query);
    
      if(!$user_login_query)
      {
        die("failed query".mysqli_error($connection));
      }
       
       while($row=mysqli_fetch_assoc($user_login_query))
       {
           $user_id=$row['user_id'];
           $username=$row['username'];
           $user_firstname=$row['user_firstname'];
           $user_lastname=$row['user_lastname'];
           $user_password=$row['user_password'];
           $user_role=$row['user_role'];
           $user_email=$row['user_email'];
           $user_image=$row['user_image'];

       }
          $password=crypt($d_password, $user_password);
        
       if($username !== $d_username && $password==$user_password)
       {
            header("location: ../index.php");
       }
       
       else if($username == $d_username &&  $password==$user_password)
       {
            $_SESSION['username']=$username;
            $_SESSION['user_firstname']=$user_firstname;
            $_SESSION['user_lastname']=$user_lastname;
            $_SESSION['user_role']=$user_role;
            $_SESSION['user_email']=$user_email;
            $_SESSION['password']=$user_password;
            $_SESSION['user_image']=$user_image;
            $_SESSION['user_id']=$user_id;

            header("location: ../admin");
       }
       else
       {
            header("location: ../index.php");
       }
       
       
   }



?>