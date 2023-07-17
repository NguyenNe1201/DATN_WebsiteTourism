<?php

namespace App\Listeners;

use App\Events\UserRatedTour;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\ReviewTour;
use App\Models\Admin\AddTour;
class SendTourRecommendations
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserRatedTour  $event
     * @return void
     */
    public function handle(UserRatedTour $event)
    {
        $userIdA = $event->userIdA;
        $tourId = $event->tourId;

        // Kiểm tra xem User B đã đánh giá tour đó 4 sao trở lên chưa
        $highRatingToursB = ReviewTour::where('tour_id', $tourId)
            ->where('rating_tour', '>=', 4)
            ->whereHas('customer', function ($query) use ($userIdA) {
                $query->where('id', '!=', $userIdA);
            })
            ->pluck('tour_id');

        // Lấy danh sách tour được đề xuất từ User B
        $recommendedTours = AddTour::whereIn('id', $highRatingToursB)->get();

    }
}
