<div class="">
    <div class="h-24 bg-primary flex justify-between">
        <div class="h-max w-max p-4 z-[999]">
            <div>
                <i class="fas fa-bars text-white cursor-pointer" onclick="openMenu()"></i>
            </div>
        </div>
        <div class="w-full flex justify-center items-center">
            <a href="index.html">
                <img class="h-8 -mt-8 " src=" https://assets.jajangame.com/2022/11/7078fd35eaa1a0d01f20a14da34f730a.png" alt="">
            </a>
        </div>
        <div class="h-max w-max p-4 z-[999]">
            <a href="search.html">
                <i class="fas fa-search text-white cursor-pointer"></i>
            </a>
        </div>
    </div>
    <div id="menu" class="w-0 top-0 text-white t-title fixed h-screen z-[9999] ease-in-out duration-300 ">
        <div id="menu_wrapper" class="w-0 min-h-screen bg-primary ease-in-out duration-300 ">
            <div id="menu_content" class="hidden">
                <div class="text-right px-4 py-2 mb-6">
                    <i class="fas fa-times cursor-pointer" onclick="closeMenu()"></i>
                </div>
                <div>
                    <ul class="text-sm">
                        <li class="px-4 py-2 mb-2 flex gap-x-2 items-center cursor-pointer">
                            <a href="index.html" class="flex gap-x-2 items-center">
                                <i class="fas fa-home"></i>
                                <p>Beranda</p>
                            </a>
                        </li>
                        <li class="px-4 py-2 mb-2 flex gap-x-2 items-center cursor-pointer">
                            <a href="blog.html" class="flex gap-x-2 items-center">
                                <i class="fas fa-newspaper"></i>
                                <p>Promo & News</p>
                            </a>
                        </li>
                        <li class="px-4 py-2 mb-2 flex gap-x-2 items-center cursor-pointer">
                            <a href="pricelist.html" class="flex gap-x-2 items-center">
                                <i class="fas fa-tags"></i>
                                <p>Price List</p>
                            </a>
                        </li>
                        <li class="px-4 py-2 mb-2 flex gap-x-2 items-center cursor-pointer">
                            <a href="claim-voucher.html" class="flex gap-x-2 items-center">
                                <i class="fas fa-gift"></i>
                                <p>Klaim Voucher</p>
                            </a>
                        </li>
                        <li class="px-4 py-2 mb-2 flex gap-x-2 items-center cursor-pointer">
                            <a href="contact-us.html" class="flex gap-x-2 items-center">
                                <i class="fas fa-envelope-open-text"></i>
                                <p>Contact Us</p>
                            </a>
                        </li>
                        <li class="px-4 py-2 mb-2 flex gap-x-2 items-center cursor-pointer">
                            <a href="about-us.html" class="flex gap-x-2 items-center">
                                <i class="fas fa-info-circle"></i>
                                <p>About Us</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div v-if="contact && contact.length" id="desktop" class="hidden w-[600px] mx-auto bottom-24 z-[99]">
        <div class="relative">
            <div id="chat" class="hidden">
                <div v-for="(c, i) in contact" :key="i">
                    <div class=" flex justify-end mr-11 mb-2">
                        <a :href="c.url" target="_blank">
                            <img :src="c.icon" class="w-8 rounded-lg" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class=" flex justify-end mr-10">
                <button onclick="openChat()">
                    <svg height="40" viewBox="0 0 778 333" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="778" height="333" rx="117" fill="#005C7E" />
                        <path d="M319 209V140H350.7C360.9 140 366 145.1 366 155.3V162.2C366 164.467 365.333 166.4 364 168L360.5 172.2L364.7 175.7C366.9 177.5 368 180.167 368 183.7V193.7C368 203.9 362.9 209 352.7 209H319ZM327.4 201.4H352.8C357.333 201.4 359.6 199.133 359.6 194.6V183.4C359.6 178.867 357.333 176.6 352.8 176.6H327.4V201.4ZM327.4 169H350.8C355.333 169 357.6 166.733 357.6 162.2V154.4C357.6 149.867 355.333 147.6 350.8 147.6H327.4V169Z" fill="white" />
                        <path d="M394.655 209C384.589 209 379.555 203.967 379.555 193.9C379.555 183.833 384.589 178.8 394.655 178.8H412.955V171C412.955 166.333 410.622 164 405.955 164H384.555V160L388.555 157H405.955C415.955 157 420.955 162 420.955 172V209H394.655ZM387.555 195C387.555 199.667 389.889 202 394.555 202H412.955V185.8H394.555C389.889 185.8 387.555 188.133 387.555 192.8V195Z" fill="white" />
                        <path d="M436.555 209V157H464.555C474.555 157 479.555 162 479.555 172V209H471.555V171C471.555 166.333 469.221 164 464.555 164H444.555V209H436.555Z" fill="white" />
                        <path d="M494.748 194V140H502.748V157H521.748V164H502.748V195C502.748 199.667 505.082 202 509.748 202H522.748V206L518.748 209H509.748C499.748 209 494.748 204 494.748 194Z" fill="white" />
                        <path d="M533.909 194V157H541.909V195C541.909 199.667 544.242 202 548.909 202H568.909V157H576.909V209H548.909C538.909 209 533.909 204 533.909 194Z" fill="white" />
                        <path d="M605.202 209C595.136 209 590.102 203.967 590.102 193.9C590.102 183.833 595.136 178.8 605.202 178.8H623.502V171C623.502 166.333 621.169 164 616.502 164H595.102V160L599.102 157H616.502C626.502 157 631.502 162 631.502 172V209H605.202ZM598.102 195C598.102 199.667 600.436 202 605.102 202H623.502V185.8H605.102C600.436 185.8 598.102 188.133 598.102 192.8V195Z" fill="white" />
                        <path d="M647.102 209V157H675.102C685.102 157 690.102 162 690.102 172V209H682.102V171C682.102 166.333 679.768 164 675.102 164H655.102V209H647.102Z" fill="white" />
                        <path d="M169.348 73.4825C149.954 76.5141 133.048 86.8136 121.815 102.438C118.667 106.829 113.809 116.391 112.215 121.404C110.816 125.679 109.106 133.88 109.106 136.096V137.65L105.919 137.883C101.566 138.233 98.6512 139.01 94.7257 140.954C92.1217 142.197 90.7614 143.247 88.0797 145.89C85.2425 148.688 84.4263 149.815 82.9494 152.924C80.151 158.677 79.879 160.736 80.0344 174.767C80.1899 186.31 80.1899 186.621 81.2393 189.653C83.4935 196.415 88.3517 202.284 94.1816 205.277C99.4285 208.036 102.421 208.658 109.883 208.697C115.674 208.697 116.452 208.619 117.851 207.881C118.706 207.414 119.755 206.482 120.183 205.743C120.921 204.461 120.96 203.528 121.193 170.025C121.388 136.834 121.427 135.513 122.204 132.015C126.44 113.437 137.634 99.0563 153.996 91.1277C161.847 87.3188 168.26 85.7642 177.121 85.4144C186.061 85.1035 192.784 86.1528 200.635 89.2232C216.57 95.4029 229.435 108.928 234.798 125.213C235.381 126.962 236.237 130.032 236.703 132.015C237.48 135.513 237.519 136.834 237.713 170.025C237.985 208.308 237.791 205.938 240.589 207.687C241.794 208.425 242.494 208.503 248.712 208.503C254.193 208.503 256.097 208.347 258.507 207.725C267.485 205.432 274.636 198.708 277.668 189.653C278.717 186.621 278.717 186.31 278.872 174.767C279.028 160.736 278.756 158.677 275.957 152.924C274.481 149.815 273.664 148.688 270.827 145.89C265.775 140.876 260.411 138.466 253.065 137.922L249.917 137.65L249.645 134.968C249.334 131.354 248.052 125.563 246.653 121.249C245.02 116.313 240.162 106.752 237.092 102.399C233.827 97.8515 226.209 90.0783 221.817 86.8524C212.761 80.2063 202.617 75.7756 191.891 73.8323C186.76 72.8996 174.323 72.7052 169.348 73.4825Z" fill="white" />
                        <path d="M106.502 217.558C106.852 220.123 108.873 225.681 110.622 228.946C116.257 239.401 125.857 246.941 137.4 249.972C140.315 250.75 142.492 251.022 146.806 251.138L152.48 251.333V247.796L152.519 244.259H148.594C143.696 244.259 140.509 243.754 136.428 242.355C125.818 238.701 117.229 229.723 114.158 219.035L113.226 215.887H109.766H106.269L106.502 217.558Z" fill="white" />
                        <path d="M168.571 235.825C157.611 238.896 156.25 254.015 166.472 259.067C168.338 260 168.532 260 179.453 260C190.258 260 190.569 259.961 192.357 259.106C199.819 255.414 201.801 245.736 196.321 239.634C195.311 238.507 193.639 237.225 192.357 236.603L190.141 235.514L180.231 235.437C173.196 235.359 169.815 235.476 168.571 235.825Z" fill="white" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div v-if="contact && contact.length" id="mobile" class="hidden min-w-full mx-auto bottom-20 z-[99]">
        <div class="relative">
            <div id="chatMobile" class="hidden">
                <div v-for="(c, i) in contact" :key="i">
                    <div class=" flex justify-end mr-3 mb-2">
                        <a :href="c.url" target="_blank">
                            <img :src="c.icon" class="w-8 rounded-lg" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class=" flex justify-end mr-[12px]">
                <button onclick="openChatMobile()">
                    <svg height="36" viewBox="0 0 778 333" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="778" height="333" rx="117" fill="#005C7E" />
                        <path d="M319 209V140H350.7C360.9 140 366 145.1 366 155.3V162.2C366 164.467 365.333 166.4 364 168L360.5 172.2L364.7 175.7C366.9 177.5 368 180.167 368 183.7V193.7C368 203.9 362.9 209 352.7 209H319ZM327.4 201.4H352.8C357.333 201.4 359.6 199.133 359.6 194.6V183.4C359.6 178.867 357.333 176.6 352.8 176.6H327.4V201.4ZM327.4 169H350.8C355.333 169 357.6 166.733 357.6 162.2V154.4C357.6 149.867 355.333 147.6 350.8 147.6H327.4V169Z" fill="white" />
                        <path d="M394.655 209C384.589 209 379.555 203.967 379.555 193.9C379.555 183.833 384.589 178.8 394.655 178.8H412.955V171C412.955 166.333 410.622 164 405.955 164H384.555V160L388.555 157H405.955C415.955 157 420.955 162 420.955 172V209H394.655ZM387.555 195C387.555 199.667 389.889 202 394.555 202H412.955V185.8H394.555C389.889 185.8 387.555 188.133 387.555 192.8V195Z" fill="white" />
                        <path d="M436.555 209V157H464.555C474.555 157 479.555 162 479.555 172V209H471.555V171C471.555 166.333 469.221 164 464.555 164H444.555V209H436.555Z" fill="white" />
                        <path d="M494.748 194V140H502.748V157H521.748V164H502.748V195C502.748 199.667 505.082 202 509.748 202H522.748V206L518.748 209H509.748C499.748 209 494.748 204 494.748 194Z" fill="white" />
                        <path d="M533.909 194V157H541.909V195C541.909 199.667 544.242 202 548.909 202H568.909V157H576.909V209H548.909C538.909 209 533.909 204 533.909 194Z" fill="white" />
                        <path d="M605.202 209C595.136 209 590.102 203.967 590.102 193.9C590.102 183.833 595.136 178.8 605.202 178.8H623.502V171C623.502 166.333 621.169 164 616.502 164H595.102V160L599.102 157H616.502C626.502 157 631.502 162 631.502 172V209H605.202ZM598.102 195C598.102 199.667 600.436 202 605.102 202H623.502V185.8H605.102C600.436 185.8 598.102 188.133 598.102 192.8V195Z" fill="white" />
                        <path d="M647.102 209V157H675.102C685.102 157 690.102 162 690.102 172V209H682.102V171C682.102 166.333 679.768 164 675.102 164H655.102V209H647.102Z" fill="white" />
                        <path d="M169.348 73.4825C149.954 76.5141 133.048 86.8136 121.815 102.438C118.667 106.829 113.809 116.391 112.215 121.404C110.816 125.679 109.106 133.88 109.106 136.096V137.65L105.919 137.883C101.566 138.233 98.6512 139.01 94.7257 140.954C92.1217 142.197 90.7614 143.247 88.0797 145.89C85.2425 148.688 84.4263 149.815 82.9494 152.924C80.151 158.677 79.879 160.736 80.0344 174.767C80.1899 186.31 80.1899 186.621 81.2393 189.653C83.4935 196.415 88.3517 202.284 94.1816 205.277C99.4285 208.036 102.421 208.658 109.883 208.697C115.674 208.697 116.452 208.619 117.851 207.881C118.706 207.414 119.755 206.482 120.183 205.743C120.921 204.461 120.96 203.528 121.193 170.025C121.388 136.834 121.427 135.513 122.204 132.015C126.44 113.437 137.634 99.0563 153.996 91.1277C161.847 87.3188 168.26 85.7642 177.121 85.4144C186.061 85.1035 192.784 86.1528 200.635 89.2232C216.57 95.4029 229.435 108.928 234.798 125.213C235.381 126.962 236.237 130.032 236.703 132.015C237.48 135.513 237.519 136.834 237.713 170.025C237.985 208.308 237.791 205.938 240.589 207.687C241.794 208.425 242.494 208.503 248.712 208.503C254.193 208.503 256.097 208.347 258.507 207.725C267.485 205.432 274.636 198.708 277.668 189.653C278.717 186.621 278.717 186.31 278.872 174.767C279.028 160.736 278.756 158.677 275.957 152.924C274.481 149.815 273.664 148.688 270.827 145.89C265.775 140.876 260.411 138.466 253.065 137.922L249.917 137.65L249.645 134.968C249.334 131.354 248.052 125.563 246.653 121.249C245.02 116.313 240.162 106.752 237.092 102.399C233.827 97.8515 226.209 90.0783 221.817 86.8524C212.761 80.2063 202.617 75.7756 191.891 73.8323C186.76 72.8996 174.323 72.7052 169.348 73.4825Z" fill="white" />
                        <path d="M106.502 217.558C106.852 220.123 108.873 225.681 110.622 228.946C116.257 239.401 125.857 246.941 137.4 249.972C140.315 250.75 142.492 251.022 146.806 251.138L152.48 251.333V247.796L152.519 244.259H148.594C143.696 244.259 140.509 243.754 136.428 242.355C125.818 238.701 117.229 229.723 114.158 219.035L113.226 215.887H109.766H106.269L106.502 217.558Z" fill="white" />
                        <path d="M168.571 235.825C157.611 238.896 156.25 254.015 166.472 259.067C168.338 260 168.532 260 179.453 260C190.258 260 190.569 259.961 192.357 259.106C199.819 255.414 201.801 245.736 196.321 239.634C195.311 238.507 193.639 237.225 192.357 236.603L190.141 235.514L180.231 235.437C173.196 235.359 169.815 235.476 168.571 235.825Z" fill="white" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function setMediaQuery() {
        const width = Math.max(
            document.documentElement.clientWidth || 0,
            window.innerWidth || 0
        )

        const mobile = document.getElementById('mobile')
        const desktop = document.getElementById('desktop')

        desktop.classList.add('hidden')
        mobile.classList.add('hidden')
        if (width > 560) {
            desktop.classList.remove('hidden')
            desktop.classList.add('fixed')
        } else {
            mobile.classList.remove('hidden')
            mobile.classList.add('fixed')
        }
    }
    setMediaQuery()

    function openMenu() {
        const menu = document.getElementById('menu')
        const menuContent = document.getElementById('menu_content')
        const menuWrapper = document.getElementById('menu_wrapper')
        menu.classList.add('w-[600px]')
        menu.classList.remove('w-0')
        menuWrapper.classList.add('w-48')
        setTimeout((e) => {
            menuContent.classList.remove('hidden')
        }, 300)
    }

    function closeMenu() {
        const menuContent = document.getElementById('menu_content')
        const menu = document.getElementById('menu')
        const menuWrapper = document.getElementById('menu_wrapper')
        menuWrapper.classList.add('w-0')
        menu.classList.add('w-0')
        menu.classList.remove('w-[600px]')
        menuContent.classList.add('hidden')
        menuWrapper.classList.remove('w-48')
    }

    function openChat() {
        const chat = document.getElementById('chat')
        if (chat.classList.contains('hidden')) {
            chat.classList.remove('hidden')
        } else {
            chat.classList.add('hidden')
        }
    }

    function openChatMobile() {
        const chat = document.getElementById('chatMobile')
        if (chat.classList.contains('hidden')) {
            chat.classList.remove('hidden')
        } else {
            chat.classList.add('hidden')
        }
    }
</script>