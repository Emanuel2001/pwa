<?php
    $dbs = mysqli_connect("localhost","root","","baza");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    $tip=$_GET['name'];
    substr($tip,8,11);
    substr($tip,1,2);
    if (substr($tip,1,2)=='eu') {
        $qry = 'SELECT * FROM europa WHERE europa.id = '.substr($tip,8,11).' ';   
    }elseif (substr($tip,1,2)=='sv') {
        $qry = 'SELECT * FROM svijet WHERE svijet.id = '.substr($tip,8,11).' ';   
    }
    $rsl = mysqli_query($dbs, $qry);
    $row = mysqli_fetch_assoc($rsl);

    $naslov=$row['naslov'];
    $kratki_sadrzaj=$row['kratki_sadrzaj'];
    $sadrzaj=$row['sadrzaj'];
    $kategorija=$row['kategorija'];

    $img_folder="../images/".$row['slika'];
    mysqli_close($dbs);




        

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
                    echo 
                    "
                    <h2 class=\"text-align-left bullet1\">
                        <a href=\"indeks.php\" class=\"font-weight-bold\">HOME</a>
                    </h2>
                    ";    
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
                        <?php echo "<img src=".$img_folder." width=\"100%\">";?> 
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