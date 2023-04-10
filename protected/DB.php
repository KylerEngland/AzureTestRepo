<?php 

class DB{

    private static $connection;
    private static $host;
    private static $username;
    private static $password;
    private static $db_name;
    // private static $settings = array(
    //     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    //     PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    // );
    
    
    function __construct(){
        self::$host = getenv("DBHOST");
        self::$username = getenv("DBUSER");
        self::$password = getenv("DBPASS");
        self::$db_name = getenv("DBNAME");
        
        //Initializes MySQLi
        self::$connection = mysqli_init();
        
        // Establish the connection
        mysqli_real_connect(self::$connection, self::$host, self::$username, self::$password, self::$db_name, 3306, NULL, MYSQLI_CLIENT_SSL);
        
        //If connection failed, show the error
        if (mysqli_connect_errno()) {
            die('Failed to connect to MySQL: ' . mysqli_connect_error());
        }
    }
    
    public static function getContent(){
        $sql = "SELECT * FROM disc AS d
                INNER JOIN brand AS b ON d.brandcode = b.brandcode
                ORDER BY id DESC";
        $result = mysqli_query(self::$connection,$sql);
        return $result;
    }
    
    // public static function emptyCart(){
    //     if ($statement = mysqli_prepare(self::$connection, "DELETE FROM `cart` WHERE true = true")){
    //         mysqli_stmt_execute($statement);
    //         mysqli_stmt_close($statement);
    //         return $statement;
    //     }
    // }

    // public static function getTotal(){
    //     $sql = "SELECT ROUND(SUM(price), 2) AS total FROM cart";
    //     $result = mysqli_query(self::$connection, $sql);
    //     return $result;
    // }

    // public static function addToCart($id){
    //     if($statement = mysqli_prepare(self::$connection,"INSERT INTO cart(discid,discname,imagename,brandcode,stabilitycode,quantity,price)
    //     SELECT
    //         id,
    //         name,
    //         imgname,
    //         brandcode,
    //         stabilitycode,
    //         quantity,
    //         price
    //     FROM
    //         disc
    //     WHERE
    //         id = '$id'")){
            
    //     }
    //         // $sql = "INSERT INTO `cart`(
    //         //             `discid`,
    //         //             `discname`,
    //         //             `imagename`,
    //         //             `brandcode`,
    //         //             `stabilitycode`,
    //         //             `quantity`,
    //         //             `price`
    //         //         )
    //         //         SELECT
    //         //             id,
    //         //             name,
    //         //             imgname,
    //         //             brandcode,
    //         //             stabilitycode,
    //         //             quantity,
    //         //             price
    //         //         FROM
    //         //             disc
    //         //         WHERE
    //         //             id = '$id'";
        
    // }

    // public static function getInCartQuantity(){
    //     $sql = "SELECT COUNT('discid') AS quantity FROM cart;";
    //     $result = mysqli_query(self::$connection,$sql);
    //     return $result;
    // }

    // public static function getCartContent(){
    //     $sql = "SELECT * FROM cart";
    //     $result = mysqli_query(self::$connection,$sql);
    //     return $result;
    // }


    // public static function getFilteredContent($type, $brand, $stability){
    //     try{
    //         $sql = "SELECT * FROM disc AS d
    //                 INNER JOIN brand AS b ON b.brandcode = d.brandcode
    //                 INNER JOIN type AS t ON t.typecode = d.typecode
    //                 INNER JOIN stability AS s ON s.stabilitycode = d.stabilitycode";


    //         if(!($type == 0 || $type == NULL)){
    //             $sql .= " WHERE d.typecode = '$type'";
    //         }

    //         if(!($brand == 0 || $brand == NULL)){
    //             $sql .= " WHERE d.brandcode = '$brand'";
    //         }

    //         if(!($stability == 0 || $stability == NULL)){
    //             $sql .= " WHERE d.stabilitycode = '$stability'";
    //         }

    //         $sql .= " ORDER BY id DESC";
    //         $statement = self::$connection->prepare($sql);
    //         $statement->execute();
    //         return $statement;
    //     }
    //     catch(PDOException $e){
    //         die( $e->getMessage() );
    //     }
    //     finally {
    //         $pdo = null;
    //     }
    // }

    // public static function getTypes(){
    //     $sql = "SELECT * FROM type ORDER BY sortvalue ASC";
    //     $result = mysqli_query(self::$connection,$sql);
    //     return $result;
    // }

    // public static function getBrands(){
    //     $sql = "SELECT * FROM brand ORDER BY brandname ASC";
    //     $result = mysqli_query(self::$connection,$sql);
    //     return $result;
    // }

    // public static function getStabilities(){
    //     $sql = "SELECT * FROM stability ORDER BY sortvalue ASC";
    //     $result = mysqli_query(self::$connection,$sql);
    //     return $result;
    // }
}

?>