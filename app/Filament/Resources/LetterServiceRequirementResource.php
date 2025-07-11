<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LetterServiceRequirementResource\Pages;
use App\Models\LetterServiceRequirement;
use App\Models\LetterService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class LetterServiceRequirementResource extends Resource
{
    protected static ?string $model = LetterServiceRequirement::class;

    protected static ?string $navigationIcon = 'heroicon-o-list-bullet';
    protected static ?string $navigationGroup = 'Layanan';
    protected static ?int $navigationSort = 3;

    public static function canViewAny(): bool
    {
        return Auth::user()?->can('manage_letter_services') || Auth::user()?->hasRole('Administrator');
    }

    public static function canCreate(): bool
    {
        return Auth::user()?->can('manage_letter_services') || Auth::user()?->hasRole('Administrator');
    }

    public static function canEdit(Model $record): bool
    {
        return Auth::user()?->can('manage_letter_services') || Auth::user()?->hasRole('Administrator');
    }

    public static function canDelete(Model $record): bool
    {
        return Auth::user()?->hasRole('Administrator');
    }

    public static function shouldRegisterNavigation(): bool
    {
        return Auth::user()?->can('manage_letter_services') || Auth::user()?->hasRole('Administrator');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('letter_service_id')
                    ->label('Layanan Surat')
                    ->options(LetterService::pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('requirement')
                    ->label('Persyaratan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('is_required')
                    ->label('Wajib?')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('letterService.name')
                    ->label('Layanan Surat')
                    ->sortable(),
                Tables\Columns\TextColumn::make('requirement')
                    ->label('Persyaratan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_required')
                    ->label('Wajib?')
                    ->boolean(),
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
            'index' => Pages\ListLetterServiceRequirements::route('/'),
            'create' => Pages\CreateLetterServiceRequirement::route('/create'),
            'edit' => Pages\EditLetterServiceRequirement::route('/{record}/edit'),
        ];
    }
}
