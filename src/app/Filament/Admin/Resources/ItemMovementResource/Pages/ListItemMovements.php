<?php

namespace App\Filament\Admin\Resources\ItemMovementResource\Pages;

use App\Filament\Admin\Resources\ItemMovementResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListItemMovements extends ListRecords
{
    protected static string $resource = ItemMovementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
