<?php

namespace Tonning\Github\Resource;

use Saloon\Contracts\Response;
use Tonning\Github\Requests\SecretScanning\SecretScanningGetAlert;
use Tonning\Github\Requests\SecretScanning\SecretScanningListAlertsForEnterprise;
use Tonning\Github\Requests\SecretScanning\SecretScanningListAlertsForOrg;
use Tonning\Github\Requests\SecretScanning\SecretScanningListAlertsForRepo;
use Tonning\Github\Requests\SecretScanning\SecretScanningListLocationsForAlert;
use Tonning\Github\Requests\SecretScanning\SecretScanningUpdateAlert;
use Tonning\Github\Resource;

class SecretScanning extends Resource
{
    /**
     * @param  string  $enterprise The slug version of the enterprise name. You can also substitute this value with the enterprise id.
     * @param  string  $state Set to `open` or `resolved` to only list secret scanning alerts in a specific state.
     * @param  string  $secretType A comma-separated list of secret types to return. By default all secret types are returned.
     * See "[Secret scanning patterns](https://docs.github.com/code-security/secret-scanning/secret-scanning-patterns#supported-secrets-for-advanced-security)"
     * for a complete list of secret types.
     * @param  string  $resolution A comma-separated list of resolutions. Only secret scanning alerts with one of these resolutions are listed. Valid resolutions are `false_positive`, `wont_fix`, `revoked`, `pattern_edited`, `pattern_deleted` or `used_in_tests`.
     * @param  string  $sort The property to sort the results by. `created` means when the alert was created. `updated` means when the alert was updated or resolved.
     * @param  string  $direction The direction to sort the results by.
     * @param  string  $before A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for results before this cursor.
     * @param  string  $validity A comma-separated list of validities that, when present, will return alerts that match the validities in this list. Valid options are `active`, `inactive`, and `unknown`.
     */
    public function secretScanningListAlertsForEnterprise(
        string $enterprise,
        ?string $state,
        ?string $secretType,
        ?string $resolution,
        ?string $sort,
        ?string $direction,
        ?string $before,
        ?string $validity,
    ): Response {
        return $this->connector->send(new SecretScanningListAlertsForEnterprise($enterprise, $state, $secretType, $resolution, $sort, $direction, $before, $validity));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $state Set to `open` or `resolved` to only list secret scanning alerts in a specific state.
     * @param  string  $secretType A comma-separated list of secret types to return. By default all secret types are returned.
     * See "[Secret scanning patterns](https://docs.github.com/code-security/secret-scanning/secret-scanning-patterns#supported-secrets-for-advanced-security)"
     * for a complete list of secret types.
     * @param  string  $resolution A comma-separated list of resolutions. Only secret scanning alerts with one of these resolutions are listed. Valid resolutions are `false_positive`, `wont_fix`, `revoked`, `pattern_edited`, `pattern_deleted` or `used_in_tests`.
     * @param  string  $sort The property to sort the results by. `created` means when the alert was created. `updated` means when the alert was updated or resolved.
     * @param  string  $direction The direction to sort the results by.
     * @param  int  $page Page number of the results to fetch.
     * @param  string  $before A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for events before this cursor. To receive an initial cursor on your first request, include an empty "before" query string.
     * @param  string  $validity A comma-separated list of validities that, when present, will return alerts that match the validities in this list. Valid options are `active`, `inactive`, and `unknown`.
     */
    public function secretScanningListAlertsForOrg(
        string $org,
        ?string $state,
        ?string $secretType,
        ?string $resolution,
        ?string $sort,
        ?string $direction,
        ?int $page,
        ?string $before,
        ?string $validity,
    ): Response {
        return $this->connector->send(new SecretScanningListAlertsForOrg($org, $state, $secretType, $resolution, $sort, $direction, $page, $before, $validity));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $state Set to `open` or `resolved` to only list secret scanning alerts in a specific state.
     * @param  string  $secretType A comma-separated list of secret types to return. By default all secret types are returned.
     * See "[Secret scanning patterns](https://docs.github.com/code-security/secret-scanning/secret-scanning-patterns#supported-secrets-for-advanced-security)"
     * for a complete list of secret types.
     * @param  string  $resolution A comma-separated list of resolutions. Only secret scanning alerts with one of these resolutions are listed. Valid resolutions are `false_positive`, `wont_fix`, `revoked`, `pattern_edited`, `pattern_deleted` or `used_in_tests`.
     * @param  string  $sort The property to sort the results by. `created` means when the alert was created. `updated` means when the alert was updated or resolved.
     * @param  string  $direction The direction to sort the results by.
     * @param  int  $page Page number of the results to fetch.
     * @param  string  $before A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for events before this cursor. To receive an initial cursor on your first request, include an empty "before" query string.
     * @param  string  $validity A comma-separated list of validities that, when present, will return alerts that match the validities in this list. Valid options are `active`, `inactive`, and `unknown`.
     */
    public function secretScanningListAlertsForRepo(
        string $owner,
        string $repo,
        ?string $state,
        ?string $secretType,
        ?string $resolution,
        ?string $sort,
        ?string $direction,
        ?int $page,
        ?string $before,
        ?string $validity,
    ): Response {
        return $this->connector->send(new SecretScanningListAlertsForRepo($owner, $repo, $state, $secretType, $resolution, $sort, $direction, $page, $before, $validity));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $alertNumber The number that identifies an alert. You can find this at the end of the URL for a code scanning alert within GitHub, and in the `number` field in the response from the `GET /repos/{owner}/{repo}/code-scanning/alerts` operation.
     */
    public function secretScanningGetAlert(string $owner, string $repo, int $alertNumber): Response
    {
        return $this->connector->send(new SecretScanningGetAlert($owner, $repo, $alertNumber));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $alertNumber The number that identifies an alert. You can find this at the end of the URL for a code scanning alert within GitHub, and in the `number` field in the response from the `GET /repos/{owner}/{repo}/code-scanning/alerts` operation.
     */
    public function secretScanningUpdateAlert(string $owner, string $repo, int $alertNumber): Response
    {
        return $this->connector->send(new SecretScanningUpdateAlert($owner, $repo, $alertNumber));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $alertNumber The number that identifies an alert. You can find this at the end of the URL for a code scanning alert within GitHub, and in the `number` field in the response from the `GET /repos/{owner}/{repo}/code-scanning/alerts` operation.
     * @param  int  $page Page number of the results to fetch.
     */
    public function secretScanningListLocationsForAlert(
        string $owner,
        string $repo,
        int $alertNumber,
        ?int $page,
    ): Response {
        return $this->connector->send(new SecretScanningListLocationsForAlert($owner, $repo, $alertNumber, $page));
    }
}
