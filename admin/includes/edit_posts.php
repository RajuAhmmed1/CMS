
<?php 
if(isset($_GET['post_id']))
{
    $edit_post_id=$_GET['post_id'];
       
}
            $query="select * from posts WHERE post_id={$edit_post_id}";
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
                    $post_content=$row['post_content'];
                    
                }
    
if(isset($_POST['update_post']))
{
    
                    $post_author=$_POST['author'];
                    $post_title=$_POST['title'];
                    $post_categories=$_POST['post_categories'];
                    $post_status=$_POST['post_status'];
    
                   $post_image=$_FILES['image']['name'];
                    $post_image_temp=$_FILES['image']['tmp_name'];
    
                    $post_tags=$_POST['post_tags'];
               
                    $post_content=$_POST['post_content'];
    
    move_uploaded_file($post_image_temp,"../images/$post_image");
    if(empty($post_image))
    {
        $query="select * from posts where post_id=$edit_post_id";
        $select_image=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($select_image))
        {
            $post_image=$row['post_image'];
        }
    }
    
    
    $query="UPDATE posts SET post_title='{$post_title}',post_category_id='{$post_categories}',post_date=now(),post_author='{$post_author}',post_status='{$post_status}',post_tags='{$post_tags}',post_content='{$post_content}',post_image='{$post_image}' WHERE post_id=$edit_post_id";
    
    $post_update_query=mysqli_query($connection,$query);
    
    if(!$post_update_query)
    {
        die("failed update query.".mysqli_error($connection));
    }
}
            
            


?>


<form action="" method="post" enctype="multipart/form-data">    
     
      <div class="form-group">
         <label for="title">Post Title</label>
          <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="title">
      </div>
        
     <div class="form-group">
        <select name="post_categories" id="">
            
            <?php
            $query="select * from categories";
            $cat_select_query=mysqli_query($connection,$query);
            while($row=mysqli_fetch_assoc($cat_select_query))
            {
                $cat_id=$row['cat_id'];
                $cat_title=$row['cat_title'];
                echo "<option value='$cat_id'>{$cat_title}</option>";
            }
            
            if(!$cat_select_query)
            {
                die("query failed.".mysqli_error($connection));
            }

            
            ?>
         
         
         </select>
     </div>

    <div class="form-group">
         <label for="title">Post Author</label>
          <input value="<?php echo $post_author; ?>" type="text" class="form-control" name="author">
      </div>
      
      

        <div class="form-group">
          <label for="title">Post Status</label>
           <select name="post_status">
           <option value="published">Published</option>
              <option value="draft">Draft</option>
           </select>
      </div>
      
      
      
    <div class="form-group">
         <label for="post_image">Post Image</label>
          <img width="100" src="../images/<?php echo $post_image;?>">
        <input  type="file" name="image">
      </div> 

      <div class="form-group">
         <label for="post_tags">Post Tags</label>
          <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">
      </div>
      
      <div class="form-group">
         <label for="post_content">Post Content</label>
         <textarea class="form-control "name="post_content" id="" cols="30" rows="10">  <?php echo $post_content; ?>
         </textarea>
      </div>
      
    

       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
      </div>
    


</form>