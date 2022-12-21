var connex = document.getElementById('connex');
var connecbox = document.getElementById('connecbox');

connex.addEventListener('click', function(){
    connecbox.classList.toggle('cache1');
    console.log('connecbox');
})

/*-------NAVIGATION DU MENU--------*/
var rubrique = document.querySelectorAll('#menu ul li');

rubrique[1].addEventListener('click', function() {
    window.scroll({top:800, behavior: 'smooth'});
});
rubrique[2].addEventListener('click', function() {
    window.scroll({top:1350, behavior: 'smooth'});
});
rubrique[3].addEventListener('click', function() {
    window.scroll({top:1900, behavior: 'smooth'});
});
rubrique[4].addEventListener('click', function() {
    window.scroll({top:0, behavior: 'smooth'});
});




