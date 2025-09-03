<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FinancialReportResource\Pages;
use App\Models\FinancialReport;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class FinancialReportResource extends Resource
{
    protected static ?string $model = FinancialReport::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $navigationGroup = 'Keuangan';
    protected static ?int $navigationSort = 1;

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
                Forms\Components\TextInput::make('name')
                    ->label('Nama Laporan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->label('Deskripsi')
                    ->rows(3),
                Forms\Components\Select::make('type')
                    ->label('Tipe File')
                    ->options([
                        'PDF' => 'PDF',
                        'Excel' => 'Excel',
                        'Word' => 'Word',
                        'Image' => 'Image',
                    ])
                    ->required(),
                Forms\Components\DatePicker::make('date')
                    ->label('Tanggal')
                    ->required(),
                Forms\Components\TextInput::make('size')
                    ->label('Ukuran File')
                    ->required()
                    ->maxLength(50),
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
                    ->label('Nama Laporan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type')
                    ->label('Tipe')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'PDF' => 'danger',
                        'Excel' => 'success',
                        'Word' => 'info',
                        'Image' => 'warning',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('date')
                    ->label('Tanggal')
                    ->date('d/m/Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('size')
                    ->label('Ukuran')
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
            'index' => Pages\ListFinancialReports::route('/'),
            'create' => Pages\CreateFinancialReport::route('/create'),
            'edit' => Pages\EditFinancialReport::route('/{record}/edit'),
        ];
    }
}
