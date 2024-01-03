<?php

namespace Tonning\Github\Requests\Dependabot;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * dependabot/get-repo-public-key
 *
 * Gets your public key, which you need to encrypt secrets. You need to encrypt a secret before you can
 * create or update secrets. Anyone with read access to the repository can use this endpoint. If the
 * repository is private you must use an access token with the `repo` scope. GitHub Apps must have the
 * `dependabot_secrets` repository permission to use this endpoint.
 */
class DependabotGetRepoPublicKey extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/dependabot/secrets/public-key";
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
