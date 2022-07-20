(function ($) {
    'use strict';
    // basic map
    var leafletBasic = function () {
        if ($('#map-basic').length) {
            var mymap = L.map('map-basic').setView([51.505, -0.09], 13);

            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                maxZoom: 18,
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1
            }).addTo(mymap);

            L.marker([51.5, -0.09]).addTo(mymap)
                .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();

            L.circle([51.508, -0.11], 500, {
                color: 'red',
                fillColor: '#f03',
                fillOpacity: 0.5
            }).addTo(mymap).bindPopup("I am a circle.");

            L.polygon([
                [51.509, -0.08],
                [51.503, -0.06],
                [51.51, -0.047]
            ]).addTo(mymap).bindPopup("I am a polygon.");


            var popup = L.popup();

            function onMapClick(e) {
                popup
                    .setLatLng(e.latlng)
                    .setContent("You clicked the map at " + e.latlng.toString())
                    .openOn(mymap);
            }

            mymap.on('click', onMapClick);
        }
    }
    var choropleth = function () {
        if ($('#map-choropleth').length) {
            var map = L.map('map-choropleth').setView([37.8, -96], 4);

            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                maxZoom: 18,
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/light-v9',
                tileSize: 512,
                zoomOffset: -1
            }).addTo(map);


            // control that shows state info on hover
            var info = L.control();

            info.onAdd = function (map) {
                this._div = L.DomUtil.create('div', 'info');
                this.update();
                return this._div;
            };

            info.update = function (props) {
                this._div.innerHTML = '<h4>US Population Density</h4>' + (props ?
                    '<b>' + props.name + '</b><br />' + props.density + ' people / mi<sup>2</sup>'
                    : 'Hover over a state');
            };

            info.addTo(map);


            // get color depending on population density value
            function getColor(d) {
                return d > 1000 ? '#800026' :
                    d > 500 ? '#BD0026' :
                        d > 200 ? '#E31A1C' :
                            d > 100 ? '#FC4E2A' :
                                d > 50 ? '#FD8D3C' :
                                    d > 20 ? '#FEB24C' :
                                        d > 10 ? '#FED976' :
                                            '#FFEDA0';
            }

            function style(feature) {
                return {
                    weight: 2,
                    opacity: 1,
                    color: 'white',
                    dashArray: '3',
                    fillOpacity: 0.7,
                    fillColor: getColor(feature.properties.density)
                };
            }

            function highlightFeature(e) {
                var layer = e.target;

                layer.setStyle({
                    weight: 5,
                    color: '#666',
                    dashArray: '',
                    fillOpacity: 0.7
                });

                if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
                    layer.bringToFront();
                }

                info.update(layer.feature.properties);
            }

            var geojson;

            function resetHighlight(e) {
                geojson.resetStyle(e.target);
                info.update();
            }

            function zoomToFeature(e) {
                map.fitBounds(e.target.getBounds());
            }

            function onEachFeature(feature, layer) {
                layer.on({
                    mouseover: highlightFeature,
                    mouseout: resetHighlight,
                    click: zoomToFeature
                });
            }



            map.attributionControl.addAttribution('Population data &copy; <a href="http://census.gov/">US Census Bureau</a>');


            var legend = L.control({ position: 'bottomright' });

            legend.onAdd = function (map) {

                var div = L.DomUtil.create('div', 'info legend'),
                    grades = [0, 10, 20, 50, 100, 200, 500, 1000],
                    labels = [],
                    from, to;

                for (var i = 0; i < grades.length; i++) {
                    from = grades[i];
                    to = grades[i + 1];

                    labels.push(
                        '<i style="background:' + getColor(from + 1) + '"></i> ' +
                        from + (to ? '&ndash;' + to : '+'));
                }

                div.innerHTML = labels.join('<br>');
                return div;
            };

            legend.addTo(map);
        }
    }

    var crsBasic = function () {
        if ($('#map-panes').length) {
            var map = L.map('map-panes');

            map.createPane('labels');

            // This pane is above markers but below popups
            map.getPane('labels').style.zIndex = 650;

            // Layers in this pane are non-interactive and do not obscure mouse/touch events
            map.getPane('labels').style.pointerEvents = 'none';

            var cartodbAttribution = '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, &copy; <a href="https://carto.com/attribution">CARTO</a>';

            var positron = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_nolabels/{z}/{x}/{y}.png', {
                attribution: cartodbAttribution
            }).addTo(map);

            var positronLabels = L.tileLayer('http://{s}.basemaps.cartocdn.com/light_only_labels/{z}/{x}/{y}.png', {
                attribution: cartodbAttribution,
                pane: 'labels'
            }).addTo(map);

            map.setView({ lat: 47.040182144806664, lng: 9.667968750000002 }, 4);
        }
    }
    var multiMarkColors = function () {
        if ($('#map-multi-marker-colors').length) {
            // define leaflet
            var leaflet = L.map('map-multi-marker-colors', {
                center: [47.339, 11.602],
                zoom: 3
            })

            // set leaflet tile layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(leaflet);


            // set custom SVG icon marker
            var markerIcon1 = L.divIcon({
                html: `<span class="svg-icon svg-icon-danger svg-icon-3x"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="24" width="24" height="0"/><path d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z" fill="#7e46f0" fill-rule="nonzero"/></g></svg></span>`,
                bgPos: [10, 10],
                iconAnchor: [20, 37],
                popupAnchor: [0, -37],
                className: 'leaflet-marker'
            });

            var markerIcon2 = L.divIcon({
                html: `<span class="svg-icon svg-icon-primary svg-icon-3x"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="24" width="24" height="0"/><path d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z" fill="#3ed092" fill-rule="nonzero"/></g></svg></span>`,
                bgPos: [10, 10],
                iconAnchor: [20, 37],
                popupAnchor: [0, -37],
                className: 'leaflet-marker'
            });

            var markerIcon3 = L.divIcon({
                html: `<span class="svg-icon svg-icon-warning svg-icon-3x"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="24" width="24" height="0"/><path d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z" fill="#ff3551" fill-rule="nonzero"/></g></svg></span>`,
                bgPos: [10, 10],
                iconAnchor: [20, 37],
                popupAnchor: [0, -37],
                className: 'leaflet-marker'
            });

            var markerIcon4 = L.divIcon({
                html: `<span class="svg-icon svg-icon-success svg-icon-3x"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="24" width="24" height="0"/><path d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z" fill="#5579ff" fill-rule="nonzero"/></g></svg></span>`,
                bgPos: [10, 10],
                iconAnchor: [20, 37],
                popupAnchor: [0, -37],
                className: 'leaflet-marker'
            });

            // bind markers with popup
            var marker1 = L.marker([39.3262345, -4.8380649], { icon: markerIcon1 }).addTo(leaflet);
            var marker2 = L.marker([41.804, 13.843], { icon: markerIcon2 }).addTo(leaflet);
            var marker3 = L.marker([51.11, 10.371], { icon: markerIcon3 }).addTo(leaflet);
            var marker4 = L.marker([46.74, 2.417], { icon: markerIcon4 }).addTo(leaflet);

            marker1.bindPopup("Spain", { closeButton: false });
            marker2.bindPopup("Italy", { closeButton: false });
            marker3.bindPopup("Germany", { closeButton: false });
            marker4.bindPopup("France", { closeButton: false });

            L.control.scale().addTo(leaflet);
        }
    }

    var interactiveMap = function () {
        if ($('#map-interactive').length) {
            var leaflet = L.map('map-interactive', {
                center: [40.725, -73.985],
                zoom: 11
            });

            // Init Leaflet Map
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(leaflet);

            

            // Define Marker Layer
            var markerLayer = L.layerGroup().addTo(leaflet);

            // Set Custom SVG icon marker
            var markerIcon = L.divIcon({
                html: `<span class="svg-icon svg-icon-danger svg-icon-3x"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="24" width="24" height="0"/><path d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z" fill="#000000" fill-rule="nonzero"/></g></svg></span>`,
                bgPos: [10, 10],
                iconAnchor: [20, 37],
                popupAnchor: [0, -37],
                className: 'leaflet-marker'
            });

            // Map onClick Action
            leaflet.on('click', function (e) {
                geocodeService.reverse().latlng(e.latlng).run(function (error, result) {
                    if (error) {
                        return;
                    }
                    markerLayer.clearLayers(); // remove this line to allow multi-markers on click
                    L.marker(result.latlng, { icon: markerIcon }).addTo(markerLayer).bindPopup(result.address.Match_addr, { closeButton: false }).openPopup();
                    alert(`You've clicked on the following address: ${result.address.Match_addr}`);
                });
            });
        }
    }

    var MultiMark = function () {
        if ($('#map-multi-mark').length) {
            // add sample location data
            var data = [
                { "location": [41.575330, 13.102411], "title": "One" },
                { "location": [41.575730, 13.002411], "title": "Two" },
                { "location": [41.807149, 13.162994], "title": "Three" },
                { "location": [41.507149, 13.172994], "title": "Four" },
                { "location": [41.847149, 14.132994], "title": "Five" },
                { "location": [41.219190, 13.062145], "title": "Six" },
                { "location": [41.344190, 13.242145], "title": "Seven" },
                { "location": [41.679190, 13.122145], "title": "Eight" },
                { "location": [41.329190, 13.192145], "title": "Nine" },
                { "location": [41.379290, 13.122545], "title": "Ten" },
                { "location": [41.409190, 13.362145], "title": "Elevent" },
                { "location": [41.794008, 12.583884], "title": "Twelve" },
                { "location": [41.805008, 12.982884], "title": "Thirteen" },
                { "location": [41.536175, 13.273590], "title": "Fourteen" },
                { "location": [41.516175, 13.373590], "title": "Fifteen" },
                { "location": [41.507175, 13.273690], "title": "Sixteen" },
                { "location": [41.836175, 13.673590], "title": "Seventeen" },
                { "location": [41.796175, 13.570590], "title": "Eighteen" },
                { "location": [41.436175, 13.573590], "title": "Nineteen" },
                { "location": [41.336175, 13.973590], "title": "Tweenty" },
                { "location": [41.236175, 13.273590], "title": "Tweenty One" },
                { "location": [41.546175, 13.473590], "title": "Tweenty Two" },
                { "location": [41.239290, 13.032145], "title": "Tweenty Three" }
            ];

            // init leaflet map
            var leaflet = new L.Map('map-multi-mark', { zoom: 10, center: new L.latLng(data[0].location) });

            leaflet.addLayer(new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'));

            // add scale layer
            L.control.scale().addTo(leaflet);

            // set custom SVG icon marker
            var leafletIcon = L.divIcon({
                html: `<span class="svg-icon svg-icon-danger svg-icon-3x"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="24" width="24" height="0"/><path d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z" fill="#7e46f0" fill-rule="nonzero"/></g></svg></span>`,
                bgPos: [10, 10],
                iconAnchor: [20, 37],
                popupAnchor: [0, -37],
                className: 'leaflet-marker'
            });

            // set markers
            data.forEach(function (item) {
                var marker = L.marker(item.location, { icon: leafletIcon }).addTo(leaflet);
                marker.bindPopup(item.title, { closeButton: false });
            })
        }
    }


    //Load functions
    $(document).ready(function () {
        leafletBasic();
        choropleth();
        crsBasic();
        multiMarkColors();
        MultiMark();
        interactiveMap();
        
    });

})(jQuery);