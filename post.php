<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="feed.php">Feed</a>
    <?php
    function inside() {}

    function login() {
        // Connection To Database:
        $servername = "localhost";
        $username = "id18924381_root";
        $password = "GSkN|x55\Jrh+]48";
        $database = "id18924381_main";
        $conn = new mysqli($servername, $username, $password, $database);
        if($conn->connect_error) {
            die("connection Error: " . $conn->connect_error);
        }

        // Login Credential Retreival:
        $login_sql = "SELECT uid, username, password FROM userinfo";
        $result = $conn->query($login_sql);
        
        /*
        // Login Credential Authentication:
        $in = FALSE;
        $uid = 0;
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              if($row['username'] === $_POST['username'] && $row['password'] === $_POST['password']) {
                  $in = TRUE;
                  $usrn = $row['username'];
                  $psw = $row['password'];
                  $uid = $row['uid']; 
                  
              }
            }
          } else {
            echo "There is not an account linked to this username";
        } */
        
        $sql = "INSERT INTO posts (title, body, alias) VALUES (\"" . $_POST['post_title'] . "\", \"" . $_POST['post_body'] . "\", \"" . $_POST['post_alias'] . "\");";

        if($conn->query($sql) === FALSE) {
            die($conn->error);
        }

        if(isset($_POST['submit'])) {
            login();
        }
    
        $conn->close();
    }

    
    ?>
    <div class="enter_info">
        <form name="post_form" action="" method="post">
            Username: <input type="text" name="username" />
            Password: <input type="password" name="password" />
            <br /><hr />
            Post Data: 
            Title: <input type="text" name="post_title" />
            Body: <input type="text" name="post_body" />
            Alias: <input type="text" name="post_alias" />
            <input type="submit" name="submit" />
        </form>
    </div>

</body>
</html>