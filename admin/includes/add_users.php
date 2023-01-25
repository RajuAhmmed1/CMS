<?php 

   if(isset($_POST['submit']))
            {

                $username=$_POST['username'];
                $user_password=$_POST['user_password'];
                $user_firstname=$_POST['user_firstname'];
                $user_lastname=$_POST['user_lastname'];
                $user_email=$_POST['user_email'];

                $user_image=$_FILES['image']['name'];
                $user_image_temp=$_FILES['image']['tmp_name'];

                $user_role=$_POST['user_role'];
              
                move_uploaded_file($user_image_temp,"../images/$user_image");

                $query="insert into users (username,user_password,user_firstname,user_lastname,user_email,user_image,user_role)values ('{$username}','{$user_password}','{$user_firstname}','{$user_lastname}','{$user_email}','{$user_image}','{$user_role}')";

                $user_insert_query=mysqli_query($connection,$query);
                
       
                echo "User Created:"." "."<a href='users.php'>View User</a>";

                if(!$user_insert_query)
                {
                    die("failed insert query.".mysqli_error($connection));
                }
       
          }
?>

<form action="" method="post" enctype="multipart/form-data">    
     
      <div class="form-group">
         <label for="username">Username</label>
          <input type="text" class="form-control" name="username">
      </div>
     <div class="form-group">
         <label for="user_role">User Role</label>
          <select name="user_role">
              <option value="Admin">Admin</option>
              <option value="Subscriber">Subscriber</option>
          </select>
      </div>

    <div class="form-group">
         <label for="user_password">Password</label>
          <input type="text" class="form-control" name="user_password">
      </div>
      
      

       <div class="form-group">
          <label for="title">First Name</label>
          <input type="text" class="form-control" name="user_firstname">
      </div>
    
      <div class="form-group">
          <label for="title">Last Name</label>
          <input type="text" class="form-control" name="user_lastname">
      </div>
      
      <div class="form-group">
          <label for="title">Email</label>
          <input type="email" class="form-control" name="user_email">
      </div>
      
      
      
      
    <div class="form-group">
         <label for="user_image">User Image</label>
        <input  type="file" name="image">
      </div> 

     
    
    
      
    

       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="submit" value="Add User">
      </div>
    


</form>