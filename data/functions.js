
    var LeafIcon = L.Icon.extend({
        options: {
            shadowUrl: 'data/images/marker-shadow.png',
            iconSize:     [20, 33],
            shadowSize:   [30, 33],
            iconAnchor:   [10, 33],
            shadowAnchor: [10, 33],
            popupAnchor:  [-0, -0]
        }
    });

    var orangeIcon = new LeafIcon({iconUrl: 'data/images/orangeicon.png'}),
        redIcon = new LeafIcon({iconUrl: 'data/images/redicon.png'}),
        greenIcon = new LeafIcon({iconUrl: 'data/images/greenicon.png'}),
        brownIcon = new LeafIcon({iconUrl: 'data/images/brownicon.png'}),
        blueIcon = new LeafIcon({iconUrl: 'data/images/blueicon.png'}),
        yellowIcon = new LeafIcon({iconUrl: 'data/images/yellowicon.png'}),
        greyIcon = new LeafIcon({iconUrl: 'data/images/greyicon.png'}),
        pinkIcon = new LeafIcon({iconUrl: 'data/images/pinkicon.png'}),
        lightorangeIcon = new LeafIcon({iconUrl: 'data/images/lightorangeicon.png'});

    L.icon = function (options) {return new L.Icon(options);};


function getColor(d) {
    return d === 'АБЦМ'                     ? '#b18bc4' :
           d === 'Золото'                   ? '#fec44f' :
           d === 'Золото + полиметаллы'     ? '#fff7bc' :
           d === 'Золото + черные металлы'  ? '#b5b4af' :
           d === 'Серебро'                  ? '#fffb00' :
           d === 'Платиноиды'               ? '#8C5731' :
           d === 'Медь + полиметаллы'       ? '#addd8e' :
           d === 'Свинец + полиметаллы'     ? '#d0d1e6' :
           d === 'Алмазы'                   ? '#fb6a4a' :
                                         '#ffffff';
    }

    function onEachStyle(feature) {
        return {
            fillColor: getColor(feature.properties.density),
            weight: 0.5,
            opacity: 1,
            color: 'black',
            fillOpacity: 0.5,
        };
    }


  function highlightFeature(e) {
		var layer = e.target;

		layer.setStyle({
			weight: 3,
			color: '#443A3A',
			fillOpacity: 0.7
		});

		if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
			layer.bringToFront();
		}

	}

  function getFeature(e) {
        var test = e.target;

        test.setStyle({
            weight: 3,
            color: '#443A3A',
            fillOpacity: 0.7
        });

        if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
            test.bringToFront();
        }

        info.update(test.feature.properties);
    }

	function resetHighlight(e) {
		geojson.resetStyle(e.target);

	}

    function pointToLayerMain (feature, latlng) {
        return L.marker(latlng, {icon: orangeIcon});
    };

	function onEachFeature(feature, layer) {
        layer.bindPopup("<h2>" + feature.properties.name + "</h2><br><b>Субъект РФ: </b>" +
            feature.properties.subject + "<br><br><b>ПИ: </b>" + feature.properties.density + "<br><br><b>Исполнитель: </b>" +
            feature.properties.org + "<br><br><b>Начало / окончание работ: </b>" + feature.properties.time + "<br><br><b>Лицензия №: </b>" +
            feature.properties.license + "<br><br><b>Тип: </b>" + feature.properties.typ + "<br><br><b>Заказчик: </b>" +
            feature.properties.pref
        );
		layer.on({
            click: getFeature,
            mouseout: resetHighlight,
			mouseover: highlightFeature

		});
	}

    function onEachNum(feature, layer) {
        var popupContent = "<b>Номенклатурный лист: </b>" +
            feature.properties.num200 + "<br><b>L-код ВСЕГЕИ: </b>" +
            feature.properties.l_code + "<br><b>Ссылка для скачивания: 404</b>";

        if (feature.properties && feature.properties.popupContent) {
            popupContent += feature.properties.popupContent;
        }

        layer.bindPopup(popupContent);
    }