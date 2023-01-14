$(document).ready(function () {
  $("#encrypt_button").click(function (e) {
    e.preventDefault();

    $missingError = "ERREUR: texte manquant"; // Variable pour le message d'erreur si le champ est vide
    $wrongCharError = "ERREUR: caractère illicite"; // Variable pour le message d'erreur si le champ contient des caractères illicites

    // Si les deux champs sont vides
    if ($("#key").val() == "" && $("#text_encrypt").val() == "") {
      $("#text_encrypt_error").text($missingError).show().fadeOut(3000);
      $("#key_error").text($missingError).show().fadeOut(3000);
      return null;
    }
    // Si les deux champs contiennent des caractères illicites
    if (
      $("#key")
        .val()
        .match(/[^a-zA-Z]/) &&
      $("#text_encrypt")
        .val()
        .match(/[^a-zA-Z]/)
    ) {
      $("#text_encrypt_error").text($wrongCharError).show().fadeOut(3000);
      $("#key_error").text($wrongCharError).show().fadeOut(3000);
      return null;
    }
    // Si le champ clé est vide
    else if ($("#key").val() == "") {
      $("#key_error").text($missingError).show().fadeOut(3000);
      return null;
    }
    // Si le champ texte est vide
    else if ($("#text_encrypt").val() == "") {
      $("#text_encrypt_error").text($missingError).show().fadeOut(3000);
      return null;
    }
    // Si le champ clé contient des caractères illicites
    else if (
      $("#key")
        .val()
        .match(/[^a-zA-Z]/)
    ) {
      $("#key_error").text($wrongCharError).show().fadeOut(3000);
      return null;
    }
    // Si le champ texte contient des caractères illicites
    if (
      $("#text_encrypt")
        .val()
        .match(/[^a-zA-Z]/)
    ) {
      $("#text_encrypt_error").text($wrongCharError).show().fadeOut(3000);
      return null;
    } else { // Si les deux champs sont valide on envoie les données au fichier encrypt.php
      $.ajax({
        url: "encrypt.php",
        method: "POST",
        data: {
          text_encrypt: $("#text_encrypt").val(), // On récupère la valeur du champ texte
          key: $("#key").val(), // On récupère la valeur du champ clé
        },
        success: function (data) {
          $("#text_decrypt").val(data); // On affiche le résultat dans le champ texte
        },
      });
    }
  });

  $("#decrypt_button").click(function (e) {
    e.preventDefault();
    if ($("#text_decrypt").val() != "" && $("#key").val() != "") { // Si les deux champs sont valide on envoie les données au fichier decrypt.php
      $.ajax({
        url: "decrypt.php",
        method: "POST",
        data: {
          text_decrypt: $("#text_decrypt").val(), // On récupère la valeur du champ texte
          key: $("#key").val(), // On récupère la valeur du champ clé
        },
        success: function (data) {
          $("#text_encrypt").val(data); // On affiche le résultat dans le champ texte
        },
      });
    }
  });

  $("#delete").click(function (e) {
    e.preventDefault();
    // On vide les champs texte et la clef
    $("#text_encrypt").val(""); 
    $("#text_decrypt").val("");
    $("#key").val("");
  });
});
