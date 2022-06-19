<?php  
    $dbs = mysqli_connect("localhost","root","","baza");
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }
    if (isset($_POST['reg'])) {
        
        $ime =$_POST['firstname'];

        $prezime =$_POST['lastname'];
        $korisnicko_ime =$_POST['korisnik'];
        $lozinka =$_POST['sifra'];
        $hashed_lozinka = password_hash($lozinka, CRYPT_BLOWFISH);
        $razina=$_POST['level'];

        $qry = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = ?";
        $stmt = mysqli_stmt_init($dbs);
        if (mysqli_stmt_prepare($stmt, $qry)) {
            mysqli_stmt_bind_param($stmt, 's', $korisnicko_ime);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
        }
        if(mysqli_stmt_num_rows($stmt) > 0){
            $msg='Korisničko ime već postoji!';
        }else{
            $sql = "INSERT INTO korisnik (ime, prezime,korisnicko_ime, lozinka, razina)VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($dbs);
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $korisnicko_ime, $hashed_lozinka, $razina);
                mysqli_stmt_execute($stmt);
                echo "Registracija uspjesna!";
            }
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
                        <form action="registracija.php" method="post">


                            <label for="firstname">Unesi ime</label>
                            <br/>
                            <input type="text" name="firstname" id="firstname"/>
                            <br/>
                            <label for="lastname">Unesi prezime</label>
                            <br/>
                            <input type="text" name="lastname" id="lastname"/>
                            <br/>
                            <label for="korisnik">Unesi korisničko ime</label>
                            <br/>
                            <input type="text" name="korisnik" id="korisnik"/>
                            <br/>
                            <label for="sifra">Unesi lozinku</label>
                            <br/>
                            <input type="password" name="sifra" id="sifra"/>
                            <br/>
                            <label for="level">Unesi razinu</label>
                            <br/>
                            <input type="number" name="level" id="level"/>
                            <br/>
                            <button type="submit" name='reg'>Registriraj se</button>
                        </form>
        
                            <button class="prijava" onclick="location.href='login.php'">Prijava</button>
                    </div>
                </div>
            </div>
        </div> 
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <script src="#></script>

    </body>
</html>