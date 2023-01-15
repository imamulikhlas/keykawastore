@extends('layouts.master')
@section('title')
Keykawa Store - Mobile Legends
@endsection

@section('header')
<script src="https://ssense.github.io/vue-carousel/js/vue-carousel.min.js"></script>
@endsection

@section('additional-install')
<style>
    div#vs1__combobox {
        height: 42px !important;
    }

    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>
@endsection

@section('content')
<div class="p-4 flex flex-wrap gap-2 bg-slate-50 rounded-t-lg -mt-8">
    <img :src="jenis.cover" alt="" class="rounded-lg">
    <div class="rounded-b-lg -mt-6 bg-white shadow-md mb-4 w-full p-3">
        <div class="w-full -mt-14">
            <img src="https://assets.jajangame.com/2022/11/9ef252294c4a6f9c39cb3a44926b5c9a.png" style="width: 80px"
                class="mx-auto rounded-lg shadow" alt="">
        </div>
        <div class="text-lg text-center w-full t-title  my-4">
            Mobile Legends
        </div>
        <div class="text-center mb-4 text-sm">
            <span class=" text-secondary mx-auto mr-3">
                <i class="fas fa-clock"></i>
                Proses Instan
            </span>
            <span class=" text-secondary mx-auto">
                <i class="fas fa-paper-plane"></i>
                Dikirim Otomatis
            </span>
        </div>
        <p class="mt-4 text-sm text-gray-500">
        <p>Top Up Diamond Mobile Legends MLBB Resmi Moonton! Pilihan produk dan pembayaran lengkap, harga
            termurah, proses cepat, aman, dan terpercaya!</p>
        <p>&nbsp;</p>
        <p>Cara Top Up Mobile Legends:</p>
        <p>1. Masukkan <strong>User ID + (Server ID)</strong><br>2. Pilih <strong>Produk </strong>yang
            diinginkan<br>3. Pilih <strong>Metode Pembayaran</strong><br>4. Masukkan <strong>Email
            </strong>kamu</p>
        <p>5. Masukkan <strong>Nomor WhatsApp</strong><br>6. Klik <strong>BELI </strong>dan Lakukan
            Pembayaran</p>
        <p style="text-align:center;">&nbsp;</p>
        <p style="text-align:center;"><span style="color:hsl(0,75%,60%);"><strong>PROSES
                    OTOMATIS</strong></span><br><span style="color:hsl(0,75%,60%);"><strong>LAYANAN INI
                    AKTIF 24 JAM</strong></span></p>
        </p>
        <div class="w-full text-center">
            <span class="text-red-500 text-sm t-title mx-auto">
                @{{ isOpen(jenis.open_hour, jenis.close_hour) === 'OPEN' ? '' : 'PRODUK SEDANG CLOSED' }}
            </span>
        </div>
    </div>
    <form class="w-full">
        <div class="rounded-lg bg-white shadow-md mb-4 animate__animated animate__fadeInUp">
            <h1 class="py-2 border-b p-3 t-title font-bold">Masukan Data Akun</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 p-3 gap-3">
                <div v-for="(f,i) in form.default" :key="i" v-show="!form.custom.length">
                    <div v-if="f.label.length">
                        <label for="" class="text-xs">@{{ f.label }}</label>
                        <input v-if="!f.is_dropdown" required
                            class="w-full block border p-2 rounded-md focus:outline-none focus:border-secondary"
                            :type="f.tipe" v-model="order[f.name]" />
                        <div v-if="f.is_dropdown">
                            <v-select v-model="selectedServer" :options="f.data" label="name" style="z-index: 9999">
                                <template #list-header>
                                    <li class="text-left text-primary px-5">Ketik untuk pencarian</li>
                                </template>
                            </v-select>
                        </div>
                    </div>
                </div>
                <div v-for="(f,i) in form.custom" :key="i" v-if="form.custom.length">
                    <label for="" class="text-xs">@{{ f.label }}</label>
                    <input v-if="!f.is_dropdown&&f.tipe!=='password'" required
                        class="w-full block border p-2 rounded-md focus:outline-none focus:border-secondary"
                        :type="f.tipe" v-model="additionalData[f.name]" />
                    <div v-if="!f.is_dropdown&&f.tipe==='password'" class="relative w-full">
                        <input required :id="additionalData[f.name]"
                            class="w-full block border p-2 rounded-md focus:outline-none focus:border-secondary"
                            :type="f.tipe" v-model="additionalData[f.name]" />
                        <button class="absolute top-0 right-3 h-10 flex items-center"
                            @click.prevent="showPass(additionalData[f.name])">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <select v-if="f.is_dropdown" required
                        class="w-full block border p-2 rounded-md focus:outline-none focus:border-secondary" type="text"
                        v-model="additionalData[f.name]">
                        <option value="" selected disabled>Pilih @{{ f.label }}</option>
                        <option v-for="(sl, i) in f.data" :value="sl.value">@{{ sl.name }}</option>
                    </select>
                </div>
            </div>
            <div class="px-3 -mt-2 mb-2"
                v-if="selectedProduct.tipe===2&&selectedProduct.kode_produk.toLowerCase().includes('hago')">
                <label for="" class="text-xs">Jumlah Item</label>
                <div class="flex">
                    <button class="h-8 w-6 rounded-l bg-primary text-white"
                        @click.prevent="order.jumlah_item--">-</button>
                    <input class="w-8 border text-center focus:outline-none text-xs h-8" type="number" min="1"
                        v-model="order.jumlah_item">
                    <button class="h-8 w-6 rounded-r bg-primary text-white"
                        @click.prevent="order.jumlah_item++">+</button>
                </div>
            </div>
            <div v-if="operator.helper_image" class="px-3 py-1">
                <button @click.prevent="showPetunjuk=true" class="text-xs px-4 py-2 rounded-md bg-primary text-white">
                    <i class="fas fa-info-circle"></i>
                    Petunjuk</button>
            </div>
            <div class="px-3 mb-2" v-if="filteredHistory.length">
                <span class="text-xs">Transaksi Terakhir</span>
                <div class="mt-1 grid grid-cols-3 gap-2">
                    <div v-for="(f,i) in filteredHistory.slice(0,5)" :key="i"
                        class="p-2 rounded-lg text-sm border cursor-pointer"
                        :class="f.user_id === order.user_id ? 'border-secondary' : ''"
                        @click.prevent="selectHistory(f)">
                        @{{ f.user_id }}
                    </div>
                </div>
            </div>
            <div class="px-3 pb-3 mt-3">
                <p v-html="jenis.helper_html" class="mt-4 text-xs text-gray-600">
            </div>
        </div>
        <div v-if="product[0].tipe===1" class="rounded-lg bg-white shadow-md mb-4 animate__animated animate__fadeInUp">
            <h1 class="py-2 border-b p-3 t-title font-bold">Pilih Nominal Produk</h1>
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 p-3 gap-3">
                <div v-for="(pr,i) in product" :key="i" @click.prevent="pr.status !== 0 ? selectedProduct=pr : ''"
                    :class="pr.id === order.produk_id ? 'border-secondary ' : ''"
                    class=" relative cursor-pointer hover:bg-gray-100 border-2 rounded-lg">
                    <div :class="pr.status === 0 ? 'bg-gray-100' : ''" class="p-2">
                        <div class="gap-2 flex justify-between">
                            <div>
                                <div v-if="pr.tipe === 2" class="flex justify-start">
                                    <p class="text-xs text-green-500">Pascabayar</p>
                                </div>
                                <span v-if="pr.tipe===1" class="block text-xs">@{{ pr.harga | rupiah
                                    }}</span>
                                <p class="text-xs font-bold">@{{ pr.name }}</p>
                            </div>
                            <div class="flex items-center w-[80px] justify-center">
                                <img :src="pr.icon" class="h-6 w-auto" alt="">
                            </div>
                            <div class="absolute bottom-0 right-0 " v-if="pr.id === order.produk_id">
                                <div class="py-1 px-2 bg-secondary rounded-br-md rounded-tl-md text-white
                            ">
                                    <i class="fas fa-check text-xs"></i>
                                </div>
                            </div>
                        </div>
                        <div v-if="pr.status === 0" class="flex justify-end">
                            <p class="text-xs text-red-500">Gangguan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="rounded-lg bg-white shadow-md mb-4 animate__animated animate__fadeInUp">
            <h1 class="py-2 border-b p-3 t-title font-bold">Pilih Metode Pembayaran</h1>
            <div>
                <div class="grid grid-cols-1 p-4 gap-3 cursor-pointer ">
                    <div v-for="(pay,i) in sortedPayment" :key="i" class="border-2 rounded-lg">
                        <div @click.prevent="selectedPayment.name&&selectedPayment.name===pay.kategori.name?selectedPayment={}:selectedPayment=pay.kategori"
                            class="py-2 flex border-b-2 p-2 rounded-t-lg justify-between items-center cursor-pointer font-bold">
                            <span class="text-sm">@{{ pay.kategori.name }}</span>
                            <i class="fas  text-gray-500"
                                :class="selectedPayment.id === pay.kategori.id ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
                        </div>
                        <div @click.prevent="selectedPayment=pay.kategori" class="p-2 flex gap-3 flex-wrap"
                            v-if="selectedPayment.id!==pay.kategori.id">
                            <div v-for="(mt, i) in pay.metode">
                                <img :src="mt.icon" class="h-4" alt="">
                            </div>
                        </div>
                        <div v-show="selectedPayment.id===pay.kategori.id"
                            class="grid grid-cols-1 md:grid-cols-2 gap-3 p-3">
                            <div v-for="(mt, i) in pay.metode" class="p-3 w-full relative rounded-lg border-2"
                                @click.prevent="isOpen(mt.open_hour, mt.close_hour) === 'OPEN'?selectPay(mt):''" :class="mt.id_metode === order.metode_id ? 'border-secondary' : isOpen(mt.open_hour, mt
                                .close_hour) === 'CLOSED' ? 'bg-gray-100' : ''">
                                <div class="flex justify-between items-center w-full py-2">
                                    <div>
                                        <img :src="mt.icon" class="h-4" :class="isOpen(mt.open_hour, mt
                                            .close_hour) === 'CLOSED' ? 'grayscale' : ''" alt="">
                                    </div>
                                    <div v-if="selectedProduct.tipe===1" class="text-sm">
                                        @{{ selectedProduct.harga + mt.biaya_admin + (mt.biaya_persen / 100 *
                                        selectedProduct.harga) | rupiah }}
                                    </div>
                                </div>
                                <div class="flex justify-between items-center border-t py-2 w-full">
                                    <div class="flex gap-x-4 mt-2">
                                        <span class="text-xs block px-2 py-1 rounded-md border" :class="isOpen(mt.open_hour, mt.close_hour) === 'OPEN' ?
                                            'text-green-500 border-green-500' :
                                            'text-red-500 border-red-500'">
                                            @{{ isOpen(mt.open_hour, mt.close_hour) }}
                                        </span>
                                    </div>
                                    <div class="text-sm text-right w-full">
                                        @{{ mt.name }}
                                    </div>
                                </div>
                                <div class="absolute bottom-0 right-0 " v-if="mt.id_metode === order.metode_id ">
                                    <div class="py-1 px-2 bg-secondary rounded-br-md rounded-tl-md text-white
                    ">
                                        <i class="fas fa-check text-xs"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="rounded-lg bg-white shadow-md mb-4 animate__animated animate__fadeInUp">
            <h1 class="py-2 border-b p-3 t-title font-bold">Masukan Email & HP</h1>
            <div class="grid grid-cols-1 p-3 gap-3">
                <div>
                    <label for="" class="text-sm">Email</label>
                    <input required :disabled="me.user_code" :class="me.user_code ? 'bg-gray-200 text-gray-500' : ''"
                        class="w-full block mt-1 border p-2 rounded-md focus:outline-none focus:border-secondary "
                        type="email" v-model="order.email">
                </div>
                <div>
                    <label for="" class="text-sm">Nomor HP</label>
                    <input required :disabled="me.user_code" :class="me.user_code ? 'bg-gray-200 text-gray-500' : ''"
                        class="w-full block mt-1 border p-2 rounded-md focus:outline-none focus:border-secondary "
                        type="number" v-model="order.hp">
                    <span class="text-xs text-gray-500">* Format Nomor yang digunakan adalah
                        08XXXXXXX</span>
                </div>
            </div>
        </div>
        <div class="h-24"></div>
        <div v-if="isOpen(jenis.open_hour, jenis.close_hour)==='OPEN'" class="fixed bottom-0 left-0 w-full bg-primary">
            <div class="max-w-[600px] mx-auto flex justify-between items-center h-[60px] p-3">
                <div>
                    <span class="text-xs block text-white">Total</span>
                    <span v-if="selectedProduct.tipe===1" class="font-bold t-title text-white text-lg">
                        @{{ total | rupiah }}
                    </span>
                    <span v-else class="font-bold t-title text-white text-lg">
                        Rp0
                    </span>
                </div>
                <button @click.prevent="validasiOrder()" type="button" :disabled="loading"
                    class="px-6 py-2 rounded-md bg-secondary text-white">
                    <i class="fas fa-spinner animate animate-spin" v-if="loading"></i>
                    <i class="fas fa-shopping-cart" v-else></i>
                    Beli
                </button>
                </form>
            </div>
        </div>
</div>
</div>

<div v-if="showAcc" id="modal" class="fixed z-[999] inset-0 overflow-y-auto" aria-labelledby="dialog-1-title"
    role="dialog" aria-modal="true">
    <div class="flex items-center justify-center h-screen pt-4 px-4 pb-20 text-center">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <form @submit.prevent="validasiOtp"
            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full animate__animated animate__fadeInUp">
            <div class="rounded-lg bg-white mb-4 min-w-[300px]">
                <h1 class="py-2 border-b p-3 t-title font-bold">Detail Pesanan</h1>
                <div class="p-4" v-if="dataAcc.is_valid">
                    <div class="w-full py-2 border-b text-center">
                        @{{ dataAcc.username }}
                    </div>
                    <div class="flex justify-between py-2 border-b">
                        <div>ID</div>
                        <div>@{{ order.user_id }}</div>
                    </div>
                    <div class="flex justify-between py-2 border-b">
                        <div>Metode</div>
                        <div>@{{ selectedMetode.name }}</div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end mx-auto gap-3">
                    <button @click.prevent="showAcc=false,loading=false" type="button"
                        class=" w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700  ">
                        Batalkan
                    </button>
                    <button type="button" @click.prevent="submitOrder" :disabaled="loadingNext"
                        class=" w-full inline-flex justify-center items-center gap-2 rounded-md border bg-primary shadow-sm px-4 py-2 text-base font-medium text-white  focus:outline-none">
                        <i class="fas fa-spinner animate animate-spin" v-if="loadingNext"></i>
                        Lanjutkan
                    </button>
                </div>
        </form>
    </div>
</div>
</div>
<div v-if="showPetunjuk" id="modal" class="fixed z-[999] inset-0 overflow-y-auto" aria-labelledby="dialog-1-title"
    role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <form @submit.prevent="validasiOtp"
            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full animate__animated animate__fadeInUp">
            <img :src="operator.helper_image" class="w-full" alt="">
            <div class="bg-gray-50 px-4 py-3 flex justify-end mx-auto gap-3">
                <button @click.prevent="showPetunjuk=false" type="button"
                    class=" w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700  ">
                    Tutup
                </button>
            </div>
        </form>
    </div>
</div>
<div v-if="showAccPasca" id="modal" class="fixed z-[999] inset-0 overflow-y-auto" aria-labelledby="dialog-1-title"
    role="dialog" aria-modal="true">
    <div class="flex items-center justify-center h-screen pt-4 px-4 pb-20 text-center">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <form @submit.prevent="validasiOtp"
            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full animate__animated animate__fadeInUp">
            <div class="rounded-lg bg-white mb-4 min-w-[300px]">
                <h1 class="py-2 border-b p-3 t-title font-bold">Detail Tagihan</h1>
                <div class="p-4">
                    <div class="w-full py-2 border-b text-center">
                        @{{ accPasca.customer_name }}
                    </div>
                    <div class="flex justify-between py-2 border-b">
                        <div>Total Bayar</div>
                        <div>@{{ accPasca.price_with_margin | rupiah }}</div>
                    </div>
                    <div class="flex justify-between py-2 border-b">
                        <div>Deskripsi</div>
                        <div>@{{ accPasca.deskripsi }}</div>
                    </div>
                    <div class="flex justify-between py-2 border-b">
                        <div>Metode</div>
                        <div>@{{ selectedMetode.name }}</div>
                    </div>
                    <div class="flex justify-between py-2 border-b font-bold">
                        <div>Total Bayar</div>
                        <div>
                            @{{ accPasca.price_with_margin + selectedMetode.biaya_admin +
                            (selectedMetode.biaya_persen / 100 * accPasca.price_with_margin) | rupiah }}
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end mx-auto gap-3">
                    <button @click.prevent="showAccPasca=false,loading=false" type="button"
                        class=" w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700  ">
                        Batalkan
                    </button>
                    <button type="button" @click.prevent="submitOrder" :disabaled="loadingNext"
                        class=" w-full inline-flex justify-center items-center gap-2 rounded-md border bg-primary shadow-sm px-4 py-2 text-base font-medium text-white  focus:outline-none">
                        <i class="fas fa-spinner animate animate-spin" v-if="loadingNext"></i>
                        Lanjutkan
                    </button>
                </div>
        </form>
    </div>
</div>
</div>
<div v-if="showOtp" id="modal" class="fixed z-[999]  inset-0 overflow-y-auto" aria-labelledby="dialog-1-title"
    role="dialog" aria-modal="true">
    <div class="flex items-center justify-center h-screen pt-4 px-4 pb-20 text-center">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <form @submit.prevent="validasiOtp"
            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full animate__animated animate__fadeInUp">
            <div class="text-center py-4 t-title">
                Masukkan OTP
            </div>
            <div class="w-full text-center text-sm p-4">
                @{{ otpMessage }}
            </div>
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div>
                    <input type="text" v-model="otp"
                        class="w-full border-b focus:outline-none text-center text-4xl font-bold">
                </div>
                <div v-if="!showTimeOtp" class="w-full text-center py-6 text-sm">
                    Tidak mendapatkan OTP
                    <button class="text-secondary underline font-bold" @click.prevent="requestOtp">Kirim Ulang
                        OTP</button>
                </div>
                <div v-else class="w-full text-center">
                    <vue-countdown :time="timeotp" v-slot="{ days, hours, minutes, seconds }"
                        class="w-full text-center py-6 text-sm">
                        Kirim Ulang OTP dalam @{{ seconds }} detik
                    </vue-countdown>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 flex justify-end mx-auto gap-3">
                <button @click.prevent="showOtp=false, loading=false" type="button"
                    class=" w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700  ">
                    Tutup
                </button>
                <button type="submit" :disabled="loadingOtp"
                    class=" w-full inline-flex items-center gap-2 justify-center rounded-md border bg-primary shadow-sm px-4 py-2 text-base font-medium text-white  focus:outline-none">
                    <i class="fas fa-spinner animate animate-spin" v-if="loadingOtp"></i>
                    Validasi
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('js/vue-toastr.js') }}"></script>
<script src="{{ asset('js/lodash.js') }}"></script>
<script src="{{ asset('js/vue-countdown.js') }}"></script>
<script src="{{ asset('js/moment.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/moment-timezone@0.5.39/moment-timezone.js"></script>
<script src="https://unpkg.com/vue-select@latest"></script>
<link rel="stylesheet" href="https://unpkg.com/vue-select@latest/dist/vue-select.css">
<script>
    Vue.component('v-select', VueSelect.VueSelect)
    const app = new Vue({
        el: "#app",
        components: {
            VueCountdown,
        },
        filters: {
            rupiah(v) {
                if (v > 0) {
                    const val = (v / 1).toFixed(0).replace('.', ',')
                    return "Rp" + val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                } else {
                    return "Rp0"
                }
            }
        },
        computed: {
            nowDate() {
                return Math.floor(Date.now() / 1000)
            },
            total() {
                let total = this.selectedProduct.harga + this.selectedMetode.biaya_admin
                let persen = this.selectedMetode.biaya_persen / 100 * this.selectedProduct.harga
                let subtotal = total + persen
                return subtotal
            },
            finalAdditionalData() {
                if (this.selectedProduct.tipe === 1) {
                    const dt = []
                    for (let property in this.additionalData) {
                        const p = '{"key":"' + property.toLowerCase() + '","value":"' + this.additionalData[
                            property] +
                            '"}'
                        dt.push(JSON.parse(p));
                    }
                    return dt
                } else if (this.selectedProduct.tipe === 2) {
                    return {
                        jumlah_item: this.order.jumlah_item
                    }
                } else {
                    return null
                }
            },
            sortedPayment() {
                let payment = _.sortBy(this.payment,
                    [function (o) {
                        return o.kategori.sort;
                    }]);
                return payment
            }
        },
        data() {
            return {
                selectedServer: {},
                history: [],
                filteredHistory: [],
                showOtp: false,
                showPetunjuk: false,
                showLoader: true,
                showAcc: false,
                loading: false,
                loadingOtp: false,
                loadingNext: false,
                operator: [],
                payment: [],
                jenis: [],
                product: [],
                form: [],
                me: {},
                selectedProduct: {
                    harga: 0,
                    kode_produk: ''
                },
                selectedPayment: {},
                selectedMetode: {
                    biaya_admin: 0,
                    biaya_persen: 0,
                },
                otp: '',
                timeotp: '',
                otpMessage: '',
                showTimeOtp: false,
                uid: '',
                dataAcc: {},
                additionalData: {},
                order: {
                    produk_id: '',
                    metode_id: '',
                    server_id: '',
                    user_id: '',
                    email: '',
                    hp: '',
                    additional_data: '',
                    jumlah_item: 1,
                    trx_id: ''
                },
                contact: [],
                showAccPasca: false,
                accPasca: {}
            };
        },
        watch: {
            selectedServer: {
                handler(v) {
                    if (v !== '' && v !== null) {
                        this.order.server_id = v.value
                    } else {
                        this.order.server_id = ''
                    }
                },
            },
            selectedProduct: {
                handler(r) {
                    this.order.produk_id = r.id
                },
                deep: true
            },
            order: {
                handler(r) {
                    this.order.user_id = r.user_id.replaceAll(/[^a-zA-Z0-9# ]/g, '')
                    if (r.hp.length > 5) {
                        let formatted = r.hp.replace(/\D/g, '');
                        if (formatted.startsWith('62')) {
                            this.order.hp = '0' + formatted.substr(2);
                        }
                        if (formatted.startsWith('+62')) {
                            this.order.hp = '0' + formatted.substr(2);
                        }
                    }
                },
                deep: true
            }
        },
        mounted() {
            moment.tz.add(
                "Asia/Jakarta|LMT BMT +0720 +0730 +09 +08 WIB|-77.c -77.c -7k -7u -90 -80 -70|012343536|-49jH7.c 2hiLL.c luM0 mPzO 8vWu 6kpu 4PXu xhcu|31e6"
            )
            this.operator = JSON.parse("{\"name_operator\":\"Mobile Legends\",\"format_form\":\"{\\\"default\\\":[{\\\"name\\\":\\\"user_id\\\",\\\"label\\\":\\\"User ID\\\",\\\"is_dropdown\\\":0,\\\"data\\\":[],\\\"tipe\\\":\\\"number\\\"},{\\\"name\\\":\\\"server_id\\\",\\\"label\\\":\\\"Server ID\\\",\\\"is_dropdown\\\":0,\\\"data\\\":[],\\\"tipe\\\":\\\"number\\\"}],\\\"custom\\\":[]}\",\"icon_operator\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/9ef252294c4a6f9c39cb3a44926b5c9a.png\",\"helper_text\":\"<p>Top Up Diamond Mobile Legends MLBB Resmi Moonton! Pilihan produk dan pembayaran lengkap, harga termurah, proses cepat, aman, dan terpercaya!<\\\/p><p>&nbsp;<\\\/p><p>Cara Top Up Mobile Legends:<\\\/p><p>1. Masukkan <strong>User ID + (Server ID)<\\\/strong><br>2. Pilih <strong>Produk <\\\/strong>yang diinginkan<br>3. Pilih <strong>Metode Pembayaran<\\\/strong><br>4. Masukkan <strong>Email <\\\/strong>kamu<\\\/p><p>5. Masukkan <strong>Nomor WhatsApp<\\\/strong><br>6. Klik <strong>BELI <\\\/strong>dan Lakukan Pembayaran<\\\/p><p style=\\\"text-align:center;\\\">&nbsp;<\\\/p><p style=\\\"text-align:center;\\\"><span style=\\\"color:hsl(0,75%,60%);\\\"><strong>PROSES OTOMATIS<\\\/strong><\\\/span><br><span style=\\\"color:hsl(0,75%,60%);\\\"><strong>LAYANAN INI AKTIF 24 JAM<\\\/strong><\\\/span><\\\/p>\",\"helper_image\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/16fa66dc4cb4261c5897adc0c99c4340.png\",\"cek_username\":\"mobilelegend\",\"status\":1}")
            this.payment = JSON.parse("[{\"kategori\":{\"id\":2,\"name\":\"Saldo\",\"sort\":1},\"metode\":[{\"id_metode\":1,\"name\":\"Saldo Akun\",\"icon\":\"https:\\\/\\\/d1nhio0ox7pgb.cloudfront.net\\\/_img\\\/g_collection_png\\\/standard\\\/512x512\\\/wallet.png\",\"min\":1,\"max\":5000000,\"status\":1,\"biaya_admin\":0,\"biaya_persen\":0,\"open_hour\":\"00:00:00\",\"close_hour\":\"00:00:00\"}]},{\"kategori\":{\"id\":6,\"name\":\"Minimarket\",\"sort\":5},\"metode\":[{\"id_metode\":16,\"name\":\"ALFAMART\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/e9b69a15c9ed8ed5a38e2758a6ca8edf.png\",\"min\":10000,\"max\":2500000,\"status\":1,\"biaya_admin\":6000,\"biaya_persen\":0,\"open_hour\":\"00:01:00\",\"close_hour\":\"23:59:00\"},{\"id_metode\":17,\"name\":\"INDOMARET\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/8b931dd40bd45880d0eb9618cb48b467.png\",\"min\":10000,\"max\":2500000,\"status\":1,\"biaya_admin\":3500,\"biaya_persen\":0,\"open_hour\":\"00:00:00\",\"close_hour\":\"00:00:00\"},{\"id_metode\":18,\"name\":\"ALFAMIDI\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/e9194b3e405cb2b0423702ef51890d26.png\",\"min\":5000,\"max\":2500000,\"status\":1,\"biaya_admin\":6000,\"biaya_persen\":0,\"open_hour\":\"00:01:00\",\"close_hour\":\"23:59:00\"}]},{\"kategori\":{\"id\":8,\"name\":\"Virtual Account\",\"sort\":4},\"metode\":[{\"id_metode\":19,\"name\":\"BRIVA\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/1c40713ce25f8bc5f5899729a91a85f7.png\",\"min\":9999,\"max\":5000000,\"status\":1,\"biaya_admin\":4250,\"biaya_persen\":0,\"open_hour\":\"00:00:00\",\"close_hour\":\"00:00:00\"},{\"id_metode\":20,\"name\":\"BNI VA\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/a730f21f74ee709f70d8e7958d819e0f.png\",\"min\":9999,\"max\":5000000,\"status\":1,\"biaya_admin\":4250,\"biaya_persen\":0,\"open_hour\":\"00:01:00\",\"close_hour\":\"23:59:00\"},{\"id_metode\":21,\"name\":\"MANDIRI VA\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/b1a733f32b4278ba2d4e3881057639f6.png\",\"min\":10000,\"max\":5000000,\"status\":1,\"biaya_admin\":4250,\"biaya_persen\":0,\"open_hour\":\"00:01:00\",\"close_hour\":\"23:59:00\"},{\"id_metode\":22,\"name\":\"Permata VA\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/b020b2d72ed64bf98cc48c8f64d6d8cb.png\",\"min\":10000,\"max\":5000000,\"status\":1,\"biaya_admin\":4250,\"biaya_persen\":0,\"open_hour\":\"00:01:00\",\"close_hour\":\"23:59:00\"},{\"id_metode\":23,\"name\":\"CIMBNIAGA VA\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/93b1b044dc5c73c5cd3873bdf511c6ad.png\",\"min\":10000,\"max\":5000000,\"status\":1,\"biaya_admin\":4250,\"biaya_persen\":0,\"open_hour\":\"00:01:00\",\"close_hour\":\"23:59:00\"},{\"id_metode\":24,\"name\":\"Bank Syariah Indonesia VA\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/84d826404afd609fdfb8522f3081e656.png\",\"min\":10000,\"max\":5000000,\"status\":1,\"biaya_admin\":4250,\"biaya_persen\":0,\"open_hour\":\"00:01:00\",\"close_hour\":\"23:59:00\"},{\"id_metode\":25,\"name\":\"Sinarmas VA\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/6001198d5186599b58eb4287bedafcee.png\",\"min\":9999,\"max\":5000000,\"status\":1,\"biaya_admin\":4250,\"biaya_persen\":0,\"open_hour\":\"00:01:00\",\"close_hour\":\"23:59:00\"},{\"id_metode\":26,\"name\":\"Maybank VA\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/79229c6d51f295f5ac9a4c5dfbbf1560.png\",\"min\":9999,\"max\":5000000,\"status\":1,\"biaya_admin\":4250,\"biaya_persen\":0,\"open_hour\":\"00:01:00\",\"close_hour\":\"23:59:00\"},{\"id_metode\":32,\"name\":\"NeoBANK VA\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/58d8a9ad6bd47104d9c7e089c35eb7af.png\",\"min\":10000,\"max\":5000000,\"status\":1,\"biaya_admin\":4250,\"biaya_persen\":0,\"open_hour\":\"00:01:00\",\"close_hour\":\"23:59:00\"},{\"id_metode\":37,\"name\":\"BCA VA\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/e7a792c304e3992c59ca76301ce0232e.png\",\"min\":10000,\"max\":10000000,\"status\":1,\"biaya_admin\":5500,\"biaya_persen\":0,\"open_hour\":\"00:01:00\",\"close_hour\":\"23:59:00\"}]},{\"kategori\":{\"id\":7,\"name\":\"E-Wallet \\\/ Uang Digital\",\"sort\":3},\"metode\":[{\"id_metode\":28,\"name\":\"QRIS (Support All Payment)\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/7fbd34d7904c434646d9f60a15da8b7c.png\",\"min\":99,\"max\":5000000,\"status\":1,\"biaya_admin\":0,\"biaya_persen\":0.78,\"open_hour\":\"00:01:00\",\"close_hour\":\"23:59:00\"},{\"id_metode\":29,\"name\":\"OVO (+3%)\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/8d5f9a98e61b38908803133382f90561.png\",\"min\":1000,\"max\":5000000,\"status\":1,\"biaya_admin\":0,\"biaya_persen\":0,\"open_hour\":\"00:01:00\",\"close_hour\":\"23:59:00\"},{\"id_metode\":30,\"name\":\"ShopeePay (+3%)\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/3085b39567b288f153f879994b086d91.png\",\"min\":1000,\"max\":5000000,\"status\":1,\"biaya_admin\":0,\"biaya_persen\":0,\"open_hour\":\"00:01:00\",\"close_hour\":\"23:59:00\"},{\"id_metode\":31,\"name\":\"DANA\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/02494946ed40bbfe608877fc30a9bb6d.png\",\"min\":1000,\"max\":5000000,\"status\":1,\"biaya_admin\":0,\"biaya_persen\":1.7,\"open_hour\":\"00:01:00\",\"close_hour\":\"23:59:00\"},{\"id_metode\":33,\"name\":\"LinkAja\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/902b26758be17ae1b85b253b3424d2b9.png\",\"min\":100,\"max\":2000000,\"status\":1,\"biaya_admin\":0,\"biaya_persen\":3,\"open_hour\":\"00:01:00\",\"close_hour\":\"23:59:00\"}]},{\"kategori\":{\"id\":1,\"name\":\"Bank Transfer\",\"sort\":2},\"metode\":[{\"id_metode\":36,\"name\":\"BCA (Dicek 3 Menit)\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/c1067cd58b78e9118d2ecf8afefa253c.png\",\"min\":9999,\"max\":20000000,\"status\":1,\"biaya_admin\":0,\"biaya_persen\":0,\"open_hour\":\"03:00:00\",\"close_hour\":\"22:00:00\"}]}]")
            this.jenis = JSON.parse("{\"name\":\"Mobile Legends\",\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/11\\\/9ef252294c4a6f9c39cb3a44926b5c9a.png\",\"cover\":\"https:\\\/\\\/assets.jajangame.com\\\/2023\\\/01\\\/82b149d0973e91c22314f3e3745a2834.png\",\"helper_html\":\"\",\"estimasi_pengiriman\":\"Proses Instan\",\"is_otomatis\":1,\"open_hour\":\"00:01:00\",\"close_hour\":\"23:59:00\",\"status\":1}")
            this.form = JSON.parse("{\"default\":[{\"name\":\"user_id\",\"label\":\"User ID\",\"is_dropdown\":0,\"data\":[],\"tipe\":\"number\"},{\"name\":\"server_id\",\"label\":\"Server ID\",\"is_dropdown\":0,\"data\":[],\"tipe\":\"number\"}],\"custom\":[]}")
            this.product = JSON.parse("[{\"id\":108,\"kode_produk\":\"MLTP\",\"name\":\"Twilight Pass\",\"harga\":130595,\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/79172d58a55cbd3b2987366cea9ff74c.png\",\"status\":1,\"tipe\":1,\"poin\":0},{\"id\":401,\"kode_produk\":\"MLDB5\",\"name\":\"5 Diamonds\",\"harga\":1590,\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/faaeddbd454516a5c21330bcf32f59dc.png\",\"status\":1,\"tipe\":1,\"poin\":0},{\"id\":922,\"kode_produk\":\"MLD14\",\"name\":\"14 Diamonds (13 + 1 Bonus)\",\"harga\":3690,\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/faaeddbd454516a5c21330bcf32f59dc.png\",\"status\":1,\"tipe\":1,\"poin\":0},{\"id\":923,\"kode_produk\":\"MLD28\",\"name\":\"28 Diamonds (26 + 2 Bonus)\",\"harga\":7390,\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/faaeddbd454516a5c21330bcf32f59dc.png\",\"status\":1,\"tipe\":1,\"poin\":0},{\"id\":924,\"kode_produk\":\"MLD42\",\"name\":\"42 Diamonds (39 + 3 Bonus)\",\"harga\":10590,\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/faaeddbd454516a5c21330bcf32f59dc.png\",\"status\":1,\"tipe\":1,\"poin\":0},{\"id\":927,\"kode_produk\":\"MLD70\",\"name\":\"70 Diamond (64 + 6 Bonus)\",\"harga\":17500,\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/faaeddbd454516a5c21330bcf32f59dc.png\",\"status\":1,\"tipe\":1,\"poin\":0},{\"id\":925,\"kode_produk\":\"ML86\",\"name\":\"86 Diamonds (78 + 8 Bonus)\",\"harga\":19735,\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/faaeddbd454516a5c21330bcf32f59dc.png\",\"status\":1,\"tipe\":1,\"poin\":0},{\"id\":104,\"kode_produk\":\"ML172\",\"name\":\"172 Diamonds (156 + 16 Bonus)\",\"harga\":39140,\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/faaeddbd454516a5c21330bcf32f59dc.png\",\"status\":1,\"tipe\":1,\"poin\":0},{\"id\":103,\"kode_produk\":\"ML257\",\"name\":\"257 Diamonds (234 + 23 Bonus)\",\"harga\":58845,\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/faaeddbd454516a5c21330bcf32f59dc.png\",\"status\":1,\"tipe\":1,\"poin\":0},{\"id\":105,\"kode_produk\":\"ML344\",\"name\":\"344 Diamonds (312 + 32 Bonus)\",\"harga\":78255,\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/faaeddbd454516a5c21330bcf32f59dc.png\",\"status\":1,\"tipe\":1,\"poin\":0},{\"id\":106,\"kode_produk\":\"ML429\",\"name\":\"429 Diamonds (390 + 39 Bonus)\",\"harga\":97960,\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/faaeddbd454516a5c21330bcf32f59dc.png\",\"status\":1,\"tipe\":1,\"poin\":0},{\"id\":107,\"kode_produk\":\"ML514\",\"name\":\"514 Diamonds (468 + 46 Bonus)\",\"harga\":117660,\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/3218e38e7ca25550f4bebdaa9d2e304b.png\",\"status\":1,\"tipe\":1,\"poin\":0},{\"id\":109,\"kode_produk\":\"ML600\",\"name\":\"600 Diamonds (546 + 54 Bonus)\",\"harga\":137370,\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/3218e38e7ca25550f4bebdaa9d2e304b.png\",\"status\":1,\"tipe\":1,\"poin\":0},{\"id\":110,\"kode_produk\":\"ML706\",\"name\":\"706 Diamonds (625 + 81 Bonus)\",\"harga\":157080,\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/3218e38e7ca25550f4bebdaa9d2e304b.png\",\"status\":1,\"tipe\":1,\"poin\":0},{\"id\":111,\"kode_produk\":\"ML792\",\"name\":\"792 Diamonds (703 + 89 Bonus)\",\"harga\":176795,\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/3218e38e7ca25550f4bebdaa9d2e304b.png\",\"status\":1,\"tipe\":1,\"poin\":0},{\"id\":112,\"kode_produk\":\"ML878\",\"name\":\"878 Diamonds (781 + 97 Bonus)\",\"harga\":196200,\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/3218e38e7ca25550f4bebdaa9d2e304b.png\",\"status\":1,\"tipe\":1,\"poin\":0},{\"id\":113,\"kode_produk\":\"ML963\",\"name\":\"963 Diamonds (859 + 104 Bonus)\",\"harga\":215910,\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/3218e38e7ca25550f4bebdaa9d2e304b.png\",\"status\":1,\"tipe\":1,\"poin\":0},{\"id\":114,\"kode_produk\":\"ML1050\",\"name\":\"1050 Diamonds (937 + 113 Bonus)\",\"harga\":235315,\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/3218e38e7ca25550f4bebdaa9d2e304b.png\",\"status\":1,\"tipe\":1,\"poin\":0},{\"id\":115,\"kode_produk\":\"ML1220\",\"name\":\"1220 Diamonds (1093 + 127 Bonus)\",\"harga\":274740,\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/3218e38e7ca25550f4bebdaa9d2e304b.png\",\"status\":1,\"tipe\":1,\"poin\":0},{\"id\":117,\"kode_produk\":\"ML1412\",\"name\":\"1412 Diamonds (1250 + 162 Bonus)\",\"harga\":314160,\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/f3867bc602cd9af5b328ca008cd03ae7.png\",\"status\":1,\"tipe\":1,\"poin\":0},{\"id\":118,\"kode_produk\":\"ML2195\",\"name\":\"2195 Diamonds (1860 + 335 Bonus)\",\"harga\":471860,\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/f3867bc602cd9af5b328ca008cd03ae7.png\",\"status\":1,\"tipe\":1,\"poin\":0},{\"id\":119,\"kode_produk\":\"ML2901\",\"name\":\"2901 Diamonds (2485 + 416 Bonus)\",\"harga\":628940,\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/f3867bc602cd9af5b328ca008cd03ae7.png\",\"status\":1,\"tipe\":1,\"poin\":0},{\"id\":120,\"kode_produk\":\"ML3073\",\"name\":\"3073 Diamonds (2641 + 432 Bonus)\",\"harga\":668055,\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/f3867bc602cd9af5b328ca008cd03ae7.png\",\"status\":1,\"tipe\":1,\"poin\":0},{\"id\":121,\"kode_produk\":\"ML3688\",\"name\":\"3688 Diamonds (3099 + 589 Bonus)\",\"harga\":787250,\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/f3867bc602cd9af5b328ca008cd03ae7.png\",\"status\":1,\"tipe\":1,\"poin\":0},{\"id\":122,\"kode_produk\":\"ML4394\",\"name\":\"4394 Diamonds (3724 + 670 Bonus)\",\"harga\":944330,\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/f3867bc602cd9af5b328ca008cd03ae7.png\",\"status\":1,\"tipe\":1,\"poin\":0},{\"id\":123,\"kode_produk\":\"ML5532\",\"name\":\"5532 Diamonds (4649 + 883 Bonus)\",\"harga\":1181490,\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/f3867bc602cd9af5b328ca008cd03ae7.png\",\"status\":1,\"tipe\":1,\"poin\":0},{\"id\":124,\"kode_produk\":\"ML6238\",\"name\":\"6238 Diamonds (5274 + 964 Bonus)\",\"harga\":1338570,\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/f3867bc602cd9af5b328ca008cd03ae7.png\",\"status\":1,\"tipe\":1,\"poin\":0},{\"id\":125,\"kode_produk\":\"ML7727\",\"name\":\"7727 Diamonds (6509 + 1218 Bonus)\",\"harga\":1653345,\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/f3867bc602cd9af5b328ca008cd03ae7.png\",\"status\":1,\"tipe\":1,\"poin\":0},{\"id\":126,\"kode_produk\":\"ML9288\",\"name\":\"9288 Diamonds (7740 + 1548 Bonus)\",\"harga\":1965040,\"icon\":\"https:\\\/\\\/assets.jajangame.com\\\/2022\\\/12\\\/f3867bc602cd9af5b328ca008cd03ae7.png\",\"status\":1,\"tipe\":1,\"poin\":0}]")
            this.contact = [{
                "icon": "https:\/\/assets.jajangame.com\/2022\/11\/79f43639827cc33c0aa71ea836428904.png",
                "name": "Telegram",
                "url": "https:\/\/t.me\/jajangame",
                "username": "@jajangame"
            }, {
                "icon": "https:\/\/assets.jajangame.com\/2022\/11\/16e7dcd394dd7377d913c296a3505929.png",
                "name": "WhatsApp",
                "url": "https:\/\/api.whatsapp.com\/send?phone=6287790000855&text=Saya%20Butuh%20bantuan.%20Nomor%20Pesanan%20saya%3A%20*JGT....*",
                "username": "0877 90000 855"
            }]
            this.me = JSON.parse("{\"status\":1,\"rc\":401,\"message\":\"Token Kosong\",\"data\":[],\"ts\":1673748393}")['data']

            // jika produk pasca bayar
            if (this.product[0].tipe === 2) {
                this.selectedProduct = this.product[0]
            }

            if (this.me) {
                const saveAcc = {
                    hp: this.me.hp,
                    email: this.me.email
                }
                localStorage.setItem('acc', JSON.stringify(saveAcc))
            }

            const acc = JSON.parse(localStorage.getItem("acc"))
            const temp = JSON.parse(localStorage.getItem("temp"))

            if (temp) {
                this.history = temp
                const self = this
                this.filteredHistory = _.filter(this.history, function (o) {
                    return o.operator === self.operator.name_operator;
                });
            }

            if (acc) {
                this.order.hp = acc.hp
                this.order.email = acc.email
            }

            // interval cek otp time
            setInterval(() => {
                let now = Math.floor(Date.now() / 1000)
                if (now > this.timeotp) {
                    this.showTimeOtp = false
                }
            }, 1000);
        },
        methods: {

            showPass(id) {
                const el = document.getElementById(id)
                if (el.type === 'password') {
                    el.type = 'text'
                } else {
                    el.type = 'password'
                }
            },
            isOpen(openTime, closeTime) {
                const timezone = 'Asia/Jakarta'
                // handle special case
                if (openTime === closeTime) {
                    return 'OPEN'
                }
                // get the current date and time in the given time zone
                const now = moment.tz(timezone)
                // Get the exact open and close times on that date in the given time zone
                // See https://github.com/moment/moment-timezone/issues/119
                const date = now.format('YYYY-MM-DD')
                const storeOpenTime = moment.tz(
                    date + ' ' + openTime,
                    'YYYY-MM-DD h:mmA',
                    timezone
                )
                const storeCloseTime = moment.tz(
                    date + ' ' + closeTime,
                    'YYYY-MM-DD h:mmA',
                    timezone
                )
                let check
                if (storeCloseTime.isBefore(storeOpenTime)) {
                    // Handle ranges that span over midnight
                    check = now.isAfter(storeOpenTime) || now.isBefore(storeCloseTime)
                } else {
                    // Normal range check using an inclusive start time and exclusive end time
                    check = now.isBetween(storeOpenTime, storeCloseTime, null, '[)')
                }
                return check ? 'OPEN' : 'CLOSED'
            },
            selectHistory(v) {

                this.order.user_id = v.user_id
                this.order.server_id = v.server_id
            },
            toRupiah(v) {
                if (v > 0) {
                    const val = (v / 1).toFixed(0).replace('.', ',')
                    return "Rp" + val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                } else {
                    return "Rp0"
                }
            },
            showJenis(val) {
                if (val.produk_jenis.length === 1) {
                    window.location = val.produk_jenis[0].slug
                } else {
                    this.showModal = true
                    this.selectedJenis = val.produk_jenis
                }
            },
            selectPay(v) {
                if (this.selectedProduct.tipe === 2) {
                    this.selectedMetode = v
                    this.order.metode_id = v.id_metode
                } else {
                    if (!this.me.hp && v.id_metode === 1) {
                        this.$toastr.e('Hanya tersedia untuk member yang sudah login !')
                    } else if (!this.order.produk_id) {
                        this.$toastr.e('Pilih Produk Dahulu !')
                    } else if (this.selectedProduct.harga <= v.min) {
                        this.$toastr.e('Tersedia untuk harga produk di atas ' + this.toRupiah(v.min))
                    } else if (this.selectedProduct.harga >= v.max) {
                        this.$toastr.e('Tersedia untuk harga produk di bawah ' + this.toRupiah(v.max))
                    } else if (this.order.produk_id && this.selectedProduct.harga <= v.max && this
                        .selectedProduct
                        .harga >= v.min) {
                        this.selectedMetode = v
                        this.order.metode_id = v.id_metode
                    }
                }

            },
            saveAcc() {
                const temp = {
                    operator: this.operator.name_operator,
                    user_id: this.order.user_id,
                    server_id: this.order.server_id,
                    additional_data: []
                }
                // this.form.custom.forEach((cs) => {
                //     const df = {
                //         key: cs.name,
                //         value: this.additionalData[cs.name]
                //     }
                //     temp.form.additional_data.push(df)
                // })
                this.history.push(temp)
                const result = _.uniqBy(this.history, "user_id");
                localStorage.setItem('temp', JSON.stringify(result))
            },
            validasiOrder() {
                // jika form custom gak ada
                if (!this.form.custom.length) {
                    if (!this.order.user_id) {
                        this.$toastr.e("Tujuan tidak boleh kosong !")
                    } else {
                        this.processOrder()
                    }
                } else {
                    // jika punya form custom
                    this.processOrder()
                }
            },
            async processOrder() {
                try {
                    const acc = {
                        hp: this.order.hp,
                        email: this.order.email
                    }
                    this.saveAcc()
                    localStorage.setItem('acc', JSON.stringify(acc))
                    // check produk if pasca or not
                    if (this.selectedProduct.kode_produk) {
                        if (this.selectedProduct.tipe === 2) {
                            // masuk k trx pasca
                            this.order.additional_data = JSON.stringify({
                                jumlah_item: this.order.jumlah_item
                            })
                            this.requestInq()
                        } else {
                            if (this.operator.cek_username !== '') {
                                this.cekUsername()
                            } else {
                                this.submitOrder()
                            }
                        }
                    } else {
                        this.$toastr.e("Pilih Produk Dahulu !")
                    }
                } catch (error) {
                    // console.log(error);
                }
            },
            async cekUsername() {
                try {
                    if (!this.order.produk_id) {
                        this.$toastr.e("Pilih Produk Dahulu !")
                    } else if (!this.order.metode_id) {
                        this.$toastr.e("Pilih Metode Pembayaran Dahulu !")
                    } else {
                        this.loading = true
                        const res = await axios.post('/validasi', {
                            "user_id": this.order.user_id, //player_id + server_id
                            "zone_id": this.order.server_id, //player_id + server_id
                            "cek_validasi": this.operator
                                .cek_username //mobilelegend | freefire | higgs check by operator in column check_username
                        })
                        this.loading = false

                        if (res.data.status) {
                            this.loading = false
                            this.dataAcc = res.data.data
                            if (this.dataAcc.is_valid) {
                                this.showAcc = true
                            } else {
                                this.$toastr.e(this.dataAcc.username)
                            }
                        } else {
                            this.loading = false
                            this.$toastr.e(res.data.error_msg)
                        }
                    }
                } catch (error) {
                    this.loading = false
                    this.$toastr.e(error.response)
                }
            },
            async submitOrder() {
                try {
                    if (!this.order.produk_id) {
                        this.$toastr.e("Pilih Produk Dahulu !")
                    } else if (!this.order.metode_id) {
                        this.$toastr.e("Pilih Metode Pembayaran Dahulu !")
                    } else {
                        this.loading = true
                        this.loadingNext = true
                        const res = await axios.post('/order', {
                            ...this.order,
                            additional_data: JSON.stringify(
                                this.finalAdditionalData
                            )
                        })

                        if (res.data.status) {
                            // this.$toastr.s(res.data.message)
                            if (res.data.rc === 403 || res.data.rc === 401) {
                                this.requestOtp()
                                this.showAcc = false
                                this.loadingNext = false
                                this.loading = false
                            }
                            if (res.data.rc === 200) {
                                const expires = (new Date(Date.now() + 86400 * 1000 * 600)).toUTCString();
                                document.cookie = "_xstv_sess=" + res.data.data.token + "; expires=" +
                                    expires +
                                    ";path=/;secure;SameSite=Strict"

                                window.location = '/transaksi/' + res.data.data.trx_id
                            }
                        } else {
                            this.loadingNext = false
                            this.loading = false
                            this.$toastr.e(res.data.error_msg)
                        }
                    }
                } catch (error) {
                    this.loadingNext = false
                    this.loading = false
                }
            },
            async resubmitOrder(token) {
                try {
                    if (!this.order.produk_id) {
                        this.$toastr.e("Pilih Produk Dahulu !")
                    } else if (!this.order.metode_id) {
                        this.$toastr.e("Pilih Metode Pembayaran Dahulu !")
                    } else {
                        this.loadingNext = true
                        const res = await axios.post('/order', {
                            ...this.order,
                            additional_data: JSON.stringify(
                                this.finalAdditionalData,
                            )
                        }, {
                            headers: {
                                "Authorization": token
                            }
                        })
                        if (res.data.status) {
                            // this.$toastr.s(res.data.message)

                            if (res.data.rc === 403 || res.data.rc === 401) {
                                this.requestOtp()
                                this.showAcc = false
                                this.loadingNext = false
                                this.loading = false
                            }
                            // console.log(res.data);
                            if (res.data.rc === 200) {
                                const expires = (new Date(Date.now() + 86400 * 1000 * 600)).toUTCString();
                                document.cookie = "_xstv_sess=" + res.data.data.token + "; expires=" +
                                    expires +
                                    ";path=/;secure;SameSite=Strict"
                                window.location = '/transaksi/' + res.data.data.trx_id
                            }
                        } else {
                            this.loadingNext = false
                            this.loading = false

                            this.$toastr.e(res.data.error_msg)
                        }
                    }
                } catch (error) {
                    this.loading = false

                    // console.log(error);
                }
            },
            async validasiOtp() {
                try {
                    this.loadingOtp = true
                    const res = await axios.post('/otp/validasi', {
                        otp: this.otp,
                        hp: this.order.hp,
                        email: this.order.email
                    })

                    if (res.data.status) {
                        // this.$toastr.s(res.data.message)
                        this.resubmitOrder(res.data.data.token)
                    } else {
                        this.loading = false
                        this.loadingOtp = false
                        this.$toastr.e(res.data.error_msg)
                    }
                } catch (error) {
                    this.loading = false
                    this.loadingOtp = false
                }
            },
            async requestOtp() {
                try {
                    this.loadingOtpRequest = true
                    const res = await axios.post('/otp/request', {
                        hp: this.order.hp,
                        email: this.order.email,
                    })

                    this.loadingOtpRequest = false
                    if (res.data.status) {
                        this.showOtp = true
                        this.otpMessage = res.data.message
                        this.timeotp = Math.floor(Date.now() / 1000) + 30
                        this.showTimeOtp = true
                        this.$toastr.s(res.data.message)
                    } else {
                        this.loading = false
                        this.$toastr.e(res.data.error_msg)
                    }
                } catch (error) {

                }
            },

            async requestInq() {
                try {
                    if (!this.order.metode_id) {
                        this.$toastr.e("Pilih Metode Pembayaran Dahulu !")
                    } else {
                        this.loading = true
                        const res = await axios.post('/inquiry', {
                            produk_id: this.order.produk_id,
                            player_id: this.order.user_id,
                            server_id: this.order.server_id,
                            jumlah_item: this.order.jumlah_item
                        })

                        if (res.data.status) {
                            this.showAccPasca = true
                            this.accPasca = res.data.data
                            this.order.trx_id = res.data.data.trx_id
                        } else {
                            this.loading = false
                            this.$toastr.e(res.data.error_msg)
                        }
                    }


                } catch (error) {

                }
            }
        }

    });
</script>
@endsection