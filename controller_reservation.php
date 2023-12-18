<?php
    include 'dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Yukidesu Admin Panel</title>
</head>
<body>
    <?php
        // insert statement
        if(isset($_POST['book'])){ 
            
            $name = $_POST['name'];
            $date = $_POST['date'];
            $time = $_POST['time'];
            $table_select = $_POST['table-select'];
            $contact = $_POST['contact_no'];

            $sql = "INSERT INTO `reservations` (`full_name`, `table_for`, `reservation_date`, `reservation_time`, `contact_no`) VALUES (?, ?, ?, ?, ?)";
            $stmt=$con->prepare($sql);
            $stmt->bind_param("sssss", $name, $table_select, $date, $time, $contact);        
            if($stmt->execute()){ ?>
                <script type="text/javascript">
                    swal("Success!", "Information has been added.", "success")
                    .then(function(){
                    window.location="index.html";
                });
                </script>

    <?php }
        } 

        if(isset($_POST['update'])){
            $id = $_POST['id'];
            $name = $_POST['name'];
            $date = $_POST['date'];
            $time = $_POST['time'];
            $table_select = $_POST['table-select'];
            $contact = $_POST['contact'];

            $sql="UPDATE `reservations` SET `full_name` = ?, `table_for` = ?, `reservation_date` = ?, `reservation_time` = ?, `contact_no` = ? WHERE reservation_id = ?";
            $stmt=$con->prepare($sql);
            $stmt->bind_param("ssssss", $name, $table_select, $date, $time, $contact, $id);
            if($stmt->execute()){ ?>
                <script type="text/javascript">
                    swal("Success!", "Information has been updated.", "success")
                    .then(function(){
                    window.location="admin.php";
                });
                </script>

    <?php }
        }if(isset($_POST['delete'])){
            $id = $_POST['id'];
            
            $sql="DELETE FROM reservations WHERE reservation_id = ?";
            $stmt=$con->prepare($sql);
            $stmt->bind_param("s", $id);
            if($stmt->execute()){ ?>
                <script type="text/javascript">
                    swal("Success!", "Information has been deleted.", "success")
                    .then(function(){
                    window.location="admin.php";
                });
                </script>

    <?php }
        }
?>
</body>
</html>