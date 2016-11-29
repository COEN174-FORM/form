<html>
    <head>
        <title> Tuition and Fees Payment Authorization for Graduate Students </title>
            <link rel="stylesheet" type="text/css" href="style.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
            <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    </head>
    <body>

        <div class = "header-bar">
            <img src="scu.jpg" alt="Santa Clara Uniersity">
        </div>
        
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
                $statement = $pdo->prepare("DELETE from $table WHERE email_student = :email_student");
                $statement->bindParam(':email_student', $email_student);
                $email_student = $_POST["student_email"];
                $statement->execute();
            }
            catch(PDOException $e) {
                echo "Error: ".$e."<br>";
            }
            $pdo = null;
            // $email_student = $_POST["student_email"];
            $to = $email_student;
            // $to      = strtolower($firstname[0]).strtolower($lastname)."@scu.edu";
            $subject = "I have rejected your form";
            $message = "Your form has been rejected.\nYou can fill out a new one at http://students.engr.scu.edu/~mdemeter/php-cgi/source.php";
            $headers = "From: me";
            mail($to, $subject, $message, $headers);
            $first_name = $_POST["student_first_name"];
            $last_name = $_POST["student_last_name"];
            echo "You have rejected $first_name $last_name's form."
        ?>
    </body>
</html>