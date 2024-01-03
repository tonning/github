<?php

namespace Tonning\Github\Requests\Codespaces;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codespaces/create-or-update-repo-secret
 *
 * Creates or updates a repository development environment secret with an encrypted value. Encrypt your
 * secret using
 * [LibSodium](https://libsodium.gitbook.io/doc/bindings_for_other_languages). For more
 * information, see "[Encrypting secrets for the REST
 * API](https://docs.github.com/rest/guides/encrypting-secrets-for-the-rest-api)."
 *
 * You must
 * authenticate using an access
 * token with the `repo` scope to use this endpoint. GitHub Apps must have
 * write access to the `codespaces_secrets`
 * repository permission to use this endpoint.
 */
class CodespacesCreateOrUpdateRepoSecret extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/codespaces/secrets/{$this->secretName}";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param string $secretName The name of the secret.
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
		protected string $secretName,
	) {
	}
}
