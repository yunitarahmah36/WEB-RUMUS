<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UmkmResource\Pages;
use App\Models\Umkm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class UmkmResource extends Resource
{
    protected static ?string $model = Umkm::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';
    protected static ?string $navigationLabel = 'UMKM';
    protected static ?string $pluralModelLabel = 'UMKM';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nama_pemilik')
                ->label('Nama Pemilik')
                ->required()
                ->maxLength(100),

            Forms\Components\TextInput::make('nama_umkm')
                ->label('Nama UMKM')
                ->required()
                ->maxLength(100),

            Forms\Components\Textarea::make('deskripsi')
                ->label('Deskripsi')
                ->required(),

            Forms\Components\TextInput::make('no_hp')
                ->label('No. HP')
                ->required()
                ->minLength(10)                 // minimal 10 digit
                ->maxLength(13)                 // maksimal 13 digit
                ->rule('regex:/^[0-9]+$/')      // validasi hanya angka
                ->tel(),                        // input tel (tanpa spinner di desktop)
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            // ✅ nomor urut otomatis sesuai baris
            Tables\Columns\TextColumn::make('nomor')
                ->rowIndex()
                ->label('No'),

            Tables\Columns\TextColumn::make('nama_umkm')
                ->label('Nama UMKM')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('nama_pemilik')
                ->label('Pemilik'),

            Tables\Columns\TextColumn::make('no_hp')
                ->label('No. HP'),

            Tables\Columns\TextColumn::make('created_at')
                ->label('Dibuat')
                ->dateTime('d M Y H:i'),

            Tables\Columns\TextColumn::make('updated_at')
                ->label('Diperbarui')
                ->dateTime('d M Y H:i'),
        ])
        ->filters([])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListUmkms::route('/'),
            'create' => Pages\CreateUmkm::route('/create'),
            'edit'   => Pages\EditUmkm::route('/{record}/edit'),
        ];
    }
}
