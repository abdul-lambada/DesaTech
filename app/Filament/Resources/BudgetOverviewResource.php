<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BudgetOverviewResource\Pages;
use App\Models\BudgetOverview;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BudgetOverviewResource extends Resource
{
    protected static ?string $model = BudgetOverview::class;

    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-bar';
    protected static ?string $navigationGroup = 'Keuangan';
    protected static ?int $navigationSort = 2;

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
                Forms\Components\TextInput::make('year')
                    ->label('Tahun')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('total_budget')
                    ->label('Total Anggaran')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('realized_budget')
                    ->label('Realisasi Anggaran')
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
                Tables\Columns\TextColumn::make('year')
                    ->label('Tahun')
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_budget')
                    ->label('Total Anggaran')
                    ->money('IDR', true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('realized_budget')
                    ->label('Realisasi Anggaran')
                    ->money('IDR', true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('percentage')
                    ->label('Persentase Realisasi')
                    ->suffix('%')
                    ->sortable(),
                Tables\Columns\TextColumn::make('remaining_budget')
                    ->label('Sisa Anggaran')
                    ->money('IDR', true)
                    ->getStateUsing(fn ($record) => $record->total_budget - $record->realized_budget),
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
            'index' => Pages\ListBudgetOverviews::route('/'),
            'create' => Pages\CreateBudgetOverview::route('/create'),
            'edit' => Pages\EditBudgetOverview::route('/{record}/edit'),
        ];
    }
}
