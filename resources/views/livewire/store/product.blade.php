@push('style')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

<div class="flex flex-col">
    <x-store.navbar />

    <section class="flex flex-col">
        <div class="flex justify-between mt-5 items-center mx-20">
            <h1 class="text-2xl font-semibold" wire:click='test'>Daftar Produk Teratas
            </h1>
        </div>



        <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 place-items-center gap-y-10 mt-10 xl:mx-10">
            @foreach ($products as $product)
                <div class="bg-gray-200 h-72 w-60 rounded-lg animate-pulse" wire:loading wire:target="setCategory">
                </div>
                <div class="bg-gray-200 h-72 w-60 rounded-lg animate-pulse" wire:loading wire:target="setFilter">
                </div>
                <div class="bg-gray-200 h-72 w-60 rounded-lg animate-pulse" wire:loading wire:target="search">
                </div>
                <div class="h-80 w-60 rounded-lg overflow-hidden hover:scale-[1.1] transition-all" wire:loading.remove>
                    <a href="{{ route('store.product.detail', ['id' => $product->id]) }}" wire:navigate.hover>
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}.png"
                                class="h-40 object-cover w-full rounded-t-lg">
                        @else
                            <img src="https://upload.wikimedia.org/wikipedia/commons/6/6d/Good_Food_Display_-_NCI_Visuals_Online.jpg"
                                alt="{{ $product->name }}.png" class="h-40 object-cover rounded-t-lg">
                        @endif
                    </a>
                    <a href="{{ route('store.product.detail', ['id' => $product->id]) }}" wire:navigate.hover
                        class="flex flex-col gap-y-1 bg-slate-100 p-3">
                        <div class="flex justify-between items-center">
                            <h1 class="text-[14px] text-slate-600">{{ $product->category }}</h1>
                            <div class="flex justify-center items-center gap-x-1 mr-1">
                                <div class="rating rating-xs">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <input type="radio" class="mask mask-star-2 bg-black" disabled
                                            {{ (int) number_format($product->average_rating) === $i ? 'checked' : '' }} />
                                    @endfor
                                </div>
                                <h1 class="text-[13px] font-medium">
                                    ({{ number_format($product->average_rating, 1) }})
                                </h1>
                            </div>
                        </div>
                        <h2 class="font-semibold text-[18px] mb-2">{{ $product->name }}</h2>
                        <h3 class="font-medium mb-1">Rp.{{ $product->price }}</h3>
                    </a>
                </div>
            @endforeach
        </div>
    </section>

</div>

<script>
    function scrollToBottom() {
        window.scrollTo({
            top: 1000,
            behavior: 'smooth'
        });
    }
</script>
