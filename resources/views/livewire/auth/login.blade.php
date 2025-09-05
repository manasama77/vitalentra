<div class="flex flex-col gap-6">
    <x-auth-header :title="__('ui.Log in to your account')" :description="__('ui.Enter your email and password below to log in')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="login" class="flex flex-col gap-6">
        <!-- Email Address -->
        <flux:input wire:model="email" :label="__('ui.Email address')" type="email" required autofocus autocomplete="email"
            placeholder="email@example.com" />

        <!-- Password -->
        <div class="relative">
            <flux:input wire:model="password" :label="__('ui.Password')" type="password" required autocomplete="current-password"
                :placeholder="__('ui.Password')" viewable />

            @if (Route::has('password.request'))
                <flux:link class="absolute end-0 top-0 text-sm" :href="route('password.request')" wire:navigate>
                    {{ __('ui.Forgot your password?') }}
                </flux:link>
            @endif
        </div>

        <!-- Remember Me -->
        <flux:checkbox wire:model="remember" :label="__('ui.Remember me')" />

        <div class="flex items-center justify-end">
            <flux:button variant="primary" type="submit" class="w-full">{{ __('ui.Log in') }}</flux:button>
        </div>
    </form>

    @if (Route::has('register'))
        <div class="space-x-1 text-center text-sm text-zinc-600 rtl:space-x-reverse">
            <span>{{ __('ui.no_account') }}</span>
            <flux:link :href="route('register')" wire:navigate>{{ __('ui.Sign up') }}</flux:link>
        </div>
    @endif
</div>
