<?php

namespace App\Filament\Resources\ProdukResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Validation\Rule;

class LinksRelationManager extends RelationManager
{
    protected static string $relationship = 'links';

    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('platform')->options(['shopee'=>'Shopee','tiktok'=>'TikTok','tokopedia'=>'Tokopedia','lazada'=>'Lazada'])->required()
                ->unique(ignoreRecord: true, modifyRuleUsing: function (Rule $rule) { return $rule->where('produk_id', $this->getOwnerRecord()->getKey()); }),
            Forms\Components\TextInput::make('url')->url()->required(),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('platform')->badge(),
            Tables\Columns\TextColumn::make('url')->url(true)->wrap(),
        ])->headerActions([Tables\Actions\CreateAction::make()])
        ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()]);
    }
}
