<?php include "includes/admin_header.php";?>

    <div id="wrapper">

        <!-- Navigation -->
    <?php include "includes/admin_navigation.php";?>
        
        
        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <h1 class="page-header">
                           Welcome to Admin
                            <small><?php echo $_SESSION['user_firstname']?></small>
                        </h1>
                     <div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                         <?php
                        
                        $query="select * from posts";
                        $post_select=mysqli_query($connection,$query);
                         $number_post=mysqli_num_rows($post_select);
                        
                        echo " <div class='huge'>$number_post</div>";
                        
                        ?>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
                         
                         
                         
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                      <?php
                        
                        $query="select * from comments";
                        $comment_select=mysqli_query($connection,$query);
                         $number_comment=mysqli_num_rows($comment_select);
                        
                        echo " <div class='huge'>$number_comment</div>";
                        
                        ?>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
                         
                         
                         
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                     <?php
                        
                        $query="select * from users";
                        $user=mysqli_query($connection,$query);
                         $number_user=mysqli_num_rows($user);
                        
                        echo " <div class='huge'>$number_user</div>";
                        
                        ?>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
                         
                         
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                       <?php
                        
                        $query="select * from categories";
                        $categories_select=mysqli_query($connection,$query);
                         $number_categories=mysqli_num_rows($categories_select);
                         echo " <div class='huge'>$number_categories</div>";
                        
                        ?>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                        
                    
                    </div>
                </div>
                <!-- /.row -->
                
                
                
    <?php
        
                $query="select * from posts where post_status='draft'";
                $post_draft_query=mysqli_query($connection,$query);
                $post_draft_count=mysqli_num_rows($post_draft_query);
                
                $query="select * from posts where post_status='published'";
                $post_published_query=mysqli_query($connection,$query);
                $post_published_count=mysqli_num_rows($post_published_query);
                
                $query="select * from comments where comment_status='unapproved'";
                $comment_unapproved_query=mysqli_query($connection,$query);
                $comment_unapproved_count=mysqli_num_rows($comment_unapproved_query);
                
                
                $query="select * from users where user_role='subscriber'";
                $user_subscriber_query=mysqli_query($connection,$query);
                $user_subscriber_count=mysqli_num_rows($user_subscriber_query);
                
                
                
  ?>            

       <div class="row">
           
           <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
            
        <?php
            
            $element_text=['all posts','active posts','draft post','categories','users','subscriber','comments','unapproved comments'];
            $element_count=[$number_post,$post_published_count,$post_draft_count,$number_categories,$number_user,$user_subscriber_count,$number_comment,$comment_unapproved_count];
            
            for($i=0;$i<8;$i++)
            {
                echo "['{$element_text[$i]}'".","."{$element_count[$i]}],";
            }
            
       ?>    
            
       
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
           
            <div id="columnchart_material" style="width: auto; height: 500px;"></div>
                </div>         
                
                
                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include"includes/admin_footer.php";?>