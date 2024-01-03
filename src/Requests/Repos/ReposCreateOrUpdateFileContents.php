<?php

namespace Tonning\Github\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/create-or-update-file-contents
 *
 * Creates a new file or replaces an existing file in a repository. You must authenticate using an
 * access token with the `repo` scope to use this endpoint. If you want to modify files in the
 * `.github/workflows` directory, you must authenticate using an access token with the `workflow`
 * scope.
 *
 * **Note:** If you use this endpoint and the "[Delete a
 * file](https://docs.github.com/rest/repos/contents/#delete-a-file)" endpoint in parallel, the
 * concurrent requests will conflict and you will receive errors. You must use these endpoints serially
 * instead.
 */
class ReposCreateOrUpdateFileContents extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/contents/{$this->path}";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $path path parameter
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $path,
    ) {
    }
}
