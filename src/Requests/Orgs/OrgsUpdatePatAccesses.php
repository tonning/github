<?php

namespace Tonning\Github\Requests\Orgs;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * orgs/update-pat-accesses
 *
 * Updates the access organization members have to organization resources via fine-grained personal
 * access tokens. Limited to revoking a token's existing access. Only GitHub Apps can call this
 * API,
 * using the `organization_personal_access_tokens: write` permission.
 *
 * **Note**: Fine-grained PATs
 * are in public beta. Related APIs, events, and functionality are subject to change.
 */
class OrgsUpdatePatAccesses extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/personal-access-tokens";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function __construct(
        protected string $org,
    ) {
    }
}
