@extends('layouts.app')

@section('title', 'Layanan Pembuatan Website')

@section('content')
    <section class="max-w-7xl mx-auto px-6 py-16">
        {{-- Header Section --}}
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-extrabold text-indigo-600 mb-4">
                Layanan Pembuatan Website Profesional
            </h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Saya membantu mewujudkan ide digital Anda menjadi website yang cepat, modern, dan responsif —
                cocok untuk bisnis, personal brand, maupun kebutuhan aplikasi.
            </p>
        </div>

        {{-- Services Grid --}}
        <div class="grid md:grid-cols-3 gap-8">
            {{-- Card 1: Company Profile --}}
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8 hover:-translate-y-2 hover:shadow-2xl transition-transform duration-300 group">
                <div class="flex justify-center mb-6">
                    <div class="bg-indigo-100 p-4 rounded-full group-hover:bg-indigo-200 transition">
                        <svg class="w-10 h-10 text-indigo-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V7M3 7l9 6 9-6" />
                        </svg>
                    </div>
                </div>

                <h2 class="text-2xl font-semibold text-gray-800 mb-3 text-center">
                    Website Company Profile
                </h2>
                <p class="text-gray-600 text-center mb-5">
                    Tampilkan citra profesional perusahaan Anda dengan desain elegan, UX yang optimal, dan SEO-friendly.
                </p>

                <ul class="text-indigo-600 space-y-2 mb-6">
                    <li class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-indigo-500" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 00-1.414 0L8 12.586 4.707 9.293a1 1 0 10-1.414 1.414l4 4a1 1 0 001.414 0l8-8a1 1 0 000-1.414z"/></svg>
                        Desain Kustom (Mobile-First)
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-indigo-500" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 00-1.414 0L8 12.586 4.707 9.293a1 1 0 10-1.414 1.414l4 4a1 1 0 001.414 0l8-8a1 1 0 000-1.414z"/></svg>
                        Halaman Kontak & Formulir
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-indigo-500" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 00-1.414 0L8 12.586 4.707 9.293a1 1 0 10-1.414 1.414l4 4a1 1 0 001.414 0l8-8a1 1 0 000-1.414z"/></svg>
                        Galeri Foto / Video
                    </li>
                </ul>
            @if ($profile->phone)
            @php
                $phone = preg_replace('/[^0-9]/', '', $profile->phone);
                $whatsappUrl = 'https://wa.me/' . $phone;
            @endphp
                   
                <a href="{{ $whatsappUrl }}"
                   class="block text-center bg-indigo-600 text-white py-2.5 rounded-full font-semibold hover:bg-indigo-700 transition">
                    Pesan Sekarang
                </a>
            </div>
             @endif

            {{-- Card 2: E-Commerce --}}
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8 hover:-translate-y-2 hover:shadow-2xl transition-transform duration-300 group">
                <div class="flex justify-center mb-6">
                    <div class="bg-rose-100 p-4 rounded-full group-hover:bg-rose-200 transition">
                        <svg class="w-10 h-10 text-rose-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 9h12l-2-9M10 21h4" />
                        </svg>
                    </div>
                </div>

                <h2 class="text-2xl font-semibold text-gray-800 mb-3 text-center">
                    Toko Online (E-Commerce)
                </h2>
                <p class="text-gray-600 text-center mb-5">
                    Solusi modern untuk menjual produk online dengan integrasi pembayaran dan sistem manajemen produk.
                </p>

                <ul class="text-rose-600 space-y-2 mb-6">
                    <li class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-rose-500" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 00-1.414 0L8 12.586 4.707 9.293a1 1 0 10-1.414 1.414l4 4a1 1 0 001.414 0l8-8a1 1 0 000-1.414z"/></svg>
                        Manajemen Produk (Filament)
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-rose-500" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 00-1.414 0L8 12.586 4.707 9.293a1 1 0 10-1.414 1.414l4 4a1 1 0 001.414 0l8-8a1 1 0 000-1.414z"/></svg>
                        Integrasi Payment Gateway (Midtrans)
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-rose-500" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 00-1.414 0L8 12.586 4.707 9.293a1 1 0 10-1.414 1.414l4 4a1 1 0 001.414 0l8-8a1 1 0 000-1.414z"/></svg>
                        Fitur Diskon / Voucher
                    </li>
                </ul>

                <a href="mailto:emailanda@example.com"
                   class="block text-center bg-rose-600 text-white py-2.5 rounded-full font-semibold hover:bg-rose-700 transition">
                    Konsultasi Sekarang
                </a>
            </div>

            {{-- Card 3: Custom Web App --}}
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8 hover:-translate-y-2 hover:shadow-2xl transition-transform duration-300 group">
                <div class="flex justify-center mb-6">
                    <div class="bg-emerald-100 p-4 rounded-full group-hover:bg-emerald-200 transition">
                        <svg class="w-10 h-10 text-emerald-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                </div>

                <h2 class="text-2xl font-semibold text-gray-800 mb-3 text-center">
                    Aplikasi Web Kustom
                </h2>
                <p class="text-gray-600 text-center mb-5">
                    Sistem berbasis web yang dirancang khusus sesuai kebutuhan bisnis Anda — aman, cepat, dan fleksibel.
                </p>

                <ul class="text-emerald-600 space-y-2 mb-6">
                    <li class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-emerald-500" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 00-1.414 0L8 12.586 4.707 9.293a1 1 0 10-1.414 1.414l4 4a1 1 0 001.414 0l8-8a1 1 0 000-1.414z"/></svg>
                        Analisis Kebutuhan Mendalam
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-emerald-500" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 00-1.414 0L8 12.586 4.707 9.293a1 1 0 10-1.414 1.414l4 4a1 1 0 001.414 0l8-8a1 1 0 000-1.414z"/></svg>
                        Backend Laravel & Filament
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-emerald-500" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 00-1.414 0L8 12.586 4.707 9.293a1 1 0 10-1.414 1.414l4 4a1 1 0 001.414 0l8-8a1 1 0 000-1.414z"/></svg>
                        Keamanan Data Terjamin
                    </li>
                </ul>

                <a href="mailto:emailanda@example.com"
                   class="block text-center bg-emerald-600 text-white py-2.5 rounded-full font-semibold hover:bg-emerald-700 transition">
                    Diskusikan Ide Anda
                </a>
            </div>
        </div>

        {{-- Contact CTA --}}
        <div class="mt-20 text-center">
            <h3 class="text-3xl font-bold text-gray-800 mb-4">
                Tertarik dengan salah satu layanan di atas?
            </h3>
            <p class="text-gray-600 mb-8">
                Hubungi saya untuk konsultasi gratis dan dapatkan solusi terbaik untuk bisnis Anda.
            </p>
            <a href="mailto:emailanda@example.com"
               class="inline-block bg-indigo-600 text-white text-lg font-semibold px-10 py-4 rounded-full hover:bg-indigo-700 transition shadow-lg">
                Hubungi Saya Sekarang
            </a>
        </div>
    </section>
@endsection
