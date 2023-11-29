@push('style')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

<div class="flex items-center justify-center pt-16">
    <form class="flex flex-col form-control" wire:submit.prevent="handleLogin">

        <h1 class="text-2xl font-medium text-center">Sign In</h1>
        
        <label class="label label-text mt-4">Email</label>
        <input type="email" name="email" wire:model="email" placeholder="Email" class="mt-2 w-80 input input-bordered">
        @error('email')
            <p class="text-sm text-error">{{ $message }}</p>
        @enderror

        <label class="label label-text mt-4">Password</label>
        <input type="password" name="password" wire:model="password" placeholder="Password"
            class="mt-2 w-80 input input-bordered">
        @error('password')
            <p class="text-sm text-error">{{ $message }}</p>
        @enderror

        <div class="flex justify-between items-center mt-5 text-[14px]">
            <div class="flex items-center justify-center gap-x-2">
                <input type="checkbox">
                <p>Remember Me</p>
            </div>
            <a href="" class="text-secondary">Forgot password?</a>
        </div>

        <button type="submit" class="mt-5 btn btn-neutral text-white">
            Login
        </button>

        <div class="flex items-center justify-center mt-2">
            <p class="text-[14px]">Dont Have An Account?
                <a href="{{ route('auth.register') }}" class="font-medium text-secondary">Sign Up</a>
            </p>
        </div>

        <div class="divider text-[14px]">OR</div>
        <a href="{{ route('auth.google.redirect') }}"
            class="flex items-center justify-center bg-white rounded-full dark:text-black shadow btn">
            <img src="https://img.icons8.com/color/48/google-logo.png" alt="GoogleImage" class="h-7 w-7">
            <p>Continue With Google</p>
        </a>
    </form>
</div>
