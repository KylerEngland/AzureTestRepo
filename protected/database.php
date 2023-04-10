<?php

class database
{
    private static $conn;
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
        self::$conn = mysqli_init();

        // Establish the connection
        mysqli_real_connect(self::$conn, self::$host, self::$username, self::$password, self::$db_name, 3306, NULL, MYSQLI_CLIENT_SSL);

        //If connection failed, show the error
        if (mysqli_connect_errno()) {
            die('Failed to connect to MySQL: ' . mysqli_connect_error());
        }
    }
    public function getDiscsUnfiltered()
    {
        $res = mysqli_query(self::$conn, '  SELECT * FROM disc');
        return $res;
    }
}







// //Run the Select query
// printf("Reading data from table: \n");
// $res = mysqli_query($conn, 'SELECT * FROM Products');
// while ($row = mysqli_fetch_assoc($res)) {
//     var_dump($row);
// }
?>