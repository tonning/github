<?php

namespace Tonning\Github\Requests\Oidc;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * oidc/get-oidc-custom-sub-template-for-org
 *
 * Gets the customization template for an OpenID Connect (OIDC) subject claim.
 * You must authenticate
 * using an access token with the `read:org` scope to use this endpoint.
 * GitHub Apps must have the
 * `organization_administration:write` permission to use this endpoint.
 */
class OidcGetOidcCustomSubTemplateForOrg extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/actions/oidc/customization/sub";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function __construct(
        protected string $org,
    ) {
    }
}
