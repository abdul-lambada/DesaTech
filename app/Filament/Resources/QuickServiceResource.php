<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuickServiceResource\Pages;
use App\Models\QuickService;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Forms\Components\TextInput;

class QuickServiceResource extends Resource
{
    protected static ?string $model = QuickService::class;

    protected static ?string $navigationIcon = 'heroicon-o-bolt';
    protected static ?string $navigationGroup = 'Layanan';
    protected static ?string $navigationLabel = 'Quick Services';
    protected static ?string $modelLabel = 'Quick Service';
    protected static ?string $pluralModelLabel = 'Quick Services';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nama Layanan')
                    ->required()
                    ->maxLength(255),
                TextInput::make('description')
                    ->label('Deskripsi')
                    ->maxLength(255),
                TextInput::make('icon')
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
                    ->label('Nama Layanan')
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
                // Add filters if needed
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQuickServices::route('/'),
            'create' => Pages\CreateQuickService::route('/create'),
            'edit' => Pages\EditQuickService::route('/{record}/edit'),
        ];
    }
}
