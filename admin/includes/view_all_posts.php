<?php 
if(isset($_POST['checkBoxArray']))
{
    $check_list=$_POST['checkBoxArray'];
    foreach($check_list as $post_list)
    {
        $bulk_option=$_POST['bulkoptions'];
        
        switch($bulk_option)
        {
            case 'published':
                {
                    $query="update posts set post_status='{$bulk_option}' where post_id=$post_list";
                    $bulk_list_query=mysqli_query($connection,$query);
                    break;
                }
                
            case 'draft':
                {
                     $query="update posts set post_status='{$bulk_option}' where post_id=$post_list";
                     $bulk_list_query=mysqli_query($connection,$query);
                     break;
                }
                
             case 'delete':
                {
                     $query="delete from  posts where post_id=$post_list";
                     $bulk_list_query=mysqli_query($connection,$query);
                     break;
                }
        }
        
    }
}


?>

<form action="" method="post">
<table class="table table-bordered table-hover">
    <div id="bulkOptionsContainer" class="col-xs-4">
    
        <select class="form-control" name="bulkoptions" id="" style="margin-bottom: 10px;margin-left: -15px;">
        
              <option value=""> Select Options</option>
              <option value="published"> Publish</option>
              <option value="draft"> Draft</option>
              <option value="delete"> Delete</option>
        
        
        </select>

    </div>
    
    <div class="col-xs-4">
        <input type="submit" name="submit" class="btn btn-success" value="Apply">
        <a class="btn btn-primary" href="posts.php?source=add_posts">Add New</a>
    </div>
                <thead>
                    <tr>
                        <th><input type="checkbox" id="selectAllbox"></th>
                        <th>Id</th>
                         <th>Author</th>
                         <th>Title</th>
                         <th>Categories</th>
                         <th>Status</th>
                         <th>Image</th>
                         <th>Tags</th>
                         <th>Comments</th>
                         <th>Date</th>
                        <th>Action</th>
                    </tr>

                </thead>
               

                <tbody>
                    
                <?php
                
                $query="select * from posts";
                $select_posts=mysqli_query($connection,$query);
                
                while($row=mysqli_fetch_assoc($select_posts))
                {
                    $post_id=$row['post_id'];
                    $post_author=$row['post_author'];
                    $post_title=$row['post_title'];
                    $post_categories=$row['post_category_id'];
                    $post_status=$row['post_status'];
                    $post_image=$row['post_image'];
                    $post_tags=$row['post_tags'];
                    $post_comments=$row['post_comment_count'];
                    $post_date=$row['post_date'];
                    
                   echo "<tr>";
                echo "<td><input class='checkBoxes' type='checkbox' id='selectAllbox' name='checkBoxArray[]' value='$post_id'></td>";
                   echo "<td>$post_id</td>";
                   echo "<td>$post_author</td>";
                     echo "<td> $post_title</td>";
                    
                    
                    
            $query="select * from categories where cat_id={$post_categories}";
            $cat_select_query=mysqli_query($connection,$query);
            while($row=mysqli_fetch_assoc($cat_select_query))
            {
                $cat_id=$row['cat_id'];
                $cat_title=$row['cat_title'];
               echo "<td> $cat_title</td>";
            }
            
          
                     echo "<td>$post_status</td>";
                     echo "<td><img src='../images/$post_image' alt='image' width='100'></td>";
                     echo "<td>$post_tags</td>";
                     echo "<td>$post_comments</td>"; 
                    echo "<td>$post_date</td>";
                      echo "<td><a href='posts.php?delete={$post_id}'>delete</a></td>";
                     echo "<td><a href='posts.php?source=edit_posts&post_id={$post_id}'>edit</a></td>";
                   echo "</tr>";
                    
                    
                    
                }
                
                
                
                ?>


                </tbody>
            </table>

<?php
                    
                        if(isset($_GET['delete']))
                        {
                            $post_delete_id=$_GET['delete'];
                            
                            $query="delete from posts where post_id=$post_delete_id";
                            $delete_post_query=mysqli_query($connection,$query);
                            
                        }
                        
                    ?>
    </form>