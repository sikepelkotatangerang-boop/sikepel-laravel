<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'SIKEPEL') }} - {{ $title ?? '' }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-50 text-gray-900">
        <div x-data="{ sidebarOpen: false }" class="min-h-screen flex">

            <div x-show="sidebarOpen" x-cloak @@click="sidebarOpen = false" class="fixed inset-0 z-20 bg-gray-900/50 backdrop-blur-sm lg:hidden"></div>

            <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-30 w-64 flex flex-col bg-gradient-to-b from-emerald-900 via-emerald-800 to-emerald-900 shadow-2xl transition-all duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-0">
                <div class="flex items-center justify-between h-16 px-5 border-b border-emerald-700/50">
                    <a href="{{ route('dashboard') }}" wire:navigate class="flex items-center gap-2.5 group">
                        <div class="w-9 h-9 bg-white rounded-xl flex items-center justify-center shadow-lg shadow-emerald-900/20 group-hover:shadow-emerald-900/40 transition-shadow">
                            <span class="text-emerald-800 font-bold text-sm tracking-tight">SK</span>
                        </div>
                        <div>
                            <span class="text-white font-bold text-lg tracking-tight">SIKEPEL</span>
                            <p class="text-[10px] text-emerald-300/70 leading-none -mt-0.5">Kelurahan</p>
                        </div>
                    </a>
                    <button @@click="sidebarOpen = false" class="text-emerald-300/60 hover:text-white lg:hidden transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <nav class="flex-1 overflow-y-auto px-3 py-4 space-y-1 scrollbar-thin scrollbar-thumb-emerald-700 scrollbar-track-transparent">
                    <x-sidebar-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" wire:navigate>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        <span>Dashboard</span>
                    </x-sidebar-link>

                    <div class="pt-5 pb-2">
                        <p class="px-3 text-[11px] font-semibold uppercase tracking-[0.12em] text-emerald-400/60">Surat Keluar</p>
                    </div>
                    <x-sidebar-link href="{{ route('surat-keluar.index') }}" :active="request()->routeIs('surat-keluar.index')" wire:navigate>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        <span>Semua Surat</span>
                    </x-sidebar-link>
                    <x-sidebar-link href="{{ route('surat-keluar.create') }}" :active="request()->routeIs('surat-keluar.create')" wire:navigate>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                        <span>Buat Surat</span>
                    </x-sidebar-link>

                    <div class="pt-5 pb-2">
                        <p class="px-3 text-[11px] font-semibold uppercase tracking-[0.12em] text-emerald-400/60">Surat Masuk</p>
                    </div>
                    <x-sidebar-link href="{{ route('surat-masuk.index') }}" :active="request()->routeIs('surat-masuk.*')" wire:navigate>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
                        <span>Surat Masuk</span>
                    </x-sidebar-link>

                    <div class="pt-5 pb-2">
                        <p class="px-3 text-[11px] font-semibold uppercase tracking-[0.12em] text-emerald-400/60">Layanan</p>
                    </div>
                    <x-sidebar-link href="{{ route('sktm.index') }}" :active="request()->routeIs('sktm.*')" wire:navigate>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span>SKTM</span>
                    </x-sidebar-link>
                    <x-sidebar-link href="{{ route('belum-rumah.index') }}" :active="request()->routeIs('belum-rumah.*')" wire:navigate>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        <span>Belum Rumah</span>
                    </x-sidebar-link>

                    <div class="pt-5 pb-2">
                        <p class="px-3 text-[11px] font-semibold uppercase tracking-[0.12em] text-emerald-400/60">Arsip & Laporan</p>
                    </div>
                    <x-sidebar-link href="{{ route('arsip') }}" :active="request()->routeIs('arsip')" wire:navigate>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/></svg>
                        <span>Arsip & Pencarian</span>
                    </x-sidebar-link>
                    <x-sidebar-link href="{{ route('reports') }}" :active="request()->routeIs('reports')" wire:navigate>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        <span>Laporan</span>
                    </x-sidebar-link>

                    <div class="pt-5 pb-2">
                        <p class="px-3 text-[11px] font-semibold uppercase tracking-[0.12em] text-emerald-400/60">Manajemen</p>
                    </div>
                    @can('pejabat.view')
                    <x-sidebar-link href="{{ route('pejabat.index') }}" :active="request()->routeIs('pejabat.*')" wire:navigate>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                        <span>Pejabat</span>
                    </x-sidebar-link>
                    @endcan
                    @can('users.view')
                    <x-sidebar-link href="{{ route('users.index') }}" :active="request()->routeIs('users.*')" wire:navigate>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        <span>Pengguna</span>
                    </x-sidebar-link>
                    @endcan
                    @can('roles.view')
                    <x-sidebar-link href="{{ route('roles') }}" :active="request()->routeIs('roles')" wire:navigate>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span>Role & Permission</span>
                    </x-sidebar-link>
                    @endcan
                    @can('settings.view')
                    <x-sidebar-link href="{{ route('settings') }}" :active="request()->routeIs('settings')" wire:navigate>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span>Pengaturan</span>
                    </x-sidebar-link>
                    @endcan
                </nav>

                <div class="px-3 py-3 border-t border-emerald-700/30">
                    <div class="flex items-center gap-3 px-3 py-2">
                        <div class="w-8 h-8 rounded-lg bg-emerald-700/50 flex items-center justify-center text-white text-sm font-semibold flex-shrink-0">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </div>
                        <div class="min-w-0 flex-1">
                            <p class="text-sm font-medium text-white truncate">{{ auth()->user()->name }}</p>
                            <p class="text-[11px] text-emerald-300/60 truncate">{{ auth()->user()->getRoleNames()->first() ?? 'Staff' }}</p>
                        </div>
                    </div>
                </div>
            </aside>

            <div class="flex-1 flex flex-col min-w-0">
                <header class="bg-white shadow-sm border-b border-gray-200/80 sticky top-0 z-10">
                    <div class="flex items-center justify-between h-16 px-4 sm:px-6 lg:px-8">
                        <div class="flex items-center gap-4">
                            <button @@click="sidebarOpen = true" class="text-gray-400 hover:text-gray-600 lg:hidden transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                            </button>
                            <div>
                                <h1 class="text-lg font-semibold text-gray-900">{{ $title ?? 'Dashboard' }}</h1>
                            </div>
                        </div>

                        <div class="flex items-center gap-3">
                            <a href="{{ route('notifications') }}" wire:navigate class="relative p-2 text-gray-400 hover:text-emerald-600 hover:bg-emerald-50 rounded-xl transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                            </a>

                            <x-dropdown align="right" width="56">
                                <x-slot name="trigger">
                                    <button class="flex items-center gap-2.5 p-1.5 rounded-xl hover:bg-gray-100 transition-colors group">
                                        <div class="w-8 h-8 rounded-lg bg-emerald-600 flex items-center justify-center text-white text-sm font-semibold shadow-sm">
                                            {{ substr(auth()->user()->name, 0, 1) }}
                                        </div>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <div class="px-4 py-3 border-b border-gray-100">
                                        <p class="text-sm font-medium text-gray-900">{{ auth()->user()->name }}</p>
                                        <p class="text-xs text-gray-500">{{ auth()->user()->email }}</p>
                                    </div>
                                    <x-dropdown-link :href="route('profile')" wire:navigate>
                                        <svg class="w-4 h-4 mr-2.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                        Profile
                                    </x-dropdown-link>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="w-full text-start">
                                            <x-dropdown-link>
                                                <svg class="w-4 h-4 mr-2.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                                Log Out
                                            </x-dropdown-link>
                                        </button>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    </div>
                </header>

                <main class="flex-1 p-4 sm:p-6 lg:p-8 bg-gray-50">
                    {{ $slot }}
                </main>
            </div>
        </div>
        @stack('scripts')
    </body>
</html>
