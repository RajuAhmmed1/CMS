  <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                         <th>Comment post</th>
                         <th>Author</th>
                         <th>Email</th>
                         <th>Content</th>
                         <th>Status</th>
                         <th>In response to</th>
                         <th>Date</th>
                         <th>Approve</th>
                         <th>Unapprove</th>
                        <th>Action</th>
                    </tr>

                </thead>
               

                <tbody>
                    
                <?php
                
                $query="select * from comments";
                $select_posts=mysqli_query($connection,$query);
                
                while($row=mysqli_fetch_assoc($select_posts))
                {
                    $comment_id=$row['comment_id'];
                    $comment_post_id=$row['comment_post_id'];
                    $comment_author=$row['comment_author'];
                    $comment_email=$row['comment_email'];
                    $comment_content=$row['comment_content'];
                    $comment_status=$row['comment_status'];
                    $comment_date=$row['comment_date'];
                    
                   
                    
                     echo "<tr>";
                    
                     echo "<td>$comment_id</td>";
                     echo "<td>$comment_post_id</td>";
                     echo "<td> $comment_author</td>";
                     echo "<td>$comment_email</td>";
                     echo "<td>$comment_content</td>";
                     echo "<td>$comment_status</td>"; 
                    
                    $query="select * from posts where post_id=$comment_post_id";
                    $post_query=mysqli_query($connection,$query);
                    while($row=mysqli_fetch_assoc($post_query))
                    {
                        $post_id=$row['post_id'];
                        $post_title=$row['post_title'];
                        echo "<td><a href='../post.php?post_id={$post_id}'>$post_title<a></td>";
                    }
                     
                    
                     echo "<td>$comment_date</td>";
                     echo "<td><a href='comments.php?approve={$comment_id}'>Approve</a></td>";
                     echo "<td><a href='comments.php?unapprove={$comment_id}'>Unapprove</a></td>";
                     echo "<td><a href='comments.php?delete={$comment_id}'>Delete</a></td>";
                    
                     echo "</tr>";
                    
                    
                    
                }
                
                
                
                ?>


                </tbody>
            </table>


                <?php
                    
                        if(isset($_GET['approve']))
                        {
                            $commnet_approve_id=$_GET['approve'];
                            
                            $query="update comments set comment_status='approved' where comment_id=$commnet_approve_id";
                            $approve_comment_query=mysqli_query($connection,$query);
                            header("Location:comments.php");
                        }


                       if(isset($_GET['unapprove']))
                        {
                            $comment_uapprove_id=$_GET['unapprove'];
                            
                            $query="update comments set comment_status='unapproved' where comment_id=$comment_uapprove_id";
                            $unapprove_comment_query=mysqli_query($connection,$query);
                            
                            header("Location:comments.php");
                            
                        }
                        
                    ?>



                <?php
                    
                        if(isset($_GET['delete']))
                        {
                            $commnet_delete_id=$_GET['delete'];
                            
                            $query="delete from comments where comment_id=$commnet_delete_id";
                            $delete_comment_query=mysqli_query($connection,$query);
                            header("Location:comments.php");
                            
                        }
                        
                    ?>