<?php

namespace Tonning\Github\Requests\Codespaces;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codespaces/get-repo-secret
 *
 * Gets a single repository development environment secret without revealing its encrypted value. You
 * must authenticate using an access token with the `repo` scope to use this endpoint. GitHub Apps must
 * have write access to the `codespaces_secrets` repository permission to use this endpoint.
 */
class CodespacesGetRepoSecret extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/codespaces/secrets/{$this->secretName}";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $secretName The name of the secret.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $secretName,
    ) {
    }
}
