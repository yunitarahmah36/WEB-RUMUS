<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KategoriResource\Pages;
use App\Models\Kategori;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class KategoriResource extends Resource
{
    protected static ?string $model = Kategori::class;
    protected static ?string $navigationGroup = 'RUMUS • Katalog';

    public static function form(Form $form): Form
    { return $form->schema([ Forms\Components\TextInput::make('nama')->required()->maxLength(100), Forms\Components\Textarea::make('deskripsi')->rows(2)->columnSpanFull() ]); }

    public static function table(Table $table): Table
    { return $table->columns([ Tables\Columns\TextColumn::make('nama')->searchable()->sortable(), Tables\Columns\TextColumn::make('deskripsi')->limit(60) ])->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()]); }

    public static function getPages(): array
    { return [ 'index'=>Pages\ListKategoris::route('/'), 'create'=>Pages\CreateKategori::route('/create'), 'edit'=>Pages\EditKategori::route('/{'+'record'+'}/edit') ]; }
}
