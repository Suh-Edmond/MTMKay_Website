
function initMap() {

    const myLatLng = { lat: 4.628342802301623, lng: 9.453579782474664 };

    // initialize map
    const map = new google.maps.Map(document.getElementById("mapBox"), {

        zoom: 15,

        center: myLatLng,

    });


    // initialize marker
    const marker = new google.maps.Marker({

        position: myLatLng,

        map,

        title: "MTMKay IT Training & Technology",

    });

    // Info window content
    const infowindow = new google.maps.InfoWindow({
        content: `
            <div>
                <p style="font-weight: bold">MTMKay IT Training & Technologies</p>
                <p style="font-weight: bold">Kumba, Cameroon</p>
                <p> <span style="font-weight: bold">4.0 </span> <span style="color: gold">★★★★☆</span> (100 reviews)</p>
                <a href="https://www.google.com/maps/dir/?api=1&destination=kumba,Cameroon" target="_blank">Directions</a>
            </div>
        `
    });

    marker.addListener('click', function (e){
        infowindow.open(map, marker);
    })
    infowindow.open(map, marker);

}

window.initMap = initMap;
