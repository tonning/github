<?php

namespace Tonning\Github\Requests\Codespaces;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codespaces/delete-for-authenticated-user
 *
 * Deletes a user's codespace.
 *
 * You must authenticate using an access token with the `codespace` scope
 * to use this endpoint.
 *
 * GitHub Apps must have write access to the `codespaces` repository permission
 * to use this endpoint.
 */
class CodespacesDeleteForAuthenticatedUser extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/user/codespaces/{$this->codespaceName}";
    }

    /**
     * @param  string  $codespaceName The name of the codespace.
     */
    public function __construct(
        protected string $codespaceName,
    ) {
    }
}
