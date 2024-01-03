<?php

namespace Tonning\Github\Requests\Codespaces;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codespaces/list-secrets-for-authenticated-user
 *
 * Lists all development environment secrets available for a user's codespaces without revealing
 * their
 * encrypted values.
 *
 * You must authenticate using an access token with the `codespace` or
 * `codespace:secrets` scope to use this endpoint. User must have Codespaces access to use this
 * endpoint.
 *
 * GitHub Apps must have read access to the `codespaces_user_secrets` user permission to use
 * this endpoint.
 */
class CodespacesListSecretsForAuthenticatedUser extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/user/codespaces/secrets';
    }

    /**
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['page' => $this->page]);
    }
}
