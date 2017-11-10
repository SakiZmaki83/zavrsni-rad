
<?php
   try {

       $conn = new PDO('mysql:host=127.0.0.1;dbname=blog', 'root', 'vivify');

       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       

   }

   catch(PDOException $e)

   {

       echo $e->getMessage();

   }




   $statement = $conn->prepare('SELECT * FROM posts');

   $statement->execute();

   $statement->setFetchMode(PDO::FETCH_ASSOC);

   $posts = $statement->fetch();




?>








<!doctype html>
<html lang="en">
<head>


   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">
   <link rel="icon" href="../../../../favicon.ico">

   <title>Vivify Blog</title>

   <!-- Bootstrap core CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

   <!-- Custom styles for this template -->
   <link href="styles/blog.css" rel="stylesheet">

   <link rel="stylesheet" type="text/css" href="styles/new.css">
</head>


<body>

<?php




include("header.php");

?>





<main role="main" class="container">

 

   <div class="row">

       <div class="col-sm-8 blog-main">

       <?php
               if (isset($_GET['post_id'])) {
                   $sql = "SELECT * FROM posts  WHERE id = {$_GET['post_id']}";
                   $statement = $conn->prepare($sql);
                   $statement->execute();
                   $statement->setFetchMode(PDO::FETCH_ASSOC);
                   $post = $statement->fetch();
                 }
           ?>

       
           <div class="blog-post">
           
           <a href="#" <h2 class="blog-post-title"><?php echo $post['title'] ?></h2> </a>
               <p class="blog-post-meta"><p> <?php echo $post['created_at'] ?></p> <a href="#"> <?php echo $post['author'] ?></a></p>


               <p></p>

           </div><!-- /.blog-post -->

           <form action="create-comments.php" method="POST">
<!-- <label for="name">your name</label>
<input type="text" id="name" placeholder="John Doe"/><br>
<label for="email">your email</label>
<input type="email" id="email" placeholder="john@doe"/><br> -->

<label >Autor</label>
<input type="text" name="author"><br>
<label>comment</label>
<input type="text" name="comments"><br>
<label>Add comments</label><br>
<input type="hidden" name="post_id" value="<?php echo $_GET['post_id'] ?>" ><br><br>
<button type="Submit">Submit</button>

   </form>

           <!--ovde sam pocela nove promene -->
            <?php
               if (isset($_GET['post_id'])) {
                   $sql = "SELECT * FROM comments  WHERE post_id = {$_GET['post_id']}";
                   $statement = $conn->prepare($sql);
                   $statement->execute();
                   $statement->setFetchMode(PDO::FETCH_ASSOC);
                   $comments = $statement->fetchAll();
               }
           ?><br>

  <div class="container">
   <button id="button" type=button class="btn btn=default" onclick=toogleButton()>Hide comments</button>
   </div>
   <ul id="comments"
           <?php
           foreach ($comments as $comment)
                                              {          
   ?>
               <li><p><?php
               echo $comment["author"]
               ?>
               </p><?php echo $comment["text"]?></li>
               


            <?php
}
?>



  </ul>
           

          
           <nav class="blog-pagination">
               <a class="btn btn-outline-primary" href="#">Older</a>
               <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
           </nav>

       </div><!-- /.blog-main -->

 <?php
       include("sidebar.php");
   ?>
   </div><!-- /.row -->

  


</main><!-- /.container -->







<?php

include("footer.php");

?>


<script>
 function toogleButton() {
     var button = document.getElementById("button");
     var comments = document.getElementById("comments");
     if (comments.classList.contains("hidden"))
      {
         comments.classList.remove("hidden");
         button.innerHTML="Hide comments";
     }else{
         comments.classList.add("hidden");
         button.innerHTML="Show comments";
     }
   
 }
</script>




</body>


</html>