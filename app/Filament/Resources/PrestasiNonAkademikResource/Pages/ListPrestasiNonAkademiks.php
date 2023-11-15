<?php

namespace App\Filament\Resources\PrestasiNonAkademikResource\Pages;

use App\Filament\Resources\PrestasiNonAkademikResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPrestasiNonAkademiks extends ListRecords
{
    protected static string $resource = PrestasiNonAkademikResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
