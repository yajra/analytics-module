<?php

namespace Modules\Analytics\Http\Controllers;

use App\Http\Controllers\Controller;
use Spatie\Analytics\Analytics;
use Spatie\Analytics\Period;

class AnalyticsController extends Controller
{
    /**
     * @var \Spatie\Analytics\Analytics
     */
    private $analytics;

    /**
     * AnalyticsController constructor.
     *
     * @param \Spatie\Analytics\Analytics $analytics
     */
    public function __construct(Analytics $analytics)
    {
        $this->analytics = $analytics;
    }

    public function index()
    {
        $pages = $this->analytics->fetchMostVisitedPages(Period::days(7));
        $browsers = $this->analytics->fetchTopBrowsers(Period::days(7));
        $referrers = $this->analytics->fetchTopReferrers(Period::days(7));
        $views = $this->analytics->fetchVisitorsAndPageViews(Period::days(30));
        $views = $views->map(function ($view) {
            $view['date'] = $view['date']->format('F d');

            return $view;
        });

        $stats = $this->analytics->fetchTotalVisitorsAndPageViews(Period::days(30));
        $stats = $stats->map(function ($view) {
            $view['date'] = $view['date']->format('F d');

            return $view;
        });



        return view('analytics::index', compact('pages', 'browsers', 'referrers', 'views', 'stats'));
    }
}
