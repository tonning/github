<?php

namespace Tonning\Github\Requests\CodeScanning;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * code-scanning/get-analysis
 *
 * Gets a specified code scanning analysis for a repository.
 * You must use an access token with the
 * `security_events` scope to use this endpoint with private repositories,
 * the `public_repo` scope also
 * grants permission to read security events on public repositories only.
 *
 * The default JSON response
 * contains fields that describe the analysis.
 * This includes the Git reference and commit SHA to which
 * the analysis relates,
 * the datetime of the analysis, the name of the code scanning tool,
 * and the
 * number of alerts.
 *
 * The `rules_count` field in the default response give the number of rules
 * that
 * were run in the analysis.
 * For very old analyses this data is not available,
 * and `0` is returned in
 * this field.
 *
 * If you use the Accept header `application/sarif+json`,
 * the response contains the
 * analysis data that was uploaded.
 * This is formatted as
 * [SARIF version
 * 2.1.0](https://docs.oasis-open.org/sarif/sarif/v2.1.0/cs01/sarif-v2.1.0-cs01.html).
 */
class CodeScanningGetAnalysis extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/code-scanning/analyses/{$this->analysisId}";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $analysisId The ID of the analysis, as returned from the `GET /repos/{owner}/{repo}/code-scanning/analyses` operation.
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
		protected int $analysisId,
	) {
	}
}
