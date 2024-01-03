<?php

namespace Tonning\Github\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/enable-workflow
 *
 * Enables a workflow and sets the `state` of the workflow to `active`. You can replace `workflow_id`
 * with the workflow file name. For example, you could use `main.yaml`.
 *
 * You must authenticate using an
 * access token with the `repo` scope to use this endpoint. GitHub Apps must have the `actions:write`
 * permission to use this endpoint.
 */
class ActionsEnableWorkflow extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/actions/workflows/{$this->workflowId}/enable";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  mixed  $workflowId The ID of the workflow. You can also pass the workflow file name as a string.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected mixed $workflowId,
    ) {
    }
}
