<?php

namespace Tonning\Github\Requests\Codespaces;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * codespaces/publish-for-authenticated-user
 *
 * Publishes an unpublished codespace, creating a new repository and assigning it to the
 * codespace.
 *
 * The codespace's token is granted write permissions to the repository, allowing the user
 * to push their changes.
 *
 * This will fail for a codespace that is already published, meaning it has an
 * associated repository.
 *
 * You must authenticate using a personal access token with the `codespace`
 * scope to use this endpoint.
 *
 * GitHub Apps must have write access to the `codespaces` repository
 * permission to use this endpoint.
 */
class CodespacesPublishForAuthenticatedUser extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/user/codespaces/{$this->codespaceName}/publish";
	}


	/**
	 * @param string $codespaceName The name of the codespace.
	 */
	public function __construct(
		protected string $codespaceName,
	) {
	}
}
