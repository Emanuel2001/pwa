<?php  
    $dbs = mysqli_connect("localhost","root","","baza");
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }

    $qry1 = "SELECT europa.* FROM europa WHERE europa.arhiva = False;";
    $rsl1 = mysqli_query($dbs, $qry1);
    $broj_vijesti_europa=mysqli_num_rows( $rsl1 );


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
                <h2 class="text-align-left bullet1">
                    <a href="indeks.php" class="font-weight-bold">EUROPA</a>
                </h2>
                
              </div>
            </div>
          </div>   
        </header> 

        <section>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h2 class="bullet1">EUROPA</h2>
                    </div>
                </div> 
                <?php 
                if($broj_vijesti_europa % 3 == 0){
                    $qry3 = "SELECT * FROM europa WHERE europa.arhiva = False;";
                    $rsl3 = mysqli_query($dbs, $qry3);
                    $irow=$broj_vijesti_europa / 3;
                    for ($x = 0; $x < $irow; $x++) {
                        echo "<div class=\"row\">";
                        for ($i=0; $i < 3; $i++) { 
                            $row = mysqli_fetch_assoc($rsl3);
                            echo
                                "<div class=\"col-lg col-12\">
                                    <a href=\"clanak.php\">
                                        <article>
                                            <img src=\"../images/".$row['slika']."\" width=\"100%\"/>
                                            <p>".$row['kratki_sadrzaj']."</p>
                                        </article> 
                                    </a>
                                </div> ";   
                            }
                        echo "</div>";    
                    }
                    mysqli_data_seek($rsl3, 0);
                }

                elseif ($broj_vijesti_europa % 3 != 0){
                    $qry3 = "SELECT * FROM europa WHERE europa.arhiva = False;";
                    $rsl3 = mysqli_query($dbs, $qry3);
                    $irow=($broj_vijesti_europa / 3)+1;
                    $brojac=0;
                    for ($x = 0; $x < $irow; $x++) {
                        echo "<div class=\"row\">";
                        for ($i=0; $i < 3; $i++) { 
                            $row = mysqli_fetch_assoc($rsl3);
                            echo
                                "<div class=\"col-lg col-12\">
                                    <a href=\"clanak.php\">
                                        <article>
                                            <img src=\"../images/".$row['slika']."\" width=\"100%\"/>
                                            <p>".$row['kratki_sadrzaj']."</p>
                                        </article> 
                                    </a>
                                </div> ";    
                            $brojac++;
                            if ($brojac==$broj_vijesti_europa) {
                                $i=4;
                                $irow=0;
                                break;  
                            }
                        }
                        echo "</div>";
                        mysqli_data_seek($rsl3, 0);
                    }
                }
                ?>
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