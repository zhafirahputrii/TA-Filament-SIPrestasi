<?php

namespace App\Filament\Resources\PrestasiAkademikResource\Pages;

use App\Filament\Resources\PrestasiAkademikResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPrestasiAkademik extends EditRecord
{
    protected static string $resource = PrestasiAkademikResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
