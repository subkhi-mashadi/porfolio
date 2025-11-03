<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutMeResource\Pages;
use App\Models\AboutMe;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Table;
use Filament\Pages\Page;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class AboutMeResource extends Resource
{
    protected static ?string $model = AboutMe::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-circle'; 
    protected static ?string $modelLabel = 'Biodata Diri';
    protected static ?string $pluralModelLabel = 'Biodata Diri';
    
    // Nonaktifkan dari navigasi utama agar tidak mengganggu
    protected static bool $shouldRegisterNavigation = true; 

    // === METHOD UNTUK SINGLETON (Fungsi Inti) ===
    
    private static function getOrCreateProfile(): AboutMe
    {
        $profile = AboutMe::first();
        if (!$profile) {
            // Jika belum ada data, buat satu baris data dummy
            $profile = AboutMe::create([
                'full_name' => 'Nama Lengkap Anda',
                'email' => 'emailanda@example.com',
                'summary' => 'Tuliskan ringkasan profesional Anda di sini.',
            ]);
        }
        return $profile;
    }

    /**
     * PERBAIKAN: Menambahkan parameter opsional $isTenantAided
     * untuk mencocokkan tanda tangan fungsi kelas induk.
     */
    public static function getUrl(string $name = 'index', array $parameters = [], bool $isAbsolute = true, ?string $panel = null, ?Model $tenant = null): string
    {
        // Gunakan $name (yang fungsinya sama dengan $page)
        if ($name === 'index') {
            $profile = static::getOrCreateProfile();
            // Panggil halaman Edit untuk record tersebut. 
            // Kita harus tetap meneruskan semua parameter opsional ke pemanggilan getUrl() rekursif
            return static::getUrl('edit', ['record' => $profile->id], $isAbsolute, $panel, $tenant);
        }
        
        // Untuk halaman lain (seperti 'edit'), gunakan logika default
        return parent::getUrl($name, $parameters, $isAbsolute, $panel, $tenant);
    }
    
    // === FORMULIR ISIAN FILAMENT ===
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Dasar')
                    ->description('Detail pribadi dan kontak Anda.')
                    ->schema([
                        TextInput::make('full_name')->required()->maxLength(255)->label('Nama Lengkap'),
                        TextInput::make('title')->maxLength(255)->label('Gelar/Jabatan Profesional'),
                        TextInput::make('email')->email()->unique(ignoreRecord: true)->required()->maxLength(255),
                        TextInput::make('phone')->tel()->maxLength(255)->label('Nomor Telepon'),
                        TextInput::make('address')->maxLength(255)->label('Alamat/Domisili'),
                    ])->columns(2),

                Section::make('Ringkasan Profesional')
                    ->description('Tuliskan bio atau ringkasan diri yang akan muncul di halaman utama.')
                    ->schema([
                        RichEditor::make('summary')
                            ->required()
                            ->label('Ringkasan/Bio'),
                    ]),

                Section::make('Media & Keahlian')
                    ->description('Kelola foto dan link media sosial Anda.')
                    ->schema([
                        FileUpload::make('photo_url')
                            ->disk('public')
                            ->directory('profile-photos')
                            ->image()
                            ->avatar() 
                            ->maxSize(2048) // Maks 2MB
                            ->label('Foto Profil'),
                        
                        Textarea::make('key_skills')
                            ->rows(5)
                            ->label('Daftar Keahlian Utama (Pisahkan dengan Koma atau Baris Baru)'),
                            
                        TextInput::make('linkedin_url')->url()->label('LinkedIn URL'),
                        TextInput::make('github_url')->url()->label('GitHub URL'),
                        TextInput::make('instagram_url')->url()->label('Instagram URL'),
                    ])->columns(2),
            ]);
    }
    
    // === KONFIGURASI TABEL (Dihilangkan untuk Singleton) ===
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->actions([])
            ->bulkActions([]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    /**
     * Hanya daftarkan halaman Edit
     */
    public static function getPages(): array
    {
        return [
            'edit' => Pages\EditAboutMe::route('/{record}/edit'),
        ];
    }
    
    // === GLOBAL SEARCH (Penting untuk akses cepat) ===
    public static function getGloballySearchableAttributes(): array
    {
        return ['full_name', 'title'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Nama' => $record->full_name,
            'Jabatan' => $record->title,
        ];
    }
    
    // Saat Global Search diklik, arahkan ke halaman edit
    public static function getGlobalSearchResultUrl(Model $record): string
    {
        return static::getUrl('edit', ['record' => $record]);
    }
}