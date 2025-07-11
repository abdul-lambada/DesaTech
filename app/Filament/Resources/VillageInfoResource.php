<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VillageInfoResource\Pages;
use App\Models\VillageInfo;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class VillageInfoResource extends Resource
{
    protected static ?string $model = VillageInfo::class;

    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $navigationGroup = 'Profil Desa';
    protected static ?string $navigationLabel = 'Village Info';
    protected static ?string $modelLabel = 'Village Info';
    protected static ?string $pluralModelLabel = 'Village Info';

    public static function canViewAny(): bool
    {
        return Auth::user()?->can('manage_system_config') || Auth::user()?->hasRole('Administrator');
    }

    public static function canCreate(): bool
    {
        return Auth::user()?->can('manage_system_config') || Auth::user()?->hasRole('Administrator');
    }

    public static function canEdit(Model $record): bool
    {
        return Auth::user()?->can('manage_system_config') || Auth::user()?->hasRole('Administrator');
    }

    public static function canDelete(Model $record): bool
    {
        return Auth::user()?->hasRole('Administrator');
    }

    public static function shouldRegisterNavigation(): bool
    {
        return Auth::user()?->can('manage_system_config') || Auth::user()?->hasRole('Administrator');
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nama Desa')
                    ->required()
                    ->maxLength(255),
                TextInput::make('address')
                    ->label('Alamat')
                    ->maxLength(255),
                TextInput::make('village_head')
                    ->label('Kepala Desa')
                    ->maxLength(255),
                TextInput::make('phone')
                    ->label('Telepon')
                    ->maxLength(50),
                TextInput::make('email')
                    ->label('Email')
                    ->maxLength(100),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Nama Desa')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('village_head')->label('Kepala Desa')->sortable(),
                Tables\Columns\TextColumn::make('phone')->label('Telepon'),
                Tables\Columns\TextColumn::make('email')->label('Email'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVillageInfo::class,
            'create' => Pages\CreateVillageInfo::class,
            'edit' => Pages\EditVillageInfo::class,
        ];
    }
} 