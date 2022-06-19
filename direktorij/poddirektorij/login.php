<?php  
    $dbs = mysqli_connect("localhost","root","","baza");
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }

    if (isset($_POST['prijava'])) {
        $korisnicko_ime =$_POST['korisnik'];
        $lozinka =$_POST['sifra'];
        $qry = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = ?";
        $stmt = mysqli_stmt_init($dbs);
        if (mysqli_stmt_prepare($stmt, $qry)) {
            echo "bravo";
            $stmt->bind_param('s', $korisnicko_ime);
            $stmt->execute();
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt) == 1){

                $sql = "SELECT korisnicko_ime, lozinka, razina FROM korisnik WHERE korisnicko_ime = ?";
                $stmt2 = mysqli_stmt_init($dbs);
                if (mysqli_stmt_prepare($stmt, $sql)) {
                    mysqli_stmt_bind_param($stmt, 's', $korisnicko_ime);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                }
                mysqli_stmt_bind_result($stmt, $imeKorisnika, $lozinkaKorisnika, $levelKorisnika);
                mysqli_stmt_fetch($stmt);

                if (password_verify($lozinka, $lozinkaKorisnika) && mysqli_stmt_num_rows($stmt) > 0) 
                {
                    $qry3= "SELECT * FROM korisnik WHERE korisnicko_ime = '$korisnicko_ime'";
                    $rsl = mysqli_query($dbs, $qry3);
                    $row = mysqli_fetch_assoc($rsl);
                        if ($row['razina']==1) {
                            echo "bravo";
                            header("Location: administracija.php");
                        }else {
                            header("Location: user.html");    
                        }  
                
                     
            
            } 
            }else {
                echo "Kriva sifra!";    
            }
        }else {
            echo "Korisnicko ime ne postoji!";
        } 
    }
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

        <div class="container" id="forma">
            <div class="row">
                <div class="col-lg-12 col-12 d-flex justify-content-center">
                    <div class="login_wrap">
                        <form method="post">


                            
                            <label for="korisnik">Unesi korisničko ime</label>
                            <br/>
                            <input type="text" name="korisnik" id="korisnik"/>
                            <br/>
                            <label for="sifra">Unesi lozinku</label>
                            <br/>
                            <input type="password" name="sifra" id="sifra"/>
                            <br/>
                            <button type="submit" name='prijava'>Prijavi se</button>
                        </form>
        
                            <button class="registracija" onclick="location.href='registracija.php'">Registriraj se</button>
                    </div>
                </div>
            </div>
        </div> 
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <script src="#"></script>

    </body>
</html>