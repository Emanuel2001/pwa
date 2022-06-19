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
                <li><a href="administracija.php" class="font-weight-bold p-2 m-2">ADMINISTRACIJA</a></li>
              </div>
            </div>
          </div>
           
        </header> 

        

        <?php 
        $dbs = mysqli_connect("localhost","root","","baza");
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        $query1 = "SELECT * FROM europa";
        $result1 = mysqli_query($dbs, $query1);
        echo '<div class="container" id="forma">
        <div class="row">
            <div class="col-lg-12 col-12 d-flex justify-content-center">
                <h6>Trenutne vijesti baze u tablici kategorije europa:</h6>
            </div>
        </div>
        
        ';
        while($row = mysqli_fetch_array($result1)) {
            echo 
            '
            <div class="row">
            <div class="col-lg col-12 d-flex justify-content-center">
            <form enctype="multipart/form-data" action="" method="POST">
                <div class="form-item">
                    <label for="title">Naslov vjesti:</label>
                    <div class="form-field">
                        <input type="text" name="title" class="form-field-textual" value="'.$row['naslov'].'">
                    </div>
                </div>

                <div class="form-item">
                    <label for="about">Kratki sadržaj vijesti (do 50 znakova):</label>
                    <div class="form-field">
                        <textarea name="about" id="" cols="30" rows="10" class="formfield-textual">'.$row['kratki_sadrzaj'].'</textarea>
                    </div>
                </div> 

                <div class="form-item">
                    <label for="content">Sadržaj vijesti:</label>
                    <div class="form-field">
                        <textarea name="content" id="" cols="30" rows="10" class="formfield-textual">'.$row['sadrzaj'].'</textarea>
                    </div>
                </div>

                <div class="form-item">
                    <label for="pphoto">Slika:</label>
                    <div class="form-field">
                        <input type="file" class="input-text" id="pphoto" value="'.$row['slika'].'" name="pphoto"/> <br><img src=\"../images/'.$row['slika'].'\" width=\"100%\">
                    </div>
                </div>

                <div class="form-item">
                    <label for="category">Kategorija vijesti:</label>
                    <div class="form-field">
                        <select name="category" id="" class="form-field-textual" value="'.$row['kategorija'].'">
                            <option value="sport">Sport</option>
                            <option value="kultura">Kultura</option>
                        </select>
                    </div>
                </div>

                <div class="form-item">
                    <label>Spremiti u arhivu: 
                    <div class="form-field">';
                        if($row['arhiva'] == 0) {
                            echo '<input type="checkbox" name="archive" id="archive"/> Arhiviraj?';
                        } else {
                            echo '<input type="checkbox" name="archive" id="archive" checked/> Arhiviraj?';
                        }
                    echo '</div>
                    </label>
                </div>
                <div class="form-item">
                    <input type="hidden" name="id" class="form-field-textual" value="'.$row['id'].'">
                    <button type="reset" value="Poništi">Poništi</button>
                    <button type="submit" name="update" value="Prihvati">Izmjeni</button>
                    <button type="submit" name="delete" value="Izbriši">Izbriši</button>
                </div>   
            </form>
            </div>
            </div>
            
        
            ';
            }
            $query2 = "SELECT * FROM svijet";
            $result2 = mysqli_query($dbs, $query2);
            echo '
            <div class="row">
                <div class="col-lg-12 col-12 d-flex justify-content-center">
                    <h6>Trenutne vijesti baze u tablici kategorije svijet:</h6>
                </div>
            </div>';
            
            while($row = mysqli_fetch_array($result2)) {
            echo 
            '
            <div class="row">
                <div class="col-lg-12 col-12 d-flex justify-content-center">
            <form enctype="multipart/form-data" action="" method="POST">
                <div class="form-item">
                    <label for="title">Naslov vjesti:</label>
                    <div class="form-field">
                        <input type="text" name="title" class="form-field-textual" value="'.$row['naslov'].'">
                    </div>
                </div>

                <div class="form-item">
                    <label for="about">Kratki sadržaj vijesti (do 50 znakova):</label>
                    <div class="form-field">
                        <textarea name="about" id="" cols="30" rows="10" class="formfield-textual">'.$row['kratki_sadrzaj'].'</textarea>
                    </div>
                </div> 

                <div class="form-item">
                    <label for="content">Sadržaj vijesti:</label>
                    <div class="form-field">
                        <textarea name="content" id="" cols="30" rows="10" class="formfield-textual">'.$row['sadrzaj'].'</textarea>
                    </div>
                </div>

                <div class="form-item">
                    <label for="pphoto">Slika:</label>
                    <div class="form-field">
                        <input type="file" class="input-text" id="pphoto" value="'.$row['slika'].'" name="pphoto"/> <br><img src=\"../images/'.$row['slika'].'\" width=\"100%\">
                    </div>
                </div>

                <div class="form-item">
                    <label for="category">Kategorija vijesti:</label>
                    <div class="form-field">
                        <select name="category" id="" class="form-field-textual" value="'.$row['kategorija'].'">
                            <option value="sport">Sport</option>
                            <option value="kultura">Kultura</option>
                        </select>
                    </div>
                </div>

                <div class="form-item">
                    <label>Spremiti u arhivu: 
                    <div class="form-field">';
                        if($row['arhiva'] == 0) {
                            echo '<input type="checkbox" name="archive" id="archive"/> Arhiviraj?';
                        } else {
                            echo '<input type="checkbox" name="archive" id="archive" checked/> Arhiviraj?';
                        }
                    echo '</div>
                    </label>
                </div>
            <div class="form-item">
                <input type="hidden" name="id" class="form-field-textual" value="'.$row['id'].'">
                <button type="reset" value="Poništi">Poništi</button>
                <button type="submit" name="update" value="Prihvati">Izmjeni</button>
                <button type="submit" name="delete" value="Izbriši">Izbriši</button>
            </div>
            </form>
            </div>






            </div>
    
            
       
        
            ';
            }

            if(isset($_POST['delete'])){
                $id=$_POST['id'];
                $query = "DELETE FROM vijesti WHERE id=$id ";
                $result = mysqli_query($dbc, $query);
            }

            if(isset($_POST['update'])){
                $picture = $_FILES['pphoto']['name'];
                $title=$_POST['title'];
                $about=$_POST['about'];
                $content=$_POST['content'];
                $category=$_POST['category'];
                if(isset($_POST['archive'])){
                 $archive=1;
                }else{
                 $archive=0;
                }
                $target_dir = 'img/'.$picture;
                move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);
                $id=$_POST['id'];
                $query = "UPDATE vijesti SET naslov='$title', sazetak='$about', tekst='$content', 
                slika='$picture', kategorija='$category', arhiva='$archive' WHERE id=$id ";
                $result = mysqli_query($dbc, $query);
                }
        ?>
     
     
 
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