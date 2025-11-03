<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;
use Illuminate\Support\Str; 
use Closure; 
use Filament\Forms\Set;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Select::make('category_id')
                ->relationship('category', 'name')
                ->required()
                ->label('Kategori'),
            TextInput::make('name')
                ->required()
                ->live(onBlur: true)
                ->maxLength(255)
                ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
            TextInput::make('slug')
                ->required()
                ->unique(ignoreRecord: true)
                ->maxLength(255),
            RichEditor::make('detail')
                ->required()
                ->columnSpanFull() 
                ->label('Detail Proyek'),
            FileUpload::make('thumbnail')
                ->disk('public') 
                ->directory('project-thumbnails')
                ->image()
                ->required()
                ->label('Gambar Thumbnail'),
            TextInput::make('youtube_link')
                ->url()
                ->nullable(),
            TextInput::make('github_link')
                ->url()
                ->nullable(),
            Toggle::make('is_featured')
                ->label('Proyek Unggulan'),
        ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            ImageColumn::make('thumbnail')->disk('public'),
            TextColumn::make('name')->searchable(),
            TextColumn::make('category.name')->label('Kategori'),
            IconColumn::make('is_featured')
                ->boolean()
                ->label('Unggulan'),
            TextColumn::make('github_link')
                ->url(fn (Project $record) => $record->github_link)
                ->openUrlInNewTab()
                ->limit(20)
                ->label('Github'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
