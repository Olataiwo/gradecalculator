<?php

    include 'includes/db.php';
    include 'includes/functions.php';
    //include  'includes/header.php';


?>
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="styles/home.css">
    
</head>

<body>
    <section>
    <div class="mast">
      <h1>T<span>SSB</span></h1>
    </div>
  </section>

<div id="wrapper">
    

    <label>Object Oriented Porgramming:</label>

   
    <input type='text' name='course1_score' id= "course1_score"  placeholder="score"> 
    
    <select name="course7_credit">
        <option>Select Credit Point</option>
        <option value="20">20</option>
        <option value="60">60</option>
    </select>
    
     <br>
    <br>
     <label>Mordern Computer Systems:</label>
   
    <input type='text' name='course2_score' id= "course2_score"  placeholder="score"> 
    
    <select name="course7_credit">
        <option>Select Credit Point</option>
        <option value="20">20</option>
        <option value="60">60</option>
    </select>
    <br>
    <br>
     
     <label>Research, Scholarship and Professional Skills:</label>
   
    <input type='text' name='course3_score' id= "course3_score"  placeholder="score"> 
    
    <select name="course7_credit">
        <option>Select Credit Point</option>
        <option value="20">20</option>
        <option value="60">60</option>
    </select>
    
    <br>
    <br>
      
      <label>Cyber Security:</label>
   
    <input type='text' name='course4_score' id= "course4_score"  placeholder="score"> 

    <select name="course7_credit">
        <option>Select Credit Point</option>
        <option value="20">20</option>
        <option value="60">60</option>
    </select>
    <br>
    <br>
   <label>Advance Software development:</label>
   
    <input type='text' name='course5_score' id= "course5_score"  placeholder="score"> 

    <select name="course7_credit">
        <option>Select Credit Point</option>
        <option value="20">20</option>
        <option value="60">60</option>
    </select>
    <br>
    <br>
    
    <p>
    
    <label>Business IT:</label>
   
    <input type='text' name='course6_score' id= "course6_score"  placeholder="score"> 

    <select name="course7_credit">
        <option>Select Credit Point</option>
        <option value="20">20</option>
        <option value="60">60</option>
    </select>
    <br>
    <br>
    
    
    <label>Dissertation:</label>
    
     
    <input type='text' name='course7_score' id= "course7_score"  placeholder="score"> 

    <select name="course7_credit">
        <option>Select Credit Point</option>
        <option value="20">20</option>
        <option value="60">60</option>
    </select> 
    </p>
    <br>
    
    
    <button type="submit" name="submit" id="submit">Calculate</button>

</div>
<br>


<div id="average" class ="show">Your average Score is:<input type="text" name="avscore" id="average_score" value=0 >

  <button type="submit" name="checkgrade" id="checkgrade">Check grades</button>

      <div id='grades' class="grades">
        <h4>GRADES</h4>
        <hr>
        <p>Object Oriented Programming: <input name="oopgrade" id="oopgrade"></p>
        <p>Modern Computer Systems: <input name="mcsgrade" id="mcsgrade"></p>
        <p>Research Methods: <input name="rmgrade" id="rmgrade"></p>
        <p>Advance Software development: <input name="asdgrade" id="asdgrade"></p>
        <p>Cyber Security: <input name="csgrade" id="csgrade"></p>
        <p>Business IT: <input name="bitgrade" id="bitgrade"></p>
        <p>Dissertation: <input name="disgrade" id="disgrade"></p>
      </div>


</div>




</body>

<script>

  

  


 

 
  var submit = document.getElementById("submit");

  

  submit.addEventListener('click', function(e){

     e.preventDefault(); 

    var course1_score = parseInt(document.getElementById("course1_score").value);
    var course2_score = parseInt(document.getElementById("course2_score").value);
    var course3_score = parseInt(document.getElementById("course3_score").value);
    var course4_score = parseInt(document.getElementById("course4_score").value);
    var course5_score = parseInt(document.getElementById("course5_score").value);
    var course6_score = parseInt(document.getElementById("course6_score").value);
    var course7_score = parseInt(document.getElementById("course7_score").value);
    var average_score = document.getElementById("average_score");

   

    var totalscore = (course1_score + course2_score + course3_score +course4_score + course5_score + course6_score + course7_score)/7;

    average_score.value = totalscore;

    document.querySelector('.show').style.display = "block";


   


  });


  var grades = document.getElementById('checkgrade');




  grades.addEventListener('click', function(e){
    e.preventDefault();

    var course1_score = parseInt(document.getElementById("course1_score").value);
    var course2_score = parseInt(document.getElementById("course2_score").value);
    var course3_score = parseInt(document.getElementById("course3_score").value);
    var course4_score = parseInt(document.getElementById("course4_score").value);
    var course5_score = parseInt(document.getElementById("course5_score").value);
    var course6_score = parseInt(document.getElementById("course6_score").value);
    var course7_score = parseInt(document.getElementById("course7_score").value);
    var average_score = document.getElementById("average_score");

    
    var oopgrade = document.getElementById("oopgrade");
    var mcsgrade = document.getElementById("mcsgrade").value;
    var oopgrade = document.getElementById("oopgrade").value;
    var oopgrade = document.getElementById("oopgrade").value;
    var oopgrade = document.getElementById("oopgrade").value;
    var oopgrade = document.getElementById("oopgrade").value;
    var oopgrade = document.getElementById("oopgrade").value;

   // alert(course1_score);

   document.getElementById('grades').style.display = "block";

    if(course1_score <= 70) {
        document.getElementById("oopgrade").value = "A"
       }else if(course1_score >= 60 && course1_score <= 69){
          document.getElementById("oopgrade").value = "B"
       }

    alert(document.getElementById("oopgrade").value)
    //document.getElementById('grades').style.display = "block";
  });

  

</script>


