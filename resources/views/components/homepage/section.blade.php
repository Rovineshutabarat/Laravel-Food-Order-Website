<div class="flex flex-col mt-24 gap-y-28 md:gap-y-40 lg:gap-y-52">

    <section class="xl:flex lg:flex md:flex justify-center gap-x-20 sm:mx-20 md:mx-0 mx-2 xl:mt-0 md:mt-5">
        <div
            class="flex flex-col xl:w-2/6 lg:w-2/6 md:w-2/6 w-full justify-center xl:items-start lg:items-start md:items-start items-center xl:text-start lg:text-start md:text-start text-center">
            <h1 class="md:text-5xl text-4xl font-bold">Menu lezat dan terjangkau</h1>
            <h2
                class="lg:text-4xl md:text-3xl text-3xl inline-block font-bold my-3 btn btn-primary transform -skew-x-12 rounded-none text-white">
                di sekitar Anda.
            </h2>
            <p class="text-slate-600 mt-3">Nikmati pengalaman kuliner tak terlupakan tanpa harus merogoh kocek terlalu
                dalam! Temukan ragam pilihan makanan lezat dengan harga yang terjangkau tepat di sekitar Anda.</p>
            <div class="flex items-center xl:gap-x-5 lg:gap-x-5 md:gap-x-0 mt-5">
                <a href="{{ route('store.product') }}" class="btn btn-primary px-5 text-white">Pesan Sekarang</a>
                <button class="btn bg-transparent border-none">Pelajari Selengkapnya</button>
            </div>
        </div>
        <div class="flex xl:w-3/6 lg:w-3/6 md:w-3/6 xl:mt-0 lg:mt-0 md:mt-0 mt-10">
            <img src="{{ asset('static/amir2.jpg') }}" class="rounded-lg" alt="">
        </div>
    </section>

    <section class="xl:flex lg:flex md:flex justify-center gap-x-20 sm:mx-20 md:mx-0 mx-2 xl:mt-0 md:mt-5">
        <div class="flex xl:w-3/6 lg:w-3/6 md:w-3/6">
            <img src="{{ asset('static/amir1.jpg') }}" class="rounded-lg" alt="">
        </div>
        <div
            class="flex xl:mt-0 lg:mt-0 md:mt-0 mt-10 flex-col xl:w-2/6 lg:w-2/6 md:w-2/6 w-full justify-center xl:items-start lg:items-start md:items-start items-center xl:text-start lg:text-start md:text-start text-center">
            <h1 class="md:text-5xl text-4xl font-bold">Kami Sudah Melayani Selama</h1>
            <h2
                class="lg:text-5xl md:text-4xl text-3xl inline-block font-bold my-3 lg:btn-lg btn btn-primary transform -skew-x-12 rounded-none text-white">
                5 Tahun.
            </h2>
            <p class="text-slate-600 mt-3">
                Warkop Mie Aceh Musafir Jaya, destinasi populer untuk penikmat kopi dan mie instan. Suasana sejuk,
                fasilitas lengkap seperti wifi dan karaoke gratis, ditambah hidangan lezat seperti ayam penyet dan kopi
                susu, menjadikan tempat ini pilihan favorit bagi para pengunjung.</p>
            <div class="flex items-center xl:gap-x-5 lg:gap-x-5 md:gap-x-0 mt-5">
                <a href="{{ route('about') }}" class="btn btn-primary px-5 text-white">Pelajari Selengkapnya</a>
            </div>
        </div>
    </section>

    <section class="flex flex-col">
        <div class="md:flex text-center justify-center items-center">
            <h1 class="md:text-5xl text-4xl font-bold btn btn-lg bg-transparent border-none">Pelayanan</h1>
            <span
                class=" btn btn-lg text-white btn-primary transform md:text-5xl text-4xl font-bold -skew-x-12 rounded-none">Luar
                Biasa.
                </h2>
        </div>
        <div class="flex justify-center items-center mt-10">
            <div class="grid md:grid-cols-3 gap-x-10 lg:gap-x-20">
                <div class="flex flex-col items-center text-center md:w-60 sm:w-96 w-72">
                    <img src="https://treact.owaiskhan.me/static/media/shop-icon.048628c95dd89e631ac8c652d04238fb.svg"
                        alt="" class="h-10 w-10">
                    <h1 class="text-[20px] font-semibold my-3 mb-2">Pelayanan Yang Cepat</h1>
                    <p class="text-slate-600 text-[15px]">
                        Selamat datang di Musafir Jaya, tempat di mana layanan cepat menjadi keunggulan utama kami. Kami
                        memahami kebutuhan Anda untuk makan dengan cepat tanpa mengorbankan kualitas.
                    </p>
                </div>
                <div class="flex flex-col items-center text-center md:w-60 sm:w-96 w-72">
                    <img src="https://treact.owaiskhan.me/static/media/chef-icon.866e076bd2347712ef1d5cb77189d5fb.svg"
                        alt="" class="h-10 w-10">
                    <h1 class="text-[20px] font-semibold my-3 mb-2">Hidangan Yang Lezat</h1>
                    <p class="text-slate-600 text-[15px]">
                        Hidangan kami dipersiapkan dengan detail dan inovasi, menciptakan kombinasi cita rasa yang tak
                        terlupakan. Dengan atmosfer yang mewah dan penuh gaya
                    </p>
                </div>
                <div class="flex flex-col items-center text-center md:w-60 sm:w-96 w-72">
                    <img src="https://treact.owaiskhan.me/static/media/celebration-icon.0d9bb9633fcda75b7632a11eaf12bbac.svg"
                        alt="" class="h-10 w-10">
                    <h1 class="text-[20px] font-semibold my-3 mb-2">Layanan Penuh Kepuasan</h1>
                    <p class="text-slate-600 text-[15px]">
                        layanan kami Akan melampaui batas kepuasan Anda. staf kami
                        yang terlatih secara profesional berusaha memberikan pengalaman bersantap yang luar biasa.
                    </p>
                </div>
            </div>
        </div>
    </section>


    <section class="container mx-auto px-5">
        <div class="md:flex text-center justify-center items-center mb-10">
            <h1 class="md:text-5xl text-4xl font-bold btn btn-lg bg-transparent border-none">Jelajahi</h1>
            <span
                class=" btn btn-lg text-white btn-primary transform md:text-5xl text-4xl font-bold -skew-x-12 rounded-none">Galeri
                Kami.
                </h2>
        </div>
        <div class="-m-1 flex flex-wrap md:-m-2">
            <div class="flex w-1/2 flex-wrap">
                <div class="w-1/2 p-1 md:p-2">
                    <img alt="gallery" class="block h-full w-full rounded-lg object-cover object-center"
                        src="{{ asset('static/amir1.jpg') }}" />
                </div>
                <div class="w-1/2 p-1 md:p-2">
                    <img alt="gallery" class="block h-full w-full rounded-lg object-cover object-center"
                        src="{{ asset('static/amir2.jpg') }}" />
                </div>
                <div class="w-full p-1 md:p-2">
                    <img alt="gallery" class="block h-full w-full rounded-lg object-cover object-center"
                        src="{{ asset('static/amir5.jpg') }}" />
                </div>
            </div>
            <div class="flex w-1/2 flex-wrap">
                <div class="w-full p-1 md:p-2">
                    <img alt="gallery" class="block h-full w-full rounded-lg object-cover object-center"
                        src="{{ asset('static/amir1.jpg') }}" />
                </div>
                <div class="w-1/2 p-1 md:p-2">
                    <img alt="gallery" class="block h-full w-full rounded-lg object-cover object-center"
                        src="{{ asset('static/amir4.jpg') }}" />
                </div>
                <div class="w-1/2 p-1 md:p-2">
                    <img alt="gallery" class="block h-full w-full rounded-lg object-cover object-center"
                        src="{{ asset('static/amir6.jpg') }}" />
                </div>
            </div>
        </div>
    </section>


    <section class="relative z-10 overflow-hidden bg-white mx-3">
        <div class="container mx-auto">
            <div class="flex flex-wrap -mx-4 lg:justify-between">
                <div class="w-full px-4 lg:w-1/2 xl:w-6/12">
                    <div class="mb-12 max-w-[570px] lg:mb-0">
                        <h2
                            class="text-dark mb-6 text-[32px] font-bold uppercase sm:text-[40px] lg:text-[36px] xl:text-[40px]">
                            Hubungi Kami
                        </h2>
                        <p class="text-base leading-relaxed text-body-color dark:text-dark-6 mb-9">
                            Kami senang mendengar dari Anda. Silakan sampaikan
                            pertanyaan, saran, atau permintaan informasi tambahan melalui formulir kontak di bawah ini.
                            Kariawan kami akan dengan senang hati merespons secepat mungkin. Terima kasih atas kunjungan
                            dan
                            kepercayaan Anda kepada kami.
                        </p>
                        <div class="mb-8 flex w-full max-w-[370px]">
                            <div
                                class="bg-primary/5 text-primary mr-6 flex h-[60px] w-full max-w-[60px] items-center justify-center overflow-hidden rounded sm:h-[70px] sm:max-w-[70px]">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M30.6 11.8002L17.7 3.5002C16.65 2.8502 15.3 2.8502 14.3 3.5002L1.39998 11.8002C0.899983 12.1502 0.749983 12.8502 1.04998 13.3502C1.39998 13.8502 2.09998 14.0002 2.59998 13.7002L3.44998 13.1502V25.8002C3.44998 27.5502 4.84998 28.9502 6.59998 28.9502H25.4C27.15 28.9502 28.55 27.5502 28.55 25.8002V13.1502L29.4 13.7002C29.6 13.8002 29.8 13.9002 30 13.9002C30.35 13.9002 30.75 13.7002 30.95 13.4002C31.3 12.8502 31.15 12.1502 30.6 11.8002ZM13.35 26.7502V18.5002C13.35 18.0002 13.75 17.6002 14.25 17.6002H17.75C18.25 17.6002 18.65 18.0002 18.65 18.5002V26.7502H13.35ZM26.3 25.8002C26.3 26.3002 25.9 26.7002 25.4 26.7002H20.9V18.5002C20.9 16.8002 19.5 15.4002 17.8 15.4002H14.3C12.6 15.4002 11.2 16.8002 11.2 18.5002V26.7502H6.69998C6.19998 26.7502 5.79998 26.3502 5.79998 25.8502V11.7002L15.5 5.4002C15.8 5.2002 16.2 5.2002 16.5 5.4002L26.3 11.7002V25.8002Z"
                                        fill="currentColor" />
                                </svg>
                            </div>
                            <div class="w-full">
                                <h4 class="mb-1 text-xl font-bold text-dark ">
                                    Lokasi Kami
                                </h4>
                                <p class="text-base text-body-color">
                                    Jl.Abdul Hakim, Padang Bulan Selayang I, Kec. Medan Selayang, Kota Medan,
                                    Sumatera Utara , 20155
                                </p>
                            </div>
                        </div>
                        <div class="mb-8 flex w-full max-w-[370px]">
                            <div
                                class="bg-primary/5 text-primary mr-6 flex h-[60px] w-full max-w-[60px] items-center justify-center overflow-hidden rounded sm:h-[70px] sm:max-w-[70px]">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_941_17577)">
                                        <path
                                            d="M24.3 31.1499C22.95 31.1499 21.4 30.7999 19.7 30.1499C16.3 28.7999 12.55 26.1999 9.19997 22.8499C5.84997 19.4999 3.24997 15.7499 1.89997 12.2999C0.39997 8.59994 0.54997 5.54994 2.29997 3.84994C2.34997 3.79994 2.44997 3.74994 2.49997 3.69994L6.69997 1.19994C7.74997 0.599942 9.09997 0.899942 9.79997 1.89994L12.75 6.29994C13.45 7.34994 13.15 8.74994 12.15 9.44994L10.35 10.6999C11.65 12.7999 15.35 17.9499 21.25 21.6499L22.35 20.0499C23.2 18.8499 24.55 18.4999 25.65 19.2499L30.05 22.1999C31.05 22.8999 31.35 24.2499 30.75 25.2999L28.25 29.4999C28.2 29.5999 28.15 29.6499 28.1 29.6999C27.2 30.6499 25.9 31.1499 24.3 31.1499ZM3.79997 5.54994C2.84997 6.59994 2.89997 8.74994 3.99997 11.4999C5.24997 14.6499 7.64997 18.0999 10.8 21.2499C13.9 24.3499 17.4 26.7499 20.5 27.9999C23.2 29.0999 25.35 29.1499 26.45 28.1999L28.85 24.0999C28.85 24.0499 28.85 24.0499 28.85 23.9999L24.45 21.0499C24.45 21.0499 24.35 21.0999 24.25 21.2499L23.15 22.8499C22.45 23.8499 21.1 24.1499 20.1 23.4999C13.8 19.5999 9.89997 14.1499 8.49997 11.9499C7.84997 10.8999 8.09997 9.54994 9.09997 8.84994L10.9 7.59994V7.54994L7.94997 3.14994C7.94997 3.09994 7.89997 3.09994 7.84997 3.14994L3.79997 5.54994Z"
                                            fill="currentColor" />
                                        <path
                                            d="M29.3 14.25C28.7 14.25 28.25 13.8 28.2 13.2C27.8 8.15003 23.65 4.10003 18.55 3.75003C17.95 3.70003 17.45 3.20003 17.5 2.55003C17.55 1.95003 18.05 1.45003 18.7 1.50003C24.9 1.90003 29.95 6.80003 30.45 13C30.5 13.6 30.05 14.15 29.4 14.2C29.4 14.25 29.35 14.25 29.3 14.25Z"
                                            fill="currentColor" />
                                        <path
                                            d="M24.35 14.7002C23.8 14.7002 23.3 14.3002 23.25 13.7002C22.95 11.0002 20.85 8.90018 18.15 8.55018C17.55 8.50018 17.1 7.90018 17.15 7.30018C17.2 6.70018 17.8 6.25018 18.4 6.30018C22.15 6.75018 25.05 9.65018 25.5 13.4002C25.55 14.0002 25.15 14.5502 24.5 14.6502C24.4 14.7002 24.35 14.7002 24.35 14.7002Z"
                                            fill="currentColor" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_941_17577">
                                            <rect width="32" height="32" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div class="w-full">
                                <h4 class="mb-1 text-xl font-bold text-dark">
                                    No Telepon
                                </h4>
                                <p class="text-base text-body-color">
                                    (+62) 89528160210
                                </p>
                            </div>
                        </div>
                        <div class="mb-8 flex w-full max-w-[370px]">
                            <div
                                class="bg-primary/5 text-primary mr-6 flex h-[60px] w-full max-w-[60px] items-center justify-center overflow-hidden rounded sm:h-[70px] sm:max-w-[70px]">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M28 4.7998H3.99998C2.29998 4.7998 0.849976 6.1998 0.849976 7.9498V24.1498C0.849976 25.8498 2.24998 27.2998 3.99998 27.2998H28C29.7 27.2998 31.15 25.8998 31.15 24.1498V7.8998C31.15 6.1998 29.7 4.7998 28 4.7998ZM28 7.0498C28.05 7.0498 28.1 7.0498 28.15 7.0498L16 14.8498L3.84998 7.0498C3.89998 7.0498 3.94998 7.0498 3.99998 7.0498H28ZM28 24.9498H3.99998C3.49998 24.9498 3.09998 24.5498 3.09998 24.0498V9.2498L14.8 16.7498C15.15 16.9998 15.55 17.0998 15.95 17.0998C16.35 17.0998 16.75 16.9998 17.1 16.7498L28.8 9.2498V24.0998C28.9 24.5998 28.5 24.9498 28 24.9498Z"
                                        fill="currentColor" />
                                </svg>
                            </div>
                            <div class="w-full">
                                <h4 class="mb-1 text-xl font-bold text-dark">
                                    Alamat Email
                                </h4>
                                <p class="text-base text-body-color dark:text-dark-6">
                                    musafirjaya@gmail.com
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 lg:w-1/2 xl:w-5/12">
                    <div class="relative lg:mt-32 p-8 bg-white rounded-lg shadow-lg dark:bg-dark-2 sm:p-12">
                        <form method="POST" action="/post/feedback">
                            @csrf
                            <div class="mb-6">
                                <textarea rows="6" placeholder="Isi Pesan Anda Disini" name="message"
                                    class="border-stroke text-body-color focus:border-primary w-full resize-none rounded border py-3 px-[14px] text-base outline-none"></textarea>
                            </div>
                            <div>
                                <button type="submit"
                                    class="w-full p-3 text-white transition border rounded border-primary bg-primary hover:bg-opacity-90">
                                    Kirim Pesan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
