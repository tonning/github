<?php

namespace Tonning\Github\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/list-self-hosted-runners-for-repo
 *
 * Lists all self-hosted runners configured in a repository.
 *
 * You must authenticate using an access
 * token with the `repo` scope to use this endpoint.
 * GitHub Apps must have the `administration`
 * permission for repositories and the `organization_self_hosted_runners` permission for
 * organizations.
 * Authenticated users must have admin access to repositories or organizations, or the
 * `manage_runners:enterprise` scope for enterprises, to use these endpoints.
 */
class ActionsListSelfHostedRunnersForRepo extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/actions/runners";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  null|string  $name The name of a self-hosted runner.
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected ?string $name = null,
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['name' => $this->name, 'page' => $this->page]);
    }
}
