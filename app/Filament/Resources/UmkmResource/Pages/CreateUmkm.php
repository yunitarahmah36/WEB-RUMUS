<?php

namespace App\Filament\Resources\UmkmResource\Pages;

use App\Filament\Resources\UmkmResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUmkm extends CreateRecord
{
    protected static string $resource = UmkmResource::class;

    // ✅ setelah create, balik ke halaman list
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
