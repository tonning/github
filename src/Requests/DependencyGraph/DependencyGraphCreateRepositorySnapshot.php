<?php

namespace Tonning\Github\Requests\DependencyGraph;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * dependency-graph/create-repository-snapshot
 *
 * Create a new snapshot of a repository's dependencies. You must authenticate using an access token
 * with the `repo` scope to use this endpoint for a repository that the requesting user has access to.
 */
class DependencyGraphCreateRepositorySnapshot extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/dependency-graph/snapshots";
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
