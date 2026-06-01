<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Item;

class FixItemStatuses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fix-item-statuses';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fix item statuses: claimed for found items, returned for lost items';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Update lost items with claimed status to returned
        $updated = Item::where('type', 'lost')
            ->where('status', 'claimed')
            ->update(['status' => 'returned']);

        $this->info("Database updated successfully!");
        $this->info("Rows updated: " . $updated);
        
        // Show status breakdown
        $this->info("\nItem status breakdown:");
        $items = Item::selectRaw('status, type, COUNT(*) as count')
            ->groupBy('status', 'type')
            ->get();
            
        foreach ($items as $item) {
            $this->line("  Type: {$item->type}, Status: {$item->status}, Count: {$item->count}");
        }
    }
}
