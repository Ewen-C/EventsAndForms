let pageButtons = document.querySelectorAll('footer button');

for(let i=0; i < pageButtons.length; i++) {
    thisButton = pageButtons[i];

    // Ajoute une fonction à flèche à tous les boutons dans le footer
    thisButton.addEventListener('click', (event) => {
        
        event.target.classList.toggle('redBackground');
        console.log(event);
        console.log("Vous avez sélectionné le bouton " + (i + 1) + " du footer avec un évènement '" + event.type + "' ! ");

        if ((event.target.className).search("redBackground") != -1) {
            console.log("La classe redBackground est activée (" + (event.target.className).search("redBackground") + ").")
        } else {
            console.log("La classe redBackground est désactivée (" + (event.target.className).search("redBackground") + ").")
        }

    }, false);
}