<?php

namespace Tonning\Github\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/get-custom-oidc-sub-claim-for-repo
 *
 * Gets the customization template for an OpenID Connect (OIDC) subject claim.
 * You must authenticate
 * using an access token with the `repo` scope to use this
 * endpoint. GitHub Apps must have the
 * `organization_administration:read` permission to use this endpoint.
 */
class ActionsGetCustomOidcSubClaimForRepo extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/actions/oidc/customization/sub";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
    ) {
    }
}
