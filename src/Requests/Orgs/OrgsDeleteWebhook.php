<?php

namespace Tonning\Github\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/delete-webhook
 */
class OrgsDeleteWebhook extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/hooks/{$this->hookId}";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $hookId The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     */
    public function __construct(
        protected string $org,
        protected int $hookId,
    ) {
    }
}
