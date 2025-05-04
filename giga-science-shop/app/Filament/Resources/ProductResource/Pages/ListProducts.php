<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProducts extends ListRecords
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(), // Button to create new products
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Actions\EditAction::make(), // Edit button for each product
            Actions\DeleteAction::make(), // Delete button for each product
        ];
    }

    protected function getTableColumns(): array
    {
        return [
            \Filament\Tables\Columns\TextColumn::make('name')
                ->sortable()
                ->searchable(),
            \Filament\Tables\Columns\TextColumn::make('category')
                ->sortable(),
            \Filament\Tables\Columns\TextColumn::make('price')
                ->sortable()
                ->money('USD'),
            \Filament\Tables\Columns\ImageColumn::make('image')
                ->image()
                ->disk('public')
                ->url(fn ($record) => $record->image ? asset('storage/' . $record->image) : null),
            \Filament\Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable(),
        ];
    }
}
