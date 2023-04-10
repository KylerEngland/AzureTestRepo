<?php 
// require_once('protected/config.inc.php');
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
        if (!isset(self::$connection)) {

            self::$host = DBHOST;
            self::$username = DBUSER;
            self::$password = DBPASS;
            self::$db_name = DBNAME;
            
            //Initializes MySQLi
            $connection = mysqli_init();
            
            mysqli_ssl_set($connection,NULL,NULL, "/var/www/html/DigiCertGlobalRootG2.crt.pem", NULL, NULL);
            
            // Establish the connection
            mysqli_real_connect(self::$connection, self::$host, self::$username, self::$password, self::$db_name, 3306, NULL, MYSQLI_CLIENT_SSL);
            
            //If connection failed, show the error
            if (mysqli_connect_errno())
            {
                die('Failed to connect to MySQL: '.mysqli_connect_error());
            }
            // try {
            //     self::$connection = new PDO(
            //             DBCONNSTRING,
            //             DBUSER,
            //             DBPASS,
            //             self::$settings
            //     );
            // } catch (PDOException $e) {
            //     throw new PDOException($e->getMessage(), (int) $e->getCode());
            // }
        }
    }

    public static function emptyCart(){
        try{
            $sql = "DELETE FROM `cart` WHERE true = true";
            $statement = self::$connection->prepare($sql);
            $statement->execute();
            return $statement;
        }
        catch(PDOException $e){
            die( $e->getMessage() );
        }
        finally {
            $pdo = null;
        }
    }

    public static function getTotal(){
        try{
            $sql = "SELECT ROUND(SUM(price), 2) AS total FROM cart";
            $statement = self::$connection->prepare($sql);
            $statement->execute();
            return $statement;
        }
        catch(PDOException $e){
            die( $e->getMessage() );
        }
        finally {
            $pdo = null;
        }
    }

    public static function addToCart($id){
        try{
            $sql = "INSERT INTO `cart`(
                        `discid`,
                        `discname`,
                        `imagename`,
                        `brandcode`,
                        `stabilitycode`,
                        `quantity`,
                        `price`
                    )
                    SELECT
                        id,
                        name,
                        imgname,
                        brandcode,
                        stabilitycode,
                        quantity,
                        price
                    FROM
                        disc
                    WHERE
                        id = '$id'";
            $statement = self::$connection->prepare($sql);
            $statement->execute();
            return $statement;
        }
        catch(PDOException $e){
            die( $e->getMessage() );
        }
        finally {
            $pdo = null;
        }
    }

    public static function getInCartQuantity(){
        try{
            $sql = "SELECT COUNT('discid') AS quantity FROM cart;";
            $statement = self::$connection->prepare($sql);
            $statement->execute();
            return $statement;
        }
        catch(PDOException $e){
            die( $e->getMessage() );
        }
        finally {
            $pdo = null;
        }
    }

    public static function getCartContent(){
        try{
            $sql = "SELECT * FROM cart";
            $statement = self::$connection->prepare($sql);
            $statement->execute();
            return $statement;
        }
        catch(PDOException $e){
            die( $e->getMessage() );
        }
        finally {
            $pdo = null;
        }
    }

    public static function getContent(){
        try{
            $sql = "SELECT * FROM disc AS d
                    INNER JOIN brand AS b ON d.brandcode = b.brandcode
                    ORDER BY id DESC";
            $statement = self::$connection->prepare($sql);
            $statement->execute();
            return $statement;
        }
        catch(PDOException $e){
            die( $e->getMessage() );
        }
        finally {
            $pdo = null;
        }
    }

    public static function getFilteredContent($type, $brand, $stability){
        try{

            $sql = "SELECT * FROM disc AS d
                    INNER JOIN brand AS b ON b.brandcode = d.brandcode
                    INNER JOIN type AS t ON t.typecode = d.typecode
                    INNER JOIN stability AS s ON s.stabilitycode = d.stabilitycode";

            if(!($type == 0 || $type == NULL)){
                $sql .= " WHERE d.typecode = '$type'";
            }

            if(!($brand == 0 || $brand == NULL)){
                $sql .= " WHERE d.brandcode = '$brand'";
            }

            if(!($stability == 0 || $stability == NULL)){
                $sql .= " WHERE d.stabilitycode = '$stability'";
            }

            $sql .= " ORDER BY id DESC";
            $statement = self::$connection->prepare($sql);
            $statement->execute();
            return $statement;
        }
        catch(PDOException $e){
            die( $e->getMessage() );
        }
        finally {
            $pdo = null;
        }
    }

    public static function getTypes(){
        try{
            $sql = "SELECT * FROM type ORDER BY sortvalue ASC";
            $statement = self::$connection->prepare($sql);
            $statement->execute();
            return $statement;
        }
        catch(PDOException $e){
            die( $e->getMessage() );
        }
        finally {
            $pdo = null;
        }
    }

    public static function getBrands(){
        try{
            $sql = "SELECT * FROM brand ORDER BY brandname ASC";
            $statement = self::$connection->prepare($sql);
            $statement->execute();
            return $statement;
        }
        catch(PDOException $e){
            die( $e->getMessage() );
        }
        finally {
            $pdo = null;
        }
    }

    public static function getStabilities(){
        try{
            $sql = "SELECT * FROM stability ORDER BY sortvalue ASC";
            $statement = self::$connection->prepare($sql);
            $statement->execute();
            return $statement;
        }
        catch(PDOException $e){
            die( $e->getMessage() );
        }
        finally {
            $pdo = null;
        }
    }
}

?>