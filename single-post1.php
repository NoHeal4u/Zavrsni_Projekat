<?php include('header.php'); ?>

<?php
                $id = $_GET['Id'];
    // pripremamo upit
                $sql = "SELECT comments.Id as ID_Komentara, comments.Author , comments.Text, comments.Post_Id, posts.Id, posts.Title, posts.Body, posts.Author as Pisac, posts.Created_at FROM posts left join comments on posts.Id = comments.Post_Id where posts.Id = $id;";
                
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
                // var_dump($posts);
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



 

<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">

          <div class="blog-post">
                <h2 class="blog-post-title"> <?php echo $posts[0]['Title'];?></h2>
                <p class="blog-post-meta"><?php echo $posts[0]['Created_at'];?> by <a href="#"><?php echo $posts[0]['Pisac'];?></a></p>

                   
                <p><?php echo $posts[0]['Body'];?></p>
                

                <h4>Komentari:</h4>
                <p id = 'gadjaj'>Dodaj komentar forma:</p>
                 <form onsubmit="return mySubmitFunction()" id = 'cela_forma' class = 'neka' action="create-comment.php?Id=<?php echo($id) ?>" method="POST">
                    Comment Id(ako u sql nije autoincrement):<br>
                    <input class = 'proveri_input' type="text" name="commentsID" value="1,2,3 etc.."><br>
                    Text commenta:<br>
                    <input  class = 'proveri_input' type="text" name="text" value="max 255 char"><br>
                    Ime autora:<br>
                    <input class = 'proveri_input' type="text" name="autor" value="max 32 char"><br><br>
                   <!--  <input type="hidden" name="Id" value="<?php echo($id) ?>"> -->
                    <input id = 'dugme' type="submit" value="Submit">

                </form>   
                <button id= 'mojeDugme' type="button" class="btn btn-default">Hide comments</button>
                <ul id = 'komentari' class = 'Komentari_Klasa'><?php include('comments.php'); ?></ul>
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
<script src="javascript.js"></script>
<script type="text/javascript">

    // function mySubmitFunction(){


        var clasa_proveri = document.getElementsByClassName("proveri_input");
        var element = document.getElementById("gadjaj"); 
        var dugme = document.getElementById("dugme");
        var forma = document.getElementById("cela_forma");
        
    //     dugme.addEventListener("click", function(){

    //     // for (var i = 0; i < clasa_proveri.length; i++) {
    //     //     if (clasa_proveri[i].value =='') {
            
            
    


    //     //         element.innerHTML = "SVA POLJA MORAJU BITI POPUNJENA"; 
    //     //         element.style.color = "red";
    //     //         forma.className += " alert alert-danger";
    //     //         dugme.type = none;
            
    //     //     }


    //     // }
    //     });

    // }

    function mySubmitFunction() {

    var x = document.getElementById('cela_forma');
    // console.log(x);
    // return false;

    for (var i = 0; i < x.length; i++) {
        
    
        if (x[i].value == "") {
            alert("Sva polja moraju biti popunjena");
            forma.className += " alert alert-danger";
            return false;
        }
    }
}



        </script>
        

        
</body>
</html>







