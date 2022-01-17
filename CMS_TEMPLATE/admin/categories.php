<!--                     header                   -->
<?php   ob_start(); ?>
<?php include "includes/admin_header.php";  ?>

<body>



<div$cat_id="page-wrapper">

    <div class="container-fluid">


    <!--           navigation          -->
    <?php include "includes/admin_navigation.php";  ?>


                <!-- Page Heading -->
                <div class="row" style="background-color: white;">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome fine sir
                            <small>Sicelo</small>
                        </h1>
                       
                        <div class="col-xs-6">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="cat_title"$cat_id="">
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
                             $cat_id = $row['cat_id'];

                              "<li><a href='#'>{$cat_title}</a></li>";
                            echo "<tr>";
                            echo   "<td> {$cat_id}  </td>";
                            echo    "<td> {$cat_title}  </td>";
                            echo    "<td> <a href='categories.php?delete={$cat_id}'> delete </a>   </td>";
                            echo    "<td> <a href='categories.php?edit={$cat_id}'> edit </a>   </td>";
                            echo   "</tr>";

 
                            }?>

                            <?php
                            if(isset($_GET['delete'])){
                            $the_cat_id = $_GET['delete'];
                            $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
                            $delete_query = mysqli_query($connection, $query);
                            header("Location: categories.php");   


                            }
                            
                            

                             ?>







                            </tbody>
                        </table>
                    </div>
                </div>






                <?php    
             if(isset($_POST['update'])){
                $updated_cat = $_POST['edit_title'];
                if($updated_cat == "" || empty($updated_cat)){
                    echo "Update field cannot be empty";
                
                }else{
                    $update_id = $_GET['edit'];
                    $update_query = "UPDATE categories SET cat_title = {$updated_cat} WHERE cat_id = {$update_id} ";
                    $create_edit_query = mysqli_query($connection , $update_query);
                    if(!$create_edit_query){
                        die('QUERY FAILED' . mysqli_error($connection));  
                    }
                    header("Location: categories.php");  
                }}
                
                
             

                if(isset($_GET['edit'])){
                    echo"We are up and running";
                              $edit_id = $_GET['edit'];
                              $query = "SELECT * FROM categories WHERE cat_id = {$edit_id}";

                              if($edit_query = mysqli_query($connection , $query)){
                                  while($row = mysqli_fetch_assoc($edit_query)){
                                 $title = $row['cat_title']; 
                        echo "<div class='col-xs-6'>
                                <form action='' method='POST'>
                                    <div class='form-group'>
                                        <input type='text' value='{$title}' class='form-control' name='edit_title'>
                                    </div>
                                    <div class='form-group'>
                                        <input class='btn btn primary' type='submit'  name='update' value='submit'>
                                    </div>
                                </form>
                        </div>";
                                   }




                        }

                }?>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div$cat_id=>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->








<!--                 footer                -->
<?php include "includes/admin_footer.php";  ?>    
   
</body>

</html>
