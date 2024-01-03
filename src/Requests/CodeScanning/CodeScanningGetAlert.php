<?php

namespace Tonning\Github\Requests\CodeScanning;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * code-scanning/get-alert
 *
 * Gets a single code scanning alert. You must use an access token with the `security_events` scope to
 * use this endpoint with private repositories, the `public_repo` scope also grants permission to read
 * security events on public repositories only.
 */
class CodeScanningGetAlert extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/code-scanning/alerts/{$this->alertNumber}";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $alertNumber The number that identifies an alert. You can find this at the end of the URL for a code scanning alert within GitHub, and in the `number` field in the response from the `GET /repos/{owner}/{repo}/code-scanning/alerts` operation.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $alertNumber,
    ) {
    }
}
