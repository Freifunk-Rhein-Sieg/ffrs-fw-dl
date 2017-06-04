$(document).ready(function() {
    $('select').material_select();
    var mapChangeCommunity = function (event) {
        var communityid = event.layer.feature.properties.community_id
        location.href = 'firmware.php?id=' + communityid
    }
    var map = L.map('map').setView([50.857048590, 7.207637429], 11)

    L.tileLayer('https://cartodb-basemaps-{s}.global.ssl.fastly.net/{style}/{z}/{x}/{y}.png', {
             attribution: 'Map data &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap-Mitwirkende</a>, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://carto.com/location-data-services/basemaps">Carto</a>',
        maxZoom: 18,
        style: 'light_all'
    }).addTo(map);
    communityiesGeoJson.forEach(function (i) {
        $.getJSON( i.geojson, function( data ) {
            var community = L.geoJSON(data, {
                style: {
                    fillColor: "#dc0067",
                    fillOpacity: 0.25,
                    color: '#dc0067',
                    opacity: 1,
                    weight: 2
                }
            }).addTo(map)
            community.on('click', mapChangeCommunity);
        })
    })
});