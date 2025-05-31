<?php

namespace App\Filament\Resources\KostOwnerResource\Pages;

use App\Filament\Resources\KostOwnerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKostOwners extends ListRecords
{
    protected static string $resource = KostOwnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
