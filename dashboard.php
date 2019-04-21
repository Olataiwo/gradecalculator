<?php

session_start();

$page_title = "dashboard";
include 'includes/header.php';
include 'includes/db.php';
include 'includes/functions.php';

// LoginCheck();

     $error=[];
     $divnumber = 0;
     $average = "";
     $totalUnit = "";
		 $award = "";
		 
	if(isset($_POST['calculate'])){

	if(empty($_POST['oop']) && empty($_POST['mcs']) && empty($_POST['rm']) && empty($_POST['bit']) &&empty($_POST['asd']) &&empty($_POST['cse']) && empty($_POST['dis'])){
		$error['no value'] = "No value was entered";
		$divnumber = 1;
	}
		
	if(!empty($_POST['oop'])){
		$divnumber+=1;
	}

	if(!empty($_POST['mcs'])){
		$divnumber++;
	}
	if(!empty($_POST['rm'])){
		$divnumber++;
	}
	if(!empty($_POST['bit'])){
		$divnumber++;
	}

	if(!empty($_POST['asd'])){
		$divnumber++;
	}

	if(!empty($_POST['cse'])){
		$divnumber++;
	}
	if(!empty($_POST['dis'])){
		$divnumber+=3;
	}
    
  $total = (int)$_POST['oop'] + (int)$_POST['mcs'] + (int)$_POST['rm'] + (int)$_POST['bit']+(int)$_POST['asd'] +(int)$_POST['cse']+ ((int)$_POST['dis']*3);

 if($divnumber != 0){
 	$average = $total/$divnumber;

 } 

 $totalUnit = (int)$_POST['oop_credit'] + (int)$_POST['mcs_credit'] + (int)$_POST['rm_credit']+(int)$_POST['bit_credit']+(int)$_POST['asd_credit']+(int)$_POST['cse_credit']+(int)$_POST['dis_credit'];

 if($totalUnit == 180) {

 	$award = "MSc";
 }elseif($totalUnit==120){
     $award ="Postgraduate Diploma";

 }else {
     $award = "No certificate";
 }

//  $stmt = $conn->prepare("INSERT INTO courses(oop, mcs, research, cyber_security, business_it, advance_software, dissertation)
//  VALUES( :oop, :mcs, :rm, :bi, :asd, :cse, :dis)");

//  $data = [
// 	 ':oop'=>$_POST['oop'],
// 	 ':mcs'=>$_POST['mcs'],
// 	 ':rm'=>$_POST['rm'],
// 	 ':bi'=>$_POST['bit'],
// 	 ':asd'=>$_POST['asd'],
// 	 ':cse'=>$_POST['cse'],
// 	 ':dis'=>$_POST['dis']
//  ];

//  $stmt->execute($data);

 $array1 = [$_POST['oop'],$_POST['mcs'],$_POST['rm'],$_POST['bit'],$_POST['asd'],$_POST['cse'],$_POST['dis']];

 var_dump($totalUnit);
 var_dump($_SESSION['id']);



}



?>

<div class="heading">
		<h1 class="register-label" id='register-label'>Grade Calculator</h1>

		<div class="welcome-logout">
			<h3 class = "welcome" >
				<!-- <?php echo "Welcome ". $_SESSION['name']; ?> -->
				Welcome
			</h3>
			<a href="logout.php">Logout</a>
		</div>
</div>


		<div class="content-wrapper">
		<form method="post" action="dashboard.php">
			<table align="center" border="2" bgcolor="orange">
				<tr align="left">
				  <th>Course code</th>
				  <th>Module name</th>
				  <th>Score</th>
				  <th>Credit Points</th>

				</tr>
				<tr>
					<td>P00100</td>
					<td>Object Oriented Programming:</td>
					<td><input type="text" name="oop" id="oop" oninput="change('#oop_credit');" onkeypress="IsInputNumber(event)" onchange="checkPasssed('#oop','#oop_credit')"></td>
					<td><input type ="text" name="oop_credit" id="oop_credit" readOnly="true" onkeypress="IsInputNumber(event)"></td>
					<!-- <td>
						 <select name="oop_credit" id="oop_credit">
			                    <option value="0">Select Credit Point</option>
			                    <option value="20">20</option>
			                    <option value="60">60</option>
	                   </select> 
                   </td> -->
				</tr>
				<tr>
					<td>P00191</td>
					<td>Modern Computer Systems:</td>
					<td><input type="text" name="mcs" id="mcs" oninput="change('#mcs_credit');" onkeypress="IsInputNumber(event)" onchange="checkPasssed('#mcs','#mcs_credit')"></td>
					<td><input type ="text" name="mcs_credit" id="mcs_credit" readOnly="true" onkeypress="IsInputNumber(event)"></td>
					<!-- <td>
						 <select name="mcs_credit" id="mcs_credit">
							    <option value="0">Select Credit Point</option>
							    <option value="20">20</option>
							    <option value="60">60</option>
					    </select> 
					</td> -->
		        </tr>
	        		<tr>
	        			<td>P00404</td>
	        			<td>Research Methods:</td>
	        			<td><input type="text" name="rm" id="rm" oninput="change('#rm_credit');" onkeypress="IsInputNumber(event)" onchange="checkPasssed('#rm','#rm_credit')"></td>
	        			<td><input type ="text" name="rm_credit" id="rm_credit" readOnly="true" onkeypress="IsInputNumber(event)"></td>
	        			<!-- <td>
	        				 <select name="rm_credit" id="rm_credit">
	        					    <option value="0">Select Credit Point</option>
	        					    <option value="20">20</option>
	        					    <option value="60">60</option>
	        			    </select> 
	        			</td> -->
	                </tr>	
	                		<tr>
	                			<td>P00193</td>
	                			<td>Business IT:</td>
	                			<td><input type="text" name="bit" id="bit" oninput="change('#bit_credit');" onkeypress="IsInputNumber(event)" onchange="checkPasssed('#bit','#bit_credit')"></td>
	                			<td><input type ="text" name="bit_credit" id="bit_credit" readOnly="true" onkeypress="IsInputNumber(event)"> </td>
	                			<!-- <td>
	                				 <select name="bit_credit" id="bit_credit">
	                					    <option value="0">Select Credit Point</option>
	                					    <option value="20">20</option>
	                					    <option value="60">60</option>
	                			    </select> 
	                			</td> -->
	                        </tr>
	                        		<tr>
	                        			<td>P00404</td>
	                        			<td>Advance Software development:</td>
	                        			<td><input type="text" name="asd" id="asd" oninput="change('#asd_credit');" onkeypress="IsInputNumber(event)"onchange="checkPasssed('#asd','#asd_credit')"></td>
	                        			<td><input type ="text" name="asd_credit" id="asd_credit" readOnly="true" onkeypress="IsInputNumber(event)" ></td>
	                        			<!-- <td>
	                        				 <select name="asd_credit" id="asd_credit">
	                        					    <option value="0">Select Credit Point</option>
	                        					    <option value="20">20</option>
	                        					    <option value="60">60</option>
	                        			    </select> 
	                        			</td> -->
	                                </tr>
	                                		<tr>
	                                			<td>P00404</td>
	                                			<td>Cyber Security:</td>
	                                			<td><input type="text" name="cse" id="cse" oninput="change('#cse_credit');"onkeypress="IsInputNumber(event)" onchange="checkPasssed('#cse','#cse_credit')"></td>
	                                			<td><input type ="text" name="cse_credit" id="cse_credit" readOnly="true"onkeypress="IsInputNumber(event)" ></td>
	                                			<!-- <td>
	                                				 <select name="cse_credit" id="cse_credit">
	                                					    <option value="0">Select Credit Point</option>
	                                					    <option value="20">20</option>
	                                					    <option value="60">60</option>
	                                			    </select> 
	                                			</td> -->
	                                        </tr>	
	                                		<tr>
	                                			<td>P00404</td>
	                                			<td>Dissertation:</td>
	                                			<td><input type="text" name="dis" id="dis" oninput="change('#dis_credit');"onkeypress="IsInputNumber(event)" onchange ="checkPasssedDis('#dis','#dis_credit')"></td>
	                                			<td><input type ="text" name="dis_credit" id="dis_credit" readOnly="true" onkeypress="IsInputNumber(event)" ></td>
	                                			<!-- <td>
	                                				 <select name="dis_credit" id="dis_credit">
	                                					    <option value="0">Select Credit Point</option>
	                                					    <option value="20">20</option>
	                                					    <option value="60">60</option>
	                                			    </select> 
	                                			</td> -->
	                                        </tr>

	                                        <tr align="center">
	                                          <td colspan="7">
																							<button class="btn" type="submit" id="submit" name='calculate'>Calculate</button>
																						</td>
	                                        </tr>				
			</table>
		</form>
		</div>
<?php

	if(!empty($error)){
	echo '<p>'.$error["no value"].'</p>';
};
// echo '<p  id="show">Your average score is:' .$average. '</p>';

$plus1 = 0;
$plus2 = 0;
$plus3 = 0;
$plus4 = 0;


if(!empty($array1))
{


	 for($Lvar =0; $Lvar< count($array1); $Lvar++)
	{
		
		if($array1[$Lvar] > 70)
		{
			
			$plus1++;
		}

		if($array1[$Lvar] >= 60 && $array1[$Lvar] <= 69 )
		{
			
			$plus2++;
		}

		if($array1[$Lvar] >= 50 && $array1[$Lvar] <= 59 )
		{
			
			$plus3++;
		}

		if($array1[$Lvar] < 50 && $array1[$Lvar] != 0 )
		{
			
			$plus4++;
		}

	}

	echo "<div class='content-wrapper'>
		<table class='result-table' border='1' align='left'>";
	echo "<tr>
	       <th colspan='7'>Result Summary</th>
	      </tr>
	      <tr>
	      	 <th>Grade Type</th>
	      	 <th>Value</th>
	      </tr>
	      <tr>
	       <th>A</th>
	       <th>".$plus1."</th>
	       </tr>
	       <tr>
	        <th>B</th>
	        <th>".$plus2."</th>
	        </tr>
	        <tr>
	         <th>C</th>
	         <th>".$plus3."</th>
	         </tr>
	         <tr>
	          <th>FAIL</th>
	          <th>".$plus4."</th>
	          </tr>
	          <tr>
	            <th>Total credit</th>
	            <th>" .$totalUnit."</th>
	          </tr>
	          <tr>
	          <th>Average Score</th>
	          <th>".$average."</th>
	          </tr>
	          <tr>
	          "
	       	      
	       ;
	
	
//	echo "You have " .$plus1. "A's,".$plus2."B's,".$plus3 ."C's and FAILED".$plus4."courses";


	
	echo "</table></div>";
	echo "Number of A = ". $plus1 ."\n";
	echo "Number of B = ". $plus2 ."\n";
	echo "Number of C= ". $plus3 ."\n";
	echo "Fail = ". $plus4 ."\n";
    echo '<div class="show-results">
			<p  id="show">Your average score is:' .$average. '</p> </div>';
    echo '<div class="show-results">
			<p>You have have passed'.$totalUnit." units and have been awarded " .$award. " in Computing</p> </div>";

	
}











?>
 
	</body>

</html>


