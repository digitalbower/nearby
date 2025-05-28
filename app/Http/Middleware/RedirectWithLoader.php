<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectWithLoader
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Let the request continue
        $response = $next($request);

        // Optionally, you can inject a loader script into response content
        if ($response instanceof \Illuminate\Http\Response && $response->isSuccessful()) {
            $content = $response->getContent();

            $loaderScript = <<<HTML
                <script>
                    const loader = document.getElementById('page-loader');
                    if (loader) loader.style.display = 'none';
                </script>
            HTML;

            $content = str_replace('</body>', $loaderScript . '</body>', $content);
            $response->setContent($content);
        }

        return $response;
    }
}
