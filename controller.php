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
    <title>Document</title>
</head>
<body>
    <?php
        // insert statement
        if(isset($_POST['submit'])){ 
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = "INSERT INTO `users`(`name`, `email`, `password`) VALUES ( ? , ? , ?)";
            $stmt=$con->prepare($sql);
            $stmt->bind_param("sss", $name, $email, $password);        
            if($stmt->execute()){ ?>
                <script type="text/javascript">
                    swal("Success!", "Information has been added.", "success")
                    .then(function(){
                    window.location="login.php";
                });
                </script>

    <?php }
        // select statement
        } if(isset($_POST['login'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            $sql="SELECT * FROM users WHERE email = ? AND password = ?";
            $stmt=$con->prepare($sql);
            $stmt->bind_param("ss", $email, $password);
            $stmt->execute();
            $result=$stmt->get_result();
            $row=$result->fetch_assoc();
    
            if($result->num_rows==1){
                header("location: admin.php");
            }else{?>
                <script type="text/javascript">
                    swal("Login Failed!", "Incorrect Email or Paswword", "error")
                    .then(function(){
                    window.location="login.php";
                });
                </script>

            <?php 

            }
        }
        if(isset($_POST['update'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $id = $_POST['id'];

            $sql="UPDATE `users` SET `name` = ?, `email` = ?, `password` = ? WHERE id = ?";
            $stmt=$con->prepare($sql);
            $stmt->bind_param("ssss", $name, $email, $password, $id);
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
            
            $sql="DELETE FROM users WHERE id = ?";
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