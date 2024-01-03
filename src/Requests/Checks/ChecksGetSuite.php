<?php

namespace Tonning\Github\Requests\Checks;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * checks/get-suite
 *
 * Gets a single check suite using its `id`.
 *
 * GitHub Apps must have the `checks:read` permission on a
 * private repository or pull access to a public repository to get check suites. OAuth apps and
 * authenticated users must have the `repo` scope to get check suites in a private
 * repository.
 *
 * **Note:** The Checks API only looks for pushes in the repository where the check suite
 * or check run were created. Pushes to a branch in a forked repository are not detected and return an
 * empty `pull_requests` array and a `null` value for `head_branch`.
 */
class ChecksGetSuite extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/check-suites/{$this->checkSuiteId}";
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
