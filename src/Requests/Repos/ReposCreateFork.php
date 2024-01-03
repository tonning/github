<?php

namespace Tonning\Github\Requests\Repos;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * repos/create-fork
 *
 * Create a fork for the authenticated user.
 *
 * **Note**: Forking a Repository happens asynchronously.
 * You may have to wait a short period of time before you can access the git objects. If this takes
 * longer than 5 minutes, be sure to contact [GitHub
 * Support](https://support.github.com/contact?tags=dotcom-rest-api).
 *
 * **Note**: Although this endpoint
 * works with GitHub Apps, the GitHub App must be installed on the destination account with access to
 * all repositories and on the source account with access to the source repository.
 */
class ReposCreateFork extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/forks";
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
