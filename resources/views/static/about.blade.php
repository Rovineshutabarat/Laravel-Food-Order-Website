@extends('layouts.static')

@section('pages')
    <x-homepage.navbar />
    <div class="flex flex-col items-center justify-center gap-x-10 mt-20 text-slate-700">
        <h1 class="text-3xl font-semibold mb-7">Tentang Kami</h1>
        <div class="flex justify-center items-center gap-x-10">
            <div class="w-2/4 ml-20">
                <h1>Warung Kopi (Warkop) Mie Aceh Musafir Jaya, dengan keberadaannya yang terletak di tengah keramaian,
                    telah menjadi destinasi favorit bagi para pencinta kopi dan penggemar mie instan. Menyajikan pengalaman
                    kuliner yang unik, warung ini tidak hanya memanjakan lidah dengan hidangan lezat, tetapi juga menawarkan
                    suasana yang sejuk dan indah.</h1>
                <h1 class="mt-3">Lokasi Warkop ini bukan hanya sekadar tempat untuk menikmati kopi dan mie, tetapi juga
                    merupakan ruang
                    hangout yang menyediakan fasilitas lengkap untuk kenyamanan pengunjung. Suasana yang sejuk dan nyaman
                    membuat pengunjung betah berlama-lama, sambil menikmati hidangan dan bersantai.</h1>
                <h1 class="mt-3">Salah satu daya tarik utama dari Warkop Mie Aceh Musafir Jaya adalah fasilitas yang dapat
                    dinikmati oleh para pelanggan. Mulai dari akses wifi yang memudahkan pengunjung untuk tetap terhubung
                    dengan dunia maya, hingga colokan listrik yang memungkinkan mereka mengisi daya perangkat elektronik
                    mereka. Namun, yang membuat pengalaman lebih seru adalah adanya fasilitas karaoke yang bisa dinikmati
                    tanpa perlu membayar tambahan.</h1>
            </div>
            <div class="w-2/4">
                <img src="{{ asset('static/amir1.jpg') }}" alt="" class="h-96 rounded-lg">
            </div>
        </div>
        <div class="mt-12 mx-20">
            <h1>Mengenai pilihan menu makanan, Warkop ini menyajikan beragam hidangan lezat seperti ayam penyet, pecel lele,
                mie Aceh spesial, nasi goreng, indomie kuah, dan masih banyak lagi. Varian menu makanan yang beragam
                memastikan bahwa setiap pengunjung dapat menemukan sesuatu yang sesuai dengan selera mereka.</h1>
            <h1 class="my-3">Tidak hanya itu, ragam minuman yang ditawarkan di Warkop Mie Aceh Musafir Jaya juga sangat
                menggoda. Mulai
                dari kopi susu yang kaya rasa, bandrek susu yang hangat, hingga minuman segar seperti juice buah naga,
                semuanya dapat dinikmati untuk menyegarkan tenggorokan.</h1>
            <h1>Terlebih, diketahui bahwa kopi susu menjadi favorit di antara pelanggan yang sering kali menjadi pilihan
                utama ketika mereka berkunjung ke Warkop Mie Aceh Musafir Jaya. Kelebihan warung ini tidak hanya terletak
                pada hidangan dan minumannya yang lezat, tetapi juga pada atmosfer yang ramah dan layanan yang ramah,
                menjadikannya tempat ideal untuk bersantai dan menikmati momen kuliner yang tak terlupakan.</h1>
        </div>
    </div>
    <x-homepage.footer />
@endsection
