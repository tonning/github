<?php

namespace Tonning\Github\Requests\SecretScanning;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * secret-scanning/list-locations-for-alert
 *
 * Lists all locations for a given secret scanning alert for an eligible repository.
 * To use this
 * endpoint, you must be an administrator for the repository or for the organization that owns the
 * repository, and you must use a personal access token with the `repo` scope or `security_events`
 * scope.
 * For public repositories, you may instead use the `public_repo` scope.
 *
 * GitHub Apps must have
 * the `secret_scanning_alerts` read permission to use this endpoint.
 */
class SecretScanningListLocationsForAlert extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/secret-scanning/alerts/{$this->alertNumber}/locations";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $alertNumber The number that identifies an alert. You can find this at the end of the URL for a code scanning alert within GitHub, and in the `number` field in the response from the `GET /repos/{owner}/{repo}/code-scanning/alerts` operation.
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $alertNumber,
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['page' => $this->page]);
    }
}
