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
        $pages     = $this->analytics->fetchMostVisitedPages(Period::days(7));
        $browsers  = $this->analytics->fetchTopBrowsers(Period::days(7));
        $referrers = $this->analytics->fetchTopReferrers(Period::days(7));

        $stats = $this->analytics->fetchTotalVisitorsAndPageViews(Period::days(14));
        $stats = $stats->map(function ($view) {
            $view['date'] = $view['date']->format('F d');

            return $view;
        });

        $countries = $this->fetchTotalCountrySessions(Period::days(30));

        return view('analytics::index', compact('pages', 'browsers', 'referrers', 'views', 'stats', 'countries'));
    }

    /**
     * @param \Spatie\Analytics\Period $period
     * @return \Illuminate\Support\Collection
     */
    private function fetchTotalCountrySessions(Period $period)
    {
        $response = $this->analytics->performQuery(
            $period,
            'ga:sessions',
            [
                'dimensions' => 'ga:country',
                'sort'       => '-ga:sessions',
            ]
        );

        return collect($response['rows'] ?? [])->map(function (array $dateRow) {
            return [
                'country'  => $dateRow[0],
                'sessions' => (int) $dateRow[1],
            ];
        });
    }
}
