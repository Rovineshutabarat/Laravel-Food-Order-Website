@push('style')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

<div class="flex items-center justify-center pt-16">
    <form class="flex flex-col form-control" wire:submit.prevent="handleRegister">

        <h1 class="text-2xl font-medium text-center">Sign Up</h1>

        <label class="text-[14px] mt-4">Username</label>
        <input type="text" name="username" wire:model="username" placeholder="Username"
            class="mt-2 w-80 input input-bordered">
        @error('username')
            <p class="text-sm text-error">{{ $message }}</p>
        @enderror


        <label class="text-[14px] mt-4">Email</label>
        <input type="email" name="email" wire:model="email" placeholder="Email"
            class="mt-2 w-80 input input-bordered">
        @error('email')
            <p class="text-sm text-error">{{ $message }}</p>
        @enderror


        <label class="text-[14px] mt-4">Password</label>
        <input type="password" name="password" wire:model="password" placeholder="Password"
            class="mt-2 w-80 input input-bordered">
        @error('password')
            <p class="text-sm text-error">{{ $message }}</p>
        @enderror


        <label class="text-[14px] mt-4">Confirm Password</label>
        <input type="password" name="password_confirmation" wire:model="password_confirmation"
            placeholder="Confirm Password" class="mt-2 w-80 input input-bordered">
        @error('password_confirmation')
            <p class="text-sm text-error">{{ $message }}</p>
        @enderror


        <button type="submit" class="mt-5 btn btn-neutral text-white">
            Register
        </button>

        <div class="flex items-center justify-center mt-2">
            <p class="text-[14px]">Already Have An Account?
                <a href="{{ route('auth.login') }}" class="font-medium text-secondary">Sign In</a>
            </p>
        </div>
    </form>
</div>
