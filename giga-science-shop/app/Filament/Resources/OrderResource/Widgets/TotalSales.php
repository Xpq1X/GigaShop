<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget;

class TotalSales extends StatsOverviewWidget
{
    protected static ?int $sort = 1; // You can adjust the sorting position on the dashboard

    protected function getCards(): array
    {
        // Calculate the total sales by summing the total of all orders
        $totalSales = Order::sum('total');

        return [
            Card::make('Total Sales', '$' . number_format($totalSales, 2))
                ->description('Total sales revenue')
                ->icon('heroicon-o-currency-dollar'), // You can use any icon you prefer
        ];
    }
}
