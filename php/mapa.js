var map = L.map('map').setView([43.313928283929,-4.359725903368], 13);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

var circle = L.circle([43.313848568672626,-4.35972590336805], {
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5,
    radius: 500
}).addTo(map);

circle.bindPopup("Esta es una de las parcela del recinto.");

var popup = L.popup()
    .setLatLng([43.313848568672626,-4.35972590336805])
    .setContent("Esta es una de las parcela del recinto.")
    .openOn(map);

function onMapClick(e) {
        alert("You clicked the map at " + e.latlng);
}
    
map.on('click', onMapClick);


var popup = L.popup();

function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
        .setContent("You clicked the map at " + e.latlng.toString())
        .openOn(map);
}

map.on('click', onMapClick);



