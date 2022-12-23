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
    window.scroll({top:1950, behavior: 'smooth'});
});
rubrique[4].addEventListener('click', function() {
    window.scroll({top:3250, behavior: 'smooth'});
});

/*-------MAP LEAFLET-------*/
var map = L.map('map').setView([48.578984, 7.755616], 14);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

var marker = L.marker([48.578984, 7.755616]).addTo(map);

