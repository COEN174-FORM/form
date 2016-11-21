<!DOCTYPE HTML>
<html>
	<head>
		<title> Tuition and Fees Payment Authorization for Graduate Students </title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>

	<body>

		<div class = "header-bar">

			<img src="scu.jpg" alt="Santa Clara Uniersity">

		</div>

		<form action="process_form.php" method="post">

		<center><h2><u>Tuition and Fees Payment Authorization for Graduate Students</u></h2></center>

		<h3>Student Data</h3>

		<div class = "row">
			<div class ="col-sm-3">
				<h5>First Name</h5>
				<input type="text" required name="first_name" placeholder="First Name" id="first_name" oninput="setName()"><br>
			</div>
			<div class ="col-sm-3">
				<h5>Last Name</h5>
				<input type="text" required name="last_name" placeholder="Last Name" id="last_name" oninput="setName()"><br>
			</div>
			<div class ="col-sm-3">
				<h5>SCU ID</h5>
				<input type="text" required name="id" placeholder="SCU ID"><br>
			</div>
			<div class ="col-sm-3">
				<h5>Major</h5>
				<input type="text" required name="major" placeholder="Major"><br>
			</div>
		</div>

		<div class ="row">
			<div class ="col-sm-3">
				<h5>Student Email</h5>
				<input type="email" required name="email" placeholder="Student Email"><br>
			</div>
			<div class ="col-sm-3">
				<h5>Advisor</h5>
				<input type="text" required name="advisor" placeholder="Advisor"><br>
			</div>
			<div class ="col-sm-3">
				<h5>Advisor Email</h5>
				<input type="email" required name="ademail" placeholder="Advisor Email"><br>
			</div>
		</div>

		<br>
		<div class = "divider"> </div>

		<h3>Position Data</h3>

		<script type="text/javascript">
            function setTheDate() {
                var dt = new Date();
                var day = dt.getDate();
                var month = parseInt(dt.getMonth()) + 1;
                var year = dt.getFullYear();
                var val = month+"/"+day+"/"+year;
                document.getElementById('studate').value = val;
            }
            function setName() {
                var fname = document.getElementById('first_name').value;
                var lname = document.getElementById('last_name').value;
                document.getElementById('stusign').value = fname+" "+lname;
            }
            function engrCheck() {
                var val = parseInt(document.getElementById('total').value);
                if(isNaN(val)) {
                    val = 0;
                }
                if(document.getElementById('engineerTotal').checked) {
                    document.getElementById('total').value = val + 150;
                } else {
                    if(val > 150) {
                        document.getElementById('total').value -= "150";
                    } else {
                        document.getElementById('total').value = "";
                    }
                }
            }
            function yesnoCheck() {
                if (document.getElementById('RA').checked) {
                	document.getElementById('RAYes').style.display = 'block';
                    document.getElementById('TAYes').style.display = 'none';
                    document.getElementById("is_ra").value="true";
                } else {
                    document.getElementById('RAYes').style.display = 'none';
                    document.getElementById('TAYes').style.display = 'block';
                    document.getElementById("is_ra").value="false";
                }
            }
            function findTotal(){
                if(document.getElementById('ta_option').value == "Full Time") {
                    document.getElementById('cred_max').value = 8;
                } else if(document.getElementById('ta_option').value == "2/3 Time") {
                    document.getElementById('cred_max').value = 5;
                } else {
                    document.getElementById('cred_max').value = 2;
                }
                var array = document.querySelectorAll('.cc');
                var total = 0;
                for(var i = 0; i < array.length; i++) {
                    var target = "credit".concat(i + 1);
                    var val = parseInt(array[i].value);
                    var temp = "cval".concat(i+1);
                    if(!isNaN(val)) {
                        var oldval = parseInt(document.getElementById(temp).value);
                        if(0 < val && val < 6) {
                            total += val;
                            document.getElementById(target).value = val;
                            document.getElementById(temp).value = val;
                        } else {
                            total += oldval;
                            if(oldval == 0) {
                                document.getElementById(target).value = "";
                            } else {
                                document.getElementById(target).value = oldval;
                            }
                        }
                    } else {
                        document.getElementById(target).value = "";
                        document.getElementById(temp).value = 0;
                    }
                }
                document.getElementById('cred_total').value = total;
                if(total > parseInt(document.getElementById('cred_max').value)) {
                    total = parseInt(document.getElementById('cred_max').value);
                }
                if(document.getElementById('engineerTotal').checked) {
                    document.getElementById('total').value = (total * 925) + 150;
                } else {
                    if(total == 0) {
                        document.getElementById('total').value = "";
                    } else {
                        document.getElementById('total').value = total * 925; 
                    }
                }
            }
            function addClass() {
                var number = parseInt(document.getElementById('course_val').value);
                if(number < 8) {
                    number += 1;
                    if(document.getElementById('class_'+number).style.display = "none") {
                        if(!isNaN(document.getElementById('credit'+(number-1)).value)) {
                            if(document.getElementById('cred_total').value < document.getElementById('cred_max').value) {
                                document.getElementById('class_'+number).style.display = "block";
                                document.getElementById('class_'+number+'_break').style.display = "block";
                                document.getElementById('course_val').value = number;
                            }
                        }
                    }
                }
            }
            function removeClass() {
                var number = parseInt(document.getElementById('course_val').value);
                if(number > 1) {
                    if(document.getElementById('class_'+number).style.display == "block") {
                        document.getElementById('course_val').value = number - 1;
                        document.getElementById('class_'+number).style.display = "none";
                        document.getElementById('cid'+number).value='';
                        document.getElementById('ctitle'+number).value="";
                        document.getElementById('credit'+number).value="";
                        document.getElementById('class_'+number+'_break').style.display = "none";
                        findTotal();
                    }
                }
            }
    	</script>

		<label for="TA" style="font-weight: normal">TA</label>
        <input type="radio" onclick="yesnoCheck()" name="atype" id="TA" value="TA" style="display:inline">
		<label for="RA" style="font-weight: normal">RA</label>
        <input type="radio" onclick="yesnoCheck()" name="atype" id="RA" value="RA" style="display:inline">
        <input type="hidden" name="is_ra" value="false" id="is_ra"/>
        
        <div id="TAYes" style="display:none">
            <div class="row">
               <div class ="col-sm-3">
                    <select id="ta_option" class="ta_option">
                        <option value="Full Time">Full Time</option>
                        <option value="2/3 Time">2/3 Time</option>
                        <option value="1/3 Time">1/3 Time</option>
                    </select>
                </div>
            </div>
            <br style="margin-top: 0px">
            <div class = "divider"> </div>
        </div>

		<div id="RAYes" style="display:none">
			<div class = "row">
				<div class ="col-sm-3">
					<h5>Account</h5>
					<input type='text' id='RAAcc' name='RAAcc' placeholder="Account">
				</div>
				<div class ="col-sm-3">
					<h5>Fund</h5>
				  	<input type='text' id='RAFund' name='RAFund' placeholder="Fund">
			  	</div>
			  	<div class ="col-sm-3">
					<h5>Dept.</h5>
				  	<input type='text' id='RADept' name='RADept' placeholder="Department">
			  	</div>
			  	<div class ="col-sm-3">
				  	<h5>Prgm. Code</h5>
				  	<input type='text' id='RAcode' name='RAcode' placeholder="Prgm. Code">
			  	</div>
		 	</div>
		 	<div class ="row">
			  	<div class ="col-sm-3">
				  	<h5>Activity</h5>
				  	<input type='text' id='RAAct' name='RAAct' placeholder="Activity">
			  	</div>
			  	<div class ="col-sm-3">
				  	<h5>Class</h5>
				  	<input type='text' id='RAClass' name='RAClass' placeholder="Class">
			  	</div>
			  	<div class ="col-sm-3">
				  	<h5>Project ID</h5>
				  	<input type='text' id='RAId' name='RAId' placeholder="Project ID">
			  	</div>
		  	</div>

		  	<br>
			<div class = "divider"> </div>

		</div>

		<div class = "row">
			<div class ="col-sm-4">
				<h5>Academic Year</h5>
				<input type="text" required name="year" placeholder="Academic Year"><br>
			</div>
			<div class ="col-sm-4">
				<h5>Quarter</h5>
				<input type="text" required name="quarter" placeholder="Quarter"><br>
			</div>
			<div class ="col-sm-4">
				<h5>Hiring Dept/Pgm</h5>
				<input type="text" required name="hdept" placeholder="Hiring Department"><br>
			</div>
		</div>
        <br>
		<div class = "divider"> </div>

		<h3>Courses</h3>
        <input type="hidden" name="course_val" value=1 id="course_val">
        <input type="hidden" name="cred_total" value=0 id="cred_total">
        <input type="hidden" name="cred_max" value=0 id="cred_max">
        <input type="hidden" name="cval1" id="cval1" value=0>
        <input type="hidden" name="cval2" id="cval2" value=0>
        <input type="hidden" name="cval3" id="cval3" value=0>
        <input type="hidden" name="cval4" id="cval4" value=0>
        <input type="hidden" name="cval5" id="cval5" value=0>
        <input type="hidden" name="cval6" id="cval6" value=0>
        <input type="hidden" name="cval7" id="cval7" value=0>
        <input type="hidden" name="cval8" id="cval8" value=0>

        <div class = "row">
        	<div class = "col-sm-4">
        		<h5>Course ID</h5>
				1. <input type="text" name="cid1" id="cid1" placeholder="ID">
			</div>
			<div class = "col-sm-4">
				<h5>Course Title</h5>
				<input type="text" name="ctitle1" id="ctitle1" placeholder="Title">
			</div>
			<div class = "col-sm-4">
				<h5>Number of Credits</h5>
				<input type="text" name="credit1" oninput="findTotal()" id="credit1" placeholder="Credits" class="cc">
			</div>
            <br>
		</div>
        <br>

		<div class = "row" id="class_2" style="display:none">
        	<div class = "col-sm-4">
				2. <input type="text" name="cid2" id="cid2" placeholder="ID">
			</div>
			<div class = "col-sm-4">
				<input type="text" name="ctitle2" id="ctitle2" placeholder="Title">
			</div>
			<div class = "col-sm-4">
				<input type="text" name="credit2" oninput="findTotal()" id="credit2" placeholder="Credits" class="cc">
			</div>
		</div>
        <br id="class_2_break" style="display:none">


		<div class = "row" id="class_3" style="display:none">
        	<div class = "col-sm-4">
				3. <input type="text" name="cid3" id="cid3" placeholder="ID">
			</div>
			<div class = "col-sm-4">
				<input type="text" name="ctitle3" id="ctitle3" placeholder="Title">
			</div>
			<div class = "col-sm-4">
				<input type="text" name="credit3" oninput="findTotal()" id="credit3" placeholder="Credits" class="cc">
			</div>
		</div>
        <br id="class_3_break" style="display:none">


		<div class = "row" id="class_4" style="display:none">
        	<div class = "col-sm-4">
				4. <input type="text" name="cid4" id="cid4" placeholder="ID">
			</div>
			<div class = "col-sm-4">
				<input type="text" name="ctitle4" id="ctitle4" placeholder="Title">
			</div>
			<div class = "col-sm-4">
				<input type="text" name="credit4" oninput="findTotal()" id="credit4" placeholder="Credits" class="cc">
			</div>
		</div>
        <br id="class_4_break" style="display:none">


		<div class = "row" id="class_5" style="display:none">
        	<div class = "col-sm-4">
				5. <input type="text" name="cid5" id="cid5" placeholder="ID">
			</div>
			<div class = "col-sm-4">
				<input type="text" name="ctitle5" id="ctitle5" placeholder="Title">
			</div>
			<div class = "col-sm-4">
				<input type="text" name="credit5" oninput="findTotal()" id="credit5" placeholder="Credits" class="cc">
			</div>
		</div>
        <br id="class_5_break" style="display:none">

        <div class = "row" id="class_6" style="display:none">
        	<div class = "col-sm-4">
        		6. <input type="text" name="cid6" id="cid6" placeholder="ID">
        	</div>
        	<div class = "col-sm-4">
        		<input type="text" name="ctitle6" id="ctitle6" placeholder="Title">
        	</div>
        	<div class = "col-sm-4">
        		<input type="text" name="credit6" oninput="findTotal()" id="credit6" placeholder="Credits" class="cc">
        	</div>
        </div>
        <br id="class_6_break" style="display:none">


        <div class = "row" id="class_7" style="display:none">
            <div class = "col-sm-4">
                7. <input type="text" name="cid7" id="cid7" placeholder="ID">
            </div>
            <div class = "col-sm-4">
                <input type="text" name="ctitle7" id="ctitle7" placeholder="Title">
            </div>
            <div class = "col-sm-4">
                <input type="text" name="credit7" oninput="findTotal()" id="credit7" placeholder="Credits" class="cc">
            </div>
        </div>
        <br id="class_7_break" style="display:none">

        <div class = "row" id="class_8" style="display:none">
            <div class = "col-sm-4">
                8. <input type="text" name="cid8" id="cid8" placeholder="ID">
            </div>
            <div class = "col-sm-4">
                <input type="text" name="ctitle8" id="ctitle8" placeholder="Title">
            </div>
            <div class = "col-sm-4">
                <input type="text" name="credit8" oninput="findTotal()" id="credit8" placeholder="Credits" class="cc">
            </div>
        </div>
        <br id="class_8_break" style="display:none">


        <div style="text-align:center;">
            <button type="button" id="add_class" onClick="addClass()" style="display:inline">+</button>
            <button type="button" id="remove_class" onClick="removeClass()" style="display:inline">-</button>
        </div>

        <br>
		<div class = "divider"> </div>
        <br>
        <div>
            <label for="total" style="font-weight: normal">Total: $</label>
            <input type="text" name="total" id="total" style="display:inline"><br><br>
        </div>
		<input type="checkbox" required name="engineerTotal" id="engineerTotal" onClick="engrCheck()" value="true"> &nbsp;
		<label for="engineerTotal"> Engineering Design Center and Student Association Fee ($150 per quarter) </label><br>
		<input type="checkbox" required name="tandc" id="tandc" value="true"> &nbsp;
		<label for="tandc"> All information provided is correct to my knowledge.</label><br><br>

		<label for="stusign" style="font-weight: normal">Student's Signature</label>
		<input type="text" name="stusign" id="stusign" placeholder="Student Signature"> &nbsp;

		<label for="studate" style="font-weight: normal">Date</label>
		<input type="text" name="studate" id="studate" placeholder="Date"> &nbsp;
        <script>setTheDate()</script>
		<input type="submit" value="Submit"><br>

		</form>
	</body>
</html>
