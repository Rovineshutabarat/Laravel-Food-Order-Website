@push('style')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

<div>
    <x-store.navbar />

    <section class="overflow-hidden bg-white font-poppins">
        <div class="max-w-6xl px-4 py-4 mx-auto lg:py-8 md:px-6">
            <div class="flex flex-wrap -mx-4">
                <div class="w-full px-4 md:w-1/2">
                    <div class="sticky top-0 z-50 overflow-hidden">
                        <div class="relative mb-6 lg:mb-10 lg:h-2/4">
                            <img src="{{ asset('storage/' . $products->image) }}" alt=""
                                class="object-cover w-full lg:h-[80vh]">
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 md:w-1/2">
                    <div class="lg:pl-20">
                        <div class="mb-8">
                            <h2 class="max-w-xl mt-2 text-2xl font-bold md:text-4xl">{{ $products->name }}</h2>
                            <h2 class="max-w-xl mb-6 text-2xl font-medium md:text-[14px]">{{ $products->category }}</h2>
                            <div class="flex items-center mb-6 gap-x-2">
                                <div class="rating rating-sm">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <input type="radio" class="mask mask-star-2 bg-black" disabled
                                            {{ (int) number_format($productRating->average_rating) === $i ? 'checked' : '' }} />
                                    @endfor
                                </div>
                                <p>
                                    ({{ $productRating->average_rating ? $productRating->average_rating : '0.0' }})
                                </p>

                            </div>
                            <div class="max-w-md mb-8 text-gray-700" x-data="{ showFullDescription: false }">
                                <span
                                    x-text="showFullDescription ? '{{ $products->description }}' : '{{ Illuminate\Support\Str::limit($products->description, 370, '') }}'"></span>
                                <span class="text-[14px] text-blue-600 cursor-pointer"
                                    @click="showFullDescription = !showFullDescription"
                                    x-text="showFullDescription ? 'Tutup' : 'Lihat Selengkapnya'">
                                </span>
                            </div>

                            <p class="inline-block mb-5 text-4xl font-bold text-gray-700">
                                <span>Rp.{{ $products->price }}</span>
                            </p>
                        </div>
                        <button class="btn btn-secondary w-52">Tambah Ke Keranjang</button>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer class="flex flex-col bg-gray-50 ">
        <div class="flex items-center pt-5 font-poppins">
            <div class="justify-center flex-1 max-w-6xl px-4 py-6 mx-auto lg:py-4 md:px-6">
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div class="p-6 mb-6 bg-white">
                        <h2 class="mb-6 text-xl font-semibold text-left text-gray-700">
                            Ratings & Reviews</h2>
                        <div class="flex justify-start">
                            <div class="flex items-center mb-2 space-x-2 text-3xl leading-none text-gray-600">
                                <div class="font-bold">
                                    {{ $productRating->average_rating ? $productRating->average_rating : '0.0' }}/5
                                </div>
                                <div class="rating rating-sm">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <input type="radio" class="mask mask-star-2 bg-black" disabled
                                            {{ (int) number_format($productRating->average_rating) === $i ? 'checked' : '' }} />
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div class="text-xs">{{ $productRating->total_review }} total reviews</div>
                        <div class="flex flex-col gap-y-2">
                            <div class="flex flex-col my-5 gap-y-5">
                                @foreach ($barRating as $rating => $count)
                                    <div class="flex items-center gap-x-1">
                                        {{ $rating }}
                                        <div class="rating rating-sm">
                                            <input type="radio" name="rating-1" class="mask mask-star bg-blue-600" />
                                        </div>
                                        <progress class="progress progress-secondary w-56" value="{{ $count }}"
                                            max="{{ $productRating->total_review }}"></progress>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="items-center">
                            <a href="#" class="px-4 py-2 text-xs text-gray-100 bg-blue-500 hover:bg-blue-600">
                                View all reviews</a>
                        </div>
                    </div>
                    <div class="p-6 mb-6 bg-white">
                        <h2 class="text-xl font-semibold text-left text-gray-700">
                            Leave a Reviews</h2>
                        @auth
                            <form wire:submit="handleSubmitReview">
                                <label class="label font-medium label-text mt-1">Rating</label>
                                <div class="rating rating-sm" wire:model="rating">
                                    <input type="radio" name="rating-2" value="1" class="mask mask-star-2 bg-black"
                                        checked />
                                    <input type="radio" name="rating-2" value="2"
                                        class="mask mask-star-2 bg-black" />
                                    <input type="radio" name="rating-2" value="3"
                                        class="mask mask-star-2 bg-black" />
                                    <input type="radio" name="rating-2" value="4"
                                        class="mask mask-star-2 bg-black" />
                                    <input type="radio" name="rating-2" value="5"
                                        class="mask mask-star-2 bg-black" />
                                </div>
                                @error('rating')
                                    <p class="text-error text-xs">{{ $message }}</p>
                                @enderror
                                <label class="label font-medium label-text">Write Your Review</label>
                                <input type="text" wire:model="comment" placeholder="write a comment"
                                    class="block w-full px-4 leading-tight text-gray-700 bg-gray-100 border rounded py-12"></input>
                                @error('comment')
                                    <p class="text-error text-xs mt-1">{{ $message }}</p>
                                @enderror
                                <button type="submit"
                                    class="px-4 py-2 mt-6 text-xs font-medium text-gray-100 bg-blue-500 hover:bg-blue-700">
                                    Submit comment
                                </button>
                            </form>
                        @else
                            <div class="flex text-[14px] mt-24 flex-col items-center gap-y-2">
                                <img src="https://img.icons8.com/ios-filled/50/4D4D4D/lock.png" alt="">
                                <h1 class="text-[20px] font-medium mt-2">Silahkan Login Terlebih Dahulu</h1>
                                <a class="btn btn-sm btn-secondary w-72" href="{{ route('auth.login') }}">Login</a>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-gray-50">
            <div class="max-w-6xl px-4 mx-auto lg:py-4 md:px-6">
                <div class="grid grid-cols-1 gap-6">
                    @foreach ($reviews as $review)
                        <div class="p-6 mb-6 bg-white rounded-md">
                            <div class="flex items-center justify-between ">
                                <div class="flex flex-wrap items-center mb-2">
                                    <img class="object-cover mb-1 mr-2 rounded-full shadow w-14 h-14"
                                        src="{{ $review->image ? $review->image : 'https://img.icons8.com/ios-filled/50/737373/user-male-circle.png' }}">
                                    <div>
                                        <h2 class="mr-2 text-lg font-medium text-gray-700">
                                            {{ $review->username }}
                                        </h2>
                                        <p class="text-sm font-medium text-gray-400">{{ $review->email }}</p>
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <div class="flex gap-x-1 items-center justify-end">
                                        <div class="rating rating-sm">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <input type="radio" class="mask mask-star-2 bg-black" disabled
                                                    {{ (int) number_format($review->rating) === $i ? 'checked' : '' }} />
                                            @endfor
                                        </div>
                                    </div>
                                    <h1 class="text-[14px]  mt-1">
                                        {{ \Carbon\Carbon::parse($review->updated_at)->format('m-d H:i') }}
                                    </h1>
                                </div>
                            </div>


                            @if ($isEdit && Auth::user()->id === $review->user_id && $review->id === $editID)
                                <form wire:submit="handlePostReview({{ $review->id }})">
                                    <label class="label font-medium label-text">Rating</label>
                                    <div class="rating rating-sm" wire:model="rating">
                                        <input type="radio" name="rating-2" value="1"
                                            {{ $rating === 1 ? 'checked' : '' }} class="mask mask-star-2 bg-black" />
                                        <input type="radio" name="rating-2" value="2"
                                            {{ $rating === 2 ? 'checked' : '' }} class="mask mask-star-2 bg-black" />
                                        <input type="radio" name="rating-2" value="3"
                                            {{ $rating === 3 ? 'checked' : '' }} class="mask mask-star-2 bg-black" />
                                        <input type="radio" name="rating-2" value="4"
                                            {{ $rating === 4 ? 'checked' : '' }} class="mask mask-star-2 bg-black" />
                                        <input type="radio" name="rating-2" value="5"
                                            {{ $rating === 5 ? 'checked' : '' }} class="mask mask-star-2 bg-black" />
                                    </div>
                                    @error('rating')
                                        <p class="text-error text-xs">{{ $message }}</p>
                                    @enderror
                                    <label class="label font-medium label-text">Write Your Review</label>
                                    <input type="message" wire:model="comment" placeholder="write a comment"
                                        class="input input-bordered input-sm w-72 mb-1" />
                                    @error('comment')
                                        <p class="text-error text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                    <button type="submit"
                                        class="px-4 py-2 text-xs mb-4 font-medium text-gray-100 bg-blue-500 hover:bg-blue-700">
                                        Submit comment
                                    </button>
                                </form>
                            @else
                                <p class="my-4 text-sm text-gray-600">
                                    {{ $review->comment }}
                                </p>
                            @endif


                            <div class="flex items-center gap-x-3 font-medium">
                                <div x-data="{ isLiked: false }" class="cursor-pointer">
                                    <div class="flex items-center gap-x-1" @click="isLiked = !isLiked"
                                        :data-item-id="{{ $review->id }}">
                                        <img x-bind:src="isLiked ?
                                            'https://img.icons8.com/fluency-systems-filled/48/4D4D4D/facebook-like.png' :
                                            'https://img.icons8.com/fluency-systems-regular/48/facebook-like.png'"
                                            alt="Like.png" class="h-4 w-4 like-image">
                                        <h1 class="text-[14px]">Like</h1>
                                    </div>
                                </div>
                                @auth
                                    @if (Auth::user()->id === $review->user_id)
                                        <div class="flex items-center gap-x-1 cursor-pointer"
                                            wire:click="handleEditReview({{ $review->id }})">
                                            <img src="https://img.icons8.com/ios/50/edit--v1.png" alt="Edit.png"
                                                class="h-4 w-4">
                                            <h1 class="text-[14px]">Edit</h1>
                                        </div>
                                        <div class="flex items-center gap-x-1 cursor-pointer"
                                            wire:click="handleDeleteReview({{ $review->id }})">
                                            <img src="https://img.icons8.com/ios/50/waste.png" alt="Delete.png"
                                                class="h-4 w-4">
                                            <h1 class="text-[14px]">
                                                Delete</h1>
                                        </div>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </footer>
</div>


<script>
    window.addEventListener("create_review_success", (event) => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type,
            confirmButtonText: 'OK',
            position: event.detail.position,
            timer: event.detail.timer
        })
    });
    window.addEventListener("delete_review_success", (event) => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type,
            confirmButtonText: 'OK',
            position: event.detail.position,
            timer: event.detail.timer
        })
    });
    window.addEventListener("update_review_success", (event) => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type,
            confirmButtonText: 'OK',
            position: event.detail.position,
            timer: event.detail.timer
        })
    });
</script>
