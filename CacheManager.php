<?php
/**
 * Created by PhpStorm.
 * User: jacson
 * Date: 23/04/18
 * Time: 15:08
 */

namespace Seu\Name\Space;

use Illuminate\Cache\Repository;

class CacheManager
{
    protected $cache;

    private $enable;

    private $minutes;

    private $data = [];

    public function __construct(Repository $cache, $minutes = 5)
    {
        $this->enable = env('CACHE_EN');
        $this->cache = $cache;
        $this->minutes = $minutes;
    }

    public function __set($key,$value)
    {
        if ($this->enable && !$this->cache->has($key)) {
            $this->cache->put($key,$value,$this->minutes);
        } else {
            $this->data[$key] = $value;
        }
    }
    public function __get($key)
    {
        if ($this->enable && $this->cache->has($key)) {
            return $this->cache->get($key);
        }

        if (array_key_exists($key, $this->data)) {
            return $this->data[$key];
        }

        return null;
    }
    public function has($key)
    {
        if ($this->enable && $this->cache->has($key)) {
            return true;
        }

        if (array_key_exists($key, $this->data)) {
            return true;
        }

        return false;
    }
}
