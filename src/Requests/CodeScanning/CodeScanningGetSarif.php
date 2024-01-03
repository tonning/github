<?php

namespace Tonning\Github\Requests\CodeScanning;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * code-scanning/get-sarif
 *
 * Gets information about a SARIF upload, including the status and the URL of the analysis that was
 * uploaded so that you can retrieve details of the analysis. For more information, see "[Get a code
 * scanning analysis for a
 * repository](/rest/code-scanning/code-scanning#get-a-code-scanning-analysis-for-a-repository)." You
 * must use an access token with the `security_events` scope to use this endpoint with private
 * repositories, the `public_repo` scope also grants permission to read security events on public
 * repositories only.
 */
class CodeScanningGetSarif extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/code-scanning/sarifs/{$this->sarifId}";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param string $sarifId The SARIF ID obtained after uploading.
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
		protected string $sarifId,
	) {
	}
}
