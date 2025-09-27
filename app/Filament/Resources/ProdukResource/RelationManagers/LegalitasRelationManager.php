<?php

namespace App\Filament\Resources\ProdukResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\BelongsToManyRelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class LegalitasRelationManager extends BelongsToManyRelationManager
{
    protected static string $relationship = 'legalitas';

    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nomor_sertifikat'),
            Forms\Components\DatePicker::make('tanggal_terbit'),
            Forms\Components\DatePicker::make('tanggal_kadaluwarsa'),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('nama')->searchable(),
            Tables\Columns\TextColumn::make('pivot.nomor_sertifikat'),
            Tables\Columns\TextColumn::make('pivot.tanggal_terbit')->date(),
            Tables\Columns\TextColumn::make('pivot.tanggal_kadaluwarsa')->date(),
        ])->headerActions([Tables\Actions\AttachAction::make()->preloadRecordSelect()])
          ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DetachAction::make()]);
    }
}
