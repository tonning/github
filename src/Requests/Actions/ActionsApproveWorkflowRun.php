<?php

namespace Tonning\Github\Requests\Actions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * actions/approve-workflow-run
 *
 * Approves a workflow run for a pull request from a public fork of a first time contributor. For more
 * information, see ["Approving workflow runs from public
 * forks](https://docs.github.com/actions/managing-workflow-runs/approving-workflow-runs-from-public-forks)."
 *
 * You
 * must authenticate using an access token with the `repo` scope to use this endpoint. GitHub Apps must
 * have the `actions:write` permission to use this endpoint.
 */
class ActionsApproveWorkflowRun extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/actions/runs/{$this->runId}/approve";
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
