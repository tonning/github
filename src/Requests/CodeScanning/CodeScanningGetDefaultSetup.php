<?php

namespace Tonning\Github\Requests\CodeScanning;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * code-scanning/get-default-setup
 *
 * Gets a code scanning default setup configuration.
 * You must use an access token with the `repo` scope
 * to use this endpoint with private repositories or the `public_repo`
 * scope for public repositories.
 */
class CodeScanningGetDefaultSetup extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/code-scanning/default-setup";
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
