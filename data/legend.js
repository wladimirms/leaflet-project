    var legend = L.control({position: 'topright'});
    
    legend.onAdd = function (map) {

    var div = L.DomUtil.create('div', 'info legend');
    labels = ['<h4>Условные обозначения ПИ</h4>'],
    categories = ['АБЦМ','Золото','Золото + полиметаллы','Золото + черные металлы',
    'Серебро','Платиноиды','Медь + полиметаллы','Свинец + полиметаллы','Алмазы'];

    for (var i = 0; i < categories.length; i++) {

            div.innerHTML += 
            labels.push(
                '<i style="background:' + getColor(categories[i]) + '"></i> ' +
            (categories[i] ? categories[i] : '+'));

        }
        div.innerHTML = labels.join('<br>');
    return div;
    };
    legend.addTo(map);