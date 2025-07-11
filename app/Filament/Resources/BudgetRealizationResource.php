<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BudgetRealizationResource\Pages;
use App\Models\BudgetRealization;
use App\Models\BudgetCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BudgetRealizationResource extends Resource
{
    protected static ?string $model = BudgetRealization::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?string $navigationGroup = 'Keuangan';
    protected static ?int $navigationSort = 4;

    public static function canViewAny(): bool
    {
        return Auth::user()?->can('manage_financial_data') || Auth::user()?->hasRole('Administrator');
    }

    public static function canCreate(): bool
    {
        return Auth::user()?->can('manage_financial_data') || Auth::user()?->hasRole('Administrator');
    }

    public static function canEdit(Model $record): bool
    {
        return Auth::user()?->can('manage_financial_data') || Auth::user()?->hasRole('Administrator');
    }

    public static function canDelete(Model $record): bool
    {
        return Auth::user()?->hasRole('Administrator');
    }

    public static function shouldRegisterNavigation(): bool
    {
        return Auth::user()?->can('manage_financial_data') || Auth::user()?->hasRole('Administrator');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('category_id')
                    ->label('Kategori Anggaran')
                    ->options(BudgetCategory::pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('planned')
                    ->label('Anggaran Direncanakan')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('realized')
                    ->label('Anggaran Terealisasi')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('percentage')
                    ->label('Persentase Realisasi (%)')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Kategori')
                    ->sortable(),
                Tables\Columns\TextColumn::make('planned')
                    ->label('Anggaran Direncanakan')
                    ->money('IDR', true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('realized')
                    ->label('Anggaran Terealisasi')
                    ->money('IDR', true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('percentage')
                    ->label('Persentase Realisasi')
                    ->suffix('%')
                    ->sortable(),
                Tables\Columns\TextColumn::make('variance')
                    ->label('Selisih')
                    ->money('IDR', true)
                    ->getStateUsing(fn ($record) => $record->realized - $record->planned),
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
            'index' => Pages\ListBudgetRealizations::route('/'),
            'create' => Pages\CreateBudgetRealization::route('/create'),
            'edit' => Pages\EditBudgetRealization::route('/{record}/edit'),
        ];
    }
}
