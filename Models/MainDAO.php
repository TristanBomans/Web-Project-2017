<?php
//GLOBAL REQUIREMENTS
 include $_SERVER['DOCUMENT_ROOT']."/namespaces.php";



class MainDAO {
    // PRODUCT
    static function getProduct($id) 
    {
        require $_SERVER['DOCUMENT_ROOT']."/credentials.php";
        $mysqli = new mysqli($host, $user, $passwd, $database);
        $result = $mysqli->query("SELECT * FROM producten where id='$id'");
        $product = null;

        if ($row = mysqli_fetch_array($result)) {
            $id = $row[0];
            $cat_id = $row[1];
            $naam = $row[2];
            $prijs = $row[3];
            $beschrijving = $row[4];
            $datum_toegevoegd = $row[5];
            $img_path = $row[6];
            $uitgelicht = $row[7];
            $avg_rating = $row[8];
            $numb_ratings = $row[9];

           
            $product = new ProductEntity($id, $cat_id, $naam, $prijs, $beschrijving, $datum_toegevoegd, $img_path, $uitgelicht, $avg_rating, $numb_ratings);
        }

        mysqli_close($mysqli);
        return $product;
    }

    static function getAllProducts() 
    {
        require $_SERVER['DOCUMENT_ROOT']."/credentials.php";
        $mysqli = new mysqli($host, $user, $passwd, $database);
        $result = $mysqli->query("SELECT * FROM producten");
        $product = null;
        $productenArray =  [];

        while ($row = mysqli_fetch_array($result)) {
            $id = $row[0];
            $cat_id = $row[1];
            $naam = $row[2];
            $prijs = $row[3];
            $beschrijving = $row[4];
            $datum_toegevoegd = $row[5];
            $img_path = $row[6];
            $uitgelicht = $row[7];
            $avg_rating = $row[8];
            $numb_ratings = $row[9];

            $product = new ProductEntity($id, $cat_id, $naam, $prijs, $beschrijving, $datum_toegevoegd, $img_path, $uitgelicht, $avg_rating, $numb_ratings);
            array_push($productenArray, $product);
        }

        mysqli_close($mysqli);
        return $productenArray;
    }

    static function getAllUitgelichte() 
    {
        require $_SERVER['DOCUMENT_ROOT']."/credentials.php";
        $mysqli = new mysqli($host, $user, $passwd, $database);
        $result = $mysqli->query("SELECT * FROM producten where uitgelicht = 1");
        $product = null;
        $productenArray =  [];

        while ($row = mysqli_fetch_array($result)) {
            $id = $row[0];
            $cat_id = $row[1];
            $naam = $row[2];
            $prijs = $row[3];
            $beschrijving = $row[4];
            $datum_toegevoegd = $row[5];
            $img_path = $row[6];
            $uitgelicht = $row[7];
            $avg_rating = $row[8];
            $numb_ratings = $row[9];

            $product = new ProductEntity($id, $cat_id, $naam, $prijs, $beschrijving, $datum_toegevoegd, $img_path, $uitgelicht, $avg_rating, $numb_ratings);
            array_push($productenArray, $product);
        }

        mysqli_close($mysqli);
        return $productenArray;
    }

     static function getAllByCat($cat) 
    {
        require "../credentials.php";
        $mysqli = new mysqli($host, $user, $passwd, $database);
        $result = $mysqli->query("SELECT * FROM producten where cat_naam = '$cat'");
        $product = null;
        $productenArray =  [];

        while ($row = mysqli_fetch_array($result)) {
            $id = $row[0];
            $cat_id = $row[1];
            $naam = $row[2];
            $prijs = $row[3];
            $beschrijving = $row[4];
            $datum_toegevoegd = $row[5];
            $img_path = $row[6];
            $uitgelicht = $row[7];
            $avg_rating = $row[8];
            $numb_ratings = $row[9];

            $product = new ProductEntity($id, $cat_id, $naam, $prijs, $beschrijving, $datum_toegevoegd, $img_path, $uitgelicht, $avg_rating, $numb_ratings);
            array_push($productenArray, $product);
        }

        mysqli_close($mysqli);
        return $productenArray;
    }

    static function addProduct($toAddProduct)
    {
        require "../credentials.php";
        $mysqli = new mysqli($host, $user, $passwd, $database);
        $result = $mysqli->query("INSERT INTO producten (cat_naam, naam, prijs, beschrijving, datum_toegevoegd, img_path) VALUES ('$toAddProduct->cat_naam', '$toAddProduct->naam', '$toAddProduct->prijs', '$toAddProduct->beschrijving', '$toAddProduct->datum_toegevoegd', '$toAddProduct->img_path')");
        if(!($result)) die(mysqli_error($mysqli));
        mysqli_close($mysqli);
    }

    static function updateProduct($toUpdateProduct)
    {
        require "../credentials.php";
        $mysqli = new mysqli($host, $user, $passwd, $database);
        $result = $mysqli->query("UPDATE producten SET cat_naam = '$toUpdateProduct->cat_naam' , naam = '$toUpdateProduct->naam', prijs = '$toUpdateProduct->prijs', beschrijving = '$toUpdateProduct->beschrijving', datum_toegevoegd = '$toUpdateProduct->datum_toegevoegd', img_path = '$toUpdateProduct->img_path', avg_rating = '$toUpdateProduct->avg_rating', numb_ratings = '$toUpdateProduct->numb_ratings'  where id = '$toUpdateProduct->id';");
        if(!($result)) die(mysqli_error($mysqli));
        mysqli_close($mysqli);
    }


    // USERS

    static function updateUser($toUpdateUser)
    {
        require "../credentials.php";
        $mysqli = new mysqli($host, $user, $passwd, $database);
        $result = $mysqli->query("UPDATE users SET username = '$toUpdateUser->username', password = '$toUpdateUser->password', naam = '$toUpdateUser->naam', voornaam = '$toUpdateUser->voornaam', authority = '$toUpdateUser->authority', emailadres = '$toUpdateUser->emailadres' where username = '$toUpdateUser->username';");
        if(!($result)) die(mysqli_error($mysqli));
        mysqli_close($mysqli);
    }
    
    static function addUser($toAddUser)
    {
        require "../credentials.php";
        $mysqli = new mysqli($host, $user, $passwd, $database);
        $result = $mysqli->query("INSERT INTO users (username, password, naam, voornaam, authority, emailadres) VALUES ('$toAddUser->username', '$toAddUser->password', '$toAddUser->naam', '$toAddUser->voornaam', '$toAddUser->authority', '$toAddUser->emailadres')");
        if(!($result)) die(mysqli_error($mysqli));
        mysqli_close($mysqli);
    }

    static function getUser($username) 
    {
        require "../credentials.php";
        $mysqli = new mysqli($host, $user, $passwd, $database);
        $result = $mysqli->query("SELECT * FROM users where username='$username'");
        $user = null;

        if ($row = mysqli_fetch_array($result)) {
            $username = $row[0];
            $password = $row[1];
            $naam = $row[2];
            $voornaam = $row[3];
            $authority = $row[4];
            $emailadres = $row[5];

            $user = new UserEntity($username, $password, $naam, $voornaam, $authority, $emailadres);
        }

        mysqli_close($mysqli);
        return $user;
    }

       static function getAllUsers() 
    {
          require $_SERVER['DOCUMENT_ROOT']."/credentials.php";
        $mysqli = new mysqli($host, $user, $passwd, $database);
        $result = $mysqli->query("SELECT * FROM users");
        $user = null;
        $userArray =  [];

        while ($row = mysqli_fetch_array($result)) {
            $username = $row[0];
            $password = $row[1];
            $naam = $row[2];
            $voornaam = $row[3];
            $authority = $row[4];
            $emailadres = $row[5];

            $user = new UserEntity($username, $password, $naam, $voornaam, $authority, $emailadres);
            array_push($userArray, $user);
        }

        mysqli_close($mysqli);
        return $userArray;
    }

    // REVIEWS

    static function addReview($toAddReview)
    {
        require "../credentials.php";
        $mysqli = new mysqli($host, $user, $passwd, $database);
        $product = MainDAO::getProduct($toAddReview->product_id);
        
        //UPDATEN GEGEVENS PRODUCT
        $ingevoerdGemiddelde = $toAddReview->rating;
        $nieuwGemiddelde = $product->avg_rating + (($ingevoerdGemiddelde - $product->avg_rating)/($product->numb_ratings + 1));
        $product->avg_rating = $nieuwGemiddelde;
        $product->numb_ratings = $product->numb_ratings + 1;
        MainDAO::updateProduct($product);
       

        $result = $mysqli->query("INSERT INTO reviews (username, product_id, comment, rating) VALUES ('$toAddReview->username', '$toAddReview->product_id', '$toAddReview->comment', '$toAddReview->rating')");
        if(!($result)) die(mysqli_error($mysqli));
        mysqli_close($mysqli);
    }

     static function getAllReviewForProduct($id) 
    {
     require "../credentials.php";
        $mysqli = new mysqli($host, $user, $passwd, $database);
        $result = $mysqli->query("SELECT * FROM reviews where product_id = '$id'");
        $review = null;
        $reviewArray =  [];

        while ($row = mysqli_fetch_array($result)) {
            $id = $row[0];
            $username = $row[1];
            $product_id = $row[2];
            $comment = $row[3];
            $rating = $row[4];
            
            $review = new ReviewEntity($id, $username, $product_id, $comment, $rating);
            array_push($reviewArray, $review);
        }

        mysqli_close($mysqli);
        return $reviewArray;
    }


    //CATEGORIEËN

  static function getAllCategorien() 
    {
        require "../credentials.php";
        $mysqli = new mysqli($host, $user, $passwd, $database);
        $result = $mysqli->query("SELECT * FROM categorie");
        $categorie = null;
        $categorieArray =  [];

        while ($row = mysqli_fetch_array($result)) {
           $naam = $row[0];

            $categorie = new CategorieEntity($naam);
            array_push($categorieArray, $categorie);
        }

        mysqli_close($mysqli);
        return $categorieArray;
    }

    static function addCategory($toCategory)
    {
        require "../credentials.php";
        $mysqli = new mysqli($host, $user, $passwd, $database);
        $result = $mysqli->query("INSERT INTO categorie (naam) VALUES ('$toCategory->naam')");
        if(!($result)) die(mysqli_error($mysqli));
        mysqli_close($mysqli);
    }

    static function updateCategorie($toUpdateCategorie, $oldName)
    {
        require "../credentials.php";
        $mysqli = new mysqli($host, $user, $passwd, $database);
        $result = $mysqli->query("UPDATE categorie SET naam = '$toUpdateCategorie->naam' where naam = '$oldName';");
        if(!($result)) die(mysqli_error($mysqli));
        mysqli_close($mysqli);
    }


    //BESTELLINGEN

    static function getAllBestellingen() 
    {
        require "../credentials.php";
        $mysqli = new mysqli($host, $user, $passwd, $database);
        $result = $mysqli->query("SELECT * FROM bestellingen");
        $bestelling = null;
        $BestellingenArray =  [];
        while ($row = mysqli_fetch_array($result)) {
            $id = $row[0];
            $username = $row[1];
            $factuuradres= $row[2];
            $leveradres= $row[3];
            $levermethode= $row[4];
            $betaalmethode= $row[5];
            $datum = $row[6];



          $bestelling = new BestellingEntity($id, $username, $factuuradres, $leveradres, $levermethode, $betaalmethode, $datum);
            array_push($BestellingenArray, $bestelling);
        }

        mysqli_close($mysqli);
        return $BestellingenArray;
    }


    static function getBestelling($id) 
    {
        require "../credentials.php";
        $mysqli = new mysqli($host, $user, $passwd, $database);
        $result = $mysqli->query("SELECT * FROM bestellingen where id = $id");
        $bestelling = null;
        $BestellingenArray =  [];

        while ($row = mysqli_fetch_array($result)) {
            $id = $row[0];
            $username = $row[1];
            $factuuradres= $row[2];
            $leveradres= $row[3];
            $levermethode= $row[4];
            $betaalmethode= $row[5];
            $datum = $row[6];



          $bestelling = new BestellingEntity($id, $username, $factuuradres, $leveradres, $levermethode, $betaalmethode, $datum);
           
        }

        mysqli_close($mysqli);
        return $bestelling;
    }

     static function getBestellingInhoudBestelling($id) 
    {
        require "../credentials.php";
        $mysqli = new mysqli($host, $user, $passwd, $database);
        $result = $mysqli->query("SELECT * FROM bestelinhoud where bestelling_id = $id");
        $bestellingInh = null;
        $bestelInhArr =  [];

        while ($row = mysqli_fetch_array($result)) {
            $id = $row[0];     
            $bestelling_id = $row[1];
            $product_id = $row[2];



            $bestellingInh = new BestelinhoudEntity($id, $bestelling_id, $product_id);
            array_push($bestelInhArr, $bestellingInh);
        }

        mysqli_close($mysqli);
        return $bestelInhArr;
    }

    static function addBestelling($toAddBestelling)
    {
        require "../credentials.php";
        $mysqli = new mysqli($host, $user, $passwd, $database);
        $result = $mysqli->query("INSERT INTO bestellingen (username, Factuuradres, Leveradres, Levermethode, betaalmethode, datum ) VALUES ('$toAddBestelling->username', '$toAddBestelling->factuuradres', '$toAddBestelling->leveradres', '$toAddBestelling->levermethode', '$toAddBestelling->betaalmethode', '$toAddBestelling->datum')");
        if(!($result)) die(mysqli_error($mysqli));
        mysqli_close($mysqli);
    }

    static function addBestellingInhoud($toAddBestelInhoud)
    {
        require "../credentials.php";
        $mysqli = new mysqli($host, $user, $passwd, $database);
        $result = $mysqli->query("INSERT INTO bestelinhoud (bestelling_id, product_id) VALUES ('$toAddBestelInhoud->bestelling_id', '$toAddBestelInhoud->product_id')");
        if(!($result)) die(mysqli_error($mysqli));
        mysqli_close($mysqli);
    }

    //CONTACT

    static function addContactMessage($toAddContact)
    {
        var_dump($toAddContact);
        require "../credentials.php";
        $mysqli = new mysqli($host, $user, $passwd, $database);
        $toAddContact->subject = addslashes( $toAddContact->subject);
        $toAddContact->message = addslashes( $toAddContact->message);
        $result = $mysqli->query("INSERT INTO contact (username, subject, message, datum) VALUES ('$toAddContact->username', '$toAddContact->subject','$toAddContact->message','$toAddContact->datum')");
        if(!($result)) die(mysqli_error($mysqli));
        mysqli_close($mysqli);
    }

      static function getAllContact() 
    {
        require "../credentials.php";
        $mysqli = new mysqli($host, $user, $passwd, $database);
        $result = $mysqli->query("SELECT * FROM contact");
        $Contact = null;
        $ContactArray =  [];

        while ($row = mysqli_fetch_array($result)) {
            $id = $row[0];
            $username = $row[1];
            $subject = $row[2];
            $message = $row[3];
            $datum = $row[4];

          $Contact = new ContactEntity($id, $username, $subject, $message, $datum);
            array_push($ContactArray, $Contact);
        }

        mysqli_close($mysqli);
        return $ContactArray;
    }



}

?>