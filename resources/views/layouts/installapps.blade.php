@yield('additional-install')
<div id="loader" class="fixed z-[9999] top-0 transition-opacity duration-1000 ease-out left-0 w-screen h-screen bg-primary flex items-center justify-center">
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; display: block; shape-rendering: auto;" width="60px" height="60px" viewBox="0 0 100    100" preserveAspectRatio="xMidYMid">
        <circle cx="50" cy="50" fill="none" stroke="#00ADEF" stroke-width="5" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
            <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
        </circle>

    </svg>
</div>
{{-- UNTUK INSTALL APPS KEYKAWA STORE  --}}
<div id="pwa" class="max-w-[600px] bg-slate-100 mx-auto p-3 hidden">
    <div class="flex justify-between items-center">
        <div class="flex items-center">
            <button onclick="closePwa()">
                <i class="fas fa-times text-gray-700"></i>
            </button>
            <img src="https://assets.jajangame.com/2022/11/134e9142ab990dc1d95f2a2f9efac049.png" class="h-6 rounded-md ml-6" alt="">
            <span class="text-xs text-primary ml-2 w-full">Akses
                Keykawa Store
                dari
                Homescreen </span>
        </div>
        <button id="installApp" class="bg-primary text-white rounded-md text-sm px-6 py-2">
            Install
        </button>
    </div>
</div>

{{-- SCRIPT FOR INSTALL WEB TO APPS --}}
<script>
    window.addEventListener('beforeinstallprompt', (e) => {
        const el = document.getElementById("pwa")
        el.classList.remove('hidden')
        deferredPrompt = e;
    });

    const installApp = document.getElementById('installApp');

    installApp.addEventListener('click', async () => {
        if (deferredPrompt !== null) {
            deferredPrompt.prompt();
            const {
                outcome
            } = await deferredPrompt.userChoice;
            if (outcome === 'accepted') {
                deferredPrompt = null;
            }
        }
    });

    function closePwa() {
        const el = document.getElementById("pwa")
        el.classList.add('hidden')
    }
</script>
{{-- STOP SCRIPT  --}}