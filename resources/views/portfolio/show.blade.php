@extends('layouts.app')

@section('title', $project->name)

@section('content')
    <div class="max-w-6xl mx-auto px-6 py-12">
        {{-- Breadcrumb & Back Button --}}
        <div class="flex items-center justify-between mb-8">
            <a href="{{ route('portfolio.index') }}" class="flex items-center text-gray-500 hover:text-indigo-600 transition">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
                <span>Kembali ke Portofolio</span>
            </a>

            <span class="text-sm text-gray-400">{{ $project->created_at->format('d M Y') }}</span>
        </div>

        {{-- Header --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
            <div>
                <h1 class="text-4xl font-extrabold text-gray-900 mb-2">{{ $project->name }}</h1>
                <span class="inline-block bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full text-sm font-medium">
                    {{ $project->category->name }}
                </span>
            </div>

            {{-- Action Buttons --}}
            <div class="flex flex-wrap gap-3 mt-4 md:mt-0">
                @if ($project->github_link)
                    <a href="{{ $project->github_link }}" target="_blank"
                       class="flex items-center gap-2 bg-gray-900 text-white px-4 py-2 rounded-lg hover:bg-gray-800 transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303..."/>
                        </svg>
                        GitHub
                    </a>
                @endif

                @if ($project->youtube_link)
                    <a href="{{ $project->youtube_link }}" target="_blank"
                       class="flex items-center gap-2 bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19.615 3.184c-.287-.196-2.064-.816-4.61..."/>
                        </svg>
                        Lihat Demo
                    </a>
                @endif
            </div>
        </div>

        {{-- Project Thumbnail --}}
        <div class="relative mb-10">
            <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->name }}"
                 class="w-full h-96 object-cover rounded-xl shadow-lg border border-gray-200">

            <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent rounded-xl"></div>
        </div>

        {{-- Project Info Section --}}
        <div class="grid md:grid-cols-3 gap-8">
            <div class="md:col-span-2">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4 border-b-2 border-indigo-500 inline-block">
                    Deskripsi Proyek
                </h2>
                <div class="prose max-w-none text-gray-700 leading-relaxed">
                    {!! $project->detail !!}
                </div>
            </div>

            {{-- Project Metadata --}}
            <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Informasi Proyek</h3>
                <ul class="space-y-3 text-gray-600">
                    <li>
                        <strong class="text-gray-800">Kategori:</strong>
                        <span>{{ $project->category->name }}</span>
                    </li>
                    <li>
                        <strong class="text-gray-800">Tanggal Dibuat:</strong>
                        <span>{{ $project->created_at->format('d F Y') }}</span>
                    </li>
                    @if ($project->tech_stack)
                        <li>
                            <strong class="text-gray-800">Teknologi:</strong>
                            <div class="flex flex-wrap gap-2 mt-2">
                                @foreach (explode(',', $project->tech_stack) as $tech)
                                    <span class="bg-indigo-100 text-indigo-700 text-xs px-3 py-1 rounded-full">
                                        {{ trim($tech) }}
                                    </span>
                                @endforeach
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </div>

        {{-- YouTube Section --}}
        {{-- @if ($project->youtube_link)
            <div class="mt-16">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4 border-b-2 border-indigo-500 inline-block">
                    Video Demonstrasi
                </h2>

                @php
                $videoId = null;
                $url = $project->youtube_link;
                $pattern = 
                    '%^# Match any youtube URL
                    (?:https?://)?
                    (?:www\.)?
                    (?:
                        youtu\.be/|
                        youtube\.com/
                        (?:
                            watch\?v=|
                            embed/|
                            v/|
                            user/.*/|
                            yts/search\?v=|
                            shorts/
                        )
                    )
                    ([\w-]{11}) # Capture the 11 character ID
                    (?:[^&\n]*)$%x';
                
                // Melakukan pencocokan dan menyimpan ID video ke $matches[1]
                if (preg_match($pattern, $url, $matches)) {
                    $videoId = $matches[1];
                }
            @endphp

                @if ($videoId)
                    <div class="aspect-w-16 aspect-h-9 rounded-lg overflow-hidden shadow-xl mt-4">
                        <iframe
                            src="https://www.youtube.com/embed/{{ $videoId }}"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen
                            class="w-full h-full">
                        </iframe>
                    </div>
                @else
                    <p class="text-red-500 text-sm mt-2">Video tidak dapat di-embed (format URL tidak dikenali).</p>
                @endif
            </div>
        @endif --}}
    </div>
@endsection
