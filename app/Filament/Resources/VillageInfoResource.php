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
                TextInput::make('title')
                    ->label('Judul')
                    ->required()
                    ->maxLength(255),
                TextInput::make('description')
                    ->label('Deskripsi')
                    ->required()
                    ->maxLength(255),
                TextInput::make('icon')
                    ->label('Icon')
                    ->required()
                    ->maxLength(100),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(50),
                Tables\Columns\TextColumn::make('icon')
                    ->label('Icon')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Tidak ada filter khusus
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->visible(fn () => Auth::user()?->hasRole('Administrator')),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->visible(fn () => Auth::user()?->hasRole('Administrator')),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVillageInfo::route('/'),
            'create' => Pages\CreateVillageInfo::route('/create'),
            'edit' => Pages\EditVillageInfo::route('/{record}/edit'),
        ];
    }
}
