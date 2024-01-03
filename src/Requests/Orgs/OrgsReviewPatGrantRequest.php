<?php

namespace Tonning\Github\Requests\Orgs;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * orgs/review-pat-grant-request
 *
 * Approves or denies a pending request to access organization resources via a fine-grained personal
 * access token. Only GitHub Apps can call this API,
 * using the
 * `organization_personal_access_token_requests: write` permission.
 *
 * **Note**: Fine-grained PATs are in
 * public beta. Related APIs, events, and functionality are subject to change.
 */
class OrgsReviewPatGrantRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/personal-access-token-requests/{$this->patRequestId}";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $patRequestId Unique identifier of the request for access via fine-grained personal access token.
     */
    public function __construct(
        protected string $org,
        protected int $patRequestId,
    ) {
    }
}
