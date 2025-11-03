@extends('layouts.app')

@section('title', 'Portofolio Profesional & Inovatif - ' . ($profile->full_name ?? 'Nama Anda'))

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- ================= HERO SECTION ================= --}}
    @if ($profile)
    <section class="relative bg-gradient-to-br from-indigo-900 via-purple-800 to-indigo-900 text-white rounded-3xl shadow-2xl overflow-hidden mb-20">
        
        {{-- Layer efek blur / glass --}}
        <div class="absolute inset-0 backdrop-blur-xl bg-indigo-900/40"></div>

        {{-- Pola abstrak background --}}
        <div class="absolute inset-0 opacity-10"
            style="background-image: url('data:image/svg+xml;charset=UTF-8,%3csvg width=\'100\' height=\'100\' xmlns=\'http://www.w3.org/2000/svg\'%3e%3ccircle cx=\'50\' cy=\'50\' r=\'2\' fill=\'%23FFFFFF\'/%3e%3c/svg%3e'); background-size: 40px 40px;">
        </div>

        <div class="relative z-10 flex flex-col lg:flex-row items-center gap-10 lg:gap-16 p-10 lg:p-16">
            
            {{-- FOTO PROFIL --}}
            <div class="lg:w-1/4 flex-shrink-0 text-center">
                <img src="{{ $profile->photo_url ? asset('storage/' . $profile->photo_url) : 'https://placehold.co/192x192/4F46E5/FFFFFF?text=P' }}" 
                    alt="{{ $profile->full_name }}"
                    class="w-48 h-48 object-cover rounded-full border-4 border-cyan-400 shadow-[0_0_40px_rgba(56,189,248,0.4)] transition-transform duration-300 hover:scale-105 mx-auto mb-6">

                <div class="space-y-2 text-indigo-100 font-light">
                    @if ($profile->email)
                        <a href="mailto:{{ $profile->email }}" class="block hover:text-cyan-300 transition">{{ $profile->email }}</a>
                    @endif
                    @if ($profile->phone)
                        <p>{{ $profile->phone }}</p>
                    @endif
                    @if ($profile->address)
                        <p class="text-sm text-indigo-200">{{ $profile->address }}</p>
                    @endif
                </div>
            </div>

            {{-- DETAIL PROFIL --}}
            <div class="lg:w-3/4 text-center lg:text-left">
                <p class="text-sm font-mono text-cyan-300 uppercase tracking-widest mb-2">{{ $profile->title ?? 'Full-Stack Developer' }}</p>

                <h1 class="text-5xl font-extrabold text-white mb-3 leading-tight">
                    Halo, Saya <span class="text-cyan-400">{{ $profile->full_name }}</span>
                </h1>

                <p class="text-indigo-200 text-lg leading-relaxed border-l-4 border-cyan-400 pl-4 py-2">
                    {!! $profile->summary !!}
                </p>

                {{-- SKILL BADGES --}}
                @if ($profile->key_skills)
                <div class="mt-8 flex flex-wrap gap-2">
                    @foreach (explode(',', $profile->key_skills) as $skill)
                        <span class="px-4 py-1.5 rounded-full bg-cyan-500/20 text-cyan-300 font-medium text-sm hover:bg-cyan-500/40 transition transform hover:-translate-y-0.5">
                            {{ trim($skill) }}
                        </span>
                    @endforeach
                </div>
                @endif

                {{-- SOSIAL MEDIA --}}
                <div class="flex flex-wrap gap-6 justify-center lg:justify-start mt-10">
                   {{-- LinkedIn --}}
                    <a href="{{ $profile->linkedin_url }}" target="_blank" class="flex items-center gap-2 text-cyan-300 hover:text-white transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 0h-14C2.24 0 0 2.24 0 5v14c0 2.76 2.24 5 5 5h14c2.76 
                            0 5-2.24 5-5V5c0-2.76-2.24-5-5-5zM8.34 19H5.67V9h2.67v10zM7 7.43c-.86 
                            0-1.57-.71-1.57-1.58S6.14 4.27 7 4.27s1.57.71 1.57 1.58S7.86 7.43 7 
                            7.43zM19 19h-2.67v-5.6c0-1.33-1.07-2.4-2.4-2.4s-2.4 1.07-2.4 
                            2.4V19h-2.67V9h2.67v1.2c.71-1.05 1.89-1.8 3.2-1.8 2.21 0 4 1.79 
                            4 4V19z"/>
                        </svg>
                        LinkedIn
                    </a>

                    {{-- GitHub --}}
                    <a href="{{ $profile->github_url }}" target="_blank" class="flex items-center gap-2 text-cyan-300 hover:text-white transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 .297c-6.63 0-12 5.373-12 
                            12 0 5.303 3.438 9.808 8.205 11.385.6.11.82-.26.82-.577 
                            0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61
                            -.546-1.387-1.334-1.756-1.334-1.756-1.09-.745.08-.73.08-.73 
                            1.205.086 1.838 1.238 1.838 1.238 
                            1.07 1.834 2.807 1.304 3.49.995.108-.775.418-1.305.762-1.605
                            -2.666-.3-5.464-1.334-5.464-5.93 
                            0-1.31.468-2.38 1.236-3.22-.124-.3-.536-1.523.118-3.18 
                            0 0 1-.32 3.31 1.23.95-.264 1.956-.396 2.956-.396 
                            1 0 2.007.132 2.957.396 
                            2.31-1.55 3.31-1.23 3.31-1.23 
                            .655 1.657.243 2.88.118 3.18.768.84 
                            1.236 1.91 1.236 3.22 0 4.606-2.8 
                            5.62-5.474 5.923.43.37.82 1.1.82 
                            2.22 0 1.604-.015 2.898-.015 3.285 
                            0 .317.21.69.825.577 
                            C20.565 22.106 24 17.6 24 12.297c0-6.627-5.373-12-12-12"/>
                        </svg>
                        GitHub
                    </a>

                    {{-- Instagram --}}
                    <a href="{{ $profile->instagram_url }}" target="_blank" class="flex items-center gap-2 text-cyan-300 hover:text-white transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M7.75 2h8.5A5.75 5.75 0 0122 
                            7.75v8.5A5.75 5.75 0 0116.25 22h-8.5A5.75 5.75 0 
                            012 16.25v-8.5A5.75 5.75 0 017.75 2zm0 
                            1.5A4.25 4.25 0 003.5 7.75v8.5A4.25 4.25 0 007.75 
                            20.5h8.5a4.25 4.25 0 004.25-4.25v-8.5A4.25 4.25 0 
                            0016.25 3.5h-8.5zM12 7a5 5 0 110 10 5 5 0 010-10zm0 
                            1.5a3.5 3.5 0 100 7 3.5 3.5 0 000-7zM17.5 6a1 1 0 
                            110 2 1 1 0 010-2z"/>
                        </svg>
                        Instagram
                    </a>
                </div>
            </div>
        </div>
    </section>
    @endif


    {{-- ================= PORTFOLIO SECTION ================= --}}
    <div class="text-center mb-14">
        <h2 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-3">Portofolio Proyek Saya</h2>
        <p class="text-gray-600">Kumpulan hasil karya, pengalaman, dan inovasi saya dalam dunia profesional.</p>
    </div>

    {{-- FILTER KATEGORI --}}
    <div class="flex flex-wrap justify-center gap-3 mb-12">
        <a href="{{ route('portfolio.index') }}" class="px-5 py-2 rounded-full text-sm font-medium 
            {{ !isset($activeCategory) ? 'bg-indigo-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
            Semua
        </a>
        @foreach ($categories as $cat)
            <a href="{{ route('portfolio.category', $cat->slug) }}" class="px-5 py-2 rounded-full text-sm font-medium transition 
                {{ isset($activeCategory) && $activeCategory->id === $cat->id ? 'bg-indigo-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                {{ $cat->name }} ({{ $cat->projects_count }})
            </a>
        @endforeach
    </div>

    {{-- DAFTAR PROYEK --}}
    @if ($projects->isEmpty())
        <p class="text-center text-xl text-gray-500 py-20">Belum ada proyek yang ditampilkan.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach ($projects as $project)
                <a href="{{ route('portfolio.show', $project->slug) }}" 
                    class="group bg-white/90 backdrop-blur-sm border border-gray-100 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl hover:scale-[1.02] transition-all duration-300">
                    
                    <div class="relative">
                        <img src="{{ asset('storage/' . $project->thumbnail) }}" 
                            alt="{{ $project->name }}" 
                            class="w-full h-60 object-cover transition-transform duration-500 group-hover:scale-105"
                            onerror="this.src='https://placehold.co/600x400/E0E7FF/4338CA?text=Project';">
                        @if ($project->is_featured)
                            <span class="absolute top-3 right-3 bg-yellow-400 text-gray-800 text-xs font-bold px-3 py-1 rounded-full shadow-md">⭐ Featured</span>
                        @endif
                    </div>

                    <div class="p-6">
                        <span class="inline-block text-xs font-semibold uppercase tracking-wider text-indigo-600 bg-indigo-100 px-3 py-1 rounded-full mb-3">
                            {{ $project->category->name }}
                        </span>

                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition">{{ $project->name }}</h3>
                        <p class="text-gray-600 text-sm leading-relaxed line-clamp-3">
                            {!! Str::limit(strip_tags($project->detail), 120) !!}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="mt-12 flex justify-center">
            {{ $projects->links() }}
        </div>
    @endif
</div>
@endsection
