<?php

namespace Tonning\Github\Requests\Licenses;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * licenses/get-for-repo
 *
 * This method returns the contents of the repository's license file, if one is detected.
 *
 * Similar to
 * [Get repository content](https://docs.github.com/rest/repos/contents#get-repository-content), this
 * method also supports [custom media types](https://docs.github.com/rest/overview/media-types) for
 * retrieving the raw license content or rendered license HTML.
 */
class LicensesGetForRepo extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/license";
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
