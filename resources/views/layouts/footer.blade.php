<div class="bg-slate-50 pt-10 max-w-[600px] mx-auto text-white">
    <div class="p-4 text-center">
        <p>© <span id="years"></span> <a href="{{ route('home') }}" class="underline">Keykawa Store</a>. All
            Rights Reserved</p>
    </div>
    <div class="h-20">
    </div>
</div>
<script async src='https://www.googletagmanager.com/gtag/js?id=G-6CHY47BV8Z'></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-6CHY47BV8Z');
    </script>
    <script async src='https://www.googletagmanager.com/gtag/js?id=UA-250922444-1'> </script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-250922444-1');
    </script>
    <script type='text/javascript'>
        var _Hasync = _Hasync || [];
        _Hasync.push(['Histats.start', '1,4719349,4,0,0,0,00010000']);
        _Hasync.push(['Histats.fasi', '1']);
        _Hasync.push(['Histats.track_hits', '']);
        (function() {
            var hs = document.createElement('script');
            hs.type = 'text/javascript';
            hs.async = true;
            hs.src = ('//s10.histats.com/js15_as.js');
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
        })();
    </script> <noscript><a href='{{ route('home') }}' target='_blank'><img src='https://sstatic1.histats.com/0.gif?4719349&amp;101' alt='' border='0'></a></noscript>
    <script>
        const loader = document.getElementById("loader")
        setTimeout(() => {
            loader.classList.add("hidden")
        }, 500)

        document.getElementById('years').innerHTML = new Date().getFullYear()
        if (!navigator.serviceWorker.controller) {
            navigator.serviceWorker.register("{{ asset('sw.js') }}").then(function(reg) {
                console.log("Service worker has been registered for scope: " + reg.scope);
            });
        }
    </script>
