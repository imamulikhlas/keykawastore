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
                const operator = JSON.parse("{\"status\":1,\"rc\":200,\"message\":\"Data Found\",\"data\":[{\"produk_kategori\":{\"id\":2,\"name\":\"TOP UP\",\"icon\":\"-\",\"slug\":\"top-up\"},\"produk_operator_jenis\":[{\"produk_operator\":{\"id\":4,\"name_operator\":\"Mobile Legends\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/9ef252294c4a6f9c39cb3a44926b5c9a.png\",\"status\":1},\"produk_jenis\":[{\"id\":5,\"name\":\"Mobile Legends\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/9ef252294c4a6f9c39cb3a44926b5c9a.png\",\"slug\":\"mobile-legends\",\"status\":1}]}]},{\"produk_kategori\":{\"id\":1,\"name\":\"PULSA\",\"icon\":\".\",\"slug\":\"pulsa\"},\"produk_operator_jenis\":[{\"produk_operator\":{\"id\":1,\"name_operator\":\"Telkomsel\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/9de46ac370e5151c2eafe4605752e7d5.png\",\"status\":1},\"produk_jenis\":[{\"id\":1,\"name\":\"Pulsa Reguler Telkomsel\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/9de46ac370e5151c2eafe4605752e7d5.png\",\"slug\":\"pulsa-reguler-telkomsel\",\"status\":1},{\"id\":2,\"name\":\"Pulsa Transfer Telkomsel\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/9de46ac370e5151c2eafe4605752e7d5.png\",\"slug\":\"pulsa-transfer-telkomsel\",\"status\":1}]},{\"produk_operator\":{\"id\":12,\"name_operator\":\"Token PLN\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/3445831a7987cf3b2556f694993e1e0f.png\",\"status\":1},\"produk_jenis\":[{\"id\":14,\"name\":\"Token PLN\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/3445831a7987cf3b2556f694993e1e0f.png\",\"slug\":\"token-pln\",\"status\":1}]}]},{\"produk_kategori\":{\"id\":3,\"name\":\"HIBURAN\",\"icon\":\"-\",\"slug\":\"hiburan\"},\"produk_operator_jenis\":[{\"produk_operator\":{\"id\":38,\"name_operator\":\"Lita\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/57c0f233b5e453e219bfce2c6e929fc2.png\",\"status\":1},\"produk_jenis\":[{\"id\":41,\"name\":\"Lita Coins\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/57c0f233b5e453e219bfce2c6e929fc2.png\",\"slug\":\"lita-coins\",\"status\":1}]}]}],\"ts\":1673748388}")
                const slider = JSON.parse("{\"status\":1,\"rc\":200,\"message\":\"Data Found\",\"data\":[{\"id\":8,\"name\":\"movile-legends\",\"image\":\"/assets/img/pamplet1.jpg\",\"url\":\"/mobile-legends\"},{\"id\":6,\"name\":\"Mobile Legends\",\"image\":\"/assets/img/pamplet2.jpg\",\"url\":\"mobile-legends\"}],\"ts\":1673748388}")
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


                this.contact = [{"icon":"https:\/\/assets.jajangame.com\/2022\/11\/79f43639827cc33c0aa71ea836428904.png","name":"Telegram","url":"https:\/\/t.me\/keykawastore","username":"@keykawastore"},{"icon":"https:\/\/assets.jajangame.com\/2022\/11\/16e7dcd394dd7377d913c296a3505929.png","name":"WhatsApp","url":"https:\/\/api.whatsapp.com\/send?phone=6282284731132&text=Saya%20Butuh%20bantuan.%20Nomor%20Pesanan%20saya%3A%20*JGT....*","username":"62822 8473 1132"}]
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
                        window.location = val.produk_jenis[0].slug
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
