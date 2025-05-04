<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    protected function getFormSchema(): array
    {
        // Define the fields that you want in the creation form
        return [
            \Filament\Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
            \Filament\Forms\Components\Textarea::make('description')
                ->required(),
            \Filament\Forms\Components\TextInput::make('price')
                ->required()
                ->numeric(),
            \Filament\Forms\Components\TextInput::make('category')
                ->required()
                ->maxLength(255),
            \Filament\Forms\Components\FileUpload::make('image')
                ->image()
                ->disk('public')
                ->directory('product_images')
                ->nullable(),
        ];
    }
}
