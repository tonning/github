<?php

namespace Tonning\Github\Requests\CodeScanning;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * code-scanning/list-alert-instances
 *
 * Lists all instances of the specified code scanning alert.
 * You must use an access token with the
 * `security_events` scope to use this endpoint with private repositories,
 * the `public_repo` scope also
 * grants permission to read security events on public repositories only.
 */
class CodeScanningListAlertInstances extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/code-scanning/alerts/{$this->alertNumber}/instances";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $alertNumber The number that identifies an alert. You can find this at the end of the URL for a code scanning alert within GitHub, and in the `number` field in the response from the `GET /repos/{owner}/{repo}/code-scanning/alerts` operation.
     * @param  null|int  $page Page number of the results to fetch.
     * @param  null|string  $ref The Git reference for the results you want to list. The `ref` for a branch can be formatted either as `refs/heads/<branch name>` or simply `<branch name>`. To reference a pull request use `refs/pull/<number>/merge`.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $alertNumber,
        protected ?int $page = null,
        protected ?string $ref = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['page' => $this->page, 'ref' => $this->ref]);
    }
}
