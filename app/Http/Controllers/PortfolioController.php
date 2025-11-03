<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
use App\Models\AboutMe;

class PortfolioController extends Controller
{
    /**
     * Tampilan daftar seluruh proyek (Rute: /)
     */
    protected function getProfileData()
    {
        // Ambil data pertama (dan satu-satunya)
        return AboutMe::first();
    }
    public function index()
    {
        $categories = Category::withCount('projects')->get();
        $projects = Project::with('category')->latest()->paginate(9);
        $profile = $this->getProfileData(); // Ambil data profil

        return view('portfolio.index', compact('projects', 'categories', 'profile'));
    }

    /**
     * Tampilan detail proyek (Rute: /project/{slug})
     */
    public function show($slug)
    {
        // Cari proyek berdasarkan slug, jika tidak ada tampilkan 404
        $project = Project::where('slug', $slug)->with('category')->firstOrFail();

        return view('portfolio.show', compact('project'));
    }

    /**
     * Tampilan proyek berdasarkan kategori (Rute: /category/{slug})
     */
    public function byCategory($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        // Ambil proyek di kategori tersebut
        $projects = $category->projects()->with('category')->latest()->paginate(9);
        $categories = Category::withCount('projects')->get(); // Untuk sidebar/filter

        return view('portfolio.category', compact('projects', 'category', 'categories'));
    }
}