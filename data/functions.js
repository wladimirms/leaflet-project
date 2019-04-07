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

  function style(feature) {
    return {
        fillColor: getColor(feature.properties.density),
        weight: 0.5,
        opacity: 1,
        color: 'black',
        fillOpacity: 0.5
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


	function onEachFeature(feature, layer) {
		layer.on({
            click: getFeature,
            mouseout: resetHighlight,
			mouseover: highlightFeature
		});
	}
