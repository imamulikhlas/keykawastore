@extends('layouts.master')
@section('title')
    Keykawa Store
@endsection

@section('content')
<div class="p-4 gap-2 bg-slate-50  rounded-t-lg -mt-8 animate__animated animate__fadeInUp">
    <div v-if="slider.length" class="mb-4">
        <carousel :per-page=1 :adjustableHeight="true" :loop="true" :autoplayTimeout="1000">
            <slide v-for="(s,i) in slider" :key="i" :data-index="0">
                <a :href="s.url" target="_blank">
                    <img :src="s.image" class="block rounded-lg w-full object-cover" alt="" />
                </a>
            </slide>
        </carousel>
    </div>
    <div class="p-2 bg-gray-200 rounded-lg flex w-full overflow-scroll cursor-pointer animate__animated animate__fadeInUp">
        <div v-for="(op,i) in operator" :key="i" class="px-4 py-2 flex-shrink-0 rounded-lg t-title text-sm" :class="op.produk_kategori.id === selectedOperator.produk_kategori.id ? 'bg-white' : ''" @click.prevent="selectedOperator=op">
            @{{ op.produk_kategori.name }}
        </div>
    </div>
    <div class="grid grid-cols-3 md:grid-cols-4 gap-3 w-full mt-4 animate__animated animate__fadeInUp">
        <div v-for="(pr, id) in selectedOperator.produk_operator_jenis" :key="id" @click.prevent="showJenis(pr)" class="cursor-pointer" v-show="pr.produk_operator.status===1">
            <div>
                <img :src="pr.produk_operator.icon_operator" class="shadow rounded-lg w-20 h-20 object-cover mx-auto" alt="">
            </div>
            <div class="-mt-14 bg-white h-28 rounded-lg p-4 shadow-lg">
                <h1 class="text-center text-xs w-full pt-14 t-title">
                    @{{ pr.produk_operator.name_operator }}
                </h1>
            </div>
        </div>
    </div>
    <div class="rounded-lg bg-white shadow-md mb-4 mt-6 animate__animated animate__fadeInUp">
        <div class="py-2 border-b p-3 flex justify-between items-center">
            <h1 class="t-title font-bold">Promo & News</h1>
            <a href='blog.html' class="text-xs text-primary underline">Lihat lebih banyak</a>
        </div>
        <div>
            <div v-if="!blog.length" class="py-6 text-center">
                Belum ada data
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 p-4 gap-3 cursor-pointer ">
                <a v-for="(b,i) in blog" :key="i" class="gap-3" :href="`/blog/${b.slug}`">
                    <div v-if="i < 2">
                        <img :src="b.thumbnail" class="rounded-lg h-40 w-full object-cover" alt="" onerror="this.onerror=null;this.src='https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg';">
                        <h3 class="mt-3 t-title font-bold text-sm">@{{ b.title.length > 35 ? b.title.substring(0, 35) + " ..." : b.title }}</h3>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="rounded-lg bg-white shadow-md mb-4 mt-6 animate__animated animate__fadeInUp">
        <div class="border-b px-3 py-6 flex justify-between bg-primary rounded-t-lg items-center">
            <h3 class="t-title w-full font-bold text-center text-white">
                Keykawa Store
                <br />
                Topup Voucher Game Termurah dan Terlengkap!
            </h3>
        </div>
        <div>
            <div>
                <ul class="p-6">
                    <li class="mb-6">
                        <div class="flex items-center gap-4">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24">
                                    <path fill="#005C7E" d="M23.334 11.96c-.713-.726-.872-1.829-.393-2.727.342-.64.366-1.401.064-2.062-.301-.66-.893-1.142-1.601-1.302-.991-.225-1.722-1.067-1.803-2.081-.059-.723-.451-1.378-1.062-1.77-.609-.393-1.367-.478-2.05-.229-.956.347-2.026.032-2.642-.776-.44-.576-1.124-.915-1.85-.915-.725 0-1.409.339-1.849.915-.613.809-1.683 1.124-2.639.777-.682-.248-1.44-.163-2.05.229-.61.392-1.003 1.047-1.061 1.77-.082 1.014-.812 1.857-1.803 2.081-.708.16-1.3.642-1.601 1.302s-.277 1.422.065 2.061c.479.897.32 2.001-.392 2.727-.509.517-.747 1.242-.644 1.96s.536 1.347 1.17 1.7c.888.495 1.352 1.51 1.144 2.505-.147.71.044 1.448.519 1.996.476.549 1.18.844 1.902.798 1.016-.063 1.953.54 2.317 1.489.259.678.82 1.195 1.517 1.399.695.204 1.447.072 2.031-.357.819-.603 1.936-.603 2.754 0 .584.43 1.336.562 2.031.357.697-.204 1.258-.722 1.518-1.399.363-.949 1.301-1.553 2.316-1.489.724.046 1.427-.249 1.902-.798.475-.548.667-1.286.519-1.996-.207-.995.256-2.01 1.145-2.505.633-.354 1.065-.982 1.169-1.7s-.135-1.443-.643-1.96zm-12.584 5.43l-4.5-4.364 1.857-1.857 2.643 2.506 5.643-5.784 1.857 1.857-7.5 7.642z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg t-title">Mitra Resmi</h3>
                                <p class=" text-gray-600 text-sm">Bekerja langsung dengan produsen terkemuka
                                    dunia,
                                    kami
                                    menawarkan
                                    10.000+ item game
                                    dan produk hiburan.</p>
                            </div>
                        </div>
                    </li>
                    <li class="mb-6">
                        <div class="flex items-center gap-4">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24">
                                    <path fill="#005C7E" d="M0 8v-2c0-1.104.896-2 2-2h20c1.104 0 2 .896 2 2v2h-24zm24 3v7c0 1.104-.896 2-2 2h-20c-1.104 0-2-.896-2-2v-7h24zm-15 5h-6v1h6v-1zm3-2h-9v1h9v-1zm9 0h-3v1h3v-1z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg t-title">Transaksi Mudah & Terpercaya</h3>
                                <p class=" text-gray-600 text-sm">Kami menyediakan pembayaran yang mudah dan
                                    aman dengan
                                    350+ metode pembayaran.</p>
                            </div>
                        </div>
                    </li>
                    <li class="mb-6">
                        <div class="flex items-center gap-4">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24">
                                    <path fill="#005C7E" d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-2 19l1.5-5h-4.5l7-9-1.5 5h4.5l-7 9z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg t-title">Pengiriman Instan</h3>
                                <p class=" text-gray-600 text-sm">Item akan dikirimkan secara instan ke akun
                                    Anda dimanapun dan kapanpun.</p>
                            </div>
                        </div>
                    </li>
                    <li class="mb-6">
                        <div class="flex items-center gap-4">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24">
                                    <path fill="#005C7E" d="M23.598 8.915c-.317-1.404-.366-2.48-.416-3.371-.167-2.951-1.58-4.774-4.89-4.828-.909-.015-1.997-.036-3.521-.396-.896-.21-1.827-.32-2.77-.32-1.053 0-2.12.137-3.167.423-1.286.262-2.244.281-3.058.294-3.31.053-4.723 1.876-4.89 4.827-.041.735-.082 1.597-.273 2.664-.403 1.208-.613 2.493-.613 3.795 0 1.265.199 2.546.613 3.79.191 1.066.232 1.928.273 2.663.167 2.951 1.58 4.774 4.89 4.827.814.013 1.773.032 3.061.295 1.033.281 2.099.422 3.163.422.932 0 1.862-.108 2.771-.322 1.524-.36 2.612-.38 3.521-.395 3.311-.053 4.724-1.876 4.89-4.827.05-.889.099-1.961.414-3.36.269-1.012.404-2.053.404-3.095 0-1.038-.134-2.077-.402-3.086zm-1.414-3.314l.006.106c-1.012-1.636-2.401-3.006-4.053-3.994l.139.003c2.553.042 3.759 1.24 3.908 3.885zm-3.817 3.502l2.608-1.485c.65 1.325 1.025 2.809 1.025 4.382s-.375 3.057-1.025 4.383l-2.608-1.485c.403-.884.633-1.863.633-2.898s-.23-2.014-.633-2.897zm-6.367 12.897c-1.579 0-3.068-.378-4.397-1.032l1.485-2.608c.888.407 1.872.64 2.912.64s2.024-.233 2.912-.64l1.485 2.608c-1.329.654-2.818 1.032-4.397 1.032zm0-5c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5zm0-15c1.579 0 3.068.378 4.397 1.032l-1.485 2.608c-.888-.407-1.872-.64-2.912-.64s-2.024.233-2.912.64l-1.485-2.608c1.329-.654 2.818-1.032 4.397-1.032zm-6.208-.283l.066-.001c-1.606.961-2.967 2.283-3.971 3.86.156-2.627 1.361-3.818 3.905-3.859zm-.159 13.18l-2.608 1.485c-.65-1.325-1.025-2.809-1.025-4.382s.375-3.057 1.025-4.383l2.608 1.485c-.403.884-.633 1.863-.633 2.898s.23 2.014.633 2.897zm-3.744 3.536c1.005 1.578 2.374 2.892 3.981 3.852l-.078-.002c-2.541-.041-3.746-1.23-3.903-3.85zm16.387 3.85l-.15.003c1.654-.987 3.051-2.351 4.064-3.987l-.006.101c-.149 2.644-1.355 3.842-3.908 3.883z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg t-title">Bantuan Pelanggan</h3>
                                <p class=" text-gray-600 text-sm">Kami menyediakan bantuan pelanggan yang ramah
                                    dan
                                    responsif.</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    {{-- <div class="rounded-lg hidden bg-white shadow-md mb-4 mt-6 animate__animated animate__fadeInUp">
        <div class="p-4 grid grid-cols-2 animate__animated animate__fadeInUp gap-3">
            <a class="cursor-pointer" href="id/mobile-legends.html">
                <h3 class=" text-xs t-title">
                    TOP UP Mobile Legends
                </h3>
            </a>

            <a class="cursor-pointer" href="id/pubgm-indonesia.html">
                <h3 class=" text-xs t-title">
                    TOP UP PUBGM Indonesia
                </h3>
            </a>
            <a class="cursor-pointer" href="id/tower-of-fantasy.html">
                <h3 class=" text-xs t-title">
                    TOP UP Tower Of Fantasy
                </h3>
            </a>
            <a class="cursor-pointer" href="id/genshin-impact.html">
                <h3 class=" text-xs t-title">
                    TOP UP Genshin Impact
                </h3>
            </a>
            <a class="cursor-pointer" href="id/honkai-impact-3.html">
                <h3 class=" text-xs t-title">
                    TOP UP Honkai Impact 3
                </h3>
            </a>
            <a class="cursor-pointer" href="id/voucher-arena-of-valor.html">
                <h3 class=" text-xs t-title">
                    TOP UP Voucher Arena of Valor
                </h3>
            </a>
            <a class="cursor-pointer" href="id/call-of-duty-mobile.html">
                <h3 class=" text-xs t-title">
                    TOP UP Call of Duty Mobile
                </h3>
            </a>
            <a class="cursor-pointer" href="id/league-of-legends%253A-wild-rift.html">
                <h3 class=" text-xs t-title">
                    TOP UP League of Legends: Wild Rift
                </h3>
            </a>
            <a class="cursor-pointer" href="id/diamond-hago.html">
                <h3 class=" text-xs t-title">
                    TOP UP Diamond HAGO
                </h3>
            </a>
            <a class="cursor-pointer" href="id/cash-point-blank-zepetto.html">
                <h3 class=" text-xs t-title">
                    TOP UP Cash Point Blank Zepetto
                </h3>
            </a>
            <a class="cursor-pointer" href="id/be-the-king-gold.html">
                <h3 class=" text-xs t-title">
                    TOP UP Be The King Gold
                </h3>
            </a>
            <a class="cursor-pointer" href="id/dragon-raja.html">
                <h3 class=" text-xs t-title">
                    TOP UP Dragon Raja
                </h3>
            </a>
            <a class="cursor-pointer" href="id/heaven-saga.html">
                <h3 class=" text-xs t-title">
                    TOP UP Heaven Saga
                </h3>
            </a>
            <a class="cursor-pointer" href="id/tom-and-jerry-chase.html">
                <h3 class=" text-xs t-title">
                    TOP UP Tom and Jerry Chase
                </h3>
            </a>
            <a class="cursor-pointer" href="id/sausage-man-candies.html">
                <h3 class=" text-xs t-title">
                    TOP UP Sausage Man Candies
                </h3>
            </a>
            <a class="cursor-pointer" href="id/lifeafter-credits.html">
                <h3 class=" text-xs t-title">
                    TOP UP LifeAfter Credits
                </h3>
            </a>
            <a class="cursor-pointer" href="id/marvel-super-war-credits.html">
                <h3 class=" text-xs t-title">
                    TOP UP MARVEL Super War Credits
                </h3>
            </a>
            <a class="cursor-pointer" href="id/never-after.html">
                <h3 class=" text-xs t-title">
                    TOP UP Never After
                </h3>
            </a>
            <a class="cursor-pointer" href="id/crossing-void-maigo.html">
                <h3 class=" text-xs t-title">
                    TOP UP Crossing Void Maigo
                </h3>
            </a>
            <a class="cursor-pointer" href="id/light-of-thel.html">
                <h3 class=" text-xs t-title">
                    TOP UP Light of Thel
                </h3>
            </a>
            <a class="cursor-pointer" href="id/omega-legends-gold.html">
                <h3 class=" text-xs t-title">
                    TOP UP Omega Legends Gold
                </h3>
            </a>
            <a class="cursor-pointer" href="id/laplace-m-spirals.html">
                <h3 class=" text-xs t-title">
                    TOP UP Laplace M Spirals
                </h3>
            </a>
            <a class="cursor-pointer" href="id/super-sus-golden-star.html">
                <h3 class=" text-xs t-title">
                    TOP UP Super Sus Golden Star
                </h3>
            </a>
            <a class="cursor-pointer" href="id/sky%253A-children-of-the-light.html">
                <h3 class=" text-xs t-title">
                    TOP UP Sky: Children of the Light
                </h3>
            </a>
            <a class="cursor-pointer" href="id/kupon-one-punch-man.html">
                <h3 class=" text-xs t-title">
                    TOP UP Kupon One Punch Man
                </h3>
            </a>
            <a class="cursor-pointer" href="id/football-master-2-fmp.html">
                <h3 class=" text-xs t-title">
                    TOP UP Football Master 2 FMP
                </h3>
            </a>
            <a class="cursor-pointer" href="id/ys-6-mobile-emelas.html">
                <h3 class=" text-xs t-title">
                    TOP UP Ys 6 Mobile Emelas
                </h3>
            </a>
            <a class="cursor-pointer" href="id/cloud-song-ticket.html">
                <h3 class=" text-xs t-title">
                    TOP UP Cloud Song Ticket
                </h3>
            </a>
            <a class="cursor-pointer" href="id/garena-shell.html">
                <h3 class=" text-xs t-title">
                    VOUCHER Garena Shell
                </h3>
            </a>
            <a class="cursor-pointer" href="id/voucher-point-blank-zepetto.html">
                <h3 class=" text-xs t-title">
                    VOUCHER Voucher Point Blank Zepetto
                </h3>
            </a>
            <a class="cursor-pointer" href="id/pulsa-reguler-telkomsel.html">
                <h3 class=" text-xs t-title">
                    PULSA Pulsa Reguler Telkomsel
                </h3>
            </a>
            <a class="cursor-pointer" href="id/pulsa-transfer-telkomsel.html">
                <h3 class=" text-xs t-title">
                    PULSA Pulsa Transfer Telkomsel
                </h3>
            </a>
            <a class="cursor-pointer" href="id/pulsa-reguler-by.u.html">
                <h3 class=" text-xs t-title">
                    PULSA Pulsa Reguler by.U
                </h3>
            </a>
            <a class="cursor-pointer" href="id/pulsa-reguler-axis.html">
                <h3 class=" text-xs t-title">
                    PULSA Pulsa Reguler Axis
                </h3>
            </a>
            <a class="cursor-pointer" href="id/pulsa-reguler-xl.html">
                <h3 class=" text-xs t-title">
                    PULSA Pulsa Reguler XL
                </h3>
            </a>
            <a class="cursor-pointer" href="id/pulsa-reguler-indosat.html">
                <h3 class=" text-xs t-title">
                    PULSA Pulsa Reguler Indosat
                </h3>
            </a>
            <a class="cursor-pointer" href="id/pulsa-reguler-tri.html">
                <h3 class=" text-xs t-title">
                    PULSA Pulsa Reguler Tri
                </h3>
            </a>
            <a class="cursor-pointer" href="id/pulsa-smartfren-reguler.html">
                <h3 class=" text-xs t-title">
                    PULSA Pulsa Smartfren Reguler
                </h3>
            </a>
            <a class="cursor-pointer" href="id/token-pln.html">
                <h3 class=" text-xs t-title">
                    PULSA Token PLN
                </h3>
            </a>
            <a class="cursor-pointer" href="id/saldo-gopay-customer.html">
                <h3 class=" text-xs t-title">
                    E-MONEY Saldo GOPAY Customer
                </h3>
            </a>
            <a class="cursor-pointer" href="id/saldo-dana.html">
                <h3 class=" text-xs t-title">
                    E-MONEY Saldo DANA
                </h3>
            </a>
            <a class="cursor-pointer" href="id/saldo-shopeepay.html">
                <h3 class=" text-xs t-title">
                    E-MONEY Saldo ShopeePay
                </h3>
            </a>
            <a class="cursor-pointer" href="id/voucher-grab-driver.html">
                <h3 class=" text-xs t-title">
                    E-MONEY Voucher Grab Driver
                </h3>
            </a>
            <a class="cursor-pointer" href="id/mangatoon-coins.html">
                <h3 class=" text-xs t-title">
                    HIBURAN MangaToon Coins
                </h3>
            </a>
            <a class="cursor-pointer" href="id/lita-coins.html">
                <h3 class=" text-xs t-title">
                    HIBURAN Lita Coins
                </h3>
            </a>
            <a class="cursor-pointer" href="id/mango-live-diamonds.html">
                <h3 class=" text-xs t-title">
                    HIBURAN Mango Live Diamonds
                </h3>
            </a>
            <a class="cursor-pointer" href="id/sugar-live-diamonds.html">
                <h3 class=" text-xs t-title">
                    HIBURAN Sugar Live Diamonds
                </h3>
            </a>
            <a class="cursor-pointer" href="pricelist.html">
                <h3 class=" text-xs t-title">
                    Pricelist
                </h3>
            </a>
            <a class="cursor-pointer" href="blog.html">
                <h3 class=" text-xs t-title">
                    Promo & News
                </h3>
            </a>
            <a class="cursor-pointer" href="contact-us.html">
                <h3 class=" text-xs t-title">
                    Contact Us
                </h3>
            </a>
            <a class="cursor-pointer" href="about-us.html">
                <h3 class=" text-xs t-title">
                    About Us
                </h3>
            </a>
        </div>
    </div> --}}
</div>
@endsection

@section('script')
<div v-if="showModal" id="modal" class="fixed z-[999]  inset-0 overflow-y-auto" aria-labelledby="dialog-1-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center h-screen pt-4 px-4 pb-20 text-center">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transdiv transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full animate__animated animate__fadeInUp">
            <div class="rounded-lg min-w-[300px]">
                <div class="grid grid-cols-3 md:grid-cols-4 gap-4 p-3 mb-4">
                    <a :href="pr.slug" v-for="(pr, i) in selectedJenis" :key="i" class=" bg-white rounded-lg shadow-md" v-show="pr.status===1">
                        <img :src="pr.icon" alt="" class="rounded-t-lg mb-2 w-full object-cover">
                        <p class="t-title text-xs p-2">
                            @{{ pr.name }}
                        </p>
                    </a>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end mx-auto gap-3">
                    <button @click.prevent="showModal=false" type="button" class=" w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700  ">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div v-if="showPopup" id="modal" class="fixed z-[999]  inset-0 overflow-y-auto" aria-labelledby="dialog-1-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center h-screen pt-4 px-4 pb-20 text-center">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom overflow-hidden transdiv transition-all animate__animated animate__fadeInUp">
            <img :src="promo.image" class="h-[380]" alt="">
            <button @click.prevent="showPopup=false" class="bg-primary h-8 w-8 mt-4 text-white rounded-full">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
</div>
<script src="{{ asset('js/game.js') }}"></script>
@endsection