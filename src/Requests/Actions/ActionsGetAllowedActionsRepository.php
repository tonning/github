<?php

namespace Tonning\Github\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/get-allowed-actions-repository
 *
 * Gets the settings for selected actions and reusable workflows that are allowed in a repository. To
 * use this endpoint, the repository policy for `allowed_actions` must be configured to `selected`. For
 * more information, see "[Set GitHub Actions permissions for a
 * repository](#set-github-actions-permissions-for-a-repository)."
 *
 * You must authenticate using an
 * access token with the `repo` scope to use this endpoint. GitHub Apps must have the `administration`
 * repository permission to use this API.
 */
class ActionsGetAllowedActionsRepository extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/actions/permissions/selected-actions";
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
