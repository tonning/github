<?php

namespace Tonning\Github\Requests\Checks;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * checks/list-annotations
 *
 * Lists annotations for a check run using the annotation `id`.
 *
 * GitHub Apps
 * must have the
 * `checks:read` permission on a private repository or pull access to
 * a public repository to get
 * annotations for a check run. OAuth apps and authenticated
 * users must have the `repo` scope to get
 * annotations for a check run in a private
 * repository.
 */
class ChecksListAnnotations extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/check-runs/{$this->checkRunId}/annotations";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $checkRunId The unique identifier of the check run.
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $checkRunId,
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['page' => $this->page]);
    }
}
