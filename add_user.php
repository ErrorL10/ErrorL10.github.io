<?php
    include 'dbcon.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Yukidesu Staff Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="forms.css">

</head>
<body>

    <header>
        <h1 class="header">Yukidesu Restaurant</h1>
        <h2 class="subtext">Add Staff</h2>
    </header>

    <div id="form">
        <form action="controller.php" method="POST">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
            </div>
              
            <div class="form-group">
                <label for="passwod">Password</label>
                <input type="password" id="password" name="password">
            </div>
            
            <div class="button-panel">
                <button type="submit" name="add_user" class="btn btn-primary form-button" style="--bs-btn-font-weight: 600;--bs-btn-font-size:1.05rem">Add User</button>
            </div>
        </form>
        </div>
    
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