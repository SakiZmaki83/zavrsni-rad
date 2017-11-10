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
   <link rel="stylesheet" type="text/css" href="styles/new.css">
</head>


<body>

<?php

include("header.php");

?>


<main role="main" class="container">

   <div class="row">

       <div class="col-sm-8 blog-main">

           <div class="blog-post">
              
<form action="create-post.php" method="POST">
<!-- <label for="name">your name</label>
<input type="text" id="name" placeholder="John Doe"/><br>
<label for="email">your email</label>
<input type="email" id="email" placeholder="john@doe"/><br> -->

<label >Autor</label><br>
<input type="text" name="author"><br>
<label>Add posts</label><br>
<input type="text" name="post_id" /><br><br>
<button type="Submit">Submit</button>

   </form>


           </div><!-- /.blog-post -->

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

</body>
</html>
