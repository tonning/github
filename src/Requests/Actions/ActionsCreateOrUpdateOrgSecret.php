<?php

namespace Tonning\Github\Requests\Actions;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/create-or-update-org-secret
 *
 * Creates or updates an organization secret with an encrypted value. Encrypt your secret
 * using
 * [LibSodium](https://libsodium.gitbook.io/doc/bindings_for_other_languages). For more
 * information, see "[Encrypting secrets for the REST
 * API](https://docs.github.com/rest/guides/encrypting-secrets-for-the-rest-api)."
 *
 * You must
 * authenticate using an access token with the `admin:org` scope to use this endpoint.
 * If the
 * repository is private, you must use an access token with the `repo` scope.
 * GitHub Apps must have the
 * `secrets` organization permission to use this endpoint.
 * Authenticated users must have collaborator
 * access to a repository to create, update, or read secrets.
 */
class ActionsCreateOrUpdateOrgSecret extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}/actions/secrets/{$this->secretName}";
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $secretName The name of the secret.
	 */
	public function __construct(
		protected string $org,
		protected string $secretName,
	) {
	}
}
