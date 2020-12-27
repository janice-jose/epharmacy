<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/504a87cc72.js" crossorigin="anonymous"></script>
    <title>Pharmacy</title>
</head>
<body>
    <header>
        <div class="container">
            <div class="row ">
            <div class="col-md-4 col-sm-12 col-12 text-left ">
                <h2 class="my-md-3 site-title">.</h2>
            </div>
            <div class="col-md-4 col-sm-12 col-12 text-center text-white">
                <h2 class="my-md-3 site-title">E-Pharma</h2>
            </div>
            <div class="col-md-4 col-12 text-right ">
                <div class="btn-group">
                <a href="../logout.php" Type="submit" class="btn border  my-md-4 my-2 header-links text-white" >Logout</a>
                </div>
            </div>
            </div>
        </div>
      <div class="sidebar" style="text-decoration:none;">
        <div class="sidebar-j">
            <a href="index.php">Home</a>
            <a class="active" href="med.php">Medicine</a>
            <a href="health.php">Healthcare Products</a>
            <a href="add_user_admin.php">Users</a>
        </div>
      </div>      
    </header>

    <div class="content">
        <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold"> Medicine</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">
                        <form method="post" action="add_med.php" class="form-horizontal" role="form" id="form-item">
                            <input type="hidden" id="item-id">
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="">Name:</label>
                                    <div class="col-sm-9">
                                    <input type="text" maxlength="50" name="name" class="form-control"  value=""placeholder="Enter Generic Name" required="" autofocus="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="">Code:</label>
                                    <div class="col-sm-9"> 
                                    <input type="text" class="form-control" name="code" value="" placeholder="Enter Code" required="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="">Type:</label>
                                    <div class="col-sm-9">
                                    <input type="text" maxlength="50" class="form-control" value=""name="type"  placeholder="Type" required="" autofocus="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="">Price:</label>
                                    <div class="col-sm-9">
                                    <input type="text" maxlength="50" class="form-control" value="" name="price" placeholder="Price" required="" autofocus="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="">Image:</label>
                                    <div class="col-sm-9">
                                    <input  maxlength="50" class="form-control" value="" name="image" placeholder="image" required="" autofocus="">
                                    </div>
                                </div>

                                
                                <div class="form-group"> 
                                    <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" id="submit-item" value="add" class="btn btn-primary justify-content-center">Save
                                    <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                                    </button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
        <a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#modalContactForm">Add item</a>
        </div>
        <?php
            include('connection.php');
            $db='pharmacy';
            mysqli_select_db($con,$db);
            $reg="select * from tblproduct";
            $result= mysqli_query($con,$reg);
            
        ?>
        <div class="container">
            <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Type</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th colspan="1">Action</th>
                        </tr>
                    </thead>
                <?php
                    while($row=$result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['name']?></td>
                            <td><?php echo $row['code']?></td>
                            <td><?php echo $row['type']?></td>
                            <td><?php echo $row['price']?></td>
                            <td><img style="width: 170px; height: 100px;" src="<?php echo $row['image']?>"></td>
                            <td>
                                <a type="button" href="add_med.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>   
                <?php endwhile; ?>         
                </table>
            </div>
           
        </div>
        <?php
            function pre_r($array){
                echo '<pre>';
                print_r($array);
                echo '<pre>';
            }
        ?>
        
    </div> 
    
    <script type="text/javascript">
      $(document).ready(function(){
    $("#modalContactForm").modal("show");
    });
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    


</body>
</html>