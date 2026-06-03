<?php
require_once __DIR__ . '/bootstrap/app.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$item = \App\Models\Item::where('type', 'Found')->first();
if ($item) {
    $item->image = 'items/test_image.jpg';
    $item->save();
    echo "Updated item ID {$item->id} with test image\n";
} else {
    echo "No Found items found\n";
}
?>
