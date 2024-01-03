<?php

namespace Tonning\Github\Requests\Orgs;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * orgs/create-webhook
 *
 * Here's how you can create a hook that posts payloads in JSON format:
 */
class OrgsCreateWebhook extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/hooks";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function __construct(
        protected string $org,
    ) {
    }
}
