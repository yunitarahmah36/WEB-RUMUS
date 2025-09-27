<?php

namespace App\Filament\Resources\ProdukResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class GambarProduksRelationManager extends RelationManager
{
    protected static string $relationship = 'gambar';

    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\FileUpload::make('path')->image()->directory('produk')->disk('public')->required(),
            Forms\Components\Toggle::make('is_cover'),
            Forms\Components\TextInput::make('urutan')->numeric()->default(0),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\ImageColumn::make('path')->disk('public'),
            Tables\Columns\IconColumn::make('is_cover')->boolean(),
            Tables\Columns\TextColumn::make('urutan')->sortable(),
        ])->headerActions([Tables\Actions\CreateAction::make()])
          ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()]);
    }
}
