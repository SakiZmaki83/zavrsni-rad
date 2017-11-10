<?php
   try {

       $connection = new PDO('mysql:host=127.0.0.1;dbname=blog', 'root', 'vivify');

       $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       

   }

   catch(PDOException $e)

   {

       echo $e->getMessage();

   }


   $createComment = "INSERT INTO comments (author,text, post_id) VALUES ('{$_POST['author']}', '{$_POST['comments']}', '{$_POST['post_id']}')";
   $statement = $connection->prepare($createComment);

   $statement->execute();

   header("location: single-post.php?post_id={$_POST['post_id']}");
 




?>