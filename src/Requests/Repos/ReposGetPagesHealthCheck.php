<?php

namespace Tonning\Github\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get-pages-health-check
 *
 * Gets a health check of the DNS settings for the `CNAME` record configured for a repository's GitHub
 * Pages.
 *
 * The first request to this endpoint returns a `202 Accepted` status and starts an
 * asynchronous background task to get the results for the domain. After the background task completes,
 * subsequent requests to this endpoint return a `200 OK` status with the health check results in the
 * response.
 *
 * To use this endpoint, you must be a repository administrator, maintainer, or have the
 * 'manage GitHub Pages settings' permission. A token with the `repo` scope or Pages write permission
 * is required. GitHub Apps must have the `administrative:write` and `pages:write` permissions.
 */
class ReposGetPagesHealthCheck extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/pages/health";
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
