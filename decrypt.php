<?php
// import $db from db.php
function decryptVigenere($decryptText, $key)
{
    require_once 'db.php'; // On importe la base de données
    $encryptText = ""; // On initialise la variable qui contiendra le texte encrypté
    $decryptText = strtoupper($decryptText); // On met le texte en clair en majuscule
    $key = strtoupper($key); // On met la clef en majuscule
    $key_length = strlen($key); // On récupère la longueur de la clef
    for ($i = 0, $j = 0; $i < strlen($decryptText); $i++) {
        $c = ord($decryptText[$i]) - ord('A'); // On récupère la valeur ASCII de la lettre
        $k = ord($key[$j]) - ord('A'); // On récupère la valeur ASCII de la lettre de la clef
        $c = ($c - $k + 26) % 26; // On fait l'opération de chiffrement
        $encryptText .= chr($c + ord('A')); // On ajoute la lettre encryptée au texte encrypté
        $j = ($j + 1) % $key_length; // On incrémente le compteur de la clef
    }
    $sql = "INSERT INTO decrypted (text, clef, decrypted, created_at) VALUES ('$decryptText', '$key', '$encryptText', NOW())"; // On insère le texte encrypté, la clef, le texte décrypté et la date dans la base de données
    $db->query($sql); // On exécute la requête
    return $encryptText; // On retourne le texte encrypté
}
$decryptText = $_POST['text_decrypt']; // On récupère le texte en clair dans le champ du texte encrypté
$key = $_POST['key']; // On récupère la clef dans le champ de la clef
$encryptText = decryptVigenere($decryptText, $key); // On encrypte le texte en clair
echo $encryptText; // On affiche le texte encrypté dans le champ du texte en clair
