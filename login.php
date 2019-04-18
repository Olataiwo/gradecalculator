<?php

    session_start();
    
    include 'includes/db.php';
    include 'includes/functions.php';
    $page_title = "Login";
    include  'includes/header.php';

   

    $errors = [];

    if(array_key_exists('login', $_POST)){

        if(empty($_POST['e_mail'])){
            $errors['email'] = "email cannot be empty";
        }

        if(empty($_POST['pword'])){
            $errors['password'] = "password cannot be empty";
        }

       if(empty($errors)){

            $clean = array_map('trim', $_POST);

            $chk = adminLogin($conn, $clean);

						$_SESSION['id'] = $chk[1]['id'];
                        $_SESSION['email'] = $chk[1]['email'];
                        $_SESSION['name'] = $chk[1]['first_name'];
						
						redirect("dashboard.php");
        }
    }

?>






 <h1 id='register-label'>Login</h1>
    <hr>
    <div class='wrapper' align="center" >
        <form id='login' method='POST' action='login.php'>
            <table>
             
            <div>
            <?php 

                if(isset($_GET['msg']))
                echo '<span class="err">'. $_GET['msg']. '</span>';

                $display = displayErrors( $errors, 'email') ;
                echo $display;
                ?>
                
                <label>Email:</label>
               
                <input class="fixed-input" type='text' name='e_mail' placeholder="email">
             
            </div>
           
            <div>
            <?php 
               

                $display = displayErrors( $errors, 'password') ;
                echo $display;
                ?>
                <label>Password:</label>
                <input class="fixed-input" type='password' name='pword' placeholder='password'>
            </div>
         
            <input type="submit" name="login" value="login">

          
        </form>
        <h4 class="jumpto">Don't have an account? <a href="register.php">Sign up</a></h4>
    </div>
