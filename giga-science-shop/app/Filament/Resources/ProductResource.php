<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->label('Product Name')
                    ->maxLength(255),  // Adding max length to product name
                Textarea::make('description')
                    ->required()
                    ->label('Description')
                    ->maxLength(500),  // Adding max length to description
                TextInput::make('price')
                    ->required()
                    ->numeric() // Ensures the input is numeric
                    ->minValue(0)  // Updated from min(0) to minValue(0)
                    ->label('Price')
                    ->placeholder('Enter price in USD'),
                Select::make('category')
                    ->options([
                        'science' => 'Science',
                        'chemistry' => 'Chemistry',
                        'biology' => 'Biology',
                        'physics' => 'Physics',
                    ])
                    ->required()
                    ->label('Category'),
                FileUpload::make('image')
                    ->image()
                    ->nullable()
                    ->label('Product Image'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->sortable()
                    ->searchable()
                    ->label('Product Name'),
                TextColumn::make('category')
                    ->sortable()
                    ->label('Category'),
                TextColumn::make('price')
                    ->sortable()
                    ->label('Price')
                    ->formatStateUsing(fn($state) => '$' . number_format($state, 2)), // Format the price with dollar sign
                ImageColumn::make('image')
                    ->disk('public')
                    ->label('Image'),
                TextColumn::make('created_at')
                    ->dateTime('F j, Y, g:i a')  // More readable format for creation date
                    ->label('Created At'),
            ])
            ->filters([ /* Add filters if needed */ ])
            ->actions([ Tables\Actions\EditAction::make() ])
            ->bulkActions([ Tables\Actions\BulkActionGroup::make([ Tables\Actions\DeleteBulkAction::make() ]) ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
