<?php

namespace Tonning\Github\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/delete-org-secret
 *
 * Deletes a secret in an organization using the secret name.
 *
 * You must authenticate using an access
 * token with the `admin:org` scope to use this endpoint.
 * If the repository is private, you must use an
 * access token with the `repo` scope.
 * GitHub Apps must have the `secrets` organization permission to
 * use this endpoint.
 * Authenticated users must have collaborator access to a repository to create,
 * update, or read secrets.
 */
class ActionsDeleteOrgSecret extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/actions/secrets/{$this->secretName}";
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
