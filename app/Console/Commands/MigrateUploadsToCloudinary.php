<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Claim;
use App\Models\ReturnItem;
use Illuminate\Support\Facades\Storage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class MigrateUploadsToCloudinary extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:uploads-cloudinary';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Upload local stored claim/return images to Cloudinary and update DB with secure URLs';

    public function handle()
    {
        $this->info('Starting migration of claim images...');

        $claims = Claim::whereNotNull('image')->get();
        foreach ($claims as $claim) {
            if ($this->isRemoteUrl($claim->image)) {
                continue;
            }

            $path = $claim->image;
            if (Storage::disk('public')->exists($path)) {
                $fullPath = Storage::disk('public')->path($path);
                try {
                    $uploaded = Cloudinary::uploadApi()->upload($fullPath, [
                        'folder' => 'lost_found_claims',
                        'resource_type' => 'auto'
                    ]);
                    $claim->image = $uploaded['secure_url'] ?? $claim->image;
                    $claim->save();
                    $this->info("Claim #{$claim->id} migrated to Cloudinary.");
                } catch (\Exception $e) {
                    \Log::error('Cloudinary migrate claim error: ' . $e->getMessage());
                    $this->error("Claim #{$claim->id} failed: {$e->getMessage()}");
                }
            } else {
                $this->warn("Claim #{$claim->id} local file not found: {$path}");
            }
        }

        $this->info('Starting migration of return images...');

        $returns = ReturnItem::whereNotNull('image')->get();
        foreach ($returns as $ret) {
            if ($this->isRemoteUrl($ret->image)) {
                continue;
            }

            $path = $ret->image;
            if (Storage::disk('public')->exists($path)) {
                $fullPath = Storage::disk('public')->path($path);
                try {
                    $uploaded = Cloudinary::uploadApi()->upload($fullPath, [
                        'folder' => 'lost_found_returns',
                        'resource_type' => 'auto'
                    ]);
                    $ret->image = $uploaded['secure_url'] ?? $ret->image;
                    $ret->save();
                    $this->info("Return #{$ret->id} migrated to Cloudinary.");
                } catch (\Exception $e) {
                    \Log::error('Cloudinary migrate return error: ' . $e->getMessage());
                    $this->error("Return #{$ret->id} failed: {$e->getMessage()}");
                }
            } else {
                $this->warn("Return #{$ret->id} local file not found: {$path}");
            }
        }

        $this->info('Migration complete.');
        return 0;
    }

    private function isRemoteUrl($value)
    {
        return preg_match('/^https?:\/\//', $value) === 1 || preg_match('/^data:/', $value) === 1;
    }
}
