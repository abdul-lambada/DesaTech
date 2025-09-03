<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransparencyScoreResource\Pages;
use App\Models\TransparencyScore;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class TransparencyScoreResource extends Resource
{
    protected static ?string $model = TransparencyScore::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
    protected static ?string $navigationGroup = 'Transparansi';
    protected static ?int $navigationSort = 2;

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
                Forms\Components\TextInput::make('overall')
                    ->label('Skor Keseluruhan')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100)
                    ->required(),
                Forms\Components\TextInput::make('category')
                    ->label('Kategori')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('percentage')
                    ->label('Persentase')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100)
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->label('Deskripsi')
                    ->rows(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('overall')
                    ->label('Skor Keseluruhan')
                    ->sortable()
                    ->badge()
                    ->color(fn (int $state): string => match (true) {
                        $state >= 80 => 'success',
                        $state >= 60 => 'warning',
                        default => 'danger',
                    }),
                Tables\Columns\TextColumn::make('category')
                    ->label('Kategori')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('percentage')
                    ->label('Persentase')
                    ->suffix('%')
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
            'index' => Pages\ListTransparencyScores::route('/'),
            'create' => Pages\CreateTransparencyScore::route('/create'),
            'edit' => Pages\EditTransparencyScore::route('/{record}/edit'),
        ];
    }
}
