<?php

namespace Tonning\Github\Requests\Checks;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * checks/rerequest-suite
 *
 * Triggers GitHub to rerequest an existing check suite, without pushing new code to a repository. This
 * endpoint will trigger the [`check_suite`
 * webhook](https://docs.github.com/webhooks/event-payloads/#check_suite) event with the action
 * `rerequested`. When a check suite is `rerequested`, its `status` is reset to `queued` and the
 * `conclusion` is cleared.
 *
 * To rerequest a check suite, you must use a GitHub App with the
 * `checks:write` permission on a private repository or pull access to a public repository. OAuth apps
 * and authenticated users are not able to rerequest a check suite.
 */
class ChecksRerequestSuite extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/check-suites/{$this->checkSuiteId}/rerequest";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $checkSuiteId The unique identifier of the check suite.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $checkSuiteId,
    ) {
    }
}
