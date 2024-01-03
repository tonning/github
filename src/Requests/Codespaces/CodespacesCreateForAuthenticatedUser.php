<?php

namespace Tonning\Github\Requests\Codespaces;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * codespaces/create-for-authenticated-user
 *
 * Creates a new codespace, owned by the authenticated user.
 *
 * This endpoint requires either a
 * `repository_id` OR a `pull_request` but not both.
 *
 * You must authenticate using an access token with
 * the `codespace` scope to use this endpoint.
 *
 * GitHub Apps must have write access to the `codespaces`
 * repository permission to use this endpoint.
 */
class CodespacesCreateForAuthenticatedUser extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/user/codespaces';
    }

    public function __construct()
    {
    }
}
