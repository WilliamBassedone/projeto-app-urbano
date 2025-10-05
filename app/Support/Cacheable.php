<?php

namespace App\Support;

use Illuminate\Support\Facades\Cache;

trait Cacheable
{
    protected function cacheEnabled(): bool
    {
        if (config('cache.default') === 'null') {
            return false;
        }
        return (bool) config('cache.enabled', true);
    }

    protected function remember(string $key, int $seconds, \Closure $callback)
    {
        if (! $this->cacheEnabled()) {
            return $callback();
        }
        return Cache::remember($key, $seconds, $callback);
    }

    protected function versionedKey(string $ns, string $key): string
    {
        $v = Cache::get("ns:$ns", 1);
        return "{$ns}:v{$v}:{$key}";
    }

    protected function bump(string $ns): void
    {
        $v = Cache::get("ns:$ns", 1);
        Cache::put("ns:$ns", $v + 1);
    }
}
