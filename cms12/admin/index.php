<?php include 'includes/admin_header.php'; ?>
 
   
    <div id="wrapper">
    
       
<?php include "includes/admin_navigation.php"; ?>
        
        

        <div id="page-wrapper">

            <div class="container-fluid">
               
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            
                            
                            
                            <small><?php echo $_SESSION['user_firstname']; ?></small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                
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
    $query = "SELECT * FROM posts";
    $select_all_post = mysqli_query($connection, $query);
    $post_counts = mysqli_num_rows($select_all_post);
    echo "<div class='huge'>{$post_counts}</div>";    
            
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
    $query = "SELECT * FROM comments";
    $select_all_comment = mysqli_query($connection, $query);
    $comment_counts = mysqli_num_rows($select_all_comment);
    echo "<div class='huge'>{$comment_counts}</div>";    
            
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
    $query = "SELECT * FROM users";
    $select_all_users = mysqli_query($connection, $query);
    $user_counts = mysqli_num_rows($select_all_users);
    echo "<div class='huge'>{$user_counts}</div>";    
            
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
    $query = "SELECT * FROM categories ";
    $select_all_categories = mysqli_query($connection, $query);
    $categories_counts = mysqli_num_rows($select_all_categories);
    echo "<div class='huge'>{$categories_counts}</div>";     
            
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
<?php
    $query = "SELECT * FROM posts where post_status = 'draft' ";
    $select_all_categories = mysqli_query($connection, $query);
    $draft_posts_counts = mysqli_num_rows($select_all_categories);
                
    $query = "SELECT * FROM comments where comment_status = 'unapproved' ";
    $select_all_unapproved_comments = mysqli_query($connection, $query);
    $unapproved_comment_counts = mysqli_num_rows($select_all_unapproved_comments);
                
    $query = "SELECT * FROM users where user_role = 'subscriber' ";
    $select_subscriber_user = mysqli_query($connection, $query);
    $subscriber_user_counts = mysqli_num_rows($select_subscriber_user);
          
?>         
           
           
           
            <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
            <?php 
            $element_text = ['Active Posts', 'Draft Posts', 'Comments', 'Unapproved Comments', 'Users', 'Subscriber User','Categories'];
            $element_count = [$post_counts, $draft_posts_counts, $comment_counts, $unapproved_comment_counts,  $user_counts, $subscriber_user_counts, $categories_counts ];
            
            
            for ($i=0; $i < 7; $i++)
            {
                echo "['{$element_text[$i]}'" . "," . " {$element_count[$i]}], ";
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
    <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

 <?php include 'includes/admin_footer.php'; ?>