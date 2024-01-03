<?php

namespace Tonning\Github\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/get-org-public-key
 *
 * Gets your public key, which you need to encrypt secrets. You need to
 * encrypt a secret before you can
 * create or update secrets.
 *
 * You must authenticate using an access token with the `admin:org` scope to
 * use this endpoint.
 * If the repository is private, you must use an access token with the `repo`
 * scope.
 * GitHub Apps must have the `secrets` organization permission to use this
 * endpoint.
 * Authenticated users must have collaborator access to a repository to create, update, or
 * read secrets.
 */
class ActionsGetOrgPublicKey extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/actions/secrets/public-key";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function __construct(
        protected string $org,
    ) {
    }
}
