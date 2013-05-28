
      var chris = new google.maps.LatLng(43.165712,-70.840650);
      var marker;
      var map;

      function initialize() {
        var mapOptions = {
          zoom: 10,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          center: chris
        };

        map = new google.maps.Map(document.getElementById('map_canvas'),
                mapOptions);

        marker = new google.maps.Marker({
          map:map,
          draggable:true,
          animation: google.maps.Animation.DROP,
          position: chris
        });
        google.maps.event.addListener(marker, 'click', toggleBounce);
        
        var infowindow = new google.maps.InfoWindow({
                content: '<a href="https://maps.google.com/maps?saddr=&daddr=410%20Middle%20Road%20Dover,%20NH%2003820" target="_blank">Get directions from Google Maps.</a>'
            });

       google.maps.event.addListener(marker, 'mouseover', function() {
                infowindow.open(map,marker);
            });
      }

      function toggleBounce() {
         
        if (marker.getAnimation() != null) {
          marker.setAnimation(null);
        } else {
          marker.setAnimation(google.maps.Animation.BOUNCE);
        }
      }

