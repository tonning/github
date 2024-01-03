<?php

namespace Tonning\Github\Requests\Dependabot;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * dependabot/delete-org-secret
 *
 * Deletes a secret in an organization using the secret name. You must authenticate using an access
 * token with the `admin:org` scope to use this endpoint. GitHub Apps must have the
 * `dependabot_secrets` organization permission to use this endpoint.
 */
class DependabotDeleteOrgSecret extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/dependabot/secrets/{$this->secretName}";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $secretName The name of the secret.
     */
    public function __construct(
        protected string $org,
        protected string $secretName,
    ) {
    }
}
