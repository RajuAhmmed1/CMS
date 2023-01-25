<?php 
if(isset($_GET['user_id']))
{
    $edit_user_id=$_GET['user_id'];
       
}
           $query="select * from users WHERE user_id={$edit_user_id}";
            $select_user=mysqli_query($connection,$query);

            while($row=mysqli_fetch_assoc($select_user))
            {
                $user_id=$row['user_id'];
                $username=$row['username'];
                $user_password=$row['user_password'];
                $user_firstname=$row['user_firstname'];
                $user_lastname=$row['user_lastname'];
                $user_email=$row['user_email'];
                $user_image=$row['user_image'];
                $user_role=$row['user_role'];
                $randSalt=$row['randSalt'];

            }

           if(isset($_POST['update_user']))
            {
                $username=$_POST['username'];
                $user_password=$_POST['user_password'];
                $user_firstname=$_POST['user_firstname'];
                $user_lastname=$_POST['user_lastname'];
                $user_email=$_POST['user_email'];

                $user_image=$_FILES['image']['name'];
                $user_image_temp=$_FILES['image']['tmp_name'];

                $user_role=$_POST['user_role'];
                $randSalt=$_POST['randSalt'];

                move_uploaded_file($user_image_temp,"../images/$user_image");

                if(empty($user_image))
                {
                    $query="select * from users where user_id=$edit_user_id";
                    $select_image=mysqli_query($connection,$query);
                    while($row=mysqli_fetch_assoc($select_image))
                    {
                        $user_image=$row['user_image'];
                    }
                }

                $query="UPDATE users SET username='{$username}',user_password='{$user_password}',user_firstname='{$user_firstname}',user_lastname='{$user_lastname}',user_email='{$user_email}',user_image='{$user_image}',user_role='{$user_role}' WHERE user_id=$edit_user_id";

                $user_update_query=mysqli_query($connection,$query);

                if(!$user_update_query)
                {
                    die("failed update query.".mysqli_error($connection));
                }
               
               header("location: users.php");
          }
?>

<form action="" method="post" enctype="multipart/form-data">    
     
      <div class="form-group">
         <label for="username">Username</label>
          <input value="<?php echo $username; ?>" type="text" class="form-control" name="username">
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
          <input value="<?php echo $user_password; ?>" type="text" class="form-control" name="user_password">
      </div>
      
      

       <div class="form-group">
          <label for="title">First Name</label>
          <input value="<?php echo $user_firstname; ?>" type="text" class="form-control" name="user_firstname">
      </div>
    
      <div class="form-group">
          <label for="title">Last Name</label>
          <input value="<?php echo $user_lastname; ?>" type="text" class="form-control" name="user_lastname">
      </div>
      
      <div class="form-group">
          <label for="title">Email</label>
          <input value="<?php echo $user_email; ?>" type="email" class="form-control" name="user_email">
      </div>
      
      
      
      
    <div class="form-group">
         <label for="user_image">User Image</label>
          <img width="100" src="../images/<?php echo $user_image;?>">
        <input  type="file" name="image">
      </div> 

  
      
    

       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="update_user" value="Update User">
      </div>
    


</form>