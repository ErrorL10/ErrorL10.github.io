<?php
    include 'dbcon.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.25/b-1.7.1/b-html5-1.7.1/b-print-1.7.1/datatables.min.css"/>
    <title>Yukidesu Admin Panel</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
</head>

<body>
    <div class="container">
        <div class="navContainer">
            <div class="navbar">
                <h1>Yukidesu Admin Panel</h1>
                <ul>
                    <li ><a href="admin.php">Reservations</a></li>
                    <li><a href="admin_users.php">Staff</a></li>
                </ul>
        </div>
    </div>

    <h1 class="header">Staff</h1>

    <div class="table_container">
        <table table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                <th scope="col"><div class="table-header"><p>ID</p></div></th>
                <th scope="col"><div class="table-header"><p> Name</p></div></th>
                <th scope="col"><div class="table-header"><p> </p>Email</div></th>
                <th scope="col"><div class="table-header"><p> </p>Password</div></th>
                <th scope="col"><div class="table-header"><p> Update</p></div></th>
                <th scope="col"><div class="table-header"><p> Delete</p></div></th>
                </tr>
            </thead>
            <tbody>
                <?php

                    $sql="SELECT * FROM users";
                    $stmt=$con->prepare($sql);
                    $stmt->execute();
                    $result=$stmt->get_result();
                    while($row=$result->fetch_assoc()){
                ?>
                <tr>
                <td><?php echo $row['user_id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['password']; ?></td>

                <td>
                    <div style="display: flex; align-items: center; justify-content: center;">
                        <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#updatemodal-<?php echo $row['user_id']; ?>">Update</button>
                    </div>
                    
                </td>
                <td>
                    <div style="display: flex; align-items: center; justify-content: center;">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletemodal-<?php echo $row['user_id']; ?>">Delete</button>
                    </div>
                    
                </td>
                </tr>

                <!-- Update Modal -->
                <div class="modal fade" id="updatemodal-<?php echo $row['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                
                    <form action="controller.php" method="POST">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $row['user_id']; ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <div class="modal-body">
                                    <div class="form-group">
                                        <label for="name">Fullname:</label>
                                        <input type="text" class="form-control" value="<?php echo $row['name']; ?>" id="name" name="name">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="text" class="form-control" value="<?php echo $row['email']; ?>" name="email" id="email">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="password">Password:</label>
                                        <input type="text" class="form-control" value="<?php echo $row['password']; ?>" id="password" name="password">
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <input type="hidden" class="form-control" value="<?php echo $row['user_id']; ?>" id="id" name="id">
                                <button type="submit" name="update" class="btn btn-primary">Save changes</button>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Delete Modal -->
                <div class="modal fade" id="deletemodal-<?php echo $row['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                    <form action="controller.php" method="POST">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $row['user_id']; ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <div class="modal-body">
                            <h4> Do you want to delete this data?</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <input type="hidden" class="form-control" value="<?php echo $row['user_id']; ?>" id="id" name="id">
                                <button type="submit" name="delete" class="btn btn-primary">Continue</button>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>
                
                <?php } ?>
            </tbody>
        </table>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.25/b-1.7.1/b-html5-1.7.1/b-print-1.7.1/datatables.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function(){
        $('#example').DataTable({
            dom: 'Blfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
    </script>

    <a href="add_user.php"><button class="btn btn-primary form-button" style="--bs-btn-font-weight: 600;--bs-btn-font-size:1.05rem">Add Staff</button></a>


<footer id="contact">
        <h1 class="header">Contact Us</h1>
        <div class="contact-details">
            <details>
                <summary>Tarlac City, Tarlac</summary>
                 <ul>
                     <li>Contact no: 09091236789</li>
                    <li>Email: yukidesuTCT@gmail.com</li>
                </ul>
             </details>
             <details>
                <summary>Capas, Tarlac</summary>
                <ul>
                    <li>Contact no: 09097891234</li>
                    <li>Email: yukidesuCT@gmail.com</li>
                </ul>
            </details>
            <details>
                <summary>Gerona, Tarlac</summary>
                <ul>
                    <li>Contact no: 09153456969</li>
                    <li>Email: yukidesuGT@gmail.com</li>
                </ul>
            </details>
            <details>
                <summary>Mabalacat, Pampanga</summary>
                <ul>
                    <li>Contact no: 09694201234</li>
                    <li>Email: yukidesuMP@gmail.com</li>
                </ul>
            </details>
            <details>
                <summary>Meycauayan, Bulacan</summary>
                <ul>
                    <li>Contact no: 09421352468</li>
                    <li>Email: yukidesuMB@gmail.com</li>
                </ul>
            </details>
        </div>
        <p>© 2023 Yukidesu - All Rights Reserved. || Designed by: Errol</p>
    </footer>
    
</body>
</html>