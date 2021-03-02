<?php
class RegistrationForm {
 protected $user;
 function __construct(){ ?>
    <h3>Formularz rejestracji</h3><p>
    <form action="index.php" method="post">
        Nazwa użytkownika: <br/><input name="user_id" /><br/>
        Hasło: <br/><input name="password" type="password" /><br/>
        <button name="submit" value="dodaj">Dodaj</button>
        <button name="submit" value="wyswietl">Wyswietl</button>
    </form></p>
    <?php
 }
 function checkUser(){ // podobnie jak metoda validate z lab4
    $args = [
    'user_id' => ['filter' => FILTER_VALIDATE_REGEXP, 'options' => ['regexp' => '/^[0-9A_Za-ząęłńśćźżó_-]{2,25}$/']
            ],
    'password' => ['filter' => FILTER_VALIDATE_REGEXP, 'options' => ['regexp' => '/^[0-9A_Za-ząęłńśćźżó_-]{2,25}$/']
            ]
 ];
 //przefiltruj dane:
 $dane = filter_input_array(INPUT_POST, $args);
 var_dump($dane);

  $errors = "";
  foreach ($dane as $key => $val) {
    if ($val === false or $val === NULL) {
      $errors .= $key . " ";
    }
  }
 if ($errors === "") {
    //Dane poprawne – utwórz obiekt user
    $this->user=new User($dane['user_id'], $dane['password']);
 } 
 else {
    echo "<p>Błędne dane:$errors</p>";
    $this->user = NULL;
 }
    return $this->user;
 }
}
