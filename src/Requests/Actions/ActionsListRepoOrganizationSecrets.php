<?php

namespace Tonning\Github\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/list-repo-organization-secrets
 *
 * Lists all organization secrets shared with a repository without revealing their
 * encrypted
 * values.
 *
 * You must authenticate using an access token with the `repo` scope to use this
 * endpoint.
 * GitHub Apps must have the `secrets` repository permission to use this
 * endpoint.
 * Authenticated users must have collaborator access to a repository to create, update, or
 * read secrets.
 */
class ActionsListRepoOrganizationSecrets extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/actions/organization-secrets";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['page' => $this->page]);
    }
}
