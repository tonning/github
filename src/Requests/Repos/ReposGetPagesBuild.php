<?php

namespace Tonning\Github\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get-pages-build
 *
 * Gets information about a GitHub Pages build.
 *
 * A token with the `repo` scope is required. GitHub Apps
 * must have the `pages:read` permission.
 */
class ReposGetPagesBuild extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/pages/builds/{$this->buildId}";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $buildId,
    ) {
    }
}
