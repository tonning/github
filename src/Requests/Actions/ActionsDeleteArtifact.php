<?php

namespace Tonning\Github\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/delete-artifact
 *
 * Deletes an artifact for a workflow run. You must authenticate using an access token with the `repo`
 * scope to use this endpoint. GitHub Apps must have the `actions:write` permission to use this
 * endpoint.
 */
class ActionsDeleteArtifact extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/actions/artifacts/{$this->artifactId}";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $artifactId The unique identifier of the artifact.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $artifactId,
    ) {
    }
}
