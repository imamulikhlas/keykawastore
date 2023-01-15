        var app = new Vue({
            el: "#app",
            components: {
                'carousel': VueCarousel.Carousel,
                'slide': VueCarousel.Slide
            },
            data() {
                return {
                    operator: [],
                    slider: [],
                    blog: [],
                    selectedOperator: {},
                    selectedJenis: {},
                    showModal: false,
                    showPopup: false,
                    limit: 30,
                    last_id: 0,
                    contact: [],
                    promo: []
                };
            },
            mounted() {
                const operator = JSON.parse("{\"status\":1,\"rc\":200,\"message\":\"Data Found\",\"data\":[{\"produk_kategori\":{\"id\":2,\"name\":\"TOP UP\",\"icon\":\"-\",\"slug\":\"top-up\"},\"produk_operator_jenis\":[{\"produk_operator\":{\"id\":3,\"name_operator\":\"Free Fire\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/45118379b60f32bacd7f0a4f1d205334.png\",\"status\":1},\"produk_jenis\":[{\"id\":4,\"name\":\"Free Fire\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/cd36be2d201354a1683b7d03fbba2ffc.png\",\"slug\":\"free-fire\",\"status\":1}]},{\"produk_operator\":{\"id\":4,\"name_operator\":\"Mobile Legends\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/9ef252294c4a6f9c39cb3a44926b5c9a.png\",\"status\":1},\"produk_jenis\":[{\"id\":5,\"name\":\"Mobile Legends\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/9ef252294c4a6f9c39cb3a44926b5c9a.png\",\"slug\":\"mobile-legends\",\"status\":1}]},{\"produk_operator\":{\"id\":5,\"name_operator\":\"Higgs Domino\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/2c0c51445cfa60127f8712c285258acf.png\",\"status\":1},\"produk_jenis\":[{\"id\":6,\"name\":\"Higgs Domino Koin Ungu MD\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/f13880cbd1a896a4271df91b9cf51f5f.png\",\"slug\":\"higgs-domino-koin-ungu-md\",\"status\":1},{\"id\":53,\"name\":\"Higgs Domino Koin Emas-D Resmi\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/ed70b0719d8a95efa34b3ea78691bc3a.png\",\"slug\":\"higgs-domino-koin-emas-d-resmi\",\"status\":1}]},{\"produk_operator\":{\"id\":10,\"name_operator\":\"Apex Legends\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/3b4980b1cc73d0640fa49ca926034a5e.png\",\"status\":1},\"produk_jenis\":[{\"id\":12,\"name\":\"Apex Legends Mobile\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/3b4980b1cc73d0640fa49ca926034a5e.png\",\"slug\":\"apex-legends-mobile\",\"status\":1}]},{\"produk_operator\":{\"id\":9,\"name_operator\":\"Valorant\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/be5443bbc269457c759d7b435de950d8.png\",\"status\":1},\"produk_jenis\":[{\"id\":11,\"name\":\"Valorant Points\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/be5443bbc269457c759d7b435de950d8.png\",\"slug\":\"valorant-points\",\"status\":1}]},{\"produk_operator\":{\"id\":8,\"name_operator\":\"PUBG Mobile\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/4e596755565b725cde1bd161358ba90c.png\",\"status\":1},\"produk_jenis\":[{\"id\":10,\"name\":\"PUBGM Indonesia\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/4e596755565b725cde1bd161358ba90c.png\",\"slug\":\"pubgm-indonesia\",\"status\":1}]},{\"produk_operator\":{\"id\":6,\"name_operator\":\"Tower of Fantasy\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2023\\\/01\\\/8b444e0a75fc425a8a58b0eede8505e4.png\",\"status\":1},\"produk_jenis\":[{\"id\":7,\"name\":\"Tower Of Fantasy\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2023\\\/01\\\/8b444e0a75fc425a8a58b0eede8505e4.png\",\"slug\":\"tower-of-fantasy\",\"status\":1}]},{\"produk_operator\":{\"id\":7,\"name_operator\":\"Genshin Impact\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/931d36d10304d324f7c5e46c5017ea56.png\",\"status\":1},\"produk_jenis\":[{\"id\":8,\"name\":\"Genshin Impact\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/931d36d10304d324f7c5e46c5017ea56.png\",\"slug\":\"genshin-impact\",\"status\":1}]},{\"produk_operator\":{\"id\":19,\"name_operator\":\"Honkai Impact 3\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/48f6cb2e8e351023b00b3fd899ca5967.png\",\"status\":1},\"produk_jenis\":[{\"id\":21,\"name\":\"Honkai Impact 3\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/48f6cb2e8e351023b00b3fd899ca5967.png\",\"slug\":\"honkai-impact-3\",\"status\":1}]},{\"produk_operator\":{\"id\":52,\"name_operator\":\"Arena of Valor\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2023\\\/01\\\/567a201b67bf2381d029d56cde98c058.png\",\"status\":1},\"produk_jenis\":[{\"id\":57,\"name\":\"Voucher Arena of Valor\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2023\\\/01\\\/567a201b67bf2381d029d56cde98c058.png\",\"slug\":\"voucher-arena-of-valor\",\"status\":1}]},{\"produk_operator\":{\"id\":23,\"name_operator\":\"Call of Duty Mobile\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/24c4bf991a7e55cc7ab2f4f572c81816.png\",\"status\":1},\"produk_jenis\":[{\"id\":23,\"name\":\"Call of Duty Mobile\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/24c4bf991a7e55cc7ab2f4f572c81816.png\",\"slug\":\"call-of-duty-mobile\",\"status\":1}]},{\"produk_operator\":{\"id\":11,\"name_operator\":\"League of Legends\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/2e3ea5fef0edf6d59cd060789a99f56d.png\",\"status\":1},\"produk_jenis\":[{\"id\":13,\"name\":\"League of Legends: Wild Rift\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/2e3ea5fef0edf6d59cd060789a99f56d.png\",\"slug\":\"league-of-legends:-wild-rift\",\"status\":1}]},{\"produk_operator\":{\"id\":46,\"name_operator\":\"HAGO\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2023\\\/01\\\/ba5d72ad15f09df755fd1754f658db31.png\",\"status\":1},\"produk_jenis\":[{\"id\":51,\"name\":\"Diamond HAGO\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2023\\\/01\\\/ba5d72ad15f09df755fd1754f658db31.png\",\"slug\":\"diamond-hago\",\"status\":1}]},{\"produk_operator\":{\"id\":44,\"name_operator\":\"Point Blank Zepetto\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/3f4a5205c72b196d46681684e38c5a78.png\",\"status\":1},\"produk_jenis\":[{\"id\":49,\"name\":\"Cash Point Blank Zepetto\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/3f4a5205c72b196d46681684e38c5a78.png\",\"slug\":\"cash-point-blank-zepetto\",\"status\":1}]},{\"produk_operator\":{\"id\":17,\"name_operator\":\"Be The King\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/802b8fc9c9f806571a7f6e35fde6d68c.png\",\"status\":1},\"produk_jenis\":[{\"id\":19,\"name\":\"Be The King Gold\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/802b8fc9c9f806571a7f6e35fde6d68c.png\",\"slug\":\"be-the-king-gold\",\"status\":1}]},{\"produk_operator\":{\"id\":20,\"name_operator\":\"Dragon Raja\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/5d939fdf820163a8d95b671570b08f38.png\",\"status\":1},\"produk_jenis\":[{\"id\":22,\"name\":\"Dragon Raja\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/5d939fdf820163a8d95b671570b08f38.png\",\"slug\":\"dragon-raja\",\"status\":1}]},{\"produk_operator\":{\"id\":18,\"name_operator\":\"Heaven Saga\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/374b004f3d1a0667b1612ad5ad854daf.png\",\"status\":1},\"produk_jenis\":[{\"id\":20,\"name\":\"Heaven Saga\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/374b004f3d1a0667b1612ad5ad854daf.png\",\"slug\":\"heaven-saga\",\"status\":1}]},{\"produk_operator\":{\"id\":24,\"name_operator\":\"Tom and Jerry Chase\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/427ce603f002195dab879401eee31c8d.png\",\"status\":1},\"produk_jenis\":[{\"id\":24,\"name\":\"Tom and Jerry Chase\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/427ce603f002195dab879401eee31c8d.png\",\"slug\":\"tom-and-jerry-chase\",\"status\":1}]},{\"produk_operator\":{\"id\":25,\"name_operator\":\"Sausage Man\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/28435f46cc2c98defc3742fa915ba4ea.png\",\"status\":1},\"produk_jenis\":[{\"id\":25,\"name\":\"Sausage Man Candies\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/28435f46cc2c98defc3742fa915ba4ea.png\",\"slug\":\"sausage-man-candies\",\"status\":1}]},{\"produk_operator\":{\"id\":26,\"name_operator\":\"LifeAfter\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/da00f2eccc8f92b0ce12a9585ce30e2c.png\",\"status\":1},\"produk_jenis\":[{\"id\":26,\"name\":\"LifeAfter Credits\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/da00f2eccc8f92b0ce12a9585ce30e2c.png\",\"slug\":\"lifeafter-credits\",\"status\":1}]},{\"produk_operator\":{\"id\":27,\"name_operator\":\"MARVEL Super War\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/e8532d559c2ea74a034961202b8d1b94.png\",\"status\":1},\"produk_jenis\":[{\"id\":27,\"name\":\"MARVEL Super War Credits\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/e8532d559c2ea74a034961202b8d1b94.png\",\"slug\":\"marvel-super-war-credits\",\"status\":1}]},{\"produk_operator\":{\"id\":28,\"name_operator\":\"Never After\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/b05d065a92527fbc063a6e3bc55211cc.png\",\"status\":1},\"produk_jenis\":[{\"id\":28,\"name\":\"Never After\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/b05d065a92527fbc063a6e3bc55211cc.png\",\"slug\":\"never-after\",\"status\":1}]},{\"produk_operator\":{\"id\":29,\"name_operator\":\"Crossing Void - Global\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/fe6ed326fa2512758e6587790337bad5.png\",\"status\":1},\"produk_jenis\":[{\"id\":29,\"name\":\"Crossing Void Maigo\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/fe6ed326fa2512758e6587790337bad5.png\",\"slug\":\"crossing-void-maigo\",\"status\":1}]},{\"produk_operator\":{\"id\":30,\"name_operator\":\"Light of Thel\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/f63b852c6427cde7525e303e9a2f3e7c.png\",\"status\":1},\"produk_jenis\":[{\"id\":30,\"name\":\"Light of Thel\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/f63b852c6427cde7525e303e9a2f3e7c.png\",\"slug\":\"light-of-thel\",\"status\":1}]},{\"produk_operator\":{\"id\":31,\"name_operator\":\"Omega Legends\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/a59603db6949a75ddea1687d8e2f267c.png\",\"status\":1},\"produk_jenis\":[{\"id\":31,\"name\":\"Omega Legends Gold\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/a59603db6949a75ddea1687d8e2f267c.png\",\"slug\":\"omega-legends-gold\",\"status\":1}]},{\"produk_operator\":{\"id\":32,\"name_operator\":\"Laplace M\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/6962f35d8ccac965ac78a84afd52aa7a.png\",\"status\":1},\"produk_jenis\":[{\"id\":32,\"name\":\"Laplace M Spirals\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/6962f35d8ccac965ac78a84afd52aa7a.png\",\"slug\":\"laplace-m-spirals\",\"status\":1}]},{\"produk_operator\":{\"id\":33,\"name_operator\":\"Super Sus\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/36555dbe4c91f86c1ccd26305951fe3e.png\",\"status\":1},\"produk_jenis\":[{\"id\":33,\"name\":\"Super Sus Golden Star\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/36555dbe4c91f86c1ccd26305951fe3e.png\",\"slug\":\"super-sus-golden-star\",\"status\":1}]},{\"produk_operator\":{\"id\":34,\"name_operator\":\"Sky: Children Of The Light\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/c449d0127ae6d7c3e85ece0b1f9586cf.png\",\"status\":1},\"produk_jenis\":[{\"id\":34,\"name\":\"Sky: Children of the Light\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/c449d0127ae6d7c3e85ece0b1f9586cf.png\",\"slug\":\"sky:-children-of-the-light\",\"status\":1}]},{\"produk_operator\":{\"id\":48,\"name_operator\":\"One Punch Man\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/920eadbc16ffb43bda184123eb6c8e6b.png\",\"status\":1},\"produk_jenis\":[{\"id\":52,\"name\":\"Kupon One Punch Man\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/920eadbc16ffb43bda184123eb6c8e6b.png\",\"slug\":\"kupon-one-punch-man\",\"status\":1}]},{\"produk_operator\":{\"id\":49,\"name_operator\":\"Football Master 2\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2023\\\/01\\\/2fc84553e0b942ec866876a0a9d2b72d.png\",\"status\":1},\"produk_jenis\":[{\"id\":54,\"name\":\"Football Master 2 FMP\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2023\\\/01\\\/2fc84553e0b942ec866876a0a9d2b72d.png\",\"slug\":\"football-master-2-fmp\",\"status\":1}]},{\"produk_operator\":{\"id\":55,\"name_operator\":\"Ys 6 Mobile\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2023\\\/01\\\/a2f967e5b39a041afe29532a65fa6055.png\",\"status\":1},\"produk_jenis\":[{\"id\":60,\"name\":\"Ys 6 Mobile Emelas\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2023\\\/01\\\/a2f967e5b39a041afe29532a65fa6055.png\",\"slug\":\"ys-6-mobile-emelas\",\"status\":1}]},{\"produk_operator\":{\"id\":56,\"name_operator\":\"Cloud Song\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2023\\\/01\\\/3212fcc0ee2efa2b81ef8a37b5281a67.png\",\"status\":1},\"produk_jenis\":[{\"id\":61,\"name\":\"Cloud Song Ticket\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2023\\\/01\\\/3212fcc0ee2efa2b81ef8a37b5281a67.png\",\"slug\":\"cloud-song-ticket\",\"status\":1}]}]},{\"produk_kategori\":{\"id\":4,\"name\":\"VOUCHER\",\"icon\":\"-\",\"slug\":\"voucher\"},\"produk_operator_jenis\":[{\"produk_operator\":{\"id\":43,\"name_operator\":\"Garena Shell\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/bf9bc4d952e584ffdcc57dfae13c7466.png\",\"status\":1},\"produk_jenis\":[{\"id\":48,\"name\":\"Garena Shell\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/bf9bc4d952e584ffdcc57dfae13c7466.png\",\"slug\":\"garena-shell\",\"status\":1}]},{\"produk_operator\":{\"id\":45,\"name_operator\":\"Point Blank Zepetto\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/3f4a5205c72b196d46681684e38c5a78.png\",\"status\":1},\"produk_jenis\":[{\"id\":50,\"name\":\"Voucher Point Blank Zepetto\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/3f4a5205c72b196d46681684e38c5a78.png\",\"slug\":\"voucher-point-blank-zepetto\",\"status\":1}]}]},{\"produk_kategori\":{\"id\":1,\"name\":\"PULSA\",\"icon\":\".\",\"slug\":\"pulsa\"},\"produk_operator_jenis\":[{\"produk_operator\":{\"id\":1,\"name_operator\":\"Telkomsel\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/9de46ac370e5151c2eafe4605752e7d5.png\",\"status\":1},\"produk_jenis\":[{\"id\":1,\"name\":\"Pulsa Reguler Telkomsel\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/9de46ac370e5151c2eafe4605752e7d5.png\",\"slug\":\"pulsa-reguler-telkomsel\",\"status\":1},{\"id\":2,\"name\":\"Pulsa Transfer Telkomsel\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/9de46ac370e5151c2eafe4605752e7d5.png\",\"slug\":\"pulsa-transfer-telkomsel\",\"status\":1}]},{\"produk_operator\":{\"id\":22,\"name_operator\":\"by.U\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/3c2f5908987eb5dbc0783f130af0a17a.png\",\"status\":1},\"produk_jenis\":[{\"id\":37,\"name\":\"Pulsa Reguler by.U\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/3c2f5908987eb5dbc0783f130af0a17a.png\",\"slug\":\"pulsa-reguler-by.u\",\"status\":1}]},{\"produk_operator\":{\"id\":2,\"name_operator\":\"AXIS\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/2e81f917ee396ffc117ff80ff0a17c6a.png\",\"status\":1},\"produk_jenis\":[{\"id\":3,\"name\":\"Pulsa Reguler Axis\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/2e81f917ee396ffc117ff80ff0a17c6a.png\",\"slug\":\"pulsa-reguler-axis\",\"status\":1}]},{\"produk_operator\":{\"id\":15,\"name_operator\":\"XL Axiata\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/901c11c70b177f7b98b55ba76faaefdd.png\",\"status\":1},\"produk_jenis\":[{\"id\":17,\"name\":\"Pulsa Reguler XL\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/901c11c70b177f7b98b55ba76faaefdd.png\",\"slug\":\"pulsa-reguler-xl\",\"status\":1}]},{\"produk_operator\":{\"id\":13,\"name_operator\":\"INDOSAT\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/206d53c43a52810ead963d1945be444e.png\",\"status\":1},\"produk_jenis\":[{\"id\":15,\"name\":\"Pulsa Reguler Indosat\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/206d53c43a52810ead963d1945be444e.png\",\"slug\":\"pulsa-reguler-indosat\",\"status\":1}]},{\"produk_operator\":{\"id\":14,\"name_operator\":\"TRI\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/88dea287169592d86d3b266ea266ab9e.png\",\"status\":1},\"produk_jenis\":[{\"id\":16,\"name\":\"Pulsa Reguler Tri\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/88dea287169592d86d3b266ea266ab9e.png\",\"slug\":\"pulsa-reguler-tri\",\"status\":1}]},{\"produk_operator\":{\"id\":21,\"name_operator\":\"Smartfren\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/d19bb67121dee394259aad00362de00f.png\",\"status\":1},\"produk_jenis\":[{\"id\":38,\"name\":\"Pulsa Smartfren Reguler\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/d19bb67121dee394259aad00362de00f.png\",\"slug\":\"pulsa-smartfren-reguler\",\"status\":1}]},{\"produk_operator\":{\"id\":12,\"name_operator\":\"Token PLN\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/3445831a7987cf3b2556f694993e1e0f.png\",\"status\":1},\"produk_jenis\":[{\"id\":14,\"name\":\"Token PLN\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/3445831a7987cf3b2556f694993e1e0f.png\",\"slug\":\"token-pln\",\"status\":1}]}]},{\"produk_kategori\":{\"id\":5,\"name\":\"E-MONEY\",\"icon\":\"-\",\"slug\":\"e-money\"},\"produk_operator_jenis\":[{\"produk_operator\":{\"id\":50,\"name_operator\":\"GOPAY\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2023\\\/01\\\/b0e00b0dcb0965194ea026de8a44379a.png\",\"status\":1},\"produk_jenis\":[{\"id\":55,\"name\":\"Saldo GOPAY Customer\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2023\\\/01\\\/b0e00b0dcb0965194ea026de8a44379a.png\",\"slug\":\"saldo-gopay-customer\",\"status\":1}]},{\"produk_operator\":{\"id\":51,\"name_operator\":\"DANA\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2023\\\/01\\\/9e518652c2fe3cd7ed37c575e09825a6.png\",\"status\":1},\"produk_jenis\":[{\"id\":56,\"name\":\"Saldo DANA\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2023\\\/01\\\/9e518652c2fe3cd7ed37c575e09825a6.png\",\"slug\":\"saldo-dana\",\"status\":1}]},{\"produk_operator\":{\"id\":53,\"name_operator\":\"SHOPEEPAY\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2023\\\/01\\\/07accf6592a8ed2e5b93e42d27b79d0a.png\",\"status\":1},\"produk_jenis\":[{\"id\":58,\"name\":\"Saldo ShopeePay\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2023\\\/01\\\/07accf6592a8ed2e5b93e42d27b79d0a.png\",\"slug\":\"saldo-shopeepay\",\"status\":1}]},{\"produk_operator\":{\"id\":54,\"name_operator\":\"GRAB DRIVER\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2023\\\/01\\\/04ae01c910b87d43bdf64c632251f296.png\",\"status\":1},\"produk_jenis\":[{\"id\":59,\"name\":\"Voucher Grab Driver\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2023\\\/01\\\/04ae01c910b87d43bdf64c632251f296.png\",\"slug\":\"voucher-grab-driver\",\"status\":1}]}]},{\"produk_kategori\":{\"id\":3,\"name\":\"HIBURAN\",\"icon\":\"-\",\"slug\":\"hiburan\"},\"produk_operator_jenis\":[{\"produk_operator\":{\"id\":37,\"name_operator\":\"MangaToon\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/53b4e5407b04498d5f43312b4fa2a142.png\",\"status\":1},\"produk_jenis\":[{\"id\":40,\"name\":\"MangaToon Coins\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/53b4e5407b04498d5f43312b4fa2a142.png\",\"slug\":\"mangatoon-coins\",\"status\":1}]},{\"produk_operator\":{\"id\":38,\"name_operator\":\"Lita\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/57c0f233b5e453e219bfce2c6e929fc2.png\",\"status\":1},\"produk_jenis\":[{\"id\":41,\"name\":\"Lita Coins\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/57c0f233b5e453e219bfce2c6e929fc2.png\",\"slug\":\"lita-coins\",\"status\":1}]},{\"produk_operator\":{\"id\":39,\"name_operator\":\"Mango Live\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/cb00d4d0f4c39faf80ab56c5c576a0e0.png\",\"status\":1},\"produk_jenis\":[{\"id\":42,\"name\":\"Mango Live Diamonds\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/cb00d4d0f4c39faf80ab56c5c576a0e0.png\",\"slug\":\"mango-live-diamonds\",\"status\":1}]},{\"produk_operator\":{\"id\":40,\"name_operator\":\"Sugar Live\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/0a577273e6d0f2892a15f6116e1488f6.png\",\"status\":1},\"produk_jenis\":[{\"id\":43,\"name\":\"Sugar Live Diamonds\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/0a577273e6d0f2892a15f6116e1488f6.png\",\"slug\":\"sugar-live-diamonds\",\"status\":1}]}]}],\"ts\":1673748388}")
                const slider = JSON.parse("{\"status\":1,\"rc\":200,\"message\":\"Data Found\",\"data\":[{\"id\":8,\"name\":\"Genshin Impact\",\"image\":\"https:\\\/\\\/assets.jajangame.com\\\/2023\\\/01\\\/2ed0c9a4cbd0cd4b3abed78b08ab9d08.png\",\"url\":\"https:\\\/\\\/jajangame.com\\\/id\\\/genshin-impact\"},{\"id\":6,\"name\":\"Mobile Legends\",\"image\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/ed34fe03846f069fe184a1b0cd0fc782.png\",\"url\":\"\\\/id\\\/mobile-legends\"}],\"ts\":1673748388}")
                const promo = {"status":1,"rc":200,"message":"Detail promo","data":"{\"data\":[{\"label\":\"Title\",\"key\":\"title\",\"data\":\".\"},{\"label\":\"Deskripsi\",\"key\":\"deskripsi\",\"data\":\".\"},{\"label\":\"Image\",\"key\":\"image\",\"data\":\".\"},{\"label\":\"Action\",\"key\":\"action\",\"data\":\".\"},{\"label\":\"Aktif\/NonAktif\",\"key\":\"is_aktif\",\"data\":\"false\"}]}","ts":1673748388}
                // buat json promo popup
                if (promo.status) {
                    const promoArr = JSON.parse(promo.data)
                    let jsonPromo = []
                    promoArr.data.forEach(el => {
                        const js = `"${el.key}":"${el.data}"`
                        jsonPromo.push(js)
                    })
                    const json = '{' + jsonPromo.join() + '}'
                    this.promo = JSON.parse(json)
                    if (this.promo.is_aktif === 'true') {
                        this.showPopup = true
                    }
                }
                this.operator = operator.data


                this.contact = [{"icon":"https:\/\/assets.jajangame.com\/2022\/11\/79f43639827cc33c0aa71ea836428904.png","name":"Telegram","url":"https:\/\/t.me\/keykawastore","username":"@keykawastore"},{"icon":"https:\/\/assets.jajangame.com\/2022\/11\/16e7dcd394dd7377d913c296a3505929.png","name":"WhatsApp","url":"https:\/\/api.whatsapp.com\/send?phone=6282284731132&text=Saya%20Butuh%20bantuan.%20Nomor%20Pesanan%20saya%3A%20*JGT....*","username":"0822 8473 1132"}]
                this.selectedOperator = this.operator[0]
                if (slider.data) {
                    this.slider = slider.data
                }
                this.getBlog()

            },
            methods: {
                showJenis(val) {
                    const filtered = []
                    val.produk_jenis.forEach(el => {
                        if (el.status === 1) {
                            filtered.push(el)
                        }
                    })
                    if (filtered.length === 1) {
                        window.location = '/id/' + val.produk_jenis[0].slug
                    } else {
                        this.showModal = true
                        this.selectedJenis = val.produk_jenis
                    }
                },
                async getBlog() {
                    try {
                        this.loadingBlog = true
                        const res = await axios.post('/blog', {
                            limit: this.limit,
                            last_id: this.last_id,
                            slug: ""
                        })
                        this.loadingBlog = false
                        if (res.data.status) {
                            this.blog = res.data.data.data
                        }
                    } catch (error) {

                    }
                },
            }
        });
