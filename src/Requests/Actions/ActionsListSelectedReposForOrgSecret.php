<?php

namespace Tonning\Github\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/list-selected-repos-for-org-secret
 *
 * Lists all repositories that have been selected when the `visibility`
 * for repository access to a
 * secret is set to `selected`.
 *
 * You must authenticate using an access token with the `admin:org` scope
 * to use this endpoint.
 * If the repository is private, you must use an access token with the `repo`
 * scope.
 * GitHub Apps must have the `secrets` organization permission to use this
 * endpoint.
 * Authenticated users must have collaborator access to a repository to create, update, or
 * read secrets.
 */
class ActionsListSelectedReposForOrgSecret extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/actions/secrets/{$this->secretName}/repositories";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $secretName The name of the secret.
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected string $org,
        protected string $secretName,
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['page' => $this->page]);
    }
}
