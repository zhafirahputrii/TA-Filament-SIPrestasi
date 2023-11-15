<?php

namespace App\Filament\Resources\PrestasiAkademikResource\Pages;

use App\Filament\Resources\PrestasiAkademikResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPrestasiAkademiks extends ListRecords
{
    protected static string $resource = PrestasiAkademikResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
