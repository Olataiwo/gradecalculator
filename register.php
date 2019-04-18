<?php

include 'includes/db.php';
include 'includes/functions.php';
include 'includes/header.php';


$errors = [];
if(array_key_exists('register', $_POST)){

    if(empty($_POST['fname'])){
    $errors['fname'] = "First name cannot be empty";
    }

    if(empty($_POST['lname'])){
    $errors['lname'] = "Last name cannot be empty";
    }

    if(empty($_POST['e_mail'])){
    $errors['email'] = "Please enter your email address";
    }

    if(empty($_POST['password'])){
    $errors['password'] = "please enter a password";
    }

    if($_POST['password'] != $_POST['pword']){

    $errors['pword'] = "Your passwords does not match";
    }

    if(empty($errors)){
    # eliminate unwanted spaces from values in the $_POST array
    $clean = array_map('trim', $_POST);

    # hashing password
    $hash = password_hash($clean['password'], PASSWORD_BCRYPT);

    # re-initialize password;
    $clean['password'] = $hash;
    
    doRegistration($conn, $clean);
    
    
}

}
?>






    <h1 id="register-label">Student Register</h1>
    <hr>
    <div id='wrapper'>
        <form id='register' method='POST' action='register.php'>
            <div>
                <?php 
                $display = displayErrors($errors, 'fname') ;
                echo $display;
                ?>
                <label>First Name:</label>
                <input type='text' name='fname' placeholder='first name'>
            </div>
            <div>
               <?php 
                
                $display = displayErrors( $errors, 'lname') ;
                echo $display;
                
                ?>
                <label>Last Name:</label>
                <input type='text' name='lname' placeholder='last name'>
            </div>
            <div>
               <?php 
                    $display = displayErrors( $errors, 'email') ;
                    echo $display;
                ?>
                <label>Email:</label>
                <input type='email' name='e_mail' placeholder='Email'>
            </div>
            <div>
               <?php 
                $display = displayErrors( $errors, 'password');
                echo $display;
                ?>
                <label>Password:</label>
                <input type='password' name='password' placeholder='password'>
            </div>
            <div>
               <?php 
                $display = displayErrors( $errors, 'pword');
                echo $display;
                ?>
                <label>Confirm password:</label>	
				<input type="password" name="pword" placeholder="password">
            </div>
            <input type="submit" name="register" value="register">
        </form>
        <h4 class="jumpto">Have an account? <a href="login.php">login</a></h4>
    </div>



