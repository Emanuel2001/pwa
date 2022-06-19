<?php
if(isset($_POST['submit'])){
    $dbs = mysqli_connect("localhost","root","","baza");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    $datum=date('d.m.Y.');
    $naslov=$_POST['title'];
    $kratki_sadrzaj=$_POST['about'];
    $sadrzaj=$_POST['content'];
    $kategorija=$_POST['category'];


    $img= $_FILES['photo']['name'];
    $img_loc=$_FILES['photo']['tmp_name'];
    $img_folder="../images/";
  
    move_uploaded_file($img_loc,$img_folder.$img);
    if(isset($_POST['archive'])){
        $archive=True;
    }else{
        $archive=False;
    }
    if ($kategorija=="svijet") {
        $query = "INSERT INTO svijet (datum, naslov, kratki_sadrzaj, sadrzaj , slika, kategorija, arhiva ) VALUES ('$datum', '$naslov', '$kratki_sadrzaj', '$sadrzaj', '$img', '$kategorija', '$archive')";
        $result = mysqli_query($dbs, $query) or die('Error querying databese.');
        mysqli_close($dbs);
    }
    if ($kategorija=="europa") {
        $query = "INSERT INTO europa (datum, naslov, kratki_sadrzaj, sadrzaj , slika, kategorija, arhiva ) VALUES ('$datum', '$naslov', '$kratki_sadrzaj', '$sadrzaj', '$img', '$kategorija', '$archive')";
        $result = mysqli_query($dbs, $query) or die('Error querying databese.');
        mysqli_close($dbs);
    }
} 
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> </title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="../bootstrap-4.5.3-dist/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="style.css" /> 
    </head>

    
    <body>

      <div class="container-fluid">

        <header>  
          <div class="container-fluid" id="europa">
            <div class="row pl-5 ml-5 align-items-end" >
              <div class="col-5 mb-3">
                <?php 
                    if (isset($_POST['category']))
                    {
                        echo 
                        "
                        <h2 class=\"text-align-left bullet1\">
                            <a href=\"indeks.php\" class=\"font-weight-bold\">HOME</a>
                        </h2>
                        ";
                    } 
                ?>
                
                
              </div>
            </div>
          </div>   
        </header> 
     
        <section>
            <div class="container" id="clanak">
                <div class="row">
                    <div class="col">
                        <h1 class="text-center"><?php echo "$naslov";?></h1>
                    </div>
                </div>
               
                <div class="row justify-content-center mb-4">
                    <div class="col-8">
                        <p class="text-center"><?php echo "$kratki_sadrzaj";?></p>
                    </div>
                    
                </div>
                    
                <div class="row justify-content-center pb-3">
                    <div class="col-10">
                        <?php echo "<img src=\"../images/$img\" width=\"100%\">";?> 
                    </div>   
                </div>
            </div>
        </section>


        <section>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-9">
                        <p class="font-weight-bold">19/06/2022</p>
                    </div>
                </div>
  
                <div class="row justify-content-center">
                    <div class="col-9">
                        <p><?php echo "$sadrzaj";?></p>
                    </div>
                </div>
            </div>
        </section>


    
 
        <footer>
          <div class="container-fluid" id="footer2">
            <div class="row pl-5 ml-5 align-items-end">
              <div class="col-12 mb-3">
                <p>© Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis obcaecati officiis molestiae similique dolore ipsam sed dolorum veritatis aperiam amet.</p>
                
              </div>
            </div>
          </div>

        </footer>

      </div>

    </body>
</html>

