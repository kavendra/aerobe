<?php

namespace App\Providers;

use Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\Websetting;
use App\Models\TopMenu;
use App\Models\Country;
use App\Models\MainMenu;
use App\Models\ConnectWithUsMenu;
use App\Models\ProductsResourceMenu;
use App\Models\LegalInformationMenu;
use App\Models\Testimonial;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
            View::composer('*', function ($view) {
            $websettingInfo = Websetting::first();
            $topMenus = TopMenu::get();
            $countries = Country::where('is_main', 1)->where('status', 1)->orderBy('order', 'ASC')->get();
            $prominent_countries = Country::where('status', 1)->orderBy('order', 'ASC')->get();
            $mainMenus = MainMenu::get();
            $productsResourceMenus = ProductsResourceMenu::get();
            $connectWithUsMenus = ConnectWithUsMenu::get();
            $legalInformationMenus = LegalInformationMenu::get();
            $testimonials = Testimonial::get();
            $categories = Category::get();
            #dd($websettingInfo);    
            // Check if the user is authenticated
            if (Auth::check()) {
                $userInfo = Auth::user(); // Get the authenticated user directly
            } else {
                $userInfo = collect([]); // Return an empty collection for unauthenticated users
            }

            $mainMenus = MainMenu::get();
            $categories = Category::get();

            $portfolioData = [];
            foreach ($categories as $category) {
                $portfolioData[strtolower($category->label)] = $category->ourPortfolios->map(function ($portfolio) {
                    return [
                        'name' => $portfolio->title,
                        'href' => '/portfolio/' . $portfolio->slug,
                        'description' => $portfolio->short_description,
                        'image' => $portfolio->image ? asset('assets/uploads/our-portfolios/'.$portfolio->image) : '',
                    ];
                })->toArray();
            }
            $portfolioJson = json_encode($portfolioData);
            $ip = $_SERVER['REMOTE_ADDR']; # 106.219.238.209
            if (!session()->has('country') || empty(session('country'))) {
                $country = $this->ip_info($ip, "Country");
                session(['country' => $country]);
            }
            $countryName = strtoUpper(session('country'));
            $isCountryExists = Country::where('is_main', 1)->where('label', $countryName)->first();
            
            // Share data with all views
            $view->with([
                'websettingInfo' => $websettingInfo,
                'userInfo' => $userInfo,
                'topMenus' => $topMenus,
                'countries' => $countries,
                'prominent_countries' => $prominent_countries,
                
                'mainMenus' => $mainMenus,
                'productsResourceMenus' => $productsResourceMenus,
                'connectWithUsMenus' => $connectWithUsMenus,
                'legalInformationMenus' => $legalInformationMenus,
                'testimonials' => $testimonials,
                'categories' => $categories,
                'mainMenus' => $mainMenus,
                'categories' => $categories, 
                'portfolioJson' => $portfolioJson, 
                'countryName' => $isCountryExists ? $countryName : 'Global', 
            ]);
        });
    }

    private function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
        $output = NULL;
        if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
            $ip = $_SERVER["REMOTE_ADDR"];
            if ($deep_detect) {
                if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
            }
        }
        $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
        $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
        $continents = array(
            "AF" => "Africa",
            "AN" => "Antarctica",
            "AS" => "Asia",
            "EU" => "Europe",
            "OC" => "Australia (Oceania)",
            "NA" => "North America",
            "SA" => "South America"
        );
        if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
            $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
            if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
                switch ($purpose) {
                    case "location":
                        $output = array(
                            "city"           => @$ipdat->geoplugin_city,
                            "state"          => @$ipdat->geoplugin_regionName,
                            "country"        => @$ipdat->geoplugin_countryName,
                            "country_code"   => @$ipdat->geoplugin_countryCode,
                            "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                            "continent_code" => @$ipdat->geoplugin_continentCode
                        );
                        break;
                    case "address":
                        $address = array($ipdat->geoplugin_countryName);
                        if (@strlen($ipdat->geoplugin_regionName) >= 1)
                            $address[] = $ipdat->geoplugin_regionName;
                        if (@strlen($ipdat->geoplugin_city) >= 1)
                            $address[] = $ipdat->geoplugin_city;
                        $output = implode(", ", array_reverse($address));
                        break;
                    case "city":
                        $output = @$ipdat->geoplugin_city;
                        break;
                    case "state":
                        $output = @$ipdat->geoplugin_regionName;
                        break;
                    case "region":
                        $output = @$ipdat->geoplugin_regionName;
                        break;
                    case "country":
                        $output = @$ipdat->geoplugin_countryName;
                        break;
                    case "countrycode":
                        $output = @$ipdat->geoplugin_countryCode;
                        break;
                }
            }
        }
        return $output;
    }
}
