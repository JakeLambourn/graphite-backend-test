<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Foundation\Application;

/**
 * Class CachingMiddleware
 * @package App\Http\Middleware
 *
 * This is intentionally broken :-)
 */
class CachingMiddleware
{
    /**
     * @var \Illuminate\Contracts\Foundation\Application
     */
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     *
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if ($request->path() != '/') {
            return $response;
        }

        $original = $response->getOriginalContent();

        // Random selection of caching
        $doCache = $request->session()->get('gd_do_cache', 1);
        $cachePath = $this->app->storagePath().'/backend-test-cache.dat';

        if ($doCache) {
            // Determine a random amount of requests to skip before showing the old cached version
            // 30 should be enough to be confusing enough without being massively obvious...
            try {
                $requestSkipCount = random_int(1, 30);
            } catch (\Exception $e) {
                $requestSkipCount = 1;
            }

            file_put_contents($cachePath, $original);
            $request->session()->put('gd_request_skip_count', $requestSkipCount);
            $request->session()->put('gd_request_count', 0);
            $request->session()->put('gd_do_cache', 0);
            $request->session()->save();

            // Continue as normal
            return $response;
        }

        // Show the random cached version if
        $requestSkipCount = $request->session()->get('gd_request_skip_count', 0);
        $requestCount = $request->session()->get('gd_request_count', 0);
        $request->session()->put('gd_request_count', ++$requestCount);

        if ($requestCount >= $requestSkipCount) {
            // Return the cached version & cache next time
            $request->session()->put('gd_do_cache', 1);

            $cacheData = file_get_contents($cachePath);
            if (strlen($cacheData)) {
                $cacheData .= '<!-- cached data -->';
                $response->setContent($cacheData);
            }
        }
        $request->session()->save();

        return $response;
    }
}
