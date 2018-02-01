<?php
//
//require 'core/bootstrap.php';
//
//if (Request::method() === 'POST') {
//    App::get('post')->create();
    // ako su mysql username/password i ime baze na vasim racunarima drugaciji
    // obavezno ih ovde zamenite
    $servername = "127.0.0.1:3306";
    $username = "root";
    $password = "vivify";
    $dbname = "blog2";

    try {

        $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }


    // pripremamo upit
                $sql = "SELECT Id, Title, Body, Author, Created_at FROM posts ORDER BY created_at DESC LIMIT 3";
                $statement = $connection->prepare($sql);
                // izvrsavamo upit
                $statement->execute();
                // zelimo da se rezultat vrati kao asocijativni niz.
                // ukoliko izostavimo ovu liniju, vratice nam se obican, numerisan niz
                $statement->setFetchMode(PDO::FETCH_ASSOC);
                // punimo promenjivu sa rezultatom upita
                $posts = $statement->fetchAll();
                // koristite var_dump kada god treba da proverite sadrzaj neke promenjive
                    // echo '<pre>';
                    // var_dump($posts);
                    // echo '</pre>';
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
    <link href="styles/styles.css" rel="stylesheet">
</head>

<body>



 <?php include('header.php'); ?>

<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">

          <div class="blog-post">
                <h2 class="blog-post-title"> <?php echo $posts[1]['Title'];?></h2>
                <p class="blog-post-meta"><?php echo $posts[1]['Created_at'];?> by <a href="#"><?php echo $posts[1]['Author'];?></a></p>

                   
                <p><?php echo $posts[1]['Body'];?></p>
            </div>

            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>

        </div><!-- /.blog-main -->

        <?php include('sidebar.php'); ?>

       
    </div><!-- /.row -->

</main><!-- /.container -->



<?php include('footer.php'); ?>
</body>
</html>




