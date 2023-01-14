<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title>Ze vigenère tool</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script defer src="main.js"></script>
</head>

<body>
  <h1>Ze vigenère tool</h1>
  <div class="container">
    <form>
      <label id="label_encrypt" for="text_encrypt">Texte en clair :</label>
      <!-- Le champ du texte en clair -->
      <input type="text" id="text_encrypt" name="text_encrypt" />
      <div class="error" id="text_encrypt_error"></div>

      <br />
      <label class="clef" for="key">Clef :</label>
      <!-- Le champ de la clef -->
      <input type="text" id="key" name="key" />
      <span>
        <!-- Les boutons qui permettent de choisir si on veut encrypter ou décrypter -->
        <button type="submit" class="which_one" id="encrypt_button">Encrypter⇓</button>
        <button type="submit" class="which_one" id="decrypt_button">Décrypter⇑</button>
      </span>
      <div class="error" id="key_error"></div>

      <br />
      <label for="text_decrypt">Texte encrypté :</label>
      <!-- Le champ du texte encrypté -->
      <input type="text" id="text_decrypt" name="text_decrypt" />
      <br />
      <!-- Le boutton qui permet d'effacer tous les champs -->
      <button id="delete">Effacer</button>
    </form>
  </div>

</body>

</html>