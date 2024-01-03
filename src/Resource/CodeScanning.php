<?php

namespace Tonning\Github\Resource;

use Saloon\Contracts\Response;
use Tonning\Github\Requests\CodeScanning\CodeScanningDeleteAnalysis;
use Tonning\Github\Requests\CodeScanning\CodeScanningGetAlert;
use Tonning\Github\Requests\CodeScanning\CodeScanningGetAnalysis;
use Tonning\Github\Requests\CodeScanning\CodeScanningGetCodeqlDatabase;
use Tonning\Github\Requests\CodeScanning\CodeScanningGetDefaultSetup;
use Tonning\Github\Requests\CodeScanning\CodeScanningGetSarif;
use Tonning\Github\Requests\CodeScanning\CodeScanningListAlertInstances;
use Tonning\Github\Requests\CodeScanning\CodeScanningListAlertsForOrg;
use Tonning\Github\Requests\CodeScanning\CodeScanningListAlertsForRepo;
use Tonning\Github\Requests\CodeScanning\CodeScanningListCodeqlDatabases;
use Tonning\Github\Requests\CodeScanning\CodeScanningListRecentAnalyses;
use Tonning\Github\Requests\CodeScanning\CodeScanningUpdateAlert;
use Tonning\Github\Requests\CodeScanning\CodeScanningUpdateDefaultSetup;
use Tonning\Github\Requests\CodeScanning\CodeScanningUploadSarif;
use Tonning\Github\Resource;

class CodeScanning extends Resource
{
	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $toolName The name of a code scanning tool. Only results by this tool will be listed. You can specify the tool by using either `tool_name` or `tool_guid`, but not both.
	 * @param string $toolGuid The GUID of a code scanning tool. Only results by this tool will be listed. Note that some code scanning tools may not include a GUID in their analysis data. You can specify the tool by using either `tool_guid` or `tool_name`, but not both.
	 * @param string $before A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for results before this cursor.
	 * @param int $page Page number of the results to fetch.
	 * @param string $direction The direction to sort the results by.
	 * @param string $state If specified, only code scanning alerts with this state will be returned.
	 * @param string $sort The property by which to sort the results.
	 * @param string $severity If specified, only code scanning alerts with this severity will be returned.
	 */
	public function codeScanningListAlertsForOrg(
		string $org,
		?string $toolName,
		?string $toolGuid,
		?string $before,
		?int $page,
		?string $direction,
		?string $state,
		?string $sort,
		?string $severity,
	): Response
	{
		return $this->connector->send(new CodeScanningListAlertsForOrg($org, $toolName, $toolGuid, $before, $page, $direction, $state, $sort, $severity));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param string $toolName The name of a code scanning tool. Only results by this tool will be listed. You can specify the tool by using either `tool_name` or `tool_guid`, but not both.
	 * @param string $toolGuid The GUID of a code scanning tool. Only results by this tool will be listed. Note that some code scanning tools may not include a GUID in their analysis data. You can specify the tool by using either `tool_guid` or `tool_name`, but not both.
	 * @param int $page Page number of the results to fetch.
	 * @param string $ref The Git reference for the results you want to list. The `ref` for a branch can be formatted either as `refs/heads/<branch name>` or simply `<branch name>`. To reference a pull request use `refs/pull/<number>/merge`.
	 * @param string $direction The direction to sort the results by.
	 * @param string $sort The property by which to sort the results.
	 * @param string $state If specified, only code scanning alerts with this state will be returned.
	 * @param string $severity If specified, only code scanning alerts with this severity will be returned.
	 */
	public function codeScanningListAlertsForRepo(
		string $owner,
		string $repo,
		?string $toolName,
		?string $toolGuid,
		?int $page,
		?string $ref,
		?string $direction,
		?string $sort,
		?string $state,
		?string $severity,
	): Response
	{
		return $this->connector->send(new CodeScanningListAlertsForRepo($owner, $repo, $toolName, $toolGuid, $page, $ref, $direction, $sort, $state, $severity));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $alertNumber The number that identifies an alert. You can find this at the end of the URL for a code scanning alert within GitHub, and in the `number` field in the response from the `GET /repos/{owner}/{repo}/code-scanning/alerts` operation.
	 */
	public function codeScanningGetAlert(string $owner, string $repo, int $alertNumber): Response
	{
		return $this->connector->send(new CodeScanningGetAlert($owner, $repo, $alertNumber));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $alertNumber The number that identifies an alert. You can find this at the end of the URL for a code scanning alert within GitHub, and in the `number` field in the response from the `GET /repos/{owner}/{repo}/code-scanning/alerts` operation.
	 */
	public function codeScanningUpdateAlert(string $owner, string $repo, int $alertNumber): Response
	{
		return $this->connector->send(new CodeScanningUpdateAlert($owner, $repo, $alertNumber));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $alertNumber The number that identifies an alert. You can find this at the end of the URL for a code scanning alert within GitHub, and in the `number` field in the response from the `GET /repos/{owner}/{repo}/code-scanning/alerts` operation.
	 * @param int $page Page number of the results to fetch.
	 * @param string $ref The Git reference for the results you want to list. The `ref` for a branch can be formatted either as `refs/heads/<branch name>` or simply `<branch name>`. To reference a pull request use `refs/pull/<number>/merge`.
	 */
	public function codeScanningListAlertInstances(
		string $owner,
		string $repo,
		int $alertNumber,
		?int $page,
		?string $ref,
	): Response
	{
		return $this->connector->send(new CodeScanningListAlertInstances($owner, $repo, $alertNumber, $page, $ref));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param string $toolName The name of a code scanning tool. Only results by this tool will be listed. You can specify the tool by using either `tool_name` or `tool_guid`, but not both.
	 * @param string $toolGuid The GUID of a code scanning tool. Only results by this tool will be listed. Note that some code scanning tools may not include a GUID in their analysis data. You can specify the tool by using either `tool_guid` or `tool_name`, but not both.
	 * @param int $page Page number of the results to fetch.
	 * @param string $ref The Git reference for the analyses you want to list. The `ref` for a branch can be formatted either as `refs/heads/<branch name>` or simply `<branch name>`. To reference a pull request use `refs/pull/<number>/merge`.
	 * @param string $sarifId Filter analyses belonging to the same SARIF upload.
	 * @param string $direction The direction to sort the results by.
	 * @param string $sort The property by which to sort the results.
	 */
	public function codeScanningListRecentAnalyses(
		string $owner,
		string $repo,
		?string $toolName,
		?string $toolGuid,
		?int $page,
		?string $ref,
		?string $sarifId,
		?string $direction,
		?string $sort,
	): Response
	{
		return $this->connector->send(new CodeScanningListRecentAnalyses($owner, $repo, $toolName, $toolGuid, $page, $ref, $sarifId, $direction, $sort));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $analysisId The ID of the analysis, as returned from the `GET /repos/{owner}/{repo}/code-scanning/analyses` operation.
	 */
	public function codeScanningGetAnalysis(string $owner, string $repo, int $analysisId): Response
	{
		return $this->connector->send(new CodeScanningGetAnalysis($owner, $repo, $analysisId));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $analysisId The ID of the analysis, as returned from the `GET /repos/{owner}/{repo}/code-scanning/analyses` operation.
	 * @param string $confirmDelete Allow deletion if the specified analysis is the last in a set. If you attempt to delete the final analysis in a set without setting this parameter to `true`, you'll get a 400 response with the message: `Analysis is last of its type and deletion may result in the loss of historical alert data. Please specify confirm_delete.`
	 */
	public function codeScanningDeleteAnalysis(
		string $owner,
		string $repo,
		int $analysisId,
		?string $confirmDelete,
	): Response
	{
		return $this->connector->send(new CodeScanningDeleteAnalysis($owner, $repo, $analysisId, $confirmDelete));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function codeScanningListCodeqlDatabases(string $owner, string $repo): Response
	{
		return $this->connector->send(new CodeScanningListCodeqlDatabases($owner, $repo));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param string $language The language of the CodeQL database.
	 */
	public function codeScanningGetCodeqlDatabase(string $owner, string $repo, string $language): Response
	{
		return $this->connector->send(new CodeScanningGetCodeqlDatabase($owner, $repo, $language));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function codeScanningGetDefaultSetup(string $owner, string $repo): Response
	{
		return $this->connector->send(new CodeScanningGetDefaultSetup($owner, $repo));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function codeScanningUpdateDefaultSetup(string $owner, string $repo): Response
	{
		return $this->connector->send(new CodeScanningUpdateDefaultSetup($owner, $repo));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function codeScanningUploadSarif(string $owner, string $repo): Response
	{
		return $this->connector->send(new CodeScanningUploadSarif($owner, $repo));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param string $sarifId The SARIF ID obtained after uploading.
	 */
	public function codeScanningGetSarif(string $owner, string $repo, string $sarifId): Response
	{
		return $this->connector->send(new CodeScanningGetSarif($owner, $repo, $sarifId));
	}
}
