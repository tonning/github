<?php

namespace Tonning\Github\Requests\Actions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * actions/create-workflow-dispatch
 *
 * You can use this endpoint to manually trigger a GitHub Actions workflow run. You can replace
 * `workflow_id` with the workflow file name. For example, you could use `main.yaml`.
 *
 * You must
 * configure your GitHub Actions workflow to run when the [`workflow_dispatch`
 * webhook](/developers/webhooks-and-events/webhook-events-and-payloads#workflow_dispatch) event
 * occurs. The `inputs` are configured in the workflow file. For more information about how to
 * configure the `workflow_dispatch` event in the workflow file, see "[Events that trigger
 * workflows](/actions/reference/events-that-trigger-workflows#workflow_dispatch)."
 *
 * You must
 * authenticate using an access token with the `repo` scope to use this endpoint. GitHub Apps must have
 * the `actions:write` permission to use this endpoint. For more information, see "[Creating a personal
 * access token for the command
 * line](https://docs.github.com/articles/creating-a-personal-access-token-for-the-command-line)."
 */
class ActionsCreateWorkflowDispatch extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/actions/workflows/{$this->workflowId}/dispatches";
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
