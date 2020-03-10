var genericAjax = function (url, data, type, callBack) {
    $.ajax({
        url: url,
        data: data,
        type: type,
        dataType : 'json', // fuerza que la devolución no sea en texto sino json
    })
    .done(function( res ) {   // Suele ser texto, pero carmelo ha hecho que la llamada te devuelva un 
                              // json(variable con formato json).
        console.log('ajax done');
        console.log( res );
        callBack( res );
    })
    .fail(function( xhr, status, errorThrown ) {
        console.log('ajax fail');
        console.log(xhr.responseJSON.message);
    })
    .always(function( xhr, status ) {
        console.log('ajax always');
    });
};

var date= new Date();
    jQuery('#fechaAlta').val(date.getFullYear()+'-'+(date.getMonth()+1)+'-'+date.getDate());
    var map;
    var myLatlng;
    var marker;
    var geocoder
    var ubicacion=jQuery('#ubicacion');
    var latitud=jQuery('#latitud');
    var longitud=jQuery('#longitud');

   
    
    function initMap() 
    {
        myLatlng = new google.maps.LatLng(37.16185,-3.591497);
        map = new google.maps.Map(document.getElementById('gmap'), {
        zoom: 14,
        center: myLatlng,
        styles: [
                  {
                    "elementType": "geometry",
                    "stylers": [
                      {
                        "color": "#ebe3cd"
                      }
                    ]
                  },
                  {
                    "elementType": "labels.text.fill",
                    "stylers": [
                      {
                        "color": "#523735"
                      }
                    ]
                  },
                  {
                    "elementType": "labels.text.stroke",
                    "stylers": [
                      {
                        "color": "#f5f1e6"
                      }
                    ]
                  },
                  {
                    "featureType": "administrative",
                    "elementType": "geometry.stroke",
                    "stylers": [
                      {
                        "color": "#c9b2a6"
                      }
                    ]
                  },
                  {
                    "featureType": "administrative.land_parcel",
                    "elementType": "geometry.stroke",
                    "stylers": [
                      {
                        "color": "#dcd2be"
                      }
                    ]
                  },
                  {
                    "featureType": "administrative.land_parcel",
                    "elementType": "labels.text.fill",
                    "stylers": [
                      {
                        "color": "#ae9e90"
                      }
                    ]
                  },
                  {
                    "featureType": "landscape.natural",
                    "elementType": "geometry",
                    "stylers": [
                      {
                        "color": "#dfd2ae"
                      }
                    ]
                  },
                  {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [
                      {
                        "color": "#dfd2ae"
                      }
                    ]
                  },
                  {
                    "featureType": "poi",
                    "elementType": "labels.text.fill",
                    "stylers": [
                      {
                        "color": "#93817c"
                      }
                    ]
                  },
                  {
                    "featureType": "poi.park",
                    "elementType": "geometry.fill",
                    "stylers": [
                      {
                        "color": "#a5b076"
                      }
                    ]
                  },
                  {
                    "featureType": "poi.park",
                    "elementType": "labels.text.fill",
                    "stylers": [
                      {
                        "color": "#447530"
                      }
                    ]
                  },
                  {
                    "featureType": "road",
                    "elementType": "geometry",
                    "stylers": [
                      {
                        "color": "#f5f1e6"
                      }
                    ]
                  },
                  {
                    "featureType": "road.arterial",
                    "elementType": "geometry",
                    "stylers": [
                      {
                        "color": "#fdfcf8"
                      }
                    ]
                  },
                  {
                    "featureType": "road.highway",
                    "elementType": "geometry",
                    "stylers": [
                      {
                        "color": "#f8c967"
                      }
                    ]
                  },
                  {
                    "featureType": "road.highway",
                    "elementType": "geometry.stroke",
                    "stylers": [
                      {
                        "color": "#e9bc62"
                      }
                    ]
                  },
                  {
                    "featureType": "road.highway.controlled_access",
                    "elementType": "geometry",
                    "stylers": [
                      {
                        "color": "#e98d58"
                      }
                    ]
                  },
                  {
                    "featureType": "road.highway.controlled_access",
                    "elementType": "geometry.stroke",
                    "stylers": [
                      {
                        "color": "#db8555"
                      }
                    ]
                  },
                  {
                    "featureType": "road.local",
                    "elementType": "labels.text.fill",
                    "stylers": [
                      {
                        "color": "#806b63"
                      }
                    ]
                  },
                  {
                    "featureType": "transit.line",
                    "elementType": "geometry",
                    "stylers": [
                      {
                        "color": "#dfd2ae"
                      }
                    ]
                  },
                  {
                    "featureType": "transit.line",
                    "elementType": "labels.text.fill",
                    "stylers": [
                      {
                        "color": "#8f7d77"
                      }
                    ]
                  },
                  {
                    "featureType": "transit.line",
                    "elementType": "labels.text.stroke",
                    "stylers": [
                      {
                        "color": "#ebe3cd"
                      }
                    ]
                  },
                  {
                    "featureType": "transit.station",
                    "elementType": "geometry",
                    "stylers": [
                      {
                        "color": "#dfd2ae"
                      }
                    ]
                  },
                  {
                    "featureType": "water",
                    "elementType": "geometry.fill",
                    "stylers": [
                      {
                        "color": "#b9d3c2"
                      }
                    ]
                  },
                  {
                    "featureType": "water",
                    "elementType": "labels.text.fill",
                    "stylers": [
                      {
                        "color": "#92998d"
                      }
                    ]
                  }
                ],
    });
    
    geocoder = new google.maps.Geocoder();
    //pone la marca en un sitio ya definido
    localizacionLatLang(geocoder,myLatlng);
    
    //creacion de la marca
    marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        title:"Punto de Acceso"
      });
    
    genericAjax('/wordpressconjunto/api/markers',null,'get',function(res){
        var puntos = res.puntos;
        puntos.forEach(function(punto){
            // var lat = parseInt(punto.latitud);
            new google.maps.Marker({
        		position: {
    		        lat: Number(punto.latitud),
        		    lng: Number(punto.longitud),
        		},
        		map: map,
        		title: punto.modelo,
        		icon: '/wordpressconjunto/public/img/marca.png',
        	});
        });
        
    });
    

      
           


      
    //evento en el mapa de arrastrar
    google.maps.event.addListener(marker,'dragend',function (e){
          latitud.val(e.latLng.lat());
          longitud.val(e.latLng.lng());
          
          localizacionLatLang(geocoder,e.latLng);
        });
    //Asignacion de los eventos de actualizar al cambiar el foco    
    ubicacion.blur(function(){
        actualizar(jQuery(this).val(),null,null);
    });
    latitud.blur(function(){
         actualizar(null,jQuery(this).val(),longitud.val());
    });
    longitud.blur(function(){
         actualizar(null,latitud.val(),jQuery(this).val());
    });
    }
    
    //actualiza la direccion de la ubicacion atraves de la latitud o la longitud
    function localizacionLatLang(geocoder,myLatlng)
    {
          geocoder.geocode({'location': myLatlng}, function(results, status) 
          {
            if (status === 'OK') {
              ubicacion.val(results[0].formatted_address+'');
            } else {
              
            }
          });
    }
    //actualiza la LatLng atraves de la ubicacion escrita
    function localizacionDireccion(geocoder,location)
    {
         geocoder.geocode({'address': location}, function(results, status) 
         {
            if (status === 'OK') {
              latitud.val(results[0].geometry.location.lat());
              longitud.val(results[0].geometry.location.lng());
              return new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng());
            } else {
              
            }
          });
    }
    
    //funcion que mueve la marca y el mapa al punto
    function actualizar(ubi,lati,longi)
    {
        
        if(ubi !== null)
        {
            myLatlng = localizacionDireccion(geocoder,ubi);
        }else{
            myLatlng = new google.maps.LatLng(lati, longi);
            localizacionLatLang(geocoder,myLatlng);
        }
        marker.setPosition(myLatlng);
        map.setCenter(myLatlng);
    }