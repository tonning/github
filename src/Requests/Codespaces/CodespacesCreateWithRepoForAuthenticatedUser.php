<?php

namespace Tonning\Github\Requests\Codespaces;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * codespaces/create-with-repo-for-authenticated-user
 *
 * Creates a codespace owned by the authenticated user in the specified repository.
 *
 * You must
 * authenticate using an access token with the `codespace` scope to use this endpoint.
 *
 * GitHub Apps
 * must have write access to the `codespaces` repository permission to use this endpoint.
 */
class CodespacesCreateWithRepoForAuthenticatedUser extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/codespaces";
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
