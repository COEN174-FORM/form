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

        <div class = "form">

        <?php
            $host = "dbserver.engr.scu.edu";
            $table = "Students";
            $secrets = fopen("secrets.txt", "r");
            $user = fgets($secrets);
            $user = trim($user, "\n");
            $pass = fgets($secrets);
            $pass = trim($pass, "\n");
            $db = "sdb_".$user;
                try {
                    $pdo = new PDO("mysql:host=$host", $user, $pass);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                    $sql = "USE $db";
                    $pdo->exec($sql);
                    $email_student = $_GET["email"];
                    $statement = $pdo->prepare("SELECT * FROM $table WHERE email_student='$email_student'");
                    $statement->execute();
                    $result = $statement->fetchAll();

                    echo "<center><h2><u>Tuition and Fees Payment Authorization for Graduate Students</u></h2></center>";

                    echo "<h3>Student Data</h3>";

                    echo '<div class = "row">';
                        echo '<div class ="col-sm-3">';
                            echo "<h5>Student Name</h5>".$result[0]["first_name"]." ".$result[0]["last_name"];
                        echo "</div>";
                        echo '<div class ="col-sm-3">';
                            echo "<h5>Student's Email</h5>".$result[0]["email_student"];
                        echo "</div>";
                        echo '<div class ="col-sm-3">';
                            echo "<h5>Major</h5>".$result[0]["major"];
                        echo "</div>";
                            echo '<div class ="col-sm-3">';
                                echo "<h5>Advisor</h5>".$result[0]["advisor"];
                            echo "</div>";
                    echo "</div>";

                    echo '<br> <div class = "divider"> </div>';

                    echo "<h3>Position Data</h3>";

                    echo "<b>TA/RA: </b> &nbsp ".$result[0]["atype"];

                    if($result[0]["atype"] == "RA") {

                        echo '<div class = "row">';
                            echo '<div class ="col-sm-3">';
                                echo "<h5>Account</h5>".$result[0]["ra_acc"];
                            echo "</div>";
                            echo '<div class ="col-sm-3">';
                                echo "<h5>Fund</h5>".$result[0]["ra_fund"]."<br>";
                            echo "</div>";
                            echo '<div class ="col-sm-3">';
                                        echo "<h5>Department</h5>".$result[0]["ra_dept"];
                            echo "</div>";
                            echo '<div class ="col-sm-3">';
                                    echo "<h5>Pgm Code</h5>".$result[0]["ra_pgm"];
                            echo "</div>";
                        echo "</div>";

                        echo '<div class = "row">';
                            echo '<div class ="col-sm-3">';
                                echo "<h5>Activity</h5>".$result[0]["ra_act"];
                            echo "</div>";
                            echo '<div class ="col-sm-3">';
                                echo "<h5>Class</h5>".$result[0]["ra_class"];
                            echo "</div>";
                            echo '<div class ="col-sm-3">';
                                echo "<h5>Project ID</h5>".$result[0]["ra_id"]."<br>";
                            echo "</div>";
                        echo "</div>";

                        echo '<br> <div class = "divider"> </div>';
                    }

                    echo '<div class = "row">';
                        echo '<div class ="col-sm-3">';
                            echo "<h5>Academic Year</h5>".$result[0]["year"];
                        echo "</div>";
                        echo '<div class ="col-sm-3">';
                            echo "<h5>Quarter</h5>".$result[0]["quarter"];
                        echo "</div>";
                        echo '<div class ="col-sm-3">';
                            echo "<h5>Hiring Dept/Pgm</h5>".$result[0]["hdept"];
                        echo "</div>";
                    echo "</div>";

                    echo '<br> <div class = "divider"> </div>';

                    echo "<h3>Courses</h3>";

                    echo '<div class = "row">';
                        echo '<div class = "col-sm-6">';
                            echo "<h5>Course</h5>";
                            echo "1. ".$result[0]["cid1"]." ".$result[0]["ctitle1"];
                        echo "</div>";
                        echo '<div class = "col-sm-6">';
                            echo "<h5>Units</h5>";
                            echo $result[0]["credit1"]."<br>";
                        echo "</div>";
                    echo "</div>";


                    if($result[0]["cid2"] != '') {
                        echo '<div class = "row">';
                            echo '<div class = "col-sm-6">';
                                echo "2. ".$result[0]["cid2"]." ".$result[0]["ctitle2"];
                            echo "</div>";
                            echo '<div class = "col-sm-6">';
                                echo $result[0]["credit2"]."<br>";
                            echo "</div>";
                        echo "</div>";
                    }
                    if($result[0]["cid3"] != '') {
                        echo '<div class = "row">';
                            echo '<div class = "col-sm-6">';
                                echo "3. ".$result[0]["cid3"]." ".$result[0]["ctitle3"];
                            echo "</div>";
                            echo '<div class = "col-sm-6">';
                                echo $result[0]["credit3"]."<br>";
                            echo "</div>";
                        echo "</div>";
                    }
                    if($result[0]["cid4"] != '') {
                        echo '<div class = "row">';
                            echo '<div class = "col-sm-6">';
                                echo "4. ".$result[0]["cid4"]." ".$result[0]["ctitle4"];
                            echo "</div>";
                            echo '<div class = "col-sm-6">';
                                echo $result[0]["credit4"]."<br>";
                            echo "</div>";
                        echo "</div>";
                    }
                    if($result[0]["cid5"] != '') {
                        echo '<div class = "row">';
                            echo '<div class = "col-sm-6">';
                                echo "5. ".$result[0]["cid5"]." ".$result[0]["ctitle5"];
                            echo "</div>";
                            echo '<div class = "col-sm-6">';
                                echo $result[0]["credit5"]."<br>";
                            echo "</div>";
                        echo "</div>";
                    }
                    if($result[0]["cid6"] != '') {
                        echo '<div class = "row">';
                            echo '<div class = "col-sm-6">';
                                echo "6. ".$result[0]["cid6"]." ".$result[0]["ctitle6"];
                            echo "</div>";
                            echo '<div class = "col-sm-6">';
                                echo $result[0]["credit6"]."<br>";
                            echo "</div>";
                        echo "</div>";
                    }

                    echo '<br> <div class = "divider"> </div><br>';

                    echo "Total: $".$result[0]["total"]."<br><br>";

                    echo "<b>Student's Signature:</b> &nbsp ".$result[0]["stusign"]." &nbsp <b>Date:</b> &nbsp ".$result[0]["studate"]."<br>";

                    $advisor_number = 1;

                    if($result[0]["adv_sig_1"] != '') {
                        echo "Approved by: ".$result[0]["adv_sig_1"]."<br>";
                        $advisor_number = 2;
                    }
                    if($result[0]["adv_sig_2"] != '') {
                        echo "Approved by: ".$result[0]["adv_sig_2"]."<br>";
                        $advisor_number = 3;
                    }
                    if($result[0]["adv_sig_3"] != '') {
                        echo "Approved by: ".$result[0]["adv_sig_3"]."<br>";
                        $advisor_number = 4;
                    }
                    if($result[0]["adv_sig_4"] != '') {
                        echo "Approved by: ".$result[0]["adv_sig_4"]."<br>";
                        $advisor_number = 5;
                    }
                    if($result[0]["adv_sig_5"] != '') {
                        echo "Approved by: ".$result[0]["adv_sig_5"]."<br>";
                        $advisor_number = 6;
                    }
                    if($result[0]["adv_sig_6"] != '') {
                        echo "Approved by: ".$result[0]["adv_sig_6"]."<br>";
                        $advisor_number = 7;
                    }
                    if($result[0]["adv_sig_7"] != '') {
                        echo "Approved by: ".$result[0]["adv_sig_7"]."<br>";
                        $advisor_number = 8;
                    }
                    if($result[0]["adv_sig_8"] != '') {
                        echo "Approved by: ".$result[0]["adv_sig_8"]."<br>";
                        $advisor_number = 9;
                    }
                    if($result[0]["adv_sig_9"] != '') {
                        echo "Approved by: ".$result[0]["adv_sig_9"]."<br>";
                        $advisor_number = 10;
                    }

                    $pdo = null;
                }

            catch(PDOException $e) {
                echo "Error: ".$e."<br>";
            }
            echo '<button type="button" id = "print" onClick="print_function()">Print</button>';
            echo '<script>';
                echo 'function print_function() {';
                    echo 'window.print();';
                echo '}';
            echo '</script>';
            echo '<form action="deletion.php" method="post">';
            echo '<input type="hidden" name="student_email" value="'.$email_student.'" />';
            echo '<input type="hidden" name="student_first_name" value="'.$result[0]["first_name"].'" />';
            echo '<input type="hidden" name="student_last_name" value="'.$result[0]["last_name"].'" />';
            echo '<input type="submit" id = "print" class="button" name="delete" value="Delete" />';
            echo '</form>';
        ?>
    </body>
</html>