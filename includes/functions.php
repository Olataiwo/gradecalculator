<?php

 
    
 function displayErrors($arr, $name) {

$result = "";

if(isset($arr[$name])) {

$result = '<span class="err">'. $arr[$name]. '</span>';

}
return $result;
}





function doRegistration($dbconn, $input) {
# prepared statement
$stmt = $dbconn->prepare("INSERT INTO user(first_name, last_name, email, password) VALUES(:fn, :ln, :e, :h)");

#bind params
$data = [
':fn' => $input['fname'],
':ln' => $input['lname'],
':e' => $input['e_mail'],
':h' => $input['password']
];

# execute prepared statement
$stmt->execute($data);
}

function adminLogin($dbconn, $enter) {
					
    $result = [];
    
    # prepared statement
    $statement = $dbconn->prepare("SELECT * FROM user WHERE email=:em");
    
    # bind params
    $statement->bindParam(":em", $enter['e_mail']);
    $statement->execute();

    $row = $statement->fetch(PDO::FETCH_ASSOC);
    
    $count = $statement->rowCount();

    if( !password_verify($enter['pword'], $row['password'])){
            
    # error handler, so if this is false, handle it and exit no need for else
        redirect("login.php?msg=invalid email or password");
        exit();
    } else {
        $result[] = true;
        $result[] = $row;
    }
            
        return $result;
}	


function redirect($loca){
    header("Location: ".$loca);
}
    
    
function createTable($dbconn){
      $result = "";
    $query = $dbconn->prepare("SELECT * FROM modules");
    $query->execute();

  while($row = $query->fetch(PDO::FETCH_ASSOC)){
	$module_id = $row['id'];
	$course_id = $row['course_id'];
	$course_name = $row['course_name'];
    $course_credit = $row['credits'];
    
    $result .= '<tr><td>'.$row['course_id'].'</td>';
    $result.=  '<td>'.$row['course_name'].'</td>';
    $result.='</tr>';
}

return $result;
}

function LoginCheck() {
    
    if(!isset($_SESSION['id']) ) {

	

        header("Location:login.php");
       }
}




