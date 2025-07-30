<?php

namespace App\Filament\Admin\Resources\ItemMovementResource\Pages;

use App\Filament\Admin\Resources\ItemMovementResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditItemMovement extends EditRecord
{
    protected static string $resource = ItemMovementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
