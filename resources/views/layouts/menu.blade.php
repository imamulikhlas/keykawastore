<div class="fixed bottom-0 z-40 w-full">
    <div class="bg-white shadow w-full px-8 py-4 max-w-[600px] mx-auto">
        <div>
            <ul class="flex justify-between items-center gap-2">
                <li class="text-center">
                    <a id='home' href='{{ route('home') }}'>
                        <i class="fas fa-home text-2xl"></i>
                        <span class="text-[10px] block">Home</span>
                    </a>
                </li>
                <li class="text-center">
                    <a id='trx' href='transaksi.html'>
                        <i class="fas fa-shopping-bag text-2xl"></i>
                        <span class="text-[10px] block">Riwayat</span>
                    </a>
                </li>
                <li class="text-center">
                    <a id='deposit' href='deposit.html'>
                        <i class="fas fa-wallet text-2xl"></i>
                        <span class="text-[10px] block">Deposit</span>
                    </a>
                </li>
                <li class="text-center">
                    <a id='akun' href='profile.html'>
                        <i class="fas fa-user text-2xl"></i>
                        <span class="text-[10px] block">Akun</span>
                    </a href='/profile'>
                </li>
            </ul>
        </div>
    </div>
</div>
<script>
    const path = window.location.pathname
    const home = document.getElementById('home')
    const trx = document.getElementById('trx')
    const akun = document.getElementById('akun')
    const deposit = document.getElementById('deposit')

    trx.classList.remove('text-primary')
    akun.classList.remove('text-primary')
    home.classList.remove('text-primary')
    deposit.classList.remove('text-primary')

    trx.classList.add('text-gray-400')
    akun.classList.add('text-gray-400')
    home.classList.add('text-gray-400')
    deposit.classList.add('text-gray-400')

    if (path === '/') {
        home.classList.add('text-primary')
        home.classList.remove('text-gray-400')
    }
    if (path === '/transaksi') {
        trx.classList.add('text-primary')
    }
    if (path === '/profile') {
        akun.classList.add('text-primary')
    }
    if (path === '/deposit') {
        deposit.classList.add('text-primary')
    }
</script>