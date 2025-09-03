<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PublicInformationResource\Pages;
use App\Models\PublicInformation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PublicInformationResource extends Resource
{
    protected static ?string $model = PublicInformation::class;

    protected static ?string $navigationIcon = 'heroicon-o-information-circle';
    protected static ?string $navigationGroup = 'Transparansi';
    protected static ?int $navigationSort = 4;

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

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama Informasi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->label('Deskripsi')
                    ->rows(4)
                    ->required(),
                Forms\Components\DatePicker::make('last_update')
                    ->label('Terakhir Diupdate')
                    ->required(),
                Forms\Components\TextInput::make('icon')
                    ->label('Icon')
                    ->required()
                    ->maxLength(100),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Informasi')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(50),
                Tables\Columns\TextColumn::make('last_update')
                    ->label('Terakhir Diupdate')
                    ->date('d/m/Y')
                    ->sortable(),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPublicInformation::route('/'),
            'create' => Pages\CreatePublicInformation::route('/create'),
            'edit' => Pages\EditPublicInformation::route('/{record}/edit'),
        ];
    }
}
