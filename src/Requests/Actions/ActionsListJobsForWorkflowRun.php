<?php

namespace Tonning\Github\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/list-jobs-for-workflow-run
 *
 * Lists jobs for a workflow run. Anyone with read access to the repository can use this endpoint. If
 * the repository is private you must use an access token with the `repo` scope. GitHub Apps must have
 * the `actions:read` permission to use this endpoint. You can use parameters to narrow the list of
 * results. For more information about using parameters, see
 * [Parameters](https://docs.github.com/rest/guides/getting-started-with-the-rest-api#parameters).
 */
class ActionsListJobsForWorkflowRun extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/actions/runs/{$this->runId}/jobs";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $runId The unique identifier of the workflow run.
     * @param  null|string  $filter Filters jobs by their `completed_at` timestamp. `latest` returns jobs from the most recent execution of the workflow run. `all` returns all jobs for a workflow run, including from old executions of the workflow run.
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $runId,
        protected ?string $filter = null,
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['filter' => $this->filter, 'page' => $this->page]);
    }
}
