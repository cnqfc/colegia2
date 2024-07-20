<?php

namespace App\Filament\Resources\WorkingGroupResource\Pages;

use App\Filament\Resources\WorkingGroupResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewWorkingGroup extends ViewRecord
{
    protected static string $resource = WorkingGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
