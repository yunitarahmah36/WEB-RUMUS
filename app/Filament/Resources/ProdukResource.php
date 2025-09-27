<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdukResource\Pages;
use App\Filament\Resources\ProdukResource\RelationManagers\GambarProduksRelationManager;
use App\Filament\Resources\ProdukResource\RelationManagers\LinksRelationManager;
use App\Filament\Resources\ProdukResource\RelationManagers\LegalitasRelationManager;
use App\Models\Kategori;
use App\Models\Produk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProdukResource extends Resource
{
    protected static ?string $model = Produk::class;
    protected static ?string $navigationGroup = 'RUMUS • Katalog';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nama')->required()->maxLength(150),
            Forms\Components\Select::make('kategori_id')->label('Kategori')->options(fn() => Kategori::orderBy('nama')->pluck('nama','id'))->searchable()->preload(),
            Forms\Components\TextInput::make('harga')->numeric()->prefix('Rp')->default(0)->required(),
            Forms\Components\Toggle::make('is_active')->label('Tampilkan')->default(true),
            Forms\Components\Textarea::make('deskripsi_singkat')->rows(2)->maxLength(200),
            Forms\Components\RichEditor::make('deskripsi_lengkap')->nullable(),
        ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('nama')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('kategori.nama')->label('Kategori')->sortable(),
            Tables\Columns\TextColumn::make('harga')->money('IDR', true)->sortable(),
            Tables\Columns\IconColumn::make('is_active')->boolean()->label('Aktif'),
        ])->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()]);
    }

    public static function getRelations(): array
    { return [ GambarProduksRelationManager::class, LinksRelationManager::class, LegalitasRelationManager::class ]; }

    public static function getPages(): array
    { return [ 'index' => Pages\ListProduks::route('/'), 'create' => Pages\CreateProduk::route('/create'), 'edit' => Pages\EditProduk::route('/{'+'record'+'}/edit') ]; }
}
