<?php
   try {

       $connection = new PDO('mysql:host=127.0.0.1;dbname=blog', 'root', 'vivify');

       $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       

   }

   catch(PDOException $e)

   {

       echo $e->getMessage();

   }


   $statement = $connection->prepare("INSERT INTO comments (Author, Text, Post_id) VALUES  ('{$_POST['author']');");

   $statement->execute();
   




?>