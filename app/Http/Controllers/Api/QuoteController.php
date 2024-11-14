<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Audio;
use App\Models\Category;
use App\Models\LifeExercise;
use App\Models\Theme;
use App\Models\Video;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class QuoteController extends Controller
{
    use ApiResponser;

    public function categories(Request $request)
    {
        $data = DB::select("SELECT `categories`.`name`, `categories`.`type`, `categories`.`image`, `categories`.`id`, COUNT(quotes.category_id) AS totalQuotes FROM `categories` LEFT JOIN `quotes` ON `categories`.`id` = `quotes`.`category_id` GROUP BY `categories`.`id`");
        return $this->success(
            $data,
            'categories get successfully',
            Response::HTTP_OK
        );
    }

    public function quotes(Request $request)
    {
        $isSubscribed = $request->user()->activeSubscription != null;
        $preferences = explode(',', $request->user()->preferences);
        $free =  $isSubscribed ? [0, 1] : [1];
        $placeholders = implode(",", array_fill(0, count($preferences), '?'));
        $freePlaceholders = implode(",", array_fill(0, count($free), '?'));
        $data  = DB::select("SELECT *, IF(id IN (SELECT quote_id FROM quote_user WHERE user_id = ?), true, false) AS favorite FROM quotes WHERE is_free IN($freePlaceholders) AND category_id IN($placeholders) ORDER BY RAND();", [$request->user()->id, ...$free, ...$preferences]);

        return $this->success(
            $data,
            'quotes get get successfully',
            Response::HTTP_OK
        );
    }

    public function videos(Request $request) {
        $isSubscribed = $request->user()->activeSubscription != null;
        $data = Video::whereIn('is_free', $isSubscribed ? [0,1]: [1])->get();
        return $this->success($data, 'videos get successfully');
    }

    public function audio(Request $request) {
        $isSubscribed = $request->user()->activeSubscription != null;
        $data = Audio::whereIn('is_free', $isSubscribed ? [0,1]: [1])->get();
        
        return $this->success($data, 'videos get successfully');
    }

    public function exercises(Request $request) {
        $isSubscribed = $request->user()->activeSubscription != null;
        $data = LifeExercise::whereIn('is_free', $isSubscribed ? [0,1]: [1])->get();
        return $this->success($data, 'exercise get successfully');
    }

    public function quotesByCategory(Request $request, int $category)
    {
        $isSubscribed = $request->user()->activeSubscription != null;
        $free =  $isSubscribed ? [0, 1] : [1];
        $freePlaceholders = implode(",", array_fill(0, count($free), '?'));
        $data  = DB::select("SELECT * FROM quotes WHERE category_id = ? AND is_free IN($freePlaceholders);", [$category, ...$free]);;

        return $this->success(
            $data,
            'quotes get get successfully',
            Response::HTTP_OK
        );
    }

    public function themes(Request $request)
    {
        $data = Theme::all();

        return $this->success(
            $data,
            'themes get get successfully',
            Response::HTTP_OK
        );
    }

    public function category_by_type()
    {
        $data1 = Category::where('type', 'affirmation')->get();
        $data2 = Category::where('type', 'motivation')->get();
        return  $this->success(
            ['affirmation' => $data1, 'motivation' => $data2],
            'themes get get successfully',
            Response::HTTP_OK
        );
    }
}
