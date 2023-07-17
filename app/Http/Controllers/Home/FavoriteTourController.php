<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\FavoriteBlog;
use Illuminate\Http\Request;
use App\Models\FavoriteTour;
use Illuminate\Support\Facades\Auth;
use App\Models\FavoriteGuider;
class FavoriteTourController extends Controller
{
    // Favorite Tour
    public function toggleFavoriteTour(Request $request)
    {
        $tourId = $request->input('tour_id');
        $userId = Auth::user()->id;

        $favoriteTour = FavoriteTour::where('tour_id', $tourId)
            ->where('customer_id', $userId)
            ->first();

        if ($favoriteTour) {
            $favoriteTour->delete();
            return response()->json(['success' => false]);
        } else {
            $favoriteTour = new FavoriteTour();
            $favoriteTour->tour_id = $tourId;
            $favoriteTour->customer_id = $userId;
            $favoriteTour->save();

            return response()->json(['success' => true]);
        }
    }
    public function checkFavoriteTour(Request $request)
    {
        $tourId = $request->input('tour_id');
        $userId = Auth::user()->id;

        $favoriteTour = FavoriteTour::where('tour_id', $tourId)
            ->where('customer_id', $userId)
            ->exists();

        return response()->json(['isFavorite' => $favoriteTour]);
    }
    // favorite blog
    public function favorite_blog(Request $request)
    {
        $blogId = $request->input('blog_id');
        $userId = Auth::user()->id;

        $favoriteBlog = FavoriteBlog::where('blog_id', $blogId)
            ->where('customer_id', $userId)
            ->first();

        if ($favoriteBlog) {
            $favoriteBlog->delete();
            return response()->json(['success' => false]);
        } else {
            $favoriteBlog = new FavoriteBlog();
            $favoriteBlog->blog_id = $blogId;
            $favoriteBlog->customer_id = $userId;
            $favoriteBlog->save();

            return response()->json(['success' => true]);
        }
    }
    public function checkFavoriteBlog(Request $request)
    {
        $blogId = $request->input('blog_id');
        $userId = Auth::user()->id;

        $favoriteBlog = FavoriteBlog::where('blog_id', $blogId)
            ->where('customer_id', $userId)
            ->exists();

        return response()->json(['isFavorite' => $favoriteBlog]);
    }
    // Farovite Guider
    public function favorite_guider(Request $request){
        $guiderId = $request->input('guider_id');
        $userId = Auth::user()->id;

        $favoriteGuider = FavoriteGuider::where('guider_id', $guiderId)
            ->where('customer_id', $userId)
            ->first();

        if ($favoriteGuider) {
            $favoriteGuider->delete();
            return response()->json(['success' => false]);
        } else {
            $favoriteGuider = new FavoriteGuider();
            $favoriteGuider->guider_id = $guiderId;
            $favoriteGuider->customer_id = $userId;
            $favoriteGuider->save();

            return response()->json(['success' => true]);
        }
    }
    public function checkFavoriteGuider(Request $request){
        $guiderId = $request->input('guider_id');
        $userId = Auth::user()->id;
        $favoriteGuider = FavoriteGuider::where('guider_id', $guiderId)
            ->where('customer_id', $userId)
            ->exists();
        return response()->json(['isFavorite' => $favoriteGuider]);
    }
}
