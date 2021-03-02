<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once('klasy/User.php');
        include_once('klasy/RegistrationForm.php');
        include_once('klasy/baza.php');

        $rf = new RegistrationForm(); //wyświetla formularz rejestracji
        
        $bd = new Baza("localhost", "root", "", "lesson");
            if (filter_input(INPUT_POST, "submit")) {
            $akcja = filter_input(INPUT_POST, "submit");
            switch ($akcja) {
                case "dodaj" : 
                {
                    $user = $rf->checkUser(); //sprawdza poprawność danych
                    
                    if ($user === NULL)
                        echo "<p>Niepoprawne dane rejestracji.</p>";
                    else
                    {    
                        echo "<p>Poprawne dane rejestracji:</p>";
                        $bd->insert($bd);
                    }                   
                } 
                break;
                case "wyswietl" : echo $bd->select("select login, passwordhash from users", array("login","passwordhash")); break;
            }
            }
        ?>
    </body>
</html>
