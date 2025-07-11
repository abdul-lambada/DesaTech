<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RecipientCategoryResource\Pages;
use App\Models\RecipientCategory;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class RecipientCategoryResource extends Resource
{
    protected static ?string $model = RecipientCategory::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Data Bantuan';
    protected static ?int $navigationSort = 2;

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->maxLength(65535),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('description')->limit(50),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->filters([
                // Tambahkan filter jika diperlukan
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRecipientCategories::route('/'),
            'create' => Pages\CreateRecipientCategory::route('/create'),
            'edit' => Pages\EditRecipientCategory::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return Auth::user()?->can('viewAny', RecipientCategory::class) ?? false;
    }
    public static function canCreate(): bool
    {
        return Auth::user()?->can('create', RecipientCategory::class) ?? false;
    }
    public static function canEdit($record): bool
    {
        return Auth::user()?->can('update', $record) ?? false;
    }
    public static function canDelete($record): bool
    {
        return Auth::user()?->can('delete', $record) ?? false;
    }
    public static function shouldRegisterNavigation(): bool
    {
        return Auth::user()?->can('viewAny', RecipientCategory::class) ?? false;
    }
} 