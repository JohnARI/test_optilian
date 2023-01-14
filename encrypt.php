<?php
function encryptVigenere($encryptText, $key)
{
    require_once 'db.php'; // On importe la base de données
    $decryptText = ""; // On initialise la variable qui contiendra le texte encrypté
    $encryptText = strtoupper($encryptText); // On met le texte en clair en majuscule
    $key = strtoupper($key); // On met la clef en majuscule
    $key_length = strlen($key); // On récupère la longueur de la clef
    for ($i = 0, $j = 0; $i < strlen($encryptText); $i++) {
        $c = ord($encryptText[$i]) - ord('A'); // On récupère la valeur ASCII de la lettre
        $k = ord($key[$j]) - ord('A'); // On récupère la valeur ASCII de la lettre de la clef
        $c = ($c + $k) % 26; // On fait l'opération de chiffrement
        $decryptText .= chr($c + ord('A')); // On ajoute la lettre encryptée au texte encrypté
        $j = ($j + 1) % $key_length; // On incrémente le compteur de la clef
    }
    if (preg_match('/[^A-Z]/', $key) || preg_match('/[^A-Z]/', $encryptText)) { // Si la clef ou le texte en clair contient autre chose que des lettres
        return ""; // On retourne une chaîne vide
    }
    $sql = "INSERT INTO encrypted (text, clef, decrypted, created_at) VALUES ('$encryptText', '$key', '$decryptText', NOW())"; // On insère le texte en clair, la clef, le texte encrypté et la date dans la base de données
    $db->query($sql); // On exécute la requête
    return $decryptText; // Sinon on retourne le texte encrypté
}
$encryptText = $_POST['text_encrypt']; // On récupère le texte en clair dans le champ du texte en clair
$key = $_POST['key']; // On récupère la clef dans le champ de la clef
$decryptText = encryptVigenere($encryptText, $key); // On encrypte le texte en clair
echo $decryptText; // On affiche le texte encrypté dans le champ du texte encrypté
