<?php  
    $dbs = mysqli_connect("localhost","root","","baza");
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }

    $qry1 = "SELECT europa.* FROM europa WHERE europa.arhiva = 0;";
    $rsl1 = mysqli_query($dbs, $qry1);
    $broj_vijesti_europa=mysqli_num_rows( $rsl1 );

    $qry2 = "SELECT svijet.* FROM svijet WHERE svijet.arhiva = 0;";
    $rsl2 = mysqli_query($dbs, $qry2);
    $broj_vijesti_svijet=mysqli_num_rows( $rsl2 );
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
          <div class="container mt-4" id="naslov">
            <div class="row">
              <div class="col text-align-center">
                <h1 class="text-center">El Confidencial</h1>
                <p class="text-center">EL DIARIO DE LOS LECTORES INFLUYENTES</p>
              </div>
            </div>
          </div>

          <div class="container mt-5" id="navigacija">
            <div class="row">
              <div class="col d-flex justify-content-center">
                <li><a href="indeks.php" class="font-weight-bold p-2 m-2">HOME</a></li>
                <li><a href="europa.php" class="font-weight-bold p-2 m-2">EUROPA</a></li>
                <li><a href="svijet.php" class="font-weight-bold p-2 m-2">SVIJET</a></li>
                <li><a href="unos.html" class="font-weight-bold p-2 m-2">UNOS</a></li>
                <li><a href="registracija.php" class="font-weight-bold p-2 m-2">ADMINISTRACIJA</a></li>
              </div>
            </div>
          </div>
           
        </header> 
     
        <section class="break">
          <div class="container">
            <div class="row">
              <div class="col">
                <h2 class="bullet1">EUROPA</h2>
              </div>
            </div> 

            <?php 
            if($broj_vijesti_europa % 3 == 0){
                $qry3 = "SELECT * FROM europa WHERE europa.arhiva = 0;";
                $rsl3 = mysqli_query($dbs, $qry3);
                $irow=$broj_vijesti_europa / 3;
                for ($x = 0; $x < $irow; $x++) {
                    echo "<div class=\"row\">";
                    for ($i=0; $i < 3; $i++) { 
                        $row = mysqli_fetch_assoc($rsl3);
                        echo
                            "<div class=\"col-lg col-12\">
                                <a href=\"clanak.php?name='eu'?id=".$row['id']."\">
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
                $qry3 = "SELECT * FROM europa WHERE europa.arhiva = 0;";
                $rsl3 = mysqli_query($dbs, $qry3);
                $irow=($broj_vijesti_europa / 3)+1;
                $brojac=0;
                for ($x = 0; $x < $irow; $x++) {
                    echo "<div class=\"row\">";
                    for ($i=0; $i < 3; $i++) { 
                        $row = mysqli_fetch_assoc($rsl3);
                        echo
                            "<div class=\"col-lg col-12\">
                                <a href=\"clanak.php?name='eu'?id=".$row['id']."\">
                                    <article>
                                        <img src=\"../images/".$row['slika']."\" width=\"100%\"/>
                                        <p>".$row['kratki_sadrzaj']."</p>
                                    </article> 
                                </a>
                            </div> ";    
                        $brojac++;
                        echo "$brojac";
                        if ($brojac==$broj_vijesti_europa) {
                            $i=4;
                            $irow=0;
                            break;  
                        }
                    }
                    echo "</div>";
                    mysqli_data_seek($rsl3, 0);
                }
            }?>

            
          </div>
         
        </section>


        <section>
          <div class="container" id="break">
            <div class="row">
              <div class="col">
                <h2 class="bullet2">SVIJET</h2>
              </div>
            </div> 

            <?php 
            if($broj_vijesti_svijet % 3 == 0){
                $qry4 = "SELECT * FROM svijet WHERE svijet.arhiva = 0;";
                $rsl4 = mysqli_query($dbs, $qry4);
                $irow=$broj_vijesti_svijet / 3;
                for ($x = 0; $x < $irow; $x++) {
                    echo "<div class=\"row\">";
                    for ($i=0; $i < 3; $i++) { 
                        $row = mysqli_fetch_assoc($rsl4);
                        echo
                            "<div class=\"col-lg col-12\">
                                <a href=\"clanak.php?name='sv'?id=".$row['id']."\">
                                    <article>
                                        <img src=\"../images/".$row['slika']."\" width=\"100%\"/>
                                        <p>".$row['kratki_sadrzaj']."</p>
                                    </article> 
                                </a>
                            </div> ";  
                        }
                    echo "</div>";    
                }
                mysqli_data_seek($rsl4, 0);
            }

            elseif ($broj_vijesti_svijet % 3 != 0){
                $qry4 = "SELECT * FROM svijet WHERE svijet.arhiva = 0;";
                $rsl4 = mysqli_query($dbs, $qry4);
                $irow=($broj_vijesti_svijet / 3)+1;
                $brojac=0;
                for ($x = 0; $x < $irow; $x++) {
                    echo "<div class=\"row\">";
                    for ($i=0; $i < 3; $i++) { 
                        $row = mysqli_fetch_assoc($rsl4);
                        echo
                            "<div class=\"col-lg col-12\">
                                <a href=\"clanak.php?name='sv'?id=".$row['id']."\">
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
                    mysqli_data_seek($rsl4, 0);
                }
            }?>
    
              
        </section>
 
        <footer>
          <div class="container-fluid" id="footer">
            <div class="row">
              <div class="col-12  ">
                <p>© Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis obcaecati officiis molestiae similique dolore ipsam sed dolorum veritatis aperiam amet.</p>
                
              </div>
            </div>
          </div>

        </footer>

      </div>

         





    </body>
</html>