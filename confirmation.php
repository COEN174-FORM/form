<html>
<head>
<?php
    $num = $_POST["advisor_num"];
    $is_last = $_POST["is_last"];
    $email_student = $_POST["student_email"];
    if($is_last == "true") {
        echo '<meta http-equiv="refresh" content="2; url=final.php?email='.$email_student.'" />';
    }
?>

<title> Tuition and Fees Payment Authorization for Graduate Students </title>
</head>
<body>
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
            $sig = $_POST["advisor_name"];
            $pdo = new PDO("mysql:host=$host", $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $sql = "USE $db";
            $pdo->exec($sql);
            if($num == 1) {
                $statement = $pdo->prepare("UPDATE $table SET adv_sig_1 = :sig WHERE email_student = :email_student");
            }
            else if($num == 2) {
                $statement = $pdo->prepare("UPDATE $table SET adv_sig_2 = :sig WHERE email_student = :email_student");
            }
            else if($num == 3) {
                $statement = $pdo->prepare("UPDATE $table SET adv_sig_3 = :sig WHERE email_student = :email_student");
            }
            else if($num == 4) {
                $statement = $pdo->prepare("UPDATE $table SET adv_sig_4 = :sig WHERE email_student = :email_student");
            }
            else if($num == 5) {
                $statement = $pdo->prepare("UPDATE $table SET adv_sig_5 = :sig WHERE email_student = :email_student");
            }
            else if($num == 6) {
                $statement = $pdo->prepare("UPDATE $table SET adv_sig_6 = :sig WHERE email_student = :email_student");
            }
            else if($num == 7) {
                $statement = $pdo->prepare("UPDATE $table SET adv_sig_7 = :sig WHERE email_student = :email_student");
            }
            else if($num == 8) {
                $statement = $pdo->prepare("UPDATE $table SET adv_sig_8 = :sig WHERE email_student = :email_student");
            }
            else if($num == 9) {
                $statement = $pdo->prepare("UPDATE $table SET adv_sig_9 = :sig WHERE email_student = :email_student");
            }
            else {
                $statement = $pdo->prepare("UPDATE $table SET adv_sig_10 = :sig WHERE email_student = :email_student");
            }
            $statement->bindParam(':sig', $sig);
            $statement->bindParam(':email_student', $email_student);
            $sig = $_POST["advisor_name"];
            $statement->execute();
        }
        catch(PDOException $e) {
            echo "Error: ".$e."<br>";
        }
        $pdo = null;
        if($is_last == "false") {
            $to = $_POST["next_email"];
            // $to      = strtolower($firstname[0]).strtolower($lastname)."@scu.edu";
            $subject = "I have approved a form";
            $message = "Please take a look at the form at students.engr.scu.edu/~mdemeter/php-cgi/get_student_info.php?email=$email_student!\nSincerely,\n".$sig;
            $headers = "From: ".$sig;
            mail($to, $subject, $message, $headers);
        }
        echo "You have approved ".$_POST["student_first_name"]." ".$_POST["student_last_name"]."'s form, ".$sig."!<br>"
    ?>
</body>
</html>