document.addEventListener("DOMContentLoaded", function () {


    setTimeout(function () {
        console.log("Hello world!");
        var spanElement = document.querySelector('.listOfContacts .message-hint');
        spanElement.textContent = 'Votre liste de contacts est vide';


    }, 3100);

});


