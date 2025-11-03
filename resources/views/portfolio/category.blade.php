@extends('layouts.app')

@section('title', 'Kategori: ' . $category->name)

@section('content')
    <div class="text-center mb-10">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Proyek Kategori:</h1>
        <h2 class="text-5xl font-extrabold text-indigo-600">{{ $category->name }}</h2>
    </div>

    <div class="mb-12 flex flex-wrap justify-center gap-3">
        <a href="{{ route('portfolio.index') }}" class="bg-gray-200 text-gray-800 px-5 py-2 rounded-lg text-sm font-semibold hover:bg-gray-300 transition shadow-sm">
            Lihat Semua Proyek
        </a>
        @foreach ($categories as $cat)
            <a href="{{ route('portfolio.category', $cat->slug) }}" class="px-5 py-2 rounded-lg text-sm font-semibold transition shadow-sm
                @if ($cat->id === $category->id) 
                    bg-indigo-600 text-white hover:bg-indigo-700 
                @else 
                    bg-indigo-50 text-indigo-700 hover:bg-indigo-100 
                @endif">
                {{ $cat->name }} <span class="text-indigo-300">({{ $cat->projects_count }})</span>
            </a>
        @endforeach
    </div>

    @if ($projects->isEmpty())
        <p class="text-center text-xl text-gray-500 py-10">Tidak ada proyek yang ditemukan dalam kategori **{{ $category->name }}**.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($projects as $project)
                <a href="{{ route('portfolio.show', $project->slug) }}" class="project-card bg-white rounded-xl shadow-lg hover:shadow-xl transition duration-300 overflow-hidden border border-gray-200 block">
                    <div class="w-full h-48 overflow-hidden relative">
                        <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="Thumbnail {{ $project->name }}" class="w-full h-full object-cover transition duration-300 group-hover:scale-105">
                        @if ($project->is_featured)
                        <span class="absolute top-0 right-0 bg-yellow-500 text-gray-900 text-xs font-bold px-3 py-1 rounded-bl-lg">Unggulan</span>
                        @endif
                    </div>
                    <div class="p-6">
                        <h2 class="text-xl font-bold mb-2 text-gray-900">{{ $project->name }}</h2>
                        <span class="text-xs text-indigo-600 bg-indigo-100 px-3 py-1 rounded-full font-medium">{{ $project->category->name }}</span>
                        <p class="text-gray-600 mt-4 text-sm line-clamp-3">
                            {!! Str::limit(strip_tags($project->detail), 100) !!}
                        </p>
                        <div class="mt-4 flex justify-between items-center text-sm font-medium text-indigo-600 hover:text-indigo-700">
                            Lihat Detail →
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="mt-12">
            {{ $projects->links() }}  </div>
    @endif
@endsection