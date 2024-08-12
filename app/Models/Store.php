<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Store extends Model
{
    protected $fillable = [
        'store_name',
        'store_address',
        'store_city',
        'store_state',
        'store_zip',
        'store_longitude',
        'store_latitude',
    ];
	
	public function reports()
	{
		return $this->hasMany(Report::class);
	}

    public function calculateAverageReportTime()
    {
        return $this->calculateAverageForPeriod();
    }

    public function calculateAverageForPeriod($days = null)
    {
        $query = $this->reports()
            ->whereNotNull('check_in')
            ->whereNotNull('check_out');

        if ($days !== null) {
            $startDate = now()->subDays($days);
            $query->where('check_in', '>=', $startDate);
        }

        $reports = $query->get();

        $totalSeconds = 0;
        $count = 0;

        foreach ($reports as $report) {
            $checkIn = Carbon::parse($report->check_in);
            $checkOut = Carbon::parse($report->check_out);
            
            if ($checkOut->gt($checkIn)) {  // Ensure check_out is after check_in
                $totalSeconds += $checkOut->diffInSeconds($checkIn);
                $count++;
            }
        }

        if ($count === 0) {
            return 'N/A';
        }

        $averageMinutes = $totalSeconds / $count;
        
        return $this->formatDuration($averageMinutes);
    }

    private function formatDuration($minutes)
    {
        // Ensure we're working with a positive value
        $minutes = abs($minutes);
		
		$hours = floor($minutes / 60);
        $remainingMinutes = round($minutes % 60);

        if ($hours > 0) {
            return sprintf("%d hours %d minutes", $hours, $remainingMinutes);
        } else {
            return sprintf("%d minutes", $remainingMinutes);
        }
    }
}