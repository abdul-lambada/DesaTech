<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AssistanceProgramResource\Pages;
use App\Models\AssistanceProgram;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class AssistanceProgramResource extends Resource
{
    protected static ?string $model = AssistanceProgram::class;
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-list';
    protected static ?string $navigationGroup = 'Data Bantuan';
    protected static ?int $navigationSort = 1;

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
            'index' => Pages\ListAssistancePrograms::route('/'),
            'create' => Pages\CreateAssistanceProgram::route('/create'),
            'edit' => Pages\EditAssistanceProgram::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return Auth::user()?->can('viewAny', AssistanceProgram::class) ?? false;
    }
    public static function canCreate(): bool
    {
        return Auth::user()?->can('create', AssistanceProgram::class) ?? false;
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
        return Auth::user()?->can('viewAny', AssistanceProgram::class) ?? false;
    }
} 