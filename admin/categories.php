<!--                     header                   -->
<?php include "includes/admin_header.php";  ?>

<body>



<div id="page-wrapper">

    <div class="container-fluid">


    <!--           navigation          -->
    <?php include "includes/admin_navigation.php";  ?>


                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome fine sir
                            <small>Sicelo</small>
                        </h1>
                       
                        <div class="col-xs-6">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="cat_title" id="">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn primary" type="submit"  name="submit" value="submit">
                                </div>
                            </form>
                        </div>
                    

                    <div class="col-xs-6">

                    <?php
                    if(isset($_POST['submit']))  {
                      $cat_title = $_POST['cat_title'];

                      if($cat_title == ""|| empty($cat_title)){
                        echo "Please fill the category in the field";
                     }

                      else{
                          $query = "INSERT INTO categories (cat_title)";
                          $query .= "VALUE ('{$cat_title}')";
                          $create_category_query = mysqli_query($connection, $query);

                          if(!$create_category_query){
                              die('QUERY FAILED' . mysqli_error($connection));
                          }
                      }

                    }  
                    ?>
                    
                    

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id </th>
                                    <th> Category ID</th>  
                                    <?php    
                                    $query = "SELECT * FROM categories";
                                    $select_all_categories = mysqli_query($connection , $query);?>



                                      
                                    
                                </tr>
                            </thead>
                            <tbody>

                            <?php while ($row = mysqli_fetch_assoc($select_all_categories)) {

                             $cat_title = $row['cat_title'];
                             $id = $row['cat_id'];

                              "<li><a href='#'>{$cat_title}</a></li>";
                            echo "<tr>";
                            echo   "<td> {$id}  </td>";
                            echo    "<td> {$cat_title}  </td>";
                            echo   "</td>";

 
                            }?>


                            </tbody>
                        </table>
                    </div>
                </div>










                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->








<!--                 footer                -->
<?php include "includes/admin_footer.php";  ?>    
   
</body>

</html>
