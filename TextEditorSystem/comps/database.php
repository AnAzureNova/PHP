<?php
    $dsn = "mysql:host=127.0.0.1;dbname=testdb;charset=utf8mb4";
    $username = "testadmin";
    $password = "adminadmin";

    try {
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Success";
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

        //echo "<br>CURR: ".$pass;
        //echo "<br>REG: ".$result['usrpassword'];
        if ($result) {
            $passcheck = $result['usrpassword'];
            //echo "<br>Checking";
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
                VALUES (:username, :email, :password, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn.pixabay.com%2Fphoto%2F2015%2F10%2F05%2F22%2F37%2Fblank-profile-picture-973460_1280.png&f=1&nofb=1&ipt=bddac39f5723d36966d1d8cbd5a0d07759003f270ee92f310ae2646c5425cdd1', 'user')";
        $stmt = $db->prepare($sql);

        return $stmt->execute([':username'=>$username,':password'=>$password,':email'=>$email]);
    }
    function editUser($username, $column, $replacement): bool {
        global $db;
        $sql = "UPDATE userdata SET $column = :replacement WHERE username = :username";
        $stmt = $db->prepare($sql);

        return $stmt->execute([':replacement'=>$replacement,':username'=>$username]);
    }

    function uploadFile($filename, $extension, $author, $contents, $visibility): bool {
        global $db;
        $sql = "INSERT INTO files (file_name, extension, author_username, file_contents, visibility, create_time) 
                VALUES (:file_name, :extension, :author_username, :file_contents, :visibility, NOW())";
        $stmt = $db->prepare($sql);
        
        $result = $stmt->execute([':file_name' => $filename, ':extension' => $extension, ':author_username'  => $author, ':file_contents' => $contents, ':visibility' => $visibility]);

        if(!$result){
            throw new Exception("PDO execute failed: " . implode(", ", $stmt->errorInfo()));
        }
        return $result;
    }
    function getAllFiles($public = false, $orderBy = null): array {
        global $db;
        if($public){
            $sql = "SELECT * FROM files WHERE visibility = 'public'";
        } 
        else {
            $sql = "SELECT * FROM files";
        }
        if ($orderBy){
            $sql.=" ORDER BY $orderBy";
        }
        $stmt = $db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function getFiles($username, $orderBy = null): mixed {
        global $db;
        $sql = "SELECT * FROM files WHERE author_username = :username";
        if ($orderBy){
            $sql.=" ORDER BY $orderBy";
        }
        $stmt = $db->prepare($sql);
        $stmt->execute([':username' => $username]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function delFile($username, $filename): bool {
        global $db;
        $sql = "DELETE FROM files WHERE file_name = :filename AND author_username = :authorusername";
        $stmt = $db->prepare($sql);

        return $stmt->execute([':filename' => $filename, ':authorusername' => $username]);
    }
?>