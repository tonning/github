<?php

namespace Tonning\Github\Requests\Dependabot;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * dependabot/get-alert
 *
 * You must use an access token with the `security_events` scope to use this endpoint with private
 * repositories.
 * You can also use tokens with the `public_repo` scope for public repositories
 * only.
 * GitHub Apps must have **Dependabot alerts** read permission to use this endpoint.
 */
class DependabotGetAlert extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/dependabot/alerts/{$this->alertNumber}";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $alertNumber The number that identifies a Dependabot alert in its repository.
     * You can find this at the end of the URL for a Dependabot alert within GitHub,
     * or in `number` fields in the response from the
     * `GET /repos/{owner}/{repo}/dependabot/alerts` operation.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $alertNumber,
    ) {
    }
}
