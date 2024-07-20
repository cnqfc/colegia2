<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WorkingGroupResource\Pages;
use App\Filament\Resources\WorkingGroupResource\RelationManagers;
use App\Models\WorkingGroup;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WorkingGroupResource extends Resource
{
    protected static ?string $model = WorkingGroup::class;

    protected static ?string $modelLabel = 'Grupo de Trabajo';

    protected static ?string $pluralModelLabel = 'Grupos de Trabajo';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nombre')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('description')
                    ->label('Descripción')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Select::make('type')
                    ->label('Tipo')
                    ->options([
                        'seeder' => 'Semillero',
                        'table' => 'Mesa de trabajo',
                        'committee' => 'Comité',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('schedule')
                    ->label('Horario')
                    ->required(),
                Forms\Components\Toggle::make('is_active')
                    ->label('Activo')
                    ->required(),
                Forms\Components\Toggle::make('is_open_to_registration')
                    ->label('Abierto a inscripciones')
                    ->required(),

                Forms\Components\Select::make('leader_id')
                    ->label('Líder')
                    ->relationship('leader', 'name')
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->label('Tipo')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_open_to_registration')
                    ->label('Abierto a inscripciones')
                    ->boolean(),
                Tables\Columns\TextColumn::make('schedule')
                    ->label('Horario')
                    ->searchable(),
                Tables\Columns\TextColumn::make('leader.name')
                    ->label('Líder')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Activo')
                    ->boolean(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListWorkingGroups::route('/'),
            'create' => Pages\CreateWorkingGroup::route('/create'),
            'view' => Pages\ViewWorkingGroup::route('/{record}'),
            'edit' => Pages\EditWorkingGroup::route('/{record}/edit'),
        ];
    }
}
