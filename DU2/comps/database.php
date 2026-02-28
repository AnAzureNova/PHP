<?php
    $dsn = "mysql:host=127.0.0.1;dbname=testdb;charset=utf8mb4";
    $username = "testadmin";
    $password = "adminadmin";

    try {
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        #echo "Success";
    }
    catch (PDOException $e){
        echo "Unable to connect DB: ". $e->getMessage();
        exit();
    }

    function get($table, $id): mixed{
        global $db;
        $sql = "SELECT * FROM $table WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute(['id'=>$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    function getALL($table): array{
        global $db;
        $sql = "SELECT * FROM $table";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }
    function loginAuth($usr, $pass){
        global $db;
        $sql = "SELECT username, usrpassword FROM userdata WHERE username=:username";
        $stmt = $db->prepare($sql);
        $stmt->execute([':username' => $usr]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        #echo "<br>CURR: ".$pass;
        #echo "<br>REG: ".$result['usrpassword'];
        if ($result) {
            $passcheck = $result['usrpassword'];
            #echo "<br>Checking";
            if ($pass === $passcheck) {
                echo "<br>Verified";
                return $result['username'];
            }
        }
        echo "<br>Failed<br>";
        return false;
    }
    function getbyUsername($username): mixed{
        global $db;
        $sql = "SELECT * FROM userdata WHERE username = :username";
        $stmt = $db->prepare($sql);
        $stmt->execute(['username'=>$username]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    function delbyUsername($username): bool {
        global $db;
        $sql = "DELETE FROM userdata WHERE username = :username";
        $stmt = $db->prepare($sql);

        return $stmt->execute([':username' => $username]);
    }
    function register($username, $email, $password): bool {
        global $db;
        $sql = "INSERT INTO userdata (username, email, usrpassword, profileimg, permissions) 
                VALUES (:username, :email, :password, '/DU2/res/defaultuser.png', 'user')";
        $stmt = $db->prepare($sql);

        return $stmt->execute([':username'=>$username,':password'=>$password,':email'=>$email]);
    }
    function editUser($username, $column, $replacement): bool {
        global $db;
        $sql = "UPDATE userdata SET $column = :replacement WHERE username = :username";
        $stmt = $db->prepare($sql);

        return $stmt->execute([':replacement'=>$replacement,':username'=>$username]);
    }
?>