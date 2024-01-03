<?php

namespace Tonning\Github\Requests\Actions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * actions/re-run-workflow-failed-jobs
 *
 * Re-run all of the failed jobs and their dependent jobs in a workflow run using the `id` of the
 * workflow run. You must authenticate using an access token with the `repo` scope to use this
 * endpoint.
 */
class ActionsReRunWorkflowFailedJobs extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/actions/runs/{$this->runId}/rerun-failed-jobs";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $runId The unique identifier of the workflow run.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $runId,
    ) {
    }
}
