function loadMap() {
	var dhaka = {lat: 23.8103, lng: 90.4125};
        var map = new google.maps.Map(document.getElementById('map'), {
        center: dhaka,
        zoom: 10
        });

        var marker = new google.maps.Marker({
          map: map,
          position: dhaka,
          title: 'Hello World!'
        });
}

