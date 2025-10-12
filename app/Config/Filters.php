<?php

namespace Config;

use CodeIgniter\Config\Filters as BaseFilters;
use CodeIgniter\Filters\Cors;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\ForceHTTPS;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\PageCache;
use CodeIgniter\Filters\PerformanceMetrics;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseFilters
{
    /**
     * Configures aliases for Filter classes.
     */
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'cors'          => Cors::class,
        'forcehttps'    => ForceHTTPS::class,
        'pagecache'     => PageCache::class,
        'performance'   => PerformanceMetrics::class,
        'roleauth' => \App\Filters\RoleAuth::class,


        // ✅ Add this one (your auth filter)
        'auth'          => \App\Filters\AuthFilter::class,
    ];

    /**
     * Special required filters.
     */
    public array $required = [
        'before' => [
            'forcehttps',
            'pagecache',
        ],
        'after' => [
            'pagecache',
            'performance',
            'toolbar',
        ],
    ];

    /**
     * Global filters (run on every request).
     */
    public array $globals = [
        'before' => [
            'csrf',
        ],
        'after' => [],
    ];

    /**
     * Method-based filters.
     */
    public array $methods = [];

    /**
     * Route-based filters.
     */
    public array $filters = [
        // ✅ This is the correct place for route restrictions
        'auth' => ['before' => ['admin/*']],
    ];
}
