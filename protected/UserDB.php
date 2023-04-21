<?php
class UserDB
{
    private static $connection;
    private static $host;
    private static $username;
    private static $password;
    private static $db_name;

    function __construct()
    {
        self::$host = getenv("DBHOST");
        self::$username = getenv("DBUSER");
        self::$password = getenv("DBPASS");
        self::$db_name = getenv("DBNAME");

        //Initializes MySQLi
        self::$connection = mysqli_connect(self::$host, self::$username, self::$password, self::$db_name);

        //If connection failed, show the error
        if (mysqli_connect_errno()) {
            die('Failed to connect to MySQL: ' . mysqli_connect_error());
        }
    }

    public static function register($firstName, $lastName, $email, $password)
    {
        $sql = "SELECT id, firstName, lastName FROM profiles WHERE email = ?";
        $statement = mysqli_prepare(self::$connection, $sql);
        mysqli_stmt_bind_param($statement, 's', $email);
        mysqli_stmt_execute($statement);
        mysqli_stmt_store_result($statement);

        if (mysqli_stmt_num_rows($statement) > 0) {
            // Username already exists
            echo 'Username exists, please choose another!';
        } else {
            // Username doesn't exist, insert new account
            $pass = password_hash($password, PASSWORD_BCRYPT);
            $sql = "INSERT INTO profiles (firstName, lastName, email, password) VALUES (?, ?, ?, ?)";
            $statement = mysqli_prepare(self::$connection, $sql);
            mysqli_stmt_bind_param($statement, 'ssss', $firstName, $lastName, $email, $pass);
            mysqli_stmt_execute($statement);
            mysqli_stmt_close($statement);
            echo 'You have successfully registered, you can now login!';
        }
    }

    public static function login($email, $password)
    {
        $sql = "SELECT id, firstName, lastName, email, password FROM profiles WHERE email = ?";
        $statement = mysqli_prepare(self::$connection, $sql);
        mysqli_stmt_bind_param($statement, 's', $email);
        mysqli_stmt_execute($statement);
        mysqli_stmt_store_result($statement);

        if (mysqli_stmt_num_rows($statement) > 0) {
            // Username already exists
            mysqli_stmt_bind_result($statement, $id, $firstName, $lastName, $email, $password2);
            while(mysqli_stmt_fetch($statement)){
                if (password_verify($password, $password2)) {
                    // Verification success! User has logged-in!
                    // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
                    session_regenerate_id();
                    $_SESSION['id'] = $id;
                    $_SESSION['firstName'] = $firstName;
                    $_SESSION['lastName'] = $lastName;
                    $_SESSION['email'] = $email;
                    $_SESSION['loggedin'] = TRUE;
                    return 1;
                } else {
                    // echo("Incorrect username or password.");
                    return 0;
                }
            }

        } else {
            // echo("Incorrect username or password.");
            return 0;
        }
    }
}
?>
