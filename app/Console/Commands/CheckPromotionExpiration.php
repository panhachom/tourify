<?php

namespace App\Console\Commands;
use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Models\Promotion;
use Illuminate\Support\Facades\Log;

class CheckPromotionExpiration extends Command
{



    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'promotion:check-expiration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if promotions have expired and update their status.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $currentDate = Carbon::now();

        $expiredPromotions = Promotion::where('end_date', '<', $currentDate)
            ->where('status', true)
            ->get();

        foreach ($expiredPromotions as $promotion) {
            $promotion->status = false;
            $promotion->save();

            // Update tour prices to their original values
            // $promotion->tours()->update(['price' => $promotion->tours->first()->original_price]);

        }

        $this->info('Promotions checked for expiration and updated successfully.');
    }
}
