<?php

namespace Tonning\Github\Requests\Checks;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * checks/rerequest-run
 *
 * Triggers GitHub to rerequest an existing check run, without pushing new code to a repository. This
 * endpoint will trigger the [`check_run`
 * webhook](https://docs.github.com/webhooks/event-payloads/#check_run) event with the action
 * `rerequested`. When a check run is `rerequested`, its `status` is reset to `queued` and the
 * `conclusion` is cleared.
 *
 * To rerequest a check run, you must use a GitHub App with the `checks:read`
 * permission on a private repository or pull access to a public repository. OAuth apps and
 * authenticated users are not able to rerequest a check run.
 *
 * For more information about how to re-run
 * GitHub Actions jobs, see "[Re-run a job from a workflow
 * run](https://docs.github.com/rest/actions/workflow-runs#re-run-a-job-from-a-workflow-run)".
 */
class ChecksRerequestRun extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/check-runs/{$this->checkRunId}/rerequest";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $checkRunId The unique identifier of the check run.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $checkRunId,
    ) {
    }
}
