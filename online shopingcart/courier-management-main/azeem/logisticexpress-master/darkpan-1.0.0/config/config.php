<?php




try
{

    define('database',"mysql:host=localhost;dbname=courier management system");
    define('user', "root");
    define('password', "");




$connection = new PDO(database, user, password);
echo "Data Base Successfully Connected";
}catch(PDOException $error){
    echo $error->getMessage();
}


?>