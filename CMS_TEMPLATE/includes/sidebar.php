<div class="col-md-4">
<?php        

 


?>
     <!-- Blog Search Well -->
     <div class="well">
      <h4>Blog Search</h4>


    <form action="search.php" method="post">
    <div  class="input-group">
    <input name="search" type="text" class="form-control">
    <span class="input-group-btn">
    <button name="submit" class="btn btn-default" type="submit">
     <span class="glyphicon glyphicon-search"></span>
    </button>
    </span>
    </div>
    </form>


    <!-- /.input-group -->
    </div>

     <!-- Blog Categories Well -->
     <div class="well">
     <h4>Blog Categories</h4>
     <div class="row">
     <div class="col-lg-6">
    <ul class="list-unstyled">

     <?php  

    include "includes/db.php";
    $query = "SELECT * FROM categories";
    $select_all_categories = mysqli_query($connection , $query);




    while ($row = mysqli_fetch_assoc($select_all_categories)) {

    $cat_title = $row['cat_title'];
    echo "<li><a href='#'>{$cat_title}</a></li>";
        
     
    }?>


     
       
        </ul>
        </div>

                        <!-- /.col-lg-6 -->
        <div class="col-lg-6">
        <ul class="list-unstyled">
      
        </ul>
        </div>
                        <!-- /.col-lg-6 -->
        </div>
                    <!-- /.row -->
        </div>

      <?php include 'includes/widgets.php';  ?>
     
        </div>

        </div>
        <!-- /.row -->

      
