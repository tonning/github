<?php

namespace Tonning\Github\Requests\SecretScanning;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * secret-scanning/get-alert
 *
 * Gets a single secret scanning alert detected in an eligible repository.
 * To use this endpoint, you
 * must be an administrator for the repository or for the organization that owns the repository, and
 * you must use a personal access token with the `repo` scope or `security_events` scope.
 * For public
 * repositories, you may instead use the `public_repo` scope.
 *
 * GitHub Apps must have the
 * `secret_scanning_alerts` read permission to use this endpoint.
 */
class SecretScanningGetAlert extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/secret-scanning/alerts/{$this->alertNumber}";
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
