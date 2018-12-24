$(document).ready(function() {
    $('select').material_select();
    var mapChangeCommunity = function (event) {
        var communityid = event.layer.feature.properties.community_id
        location.href = 'subauswahl.php?id=' + communityid
    }
    var map = L.map('map').setView([50.75600670286445, 7.390810699462891], 9.5)

    L.tileLayer('https://{s}.basemaps.cartocdn.com/{style}/{z}/{x}/{y}.png', {
             attribution: 'Map data &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap-Mitwirkende</a>, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://carto.com/location-data-services/basemaps">Carto</a>',
        maxZoom: 18,
        style: 'light_all'
    }).addTo(map);
    communityiesGeoJson.forEach(function (i) {
        $.getJSON( i.geojson, function( data ) {
            var community = L.geoJSON(data, {
                style: {
                    fillColor: data.features[0].properties.color,
                    fillOpacity: 0.25,
                    color: data.features[0].properties.color,
                    opacity: 1,
                    weight: 2
                }
            }).addTo(map)
            community.on('click', mapChangeCommunity);
            community.bindPopup(i.name)
            community.on('mouseover', function (e) {
                this.openPopup();
            });
            community.on('mouseout', function (e) {
                this.closePopup();
            });
        })
    })
});
