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

                   
                    $i = 3;

                   
                
            
?>

 <!--  -->
   <?php
               foreach ($posts as $post) {
                
           ?>
            <div class="blog-post">

               <h2 class="blog-post-title"><a href="single-post<?php echo $i ?>.php"><?php echo($post['Title']) ?></a></h2>
               <p class="blog-post-meta"><?php echo($post['Created_at']) ?> by <a href="#"><?php echo($post['Author']) ?></a></p>

               <p><?php echo($post['Body']) ?></p>
            </div><!-- /.blog-post -->


           <?php
              $i--; }
           ?>
