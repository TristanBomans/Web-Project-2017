<?php

require_once "../includesns.php"; 


class MainDAO {
    // PRODUCT
    static function getProduct($id) 
    {
        require "../Credentials.php";
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
        require "../Credentials.php";
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
        require "../Credentials.php";
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
        require "../Credentials.php";
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
        require "../Credentials.php";
        $mysqli = new mysqli($host, $user, $passwd, $database);
        $result = $mysqli->query("INSERT INTO producten (cat_naam, naam, prijs, beschrijving, datum_toegevoegd, img_path) VALUES ('$toAddProduct->cat_naam', '$toAddProduct->naam', '$toAddProduct->prijs', '$toAddProduct->beschrijving', '$toAddProduct->datum_toegevoegd', '$toAddProduct->img_path')");
        if(!($result)) die(mysqli_error($mysqli));
        mysqli_close($mysqli);
    }

    static function updateProduct($toUpdateProduct)
    {
        require "../Credentials.php";
        $mysqli = new mysqli($host, $user, $passwd, $database);
        $result = $mysqli->query("UPDATE producten SET cat_naam = '$toUpdateProduct->cat_naam' , naam = '$toUpdateProduct->naam', prijs = '$toUpdateProduct->prijs', beschrijving = '$toUpdateProduct->beschrijving', datum_toegevoegd = '$toUpdateProduct->datum_toegevoegd', img_path = '$toUpdateProduct->img_path', avg_rating = '$toUpdateProduct->avg_rating', numb_ratings = '$toUpdateProduct->numb_ratings'  where id = '$toUpdateProduct->id';");
        if(!($result)) die(mysqli_error($mysqli));
        mysqli_close($mysqli);
    }


    // USERS

    static function addUser($toAddUser)
    {
        require "../Credentials.php";
        $mysqli = new mysqli($host, $user, $passwd, $database);
        $result = $mysqli->query("INSERT INTO users (username, password, naam, voornaam, authority, emailadres) VALUES ('$toAddUser->username', '$toAddUser->password', '$toAddUser->naam', '$toAddUser->voornaam', '$toAddUser->authority', '$toAddUser->emailadres')");
        if(!($result)) die(mysqli_error($mysqli));
        mysqli_close($mysqli);
    }

    static function getUser($username) 
    {
        require "../Credentials.php";
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

    // REVIEWS

    static function addReview($toAddReview)
    {
        require "../Credentials.php";
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
     require "../Credentials.php";
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
        require "../Credentials.php";
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

}

?>