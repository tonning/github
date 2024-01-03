<?php

namespace Tonning\Github\Requests\Codespaces;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codespaces/set-codespaces-access
 *
 * Sets which users can access codespaces in an organization. This is synonymous with granting or
 * revoking codespaces access permissions for users according to the visibility.
 * You must authenticate
 * using an access token with the `admin:org` scope or the `Organization codespaces settings` write
 * permission to use this endpoint.
 */
class CodespacesSetCodespacesAccess extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/codespaces/access";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function __construct(
        protected string $org,
    ) {
    }
}
