<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;
    public bool $showPassword = false;

    public function login(): void
    {
        $this->validate();
        $this->form->authenticate();
        Session::regenerate();
        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div x-data="{ showPassword: false }">

    {{-- Session Status --}}
    @if (session('status'))
        <div class="mb-4 text-center text-sm font-medium text-green-700 bg-green-100/90 backdrop-blur-sm rounded-2xl px-4 py-2.5">
            {{ session('status') }}
        </div>
    @endif

    {{-- Validation errors --}}
    @if ($errors->any())
        <div class="mb-4 text-center text-sm font-medium text-red-700 bg-red-100/90 backdrop-blur-sm rounded-2xl px-4 py-2.5">
            {{ $errors->first() }}
        </div>
    @endif

    {{-- Logo --}}
    <div class="flex justify-center mb-8">
        <img src="/assets/logo_sikepel.png" alt="SIKEPEL" class="h-14 w-auto drop-shadow-lg">
    </div>

    <form wire:submit="login" class="space-y-4">

        {{-- Email / Username --}}
        <div>
            <input
                wire:model="form.email"
                id="email"
                type="email"
                name="email"
                placeholder="username"
                required
                autofocus
                autocomplete="username"
                class="w-full px-5 py-4 rounded-2xl bg-white/70 backdrop-blur-md border-0 text-gray-700 placeholder-gray-400 text-sm font-medium shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400/50 focus:bg-white/90 transition-all"
            />
        </div>

        {{-- Password --}}
        <div class="relative">
            <input
                wire:model="form.password"
                id="password"
                :type="showPassword ? 'text' : 'password'"
                name="password"
                placeholder="••••••••"
                required
                autocomplete="current-password"
                class="w-full px-5 py-4 pr-12 rounded-2xl bg-white/70 backdrop-blur-md border-0 text-gray-700 placeholder-gray-400 text-sm font-medium shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400/50 focus:bg-white/90 transition-all"
            />
            {{-- Eye toggle --}}
            <button
                type="button"
                @@click="showPassword = !showPassword"
                class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors"
            >
                <svg x-show="!showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
                <svg x-show="showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display:none;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                </svg>
            </button>
        </div>

        {{-- Remember Me row --}}
        <div class="flex items-center justify-between px-1">
            <label for="remember" class="inline-flex items-center gap-2 cursor-pointer">
                <input
                    wire:model="form.remember"
                    id="remember"
                    type="checkbox"
                    name="remember"
                    class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-400 bg-white/70"
                />
                <span class="text-xs text-gray-600 font-medium drop-shadow-sm">Ingat saya</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" wire:navigate
                   class="text-xs text-blue-700 hover:text-blue-900 font-medium drop-shadow-sm transition-colors">
                    Lupa password?
                </a>
            @endif
        </div>

        {{-- Submit button - navy blue pill with lock icon --}}
        <button
            type="submit"
            class="w-full flex items-center justify-center gap-3 px-6 py-4 mt-2 bg-blue-900 hover:bg-blue-800 active:bg-blue-950 text-white font-semibold text-sm rounded-full shadow-lg shadow-blue-900/30 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
        >
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
            </svg>
            Masuk
            <div wire:loading wire:target="login" class="w-4 h-4 border-2 border-white/30 border-t-white rounded-full animate-spin"></div>
        </button>

    </form>
</div>
