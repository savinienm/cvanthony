$(document).ready(function () {
  $('#submitButton').click(function (e) {
    e.preventDefault();
    let nom = $('#nom').val();
    let message = $('#message').val();
    let email = $('#email').val();
    let prenom = $('#prenom').val();
    let sujet = $('#sujet').val();
  if( nom !== '' && message !== '' && email !== '' && prenom !== '' && sujet !== ''){

    $.ajax
      ({
        type: "POST",
        url: "form.php",
        data: { "nom": nom, "prenom": prenom, "email": email, "sujet": sujet, "message": message },
        success: function (data) {
          $('#contactForm').remove();
          $('#contactRoto').append("<h2 id='h1submit'>Merci d'avoir envoyé un message</h2>");
        },
        error: function () {
          alert("Problème d'envoi")
        }
      });
    } else {
      alert("Champs obligatoires requis")
    };
  });
});