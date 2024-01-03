<?php

namespace Tonning\Github\Resource;

use Saloon\Contracts\Response;
use Tonning\Github\Requests\RateLimit\RateLimitGet;
use Tonning\Github\Resource;

class RateLimit extends Resource
{
    public function rateLimitGet(): Response
    {
        return $this->connector->send(new RateLimitGet());
    }
}
