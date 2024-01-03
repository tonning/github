<?php

namespace Tonning\Github\Requests\CodeScanning;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * code-scanning/list-codeql-databases
 *
 * Lists the CodeQL databases that are available in a repository.
 *
 * For private repositories, you must
 * use an access token with the `security_events` scope.
 * For public repositories, you can use tokens
 * with the `security_events` or `public_repo` scope.
 */
class CodeScanningListCodeqlDatabases extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/code-scanning/codeql/databases";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
    ) {
    }
}
