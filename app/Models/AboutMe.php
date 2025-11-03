<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutMe extends Model
{
    use HasFactory;

    // Nama tabel disesuaikan dengan migrasi
    protected $table = 'about_mes';

    // Izinkan semua field diisi massal karena ini data admin
    protected $guarded = []; 
    
    // Atau bisa juga menggunakan $fillable
    // protected $fillable = [
    //     'full_name',
    //     'title',
    //     'email',
    //     'phone',
    //     'address',
    //     'photo_url',
    //     'summary',
    //     'key_skills',
    //     'linkedin_url',
    //     'github_url',
    //     'instagram_url',
    // ];
}
