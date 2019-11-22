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

    L.icon = function (options) {
    return new L.Icon(options);
    };
    //2017 год 
    L.marker([55.613326, 37.612621], {icon: pinkIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Территория.png" alt="image"/></div>');
    L.marker([55.738189, 37.621582], {icon: pinkIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Территория_РФ.png" alt="image"/></div>');
    L.marker([44.3678017,40.2528000], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Даховская.png" alt="image"/></div>');
    L.marker([54.3335991,59.5019989], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Карагайлинская.png" alt="image"/></div>');
    L.marker([58.6575000,57.9394000], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Пашийская.png" alt="image"/></div>');
    L.marker([57.7775002,60.3111000], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Вилюйская.png" alt="image"/></div>');
    L.marker([55.3932991,87.0932999], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Ольгинская.png" alt="image"/></div>');
    L.marker([52.3865013,88.1799011], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Чанышская.png" alt="image"/></div>');
    L.marker([51.9791985,86.6187973], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Ишинская.png" alt="image"/></div>');
    L.marker([55.5181007,113.5260010], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Мухтунная.png" alt="image"/></div>');
    L.marker([54.3693008,89.0658035], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Инжульская.png" alt="image"/></div>');
    L.marker([53.3897018,89.0038986], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Балыксу-Изасский.png" alt="image"/></div>');
    L.marker([51.0321999,94.3190002], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Ургайлыгская.png" alt="image"/></div>');
    L.marker([58.6691017,94.6223984], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Мамон-Петропавловская.png" alt="image"/></div>');
    L.marker([58.5471001,92.9011993], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Зыряновскай.png" alt="image"/></div>');
    L.marker([75.9812012,103.5989990], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Светлинская.png" alt="image"/></div>');
    L.marker([57.3375015,113.4000015], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Малоконкудерская.png" alt="image"/></div>');
    L.marker([57.4491005,112.6259995], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Каверга-Конкудерская.png" alt="image"/></div>');
    L.marker([53.0396004,117.0579987], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Жирекенский.png" alt="image"/></div>');
    L.marker([53.1897011,138.5899963], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Херпучинский.png" alt="image"/></div>');
    L.marker([55.0326004,128.8190002], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Приисковая.png" alt="image"/></div>');
    L.marker([61.7981987,165.1289978], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Куюльская.png" alt="image"/></div>');
    L.marker([66.3589020,166.4250031], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Чимчемемельская.png" alt="image"/></div>');
    L.marker([61.9672012,148.3849945], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Ким-Тюбеляхская.png" alt="image"/></div>');
    L.marker([60.7140999,152.0480042], {icon: lightorangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Майманджинская.png" alt="image"/></div>');
    L.marker([62.2573013,147.0870056], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Нижне-Стожильненское.png" alt="image"/></div>');
    L.marker([62.3377991,147.1309967], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Хугланнахское.png" alt="image"/></div>');
    L.marker([67.9047012,32.8562012], {icon: brownIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Мончегорский.png" alt="image"/></div>');
    L.marker([64.5535965,141.535000], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Талалахская.png" alt="image"/></div>');
    L.marker([61.9935989,156.4609985], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Маймачанская.png" alt="image"/></div>');
    L.marker([56.4796982,126.3410034], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Гувилгринская.png" alt="image"/></div>');
    L.marker([65.0805969,140.7619934], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Конгычанская.png" alt="image"/></div>');
    L.marker([65.5182037,129.7380066], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Аркачанское.png" alt="image"/></div>');
    L.marker([69.2848969,142.5549927], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Эгекитский.png" alt="image"/></div>');
    L.marker([68.3387985,141.6309967], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Олындинская.png" alt="image"/></div>');
    L.marker([65.2425003,141.8630066], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Силяпская.png" alt="image"/></div>');
    L.marker([51.5755005,81.4882965], {icon: blueIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Краснореченская.png" alt="image"/></div>');
    L.marker([58.609,93.346], {icon: blueIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Морянихинская.png" alt="image"/></div>');
    L.marker([50.7127991,118.3789978], {icon: blueIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Савва-Борзинский_РУ.png" alt="image"/></div>');
    L.marker([52.1749001,94.2794037], {icon: greenIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Кызыкчадрский.png" alt="image"/></div>');
    L.marker([62.1255989,147.8119965], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Нечинская.png" alt="image"/></div>');
    L.marker([52.7066002,132.8370056], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Бургалинская.png" alt="image"/></div>');
    L.marker([52.7756996,157.9470062], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Карымшинское.png" alt="image"/></div>');
    L.marker([64.9000015,178.6100006], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Золотогорская.png" alt="image"/></div>');
    L.marker([63.3165016,146.2769928], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Верхне-Хакчанское.png" alt="image"/></div>');
    L.marker([51.8899002,85.6968994], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Каянчинская.png" alt="image"/></div>');
    L.marker([52.4369011,115.4319992], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Дарасунский.png" alt="image"/></div>');
    L.marker([51.3270988,90.8430023], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Алдан-Маадырская.png" alt="image"/></div>');
    L.marker([52.1254005,93.2407990], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Узюпская.png" alt="image"/></div>');
    L.marker([43.4062996,42.8269005], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Джуаргенская.png" alt="image"/></div>');
    L.marker([42.8222008,44.3771019], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Какадур-Ламардонская.png" alt="image"/></div>');
    L.marker([58.3699989,125.2610016], {icon: orangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Томмот-Эльконская.png" alt="image"/></div>');
    L.marker([66.4615021,178.0290070], {icon: lightorangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Кремовая.png" alt="image"/></div>');
    L.marker([50.1963997,137.7259979], {icon: lightorangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Понийский.png" alt="image"/></div>');
    L.marker([51.6593018,138.5160065], {icon: lightorangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Ямтульская.png" alt="image"/></div>');
    L.marker([64.3313980,136.1820068], {icon: yellowIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Аллара-Сахский.png" alt="image"/></div>');
    L.marker([66.4783020,30.7954998], {icon: redIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Зареченско-Соколоозерская.png" alt="image"/></div>');
    L.marker([60.9081993,130.8890076], {icon: redIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Менда-Барылайская.png" alt="image"/></div>');
    L.marker([52.1271019,58.2360992], {icon: greenIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Новопетровская.png" alt="image"/></div>');
    L.marker([53.4901009,94.0353012], {icon: greyIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Джетский.png" alt="image"/></div>');
    L.marker([51.2373009,82.0603027], {icon: lightorangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Новокузнецовская.png" alt="image"/></div>');
    L.marker([54.0721016,85.0683975], {icon: lightorangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Салаирская.png" alt="image"/></div>');
    L.marker([52.1170006,55.7533989], {icon: greenIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Оренбургско-Башкирская.png" alt="image"/></div>');
    L.marker([50.9157982,118.6520004], {icon: lightorangeIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Приаргунская.png" alt="image"/></div>');
    L.marker([44.6006012,135.8910065], {icon: blueIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Арцевская.png" alt="image"/></div>');
    L.marker([66.4404984,39.7372017], {icon: redIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Пулонгская.png" alt="image"/></div>');
    L.marker([57.6666985,103.5000000], {icon: redIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Илимо-Катангский.png" alt="image"/></div>');
    L.marker([68.3458023,176.7500000], {icon: yellowIcon}).addTo(grrtest).bindPopup('<div><img src="data/popups/Олептынская.png" alt="image"/></div>');
    //2018 год 
    L.marker([62.1406415671776,147.804933421212], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Нечинская.png" alt="image"/></div>');
    L.marker([52.7065759073791,132.837185086305], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Бургалинская.png" alt="image"/></div>');
    L.marker([42.8273005370989,44.3956384233524], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Какадур-Ламардонская.png" alt="image"/></div>');
    L.marker([51.575538902099,81.4882505165386], {icon: blueIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Краснореченская.png" alt="image"/></div>');
    L.marker([58.609,93.346], {icon: blueIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Морянихинская.png" alt="image"/></div>');
    L.marker([50.7128018013661,118.37906003423], {icon: greenIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Савва-Борзинский.png" alt="image"/></div>');
    L.marker([51.1185470498779,82.3717288804349], {icon: lightorangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Холодная.png" alt="image"/></div>');//" площадь (Au, Ag, Cu, Pb, Zn)");
    L.marker([47.1326388890236,135.197916666671], {icon: greenIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Малахитовое.png" alt="image"/></div>');
    L.marker([52.1748864885215,94.2794353299895], {icon: greenIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Кызыкчадрский.png" alt="image"/></div>');
    L.marker([51.9998139194532,58.4267980820158, ], {icon: greenIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Южно-Подольская.png" alt="image"/></div>');
    L.marker([64.8999795846971,178.610432062695], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Золотогорская.png" alt="image"/></div>');
    L.marker([52.775748792166,157.947149758412], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Карымшинское.png" alt="image"/></div>');
    L.marker([63.3165277778154,146.277361110953], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Верхне-Хакчанское.png" alt="image"/></div>');
    L.marker([59.7479824166583,162.879077862998], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Эвевпента.png" alt="image"/></div>');
    L.marker([54.4239762683722,124.339426443234], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Соловьевский.png" alt="image"/></div>');
    L.marker([63.2396790423738,152.146361112992], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Дерясь-Юрягинская.png" alt="image"/></div>');
    L.marker([62.8076260341964,146.255753977495], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Петениканская.png" alt="image"/></div>');
    L.marker([50.8068147258836,156.424057678452], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Кошкинская.png" alt="image"/></div>');
    L.marker([64.5262814423143,173.156758302341], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Провиденский.png" alt="image"/></div>');
    L.marker([51.889863533942,85.6968861867534], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Каянчинская.png" alt="image"/></div>');
    L.marker([55.4168062993439,88.1911804021171], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Южно-Берикульская.png" alt="image"/></div>');
    L.marker([52.4369222933129,115.431672811978], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Жарча-Талатуйский.png" alt="image"/></div>');
    L.marker([51.3271271820491,90.8429736100444], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Алдан-Маадырская.png" alt="image"/></div>');
    L.marker([52.1254099080031,93.2407603378776], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Узюпская.png" alt="image"/></div>');
    L.marker([56.9300806754091,108.944092012535], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Миньско-Домугдинский.png" alt="image"/></div>');
    L.marker([51.792,117.073], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Казаково-Балахнинская.png" alt="image"/></div>');
    L.marker([59.1999938906864,93.837334726389], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Ваганская.png" alt="image"/></div>');
    L.marker([60.680969140033,91.3747055016098], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Ковригинская.png" alt="image"/></div>');
    L.marker([43.4062983315249,42.8268759470723], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Джуаргенская.png" alt="image"/></div>');
    L.marker([43.2381393617767,43.2746951917239], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Левобережное.png" alt="image"/></div>');
    L.marker([43.3972267341564,42.8504246684983], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Гитче-Тырнаузское.png" alt="image"/></div>');
    L.marker([58.369954681968,125.260966790815], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Томмот-Эльконская.png" alt="image"/></div>');
    L.marker([57.6903123231349,128.273917686858], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Спокойнинский.png" alt="image"/></div>');
    L.marker([58.3684169334263,125.560290408965], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Томмот-Якокутская.png" alt="image"/></div>');
    L.marker([65.8041666668582,138.162500000075], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Учуйский.png" alt="image"/></div>');
    L.marker([47.8099299619082,38.9148785893045], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Ольховская.png" alt="image"/></div>');
    L.marker([58.6655555552447,58.1854166663461], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Вильвенская.png" alt="image"/></div>');
    L.marker([57.1843092288303,61.4678527517965], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Шамейская.png" alt="image"/></div>');
    L.marker([52.8806804529904,87.3946415044842], {icon: lightorangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Красногорско-Кабурчакская.png" alt="image"/></div>');//"Красногорско-Кабурчакская площадь (Au, Ag)"
    L.marker([66.4614881025579,178.028904957097], {icon: lightorangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Кремовая.png" alt="image"/></div>');
    L.marker([62.0833333336165,142.25], {icon: lightorangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Куйдусунская.png" alt="image"/></div>');
    L.marker([65.7775888255661,129.646171112292], {icon: lightorangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Нюектаминская.png" alt="image"/></div>');
    L.marker([50.267,137.598], {icon: lightorangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Понийский.png" alt="image"/></div>');
    L.marker([51.6592849307097,138.516026769865], {icon: lightorangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Ямтульская.png" alt="image"/></div>');
    L.marker([50.1485096067357,137.729796582733], {icon: lightorangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Ходжарская.png" alt="image"/></div>');
    L.marker([53.6415395509289,100.04365367391], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Окино-Ийская.png" alt="image"/></div>');
    L.marker([64.3314046285726,136.182031134532], {icon: yellowIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Аллара-Сахский.png" alt="image"/></div>');
    L.marker([61.2450382152751,151.379510452535], {icon: yellowIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Тиарская.png" alt="image"/></div>');
    L.marker([66.4782824567988,30.7954845959846], {icon: redIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Зареченско-Соколоозерская.png" alt="image"/></div>');
    L.marker([60.9082389723806,130.888590643474], {icon: redIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Менда-Барылайская.png" alt="image"/></div>');
    L.marker([67.9027703460071,33.0117052251849], {icon: brownIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Массив_Поаз.png" alt="image"/></div>');
    /*L.marker([54.3603194793439,59.4154230498622], {icon: greenIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Восточно-Ургунское.png" alt="image"/></div>');*/
    /*L.marker([50.3606962765564,138.104738082712], {icon: lightorangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Гурская.png" alt="image"/></div>');*/
    /*L.marker([66.6205433744294,175.902115770845], {icon: greenIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Базовое.png" alt="image"/></div>');*/
    /*L.marker([65.6329457906949,170.229650788334], {icon: lightorangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Ольховский.png" alt="image"/></div>');*/
    /*L.marker([51.4466701919735,82.2587703079964], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Локтевская.png" alt="image"/></div>');*/
    /*L.marker([59.2399993193035,92.0401665981354], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Киликейский.png" alt="image"/></div>');*/
    /*L.marker([52.5500790916329,93.8026798604072], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Коярдская.png" alt="image"/></div>');*/
    /*L.marker([78.4886781027686,104.564280195157], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Голышевская.png" alt="image"/></div>');*/
    /*L.marker([57.1890841364845,115.578078496105], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Верхнеорловская.png" alt="image"/></div>');*/
    /*L.marker([51.8111530426452,140.01198582602], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Идоловская.png" alt="image"/></div>');*/
    /*L.marker([52.9013214974794,129.78666869747], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Сохатиная.png" alt="image"/></div>');*/
    /*L.marker([55.2939241622575,123.848453850676], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Кутыканский.png" alt="image"/></div>');*/
    /*L.marker([61.5750000000243,110.691666666573], {icon: redIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Ичодинская.png" alt="image"/></div>');*/
    /*L.marker([55.7208016203351,86.6752623346207], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Барзасская.png" alt="image"/></div>');*/
    /*L.marker([50.9999983089678,83.5001966332776], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Коргончиковская.png" alt="image"/></div>');*/
    /*L.marker([58.0000000065145,117.000000006956], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Мало-Тунгусская.png" alt="image"/></div>');*/
    L.marker([71.638165464606,124.440664493639], {icon: redIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Келимярская.png" alt="image"/></div>');
    L.marker([54.220915379047,93.3974557819389], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Джебская.png" alt="image"/></div>');
    /*L.marker([45.1424622053874,147.826969024243], {icon: orangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Добрынинская.png" alt="image"/></div>');*/
    L.marker([51.2588699570154,119.482840330051], {icon: lightorangeIcon}).addTo(grrsecondtest).bindPopup('<div><img src="data/popups/Ивановское.png" alt="image"/></div>')
