<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LegalitasResource\Pages;
use App\Models\Legalitas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class LegalitasResource extends Resource
{
    protected static ?string $model = Legalitas::class;
    protected static ?string $navigationGroup = 'RUMUS • Katalog';
    protected static ?string $navigationLabel = 'Legalitas';

    public static function form(Form $form): Form
    { return $form->schema([ Forms\Components\TextInput::make('nama')->required(), Forms\Components\TextInput::make('penerbit'), Forms\Components\Textarea::make('deskripsi')->rows(2)->columnSpanFull() ]); }

    public static function table(Table $table): Table
    { return $table->columns([ Tables\Columns\TextColumn::make('nama')->searchable()->sortable(), Tables\Columns\TextColumn::make('penerbit'), Tables\Columns\TextColumn::make('deskripsi')->limit(60) ])->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()]); }

    public static function getPages(): array
    { return [ 'index'=>Pages\ListLegalitas::route('/'), 'create'=>Pages\CreateLegalita::route('/create'), 'edit'=>Pages\EditLegalita::route('/{'+'record'+'}/edit') ]; }
}
