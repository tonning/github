<?php

namespace Tonning\Github\Requests\Dependabot;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * dependabot/list-repo-secrets
 *
 * Lists all secrets available in a repository without revealing their encrypted values. You must
 * authenticate using an access token with the `repo` scope to use this endpoint. GitHub Apps must have
 * the `dependabot_secrets` repository permission to use this endpoint.
 */
class DependabotListRepoSecrets extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/dependabot/secrets";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['page' => $this->page]);
    }
}
