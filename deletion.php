<html>
<head>
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
        echo "You have deleted ".$_POST["student_first_name"]." ".$_POST["student_last_name"]."'s form.<br>"
    ?>
</body>
</html>