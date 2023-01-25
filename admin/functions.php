<?php

function confirmQuery($result)
{
    global $connection;
     if(!$result)
    {
        die("query failed".mysqli_error($connection));
    }
    
}



  function insert_categories()
  {
      global $connection;
    
       if(isset($_POST['submit']))
     {
         $cat_title=$_POST['cat_title'];

         if($cat_title=="" || empty($cat_title))
         {
             echo "This field should not be empty";
         }

         else
         {
             $query="insert into categories (cat_title) values ('{$cat_title}')";
             $add_category=mysqli_query($connection,$query);

            if(!$add_category)

             {
                 die('Query Failed'.mysqli_error($connection));
             }
         }


     }
      
  }


function find_all_categories()
{
    global $connection;
      $query="select * from categories";
      $select_categories=mysqli_query($connection,$query);
      while($row=mysqli_fetch_assoc($select_categories))
        {
            $cat_id=$row['cat_id'];
            $cat_title=$row['cat_title'];
            echo"<tr>";
             echo "<td> {$cat_id}</td>";
             echo "<td> {$cat_title}</td>";
             echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a>
             <a href='categories.php?edit={$cat_id}'> Edit</a>
             </td>";
            
            echo"</tr>";
        }
}

function delete_categories()
{
    global $connection;
    
                 if(isset($_GET['delete']))
                 {
                     $the_cat_id=$_GET['delete'];
                     $query="DELETE FROM categories WHERE cat_id={$the_cat_id}";
                     $delete_query= mysqli_query($connection, $query);
                     header("Location: categories.php");
                 }
}

?>