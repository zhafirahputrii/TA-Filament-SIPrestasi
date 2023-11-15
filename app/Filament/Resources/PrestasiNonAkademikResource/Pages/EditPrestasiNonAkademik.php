<?php

namespace App\Filament\Resources\PrestasiNonAkademikResource\Pages;

use App\Filament\Resources\PrestasiNonAkademikResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPrestasiNonAkademik extends EditRecord
{
    protected static string $resource = PrestasiNonAkademikResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
