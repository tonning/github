<?php

namespace Tonning\Github\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get-custom-properties-values
 *
 * Gets all custom property values that are set for a repository.
 * Users with read access to the
 * repository can use this endpoint.
 *
 * GitHub Apps must have the `metadata:read` repository permission
 * to use this endpoint.
 */
class ReposGetCustomPropertiesValues extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/properties/values";
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
