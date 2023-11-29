@push('style')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

<div class="flex flex-col mx-40">
    <x-store.navbar />

    <section class="flex flex-col">
        <div class="flex flex-col mt-5 items-center ">
            <h1 class="text-[22px] font-semibold">Daftar Produk Teratas</h1>
            <h1 class="text-[14px] text-slate-600">Makanan Dan Minuman Teratas Minggu ini</h1>
        </div>

        <div class="flex justify-center mt-2 items-center gap-x-7 text-[14px] font-semibold">
            <h1>Semua</h1>
            <h1>Makanan</h1>
            <h1>Minuman</h1>
            <h1>Cemilan</h1>
            <h1>Mie</h1>
        </div>

        <div class="grid grid-cols-4 gap-x-10 gap-y-10 mt-10">
            @foreach ($products as $product)
                <div class="h-72 w-56 rounded-lg overflow-hidden">
                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}.png"
                            class="h-40 object-cover w-full rounded-lg hover:scale-[1.1] transition-all">
                    @else
                        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6d/Good_Food_Display_-_NCI_Visuals_Online.jpg"
                            alt="{{ $product->name }}.png"
                            class="h-40 object-cover rounded-lg hover:scale-[1.1] transition-all">
                    @endif
                    <div class="flex flex-col gap-y-1 my-2">
                        <div class="flex justify-between items-center">
                            <h1 class="text-[14px] text-slate-600">{{ $product->category }}</h1>
                            <div class="flex justify-center items-center gap-x-1 mr-1">
                                <div class="rating rating-xs">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <input type="radio" class="mask mask-star" {{ $i === 5 ? 'checked' : '' }} />
                                    @endfor
                                </div>
                                <h1 class="text-[13px] font-medium">
                                    ({{ number_format($product->average_rating, 1) }})
                                </h1>
                            </div>
                        </div>
                        <h2 class="font-semibold text-[18px]">{{ $product->name }}</h2>
                        <h3 class="font-medium mb-1">Rp.{{ $product->price }}</h3>
                        <a href="{{ route('store.product.detail', ['id' => $product->id]) }}" wire:navigate.hover
                            class="btn btn-sm btn-secondary">Lihat Produk</a>
                    </div>
                </div>
            @endforeach

        </div>
    </section>

    <button onclick="scrollToBottom()" id="myBtn">Scroll</button>

</div>

<script>
    function scrollToBottom() {
        window.scrollTo({
            top: 1000,
            behavior: 'smooth'
        });
    }
</script>
