<?php
/*
 * Copyright 2020 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/*
 * GENERATED CODE WARNING
 * This file was generated from the file
 * https://github.com/google/googleapis/blob/master/google/cloud/security/privateca/v1beta1/service.proto
 * and updates to that file get reflected here through a refresh process.
 *
 * @experimental
 */

namespace Google\Cloud\Security\PrivateCA\V1beta1\Gapic;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\LongRunning\OperationsClient;
use Google\ApiCore\OperationResponse;
use Google\ApiCore\PathTemplate;
use Google\ApiCore\RequestParamsHeaderDescriptor;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use Google\Cloud\Security\PrivateCA\V1beta1\ActivateCertificateAuthorityRequest;
use Google\Cloud\Security\PrivateCA\V1beta1\Certificate;
use Google\Cloud\Security\PrivateCA\V1beta1\CertificateAuthority;
use Google\Cloud\Security\PrivateCA\V1beta1\CertificateRevocationList;
use Google\Cloud\Security\PrivateCA\V1beta1\CreateCertificateAuthorityRequest;
use Google\Cloud\Security\PrivateCA\V1beta1\CreateCertificateRequest;
use Google\Cloud\Security\PrivateCA\V1beta1\DisableCertificateAuthorityRequest;
use Google\Cloud\Security\PrivateCA\V1beta1\EnableCertificateAuthorityRequest;
use Google\Cloud\Security\PrivateCA\V1beta1\FetchCertificateAuthorityCsrRequest;
use Google\Cloud\Security\PrivateCA\V1beta1\FetchCertificateAuthorityCsrResponse;
use Google\Cloud\Security\PrivateCA\V1beta1\GetCertificateAuthorityRequest;
use Google\Cloud\Security\PrivateCA\V1beta1\GetCertificateRequest;
use Google\Cloud\Security\PrivateCA\V1beta1\GetCertificateRevocationListRequest;
use Google\Cloud\Security\PrivateCA\V1beta1\GetReusableConfigRequest;
use Google\Cloud\Security\PrivateCA\V1beta1\ListCertificateAuthoritiesRequest;
use Google\Cloud\Security\PrivateCA\V1beta1\ListCertificateAuthoritiesResponse;
use Google\Cloud\Security\PrivateCA\V1beta1\ListCertificateRevocationListsRequest;
use Google\Cloud\Security\PrivateCA\V1beta1\ListCertificateRevocationListsResponse;
use Google\Cloud\Security\PrivateCA\V1beta1\ListCertificatesRequest;
use Google\Cloud\Security\PrivateCA\V1beta1\ListCertificatesResponse;
use Google\Cloud\Security\PrivateCA\V1beta1\ListReusableConfigsRequest;
use Google\Cloud\Security\PrivateCA\V1beta1\ListReusableConfigsResponse;
use Google\Cloud\Security\PrivateCA\V1beta1\RestoreCertificateAuthorityRequest;
use Google\Cloud\Security\PrivateCA\V1beta1\ReusableConfig;
use Google\Cloud\Security\PrivateCA\V1beta1\RevocationReason;
use Google\Cloud\Security\PrivateCA\V1beta1\RevokeCertificateRequest;
use Google\Cloud\Security\PrivateCA\V1beta1\ScheduleDeleteCertificateAuthorityRequest;
use Google\Cloud\Security\PrivateCA\V1beta1\SubordinateConfig;
use Google\Cloud\Security\PrivateCA\V1beta1\UpdateCertificateAuthorityRequest;
use Google\Cloud\Security\PrivateCA\V1beta1\UpdateCertificateRequest;
use Google\Cloud\Security\PrivateCA\V1beta1\UpdateCertificateRevocationListRequest;
use Google\LongRunning\Operation;
use Google\Protobuf\FieldMask;

/**
 * Service Description: [Certificate Authority Service][google.cloud.security.privateca.v1beta1.CertificateAuthorityService] manages private
 * certificate authorities and issued certificates.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $certificateAuthorityServiceClient = new CertificateAuthorityServiceClient();
 * try {
 *     $formattedParent = $certificateAuthorityServiceClient->certificateAuthorityName('[PROJECT]', '[LOCATION]', '[CERTIFICATE_AUTHORITY]');
 *     $certificate = new Certificate();
 *     $response = $certificateAuthorityServiceClient->createCertificate($formattedParent, $certificate);
 * } finally {
 *     $certificateAuthorityServiceClient->close();
 * }
 * ```
 *
 * Many parameters require resource names to be formatted in a particular way. To assist
 * with these names, this class includes a format method for each type of name, and additionally
 * a parseName method to extract the individual identifiers contained within formatted names
 * that are returned by the API.
 *
 * @experimental
 */
class CertificateAuthorityServiceGapicClient
{
    use GapicClientTrait;

    /**
     * The name of the service.
     */
    const SERVICE_NAME = 'google.cloud.security.privateca.v1beta1.CertificateAuthorityService';

    /**
     * The default address of the service.
     */
    const SERVICE_ADDRESS = 'privateca.googleapis.com';

    /**
     * The default port of the service.
     */
    const DEFAULT_SERVICE_PORT = 443;

    /**
     * The name of the code generator, to be included in the agent header.
     */
    const CODEGEN_NAME = 'gapic';

    /**
     * The default scopes required by the service.
     */
    public static $serviceScopes = [
        'https://www.googleapis.com/auth/cloud-platform',
    ];
    private static $certificateNameTemplate;
    private static $certificateAuthorityNameTemplate;
    private static $certificateRevocationListNameTemplate;
    private static $locationNameTemplate;
    private static $reusableConfigNameTemplate;
    private static $pathTemplateMap;

    private $operationsClient;

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'apiEndpoint' => self::SERVICE_ADDRESS.':'.self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__.'/../resources/certificate_authority_service_client_config.json',
            'descriptorsConfigPath' => __DIR__.'/../resources/certificate_authority_service_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__.'/../resources/certificate_authority_service_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__.'/../resources/certificate_authority_service_rest_client_config.php',
                ],
            ],
        ];
    }

    private static function getCertificateNameTemplate()
    {
        if (null == self::$certificateNameTemplate) {
            self::$certificateNameTemplate = new PathTemplate('projects/{project}/locations/{location}/certificateAuthorities/{certificate_authority}/certificates/{certificate}');
        }

        return self::$certificateNameTemplate;
    }

    private static function getCertificateAuthorityNameTemplate()
    {
        if (null == self::$certificateAuthorityNameTemplate) {
            self::$certificateAuthorityNameTemplate = new PathTemplate('projects/{project}/locations/{location}/certificateAuthorities/{certificate_authority}');
        }

        return self::$certificateAuthorityNameTemplate;
    }

    private static function getCertificateRevocationListNameTemplate()
    {
        if (null == self::$certificateRevocationListNameTemplate) {
            self::$certificateRevocationListNameTemplate = new PathTemplate('projects/{project}/locations/{location}/certificateAuthorities/{certificate_authority}/certificateRevocationLists/{certificate_revocation_list}');
        }

        return self::$certificateRevocationListNameTemplate;
    }

    private static function getLocationNameTemplate()
    {
        if (null == self::$locationNameTemplate) {
            self::$locationNameTemplate = new PathTemplate('projects/{project}/locations/{location}');
        }

        return self::$locationNameTemplate;
    }

    private static function getReusableConfigNameTemplate()
    {
        if (null == self::$reusableConfigNameTemplate) {
            self::$reusableConfigNameTemplate = new PathTemplate('projects/{project}/locations/{location}/reusableConfigs/{reusable_config}');
        }

        return self::$reusableConfigNameTemplate;
    }

    private static function getPathTemplateMap()
    {
        if (null == self::$pathTemplateMap) {
            self::$pathTemplateMap = [
                'certificate' => self::getCertificateNameTemplate(),
                'certificateAuthority' => self::getCertificateAuthorityNameTemplate(),
                'certificateRevocationList' => self::getCertificateRevocationListNameTemplate(),
                'location' => self::getLocationNameTemplate(),
                'reusableConfig' => self::getReusableConfigNameTemplate(),
            ];
        }

        return self::$pathTemplateMap;
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a certificate resource.
     *
     * @param string $project
     * @param string $location
     * @param string $certificateAuthority
     * @param string $certificate
     *
     * @return string The formatted certificate resource.
     * @experimental
     */
    public static function certificateName($project, $location, $certificateAuthority, $certificate)
    {
        return self::getCertificateNameTemplate()->render([
            'project' => $project,
            'location' => $location,
            'certificate_authority' => $certificateAuthority,
            'certificate' => $certificate,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a certificate_authority resource.
     *
     * @param string $project
     * @param string $location
     * @param string $certificateAuthority
     *
     * @return string The formatted certificate_authority resource.
     * @experimental
     */
    public static function certificateAuthorityName($project, $location, $certificateAuthority)
    {
        return self::getCertificateAuthorityNameTemplate()->render([
            'project' => $project,
            'location' => $location,
            'certificate_authority' => $certificateAuthority,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a certificate_revocation_list resource.
     *
     * @param string $project
     * @param string $location
     * @param string $certificateAuthority
     * @param string $certificateRevocationList
     *
     * @return string The formatted certificate_revocation_list resource.
     * @experimental
     */
    public static function certificateRevocationListName($project, $location, $certificateAuthority, $certificateRevocationList)
    {
        return self::getCertificateRevocationListNameTemplate()->render([
            'project' => $project,
            'location' => $location,
            'certificate_authority' => $certificateAuthority,
            'certificate_revocation_list' => $certificateRevocationList,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a location resource.
     *
     * @param string $project
     * @param string $location
     *
     * @return string The formatted location resource.
     * @experimental
     */
    public static function locationName($project, $location)
    {
        return self::getLocationNameTemplate()->render([
            'project' => $project,
            'location' => $location,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a reusable_config resource.
     *
     * @param string $project
     * @param string $location
     * @param string $reusableConfig
     *
     * @return string The formatted reusable_config resource.
     * @experimental
     */
    public static function reusableConfigName($project, $location, $reusableConfig)
    {
        return self::getReusableConfigNameTemplate()->render([
            'project' => $project,
            'location' => $location,
            'reusable_config' => $reusableConfig,
        ]);
    }

    /**
     * Parses a formatted name string and returns an associative array of the components in the name.
     * The following name formats are supported:
     * Template: Pattern
     * - certificate: projects/{project}/locations/{location}/certificateAuthorities/{certificate_authority}/certificates/{certificate}
     * - certificateAuthority: projects/{project}/locations/{location}/certificateAuthorities/{certificate_authority}
     * - certificateRevocationList: projects/{project}/locations/{location}/certificateAuthorities/{certificate_authority}/certificateRevocationLists/{certificate_revocation_list}
     * - location: projects/{project}/locations/{location}
     * - reusableConfig: projects/{project}/locations/{location}/reusableConfigs/{reusable_config}.
     *
     * The optional $template argument can be supplied to specify a particular pattern, and must
     * match one of the templates listed above. If no $template argument is provided, or if the
     * $template argument does not match one of the templates listed, then parseName will check
     * each of the supported templates, and return the first match.
     *
     * @param string $formattedName The formatted name string
     * @param string $template      Optional name of template to match
     *
     * @return array An associative array from name component IDs to component values.
     *
     * @throws ValidationException If $formattedName could not be matched.
     * @experimental
     */
    public static function parseName($formattedName, $template = null)
    {
        $templateMap = self::getPathTemplateMap();

        if ($template) {
            if (!isset($templateMap[$template])) {
                throw new ValidationException("Template name $template does not exist");
            }

            return $templateMap[$template]->match($formattedName);
        }

        foreach ($templateMap as $templateName => $pathTemplate) {
            try {
                return $pathTemplate->match($formattedName);
            } catch (ValidationException $ex) {
                // Swallow the exception to continue trying other path templates
            }
        }
        throw new ValidationException("Input did not match any known format. Input: $formattedName");
    }

    /**
     * Return an OperationsClient object with the same endpoint as $this.
     *
     * @return OperationsClient
     * @experimental
     */
    public function getOperationsClient()
    {
        return $this->operationsClient;
    }

    /**
     * Resume an existing long running operation that was previously started
     * by a long running API method. If $methodName is not provided, or does
     * not match a long running API method, then the operation can still be
     * resumed, but the OperationResponse object will not deserialize the
     * final response.
     *
     * @param string $operationName The name of the long running operation
     * @param string $methodName    The name of the method used to start the operation
     *
     * @return OperationResponse
     * @experimental
     */
    public function resumeOperation($operationName, $methodName = null)
    {
        $options = isset($this->descriptors[$methodName]['longRunning'])
            ? $this->descriptors[$methodName]['longRunning']
            : [];
        $operation = new OperationResponse($operationName, $this->getOperationsClient(), $options);
        $operation->reload();

        return $operation;
    }

    /**
     * Constructor.
     *
     * @param array $options {
     *                       Optional. Options for configuring the service API wrapper.
     *
     *     @type string $serviceAddress
     *           **Deprecated**. This option will be removed in a future major release. Please
     *           utilize the `$apiEndpoint` option instead.
     *     @type string $apiEndpoint
     *           The address of the API remote host. May optionally include the port, formatted
     *           as "<uri>:<port>". Default 'privateca.googleapis.com:443'.
     *     @type string|array|FetchAuthTokenInterface|CredentialsWrapper $credentials
     *           The credentials to be used by the client to authorize API calls. This option
     *           accepts either a path to a credentials file, or a decoded credentials file as a
     *           PHP array.
     *           *Advanced usage*: In addition, this option can also accept a pre-constructed
     *           {@see \Google\Auth\FetchAuthTokenInterface} object or
     *           {@see \Google\ApiCore\CredentialsWrapper} object. Note that when one of these
     *           objects are provided, any settings in $credentialsConfig will be ignored.
     *     @type array $credentialsConfig
     *           Options used to configure credentials, including auth token caching, for the client.
     *           For a full list of supporting configuration options, see
     *           {@see \Google\ApiCore\CredentialsWrapper::build()}.
     *     @type bool $disableRetries
     *           Determines whether or not retries defined by the client configuration should be
     *           disabled. Defaults to `false`.
     *     @type string|array $clientConfig
     *           Client method configuration, including retry settings. This option can be either a
     *           path to a JSON file, or a PHP array containing the decoded JSON data.
     *           By default this settings points to the default client config file, which is provided
     *           in the resources folder.
     *     @type string|TransportInterface $transport
     *           The transport used for executing network requests. May be either the string `rest`
     *           or `grpc`. Defaults to `grpc` if gRPC support is detected on the system.
     *           *Advanced usage*: Additionally, it is possible to pass in an already instantiated
     *           {@see \Google\ApiCore\Transport\TransportInterface} object. Note that when this
     *           object is provided, any settings in $transportConfig, and any `$apiEndpoint`
     *           setting, will be ignored.
     *     @type array $transportConfig
     *           Configuration options that will be used to construct the transport. Options for
     *           each supported transport type should be passed in a key for that transport. For
     *           example:
     *           $transportConfig = [
     *               'grpc' => [...],
     *               'rest' => [...]
     *           ];
     *           See the {@see \Google\ApiCore\Transport\GrpcTransport::build()} and
     *           {@see \Google\ApiCore\Transport\RestTransport::build()} methods for the
     *           supported options.
     * }
     *
     * @throws ValidationException
     * @experimental
     */
    public function __construct(array $options = [])
    {
        $clientOptions = $this->buildClientOptions($options);
        $this->setClientOptions($clientOptions);
        $this->operationsClient = $this->createOperationsClient($clientOptions);
    }

    /**
     * Create a new [Certificate][google.cloud.security.privateca.v1beta1.Certificate] in a given Project, Location from a particular
     * [CertificateAuthority][google.cloud.security.privateca.v1beta1.CertificateAuthority].
     *
     * Sample code:
     * ```
     * $certificateAuthorityServiceClient = new CertificateAuthorityServiceClient();
     * try {
     *     $formattedParent = $certificateAuthorityServiceClient->certificateAuthorityName('[PROJECT]', '[LOCATION]', '[CERTIFICATE_AUTHORITY]');
     *     $certificate = new Certificate();
     *     $response = $certificateAuthorityServiceClient->createCertificate($formattedParent, $certificate);
     * } finally {
     *     $certificateAuthorityServiceClient->close();
     * }
     * ```
     *
     * @param string      $parent       Required. The resource name of the location and [CertificateAuthority][google.cloud.security.privateca.v1beta1.CertificateAuthority]
     *                                  associated with the [Certificate][google.cloud.security.privateca.v1beta1.Certificate], in the format
     *                                  `projects/&#42;/locations/&#42;/certificateAuthorities/*`.
     * @param Certificate $certificate  Required. A [Certificate][google.cloud.security.privateca.v1beta1.Certificate] with initial field values.
     * @param array       $optionalArgs {
     *                                  Optional.
     *
     *     @type string $certificateId
     *          Optional. It must be unique within a location and match the regular
     *          expression `[a-zA-Z0-9_-]{1,63}`. This field is required when using a
     *          [CertificateAuthority][google.cloud.security.privateca.v1beta1.CertificateAuthority] in the Enterprise [CertificateAuthority.Tier][google.cloud.security.privateca.v1beta1.CertificateAuthority.Tier],
     *          but is optional and its value is ignored otherwise.
     *     @type string $requestId
     *          Optional. An ID to identify requests. Specify a unique request ID so that if you must
     *          retry your request, the server will know to ignore the request if it has
     *          already been completed. The server will guarantee that for at least 60
     *          minutes since the first request.
     *
     *          For example, consider a situation where you make an initial request and t
     *          he request times out. If you make the request again with the same request
     *          ID, the server can check if original operation with the same request ID
     *          was received, and if so, will ignore the second request. This prevents
     *          clients from accidentally creating duplicate commitments.
     *
     *          The request ID must be a valid UUID with the exception that zero UUID is
     *          not supported (00000000-0000-0000-0000-000000000000).
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Security\PrivateCA\V1beta1\Certificate
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function createCertificate($parent, $certificate, array $optionalArgs = [])
    {
        $request = new CreateCertificateRequest();
        $request->setParent($parent);
        $request->setCertificate($certificate);
        if (isset($optionalArgs['certificateId'])) {
            $request->setCertificateId($optionalArgs['certificateId']);
        }
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'parent' => $request->getParent(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'CreateCertificate',
            Certificate::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Returns a [Certificate][google.cloud.security.privateca.v1beta1.Certificate].
     *
     * Sample code:
     * ```
     * $certificateAuthorityServiceClient = new CertificateAuthorityServiceClient();
     * try {
     *     $formattedName = $certificateAuthorityServiceClient->certificateName('[PROJECT]', '[LOCATION]', '[CERTIFICATE_AUTHORITY]', '[CERTIFICATE]');
     *     $response = $certificateAuthorityServiceClient->getCertificate($formattedName);
     * } finally {
     *     $certificateAuthorityServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. The [name][google.cloud.security.privateca.v1beta1.Certificate.name] of the [Certificate][google.cloud.security.privateca.v1beta1.Certificate] to get.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Security\PrivateCA\V1beta1\Certificate
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function getCertificate($name, array $optionalArgs = [])
    {
        $request = new GetCertificateRequest();
        $request->setName($name);

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'GetCertificate',
            Certificate::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Lists [Certificates][google.cloud.security.privateca.v1beta1.Certificate].
     *
     * Sample code:
     * ```
     * $certificateAuthorityServiceClient = new CertificateAuthorityServiceClient();
     * try {
     *     $formattedParent = $certificateAuthorityServiceClient->certificateAuthorityName('[PROJECT]', '[LOCATION]', '[CERTIFICATE_AUTHORITY]');
     *     // Iterate over pages of elements
     *     $pagedResponse = $certificateAuthorityServiceClient->listCertificates($formattedParent);
     *     foreach ($pagedResponse->iteratePages() as $page) {
     *         foreach ($page as $element) {
     *             // doSomethingWith($element);
     *         }
     *     }
     *
     *
     *     // Alternatively:
     *
     *     // Iterate through all elements
     *     $pagedResponse = $certificateAuthorityServiceClient->listCertificates($formattedParent);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $certificateAuthorityServiceClient->close();
     * }
     * ```
     *
     * @param string $parent       Required. The resource name of the location associated with the
     *                             [Certificates][google.cloud.security.privateca.v1beta1.Certificate], in the format
     *                             `projects/&#42;/locations/&#42;/certificateauthorities/*`.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type int $pageSize
     *          The maximum number of resources contained in the underlying API
     *          response. The API may return fewer values in a page, even if
     *          there are additional values to be retrieved.
     *     @type string $pageToken
     *          A page token is used to specify a page of values to be returned.
     *          If no page token is specified (the default), the first page
     *          of values will be returned. Any page token used here must have
     *          been generated by a previous call to the API.
     *     @type string $filter
     *          Optional. Only include resources that match the filter in the response. For details
     *          on supported filters and syntax, see [Certificates Filtering
     *          documentation](https://cloud.google.com/certificate-authority-service/docs/sorting-filtering-certificates#filtering_support).
     *     @type string $orderBy
     *          Optional. Specify how the results should be sorted. For details on supported fields
     *          and syntax, see [Certificates Sorting
     *          documentation](https://cloud.google.com/certificate-authority-service/docs/sorting-filtering-certificates#sorting_support).
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\PagedListResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function listCertificates($parent, array $optionalArgs = [])
    {
        $request = new ListCertificatesRequest();
        $request->setParent($parent);
        if (isset($optionalArgs['pageSize'])) {
            $request->setPageSize($optionalArgs['pageSize']);
        }
        if (isset($optionalArgs['pageToken'])) {
            $request->setPageToken($optionalArgs['pageToken']);
        }
        if (isset($optionalArgs['filter'])) {
            $request->setFilter($optionalArgs['filter']);
        }
        if (isset($optionalArgs['orderBy'])) {
            $request->setOrderBy($optionalArgs['orderBy']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'parent' => $request->getParent(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->getPagedListResponse(
            'ListCertificates',
            $optionalArgs,
            ListCertificatesResponse::class,
            $request
        );
    }

    /**
     * Revoke a [Certificate][google.cloud.security.privateca.v1beta1.Certificate].
     *
     * Sample code:
     * ```
     * $certificateAuthorityServiceClient = new CertificateAuthorityServiceClient();
     * try {
     *     $formattedName = $certificateAuthorityServiceClient->certificateName('[PROJECT]', '[LOCATION]', '[CERTIFICATE_AUTHORITY]', '[CERTIFICATE]');
     *     $reason = RevocationReason::REVOCATION_REASON_UNSPECIFIED;
     *     $response = $certificateAuthorityServiceClient->revokeCertificate($formattedName, $reason);
     * } finally {
     *     $certificateAuthorityServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. The resource name for this [Certificate][google.cloud.security.privateca.v1beta1.Certificate] in the
     *                             format `projects/&#42;/locations/&#42;/certificateAuthorities/&#42;/certificates/*`.
     * @param int    $reason       Required. The [RevocationReason][google.cloud.security.privateca.v1beta1.RevocationReason] for revoking this certificate.
     *                             For allowed values, use constants defined on {@see \Google\Cloud\Security\PrivateCA\V1beta1\RevocationReason}
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type string $requestId
     *          Optional. An ID to identify requests. Specify a unique request ID so that if you must
     *          retry your request, the server will know to ignore the request if it has
     *          already been completed. The server will guarantee that for at least 60
     *          minutes since the first request.
     *
     *          For example, consider a situation where you make an initial request and t
     *          he request times out. If you make the request again with the same request
     *          ID, the server can check if original operation with the same request ID
     *          was received, and if so, will ignore the second request. This prevents
     *          clients from accidentally creating duplicate commitments.
     *
     *          The request ID must be a valid UUID with the exception that zero UUID is
     *          not supported (00000000-0000-0000-0000-000000000000).
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Security\PrivateCA\V1beta1\Certificate
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function revokeCertificate($name, $reason, array $optionalArgs = [])
    {
        $request = new RevokeCertificateRequest();
        $request->setName($name);
        $request->setReason($reason);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'RevokeCertificate',
            Certificate::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Update a [Certificate][google.cloud.security.privateca.v1beta1.Certificate]. Currently, the only field you can update is the
     * [labels][google.cloud.security.privateca.v1beta1.Certificate.labels] field.
     *
     * Sample code:
     * ```
     * $certificateAuthorityServiceClient = new CertificateAuthorityServiceClient();
     * try {
     *     $certificate = new Certificate();
     *     $updateMask = new FieldMask();
     *     $response = $certificateAuthorityServiceClient->updateCertificate($certificate, $updateMask);
     * } finally {
     *     $certificateAuthorityServiceClient->close();
     * }
     * ```
     *
     * @param Certificate $certificate  Required. [Certificate][google.cloud.security.privateca.v1beta1.Certificate] with updated values.
     * @param FieldMask   $updateMask   Required. A list of fields to be updated in this request.
     * @param array       $optionalArgs {
     *                                  Optional.
     *
     *     @type string $requestId
     *          Optional. An ID to identify requests. Specify a unique request ID so that if you must
     *          retry your request, the server will know to ignore the request if it has
     *          already been completed. The server will guarantee that for at least 60
     *          minutes since the first request.
     *
     *          For example, consider a situation where you make an initial request and t
     *          he request times out. If you make the request again with the same request
     *          ID, the server can check if original operation with the same request ID
     *          was received, and if so, will ignore the second request. This prevents
     *          clients from accidentally creating duplicate commitments.
     *
     *          The request ID must be a valid UUID with the exception that zero UUID is
     *          not supported (00000000-0000-0000-0000-000000000000).
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Security\PrivateCA\V1beta1\Certificate
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function updateCertificate($certificate, $updateMask, array $optionalArgs = [])
    {
        $request = new UpdateCertificateRequest();
        $request->setCertificate($certificate);
        $request->setUpdateMask($updateMask);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'certificate.name' => $request->getCertificate()->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'UpdateCertificate',
            Certificate::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Activate a [CertificateAuthority][google.cloud.security.privateca.v1beta1.CertificateAuthority] that is in state
     * [PENDING_ACTIVATION][google.cloud.security.privateca.v1beta1.CertificateAuthority.State.PENDING_ACTIVATION] and is
     * of type [SUBORDINATE][google.cloud.security.privateca.v1beta1.CertificateAuthority.Type.SUBORDINATE]. After the
     * parent Certificate Authority signs a certificate signing request from
     * [FetchCertificateAuthorityCsr][google.cloud.security.privateca.v1beta1.CertificateAuthorityService.FetchCertificateAuthorityCsr], this method can complete the activation
     * process.
     *
     * Sample code:
     * ```
     * $certificateAuthorityServiceClient = new CertificateAuthorityServiceClient();
     * try {
     *     $formattedName = $certificateAuthorityServiceClient->certificateAuthorityName('[PROJECT]', '[LOCATION]', '[CERTIFICATE_AUTHORITY]');
     *     $pemCaCertificate = '';
     *     $subordinateConfig = new SubordinateConfig();
     *     $operationResponse = $certificateAuthorityServiceClient->activateCertificateAuthority($formattedName, $pemCaCertificate, $subordinateConfig);
     *     $operationResponse->pollUntilComplete();
     *     if ($operationResponse->operationSucceeded()) {
     *         $result = $operationResponse->getResult();
     *         // doSomethingWith($result)
     *     } else {
     *         $error = $operationResponse->getError();
     *         // handleError($error)
     *     }
     *
     *
     *     // Alternatively:
     *
     *     // start the operation, keep the operation name, and resume later
     *     $operationResponse = $certificateAuthorityServiceClient->activateCertificateAuthority($formattedName, $pemCaCertificate, $subordinateConfig);
     *     $operationName = $operationResponse->getName();
     *     // ... do other work
     *     $newOperationResponse = $certificateAuthorityServiceClient->resumeOperation($operationName, 'activateCertificateAuthority');
     *     while (!$newOperationResponse->isDone()) {
     *         // ... do other work
     *         $newOperationResponse->reload();
     *     }
     *     if ($newOperationResponse->operationSucceeded()) {
     *       $result = $newOperationResponse->getResult();
     *       // doSomethingWith($result)
     *     } else {
     *       $error = $newOperationResponse->getError();
     *       // handleError($error)
     *     }
     * } finally {
     *     $certificateAuthorityServiceClient->close();
     * }
     * ```
     *
     * @param string            $name              Required. The resource name for this [CertificateAuthority][google.cloud.security.privateca.v1beta1.CertificateAuthority] in the
     *                                             format `projects/&#42;/locations/&#42;/certificateAuthorities/*`.
     * @param string            $pemCaCertificate  Required. The signed CA certificate issued from
     *                                             [FetchCertificateAuthorityCsrResponse.pem_csr][google.cloud.security.privateca.v1beta1.FetchCertificateAuthorityCsrResponse.pem_csr].
     * @param SubordinateConfig $subordinateConfig Required. Must include information about the issuer of 'pem_ca_certificate', and any
     *                                             further issuers until the self-signed CA.
     * @param array             $optionalArgs      {
     *                                             Optional.
     *
     *     @type string $requestId
     *          Optional. An ID to identify requests. Specify a unique request ID so that if you must
     *          retry your request, the server will know to ignore the request if it has
     *          already been completed. The server will guarantee that for at least 60
     *          minutes since the first request.
     *
     *          For example, consider a situation where you make an initial request and t
     *          he request times out. If you make the request again with the same request
     *          ID, the server can check if original operation with the same request ID
     *          was received, and if so, will ignore the second request. This prevents
     *          clients from accidentally creating duplicate commitments.
     *
     *          The request ID must be a valid UUID with the exception that zero UUID is
     *          not supported (00000000-0000-0000-0000-000000000000).
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\OperationResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function activateCertificateAuthority($name, $pemCaCertificate, $subordinateConfig, array $optionalArgs = [])
    {
        $request = new ActivateCertificateAuthorityRequest();
        $request->setName($name);
        $request->setPemCaCertificate($pemCaCertificate);
        $request->setSubordinateConfig($subordinateConfig);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startOperationsCall(
            'ActivateCertificateAuthority',
            $optionalArgs,
            $request,
            $this->getOperationsClient()
        )->wait();
    }

    /**
     * Create a new [CertificateAuthority][google.cloud.security.privateca.v1beta1.CertificateAuthority] in a given Project and Location.
     *
     * Sample code:
     * ```
     * $certificateAuthorityServiceClient = new CertificateAuthorityServiceClient();
     * try {
     *     $formattedParent = $certificateAuthorityServiceClient->locationName('[PROJECT]', '[LOCATION]');
     *     $certificateAuthorityId = '';
     *     $certificateAuthority = new CertificateAuthority();
     *     $operationResponse = $certificateAuthorityServiceClient->createCertificateAuthority($formattedParent, $certificateAuthorityId, $certificateAuthority);
     *     $operationResponse->pollUntilComplete();
     *     if ($operationResponse->operationSucceeded()) {
     *         $result = $operationResponse->getResult();
     *         // doSomethingWith($result)
     *     } else {
     *         $error = $operationResponse->getError();
     *         // handleError($error)
     *     }
     *
     *
     *     // Alternatively:
     *
     *     // start the operation, keep the operation name, and resume later
     *     $operationResponse = $certificateAuthorityServiceClient->createCertificateAuthority($formattedParent, $certificateAuthorityId, $certificateAuthority);
     *     $operationName = $operationResponse->getName();
     *     // ... do other work
     *     $newOperationResponse = $certificateAuthorityServiceClient->resumeOperation($operationName, 'createCertificateAuthority');
     *     while (!$newOperationResponse->isDone()) {
     *         // ... do other work
     *         $newOperationResponse->reload();
     *     }
     *     if ($newOperationResponse->operationSucceeded()) {
     *       $result = $newOperationResponse->getResult();
     *       // doSomethingWith($result)
     *     } else {
     *       $error = $newOperationResponse->getError();
     *       // handleError($error)
     *     }
     * } finally {
     *     $certificateAuthorityServiceClient->close();
     * }
     * ```
     *
     * @param string               $parent                 Required. The resource name of the location associated with the
     *                                                     [CertificateAuthorities][google.cloud.security.privateca.v1beta1.CertificateAuthority], in the format
     *                                                     `projects/&#42;/locations/*`.
     * @param string               $certificateAuthorityId Required. It must be unique within a location and match the regular
     *                                                     expression `[a-zA-Z0-9_-]{1,63}`
     * @param CertificateAuthority $certificateAuthority   Required. A [CertificateAuthority][google.cloud.security.privateca.v1beta1.CertificateAuthority] with initial field values.
     * @param array                $optionalArgs           {
     *                                                     Optional.
     *
     *     @type string $requestId
     *          Optional. An ID to identify requests. Specify a unique request ID so that if you must
     *          retry your request, the server will know to ignore the request if it has
     *          already been completed. The server will guarantee that for at least 60
     *          minutes since the first request.
     *
     *          For example, consider a situation where you make an initial request and t
     *          he request times out. If you make the request again with the same request
     *          ID, the server can check if original operation with the same request ID
     *          was received, and if so, will ignore the second request. This prevents
     *          clients from accidentally creating duplicate commitments.
     *
     *          The request ID must be a valid UUID with the exception that zero UUID is
     *          not supported (00000000-0000-0000-0000-000000000000).
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\OperationResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function createCertificateAuthority($parent, $certificateAuthorityId, $certificateAuthority, array $optionalArgs = [])
    {
        $request = new CreateCertificateAuthorityRequest();
        $request->setParent($parent);
        $request->setCertificateAuthorityId($certificateAuthorityId);
        $request->setCertificateAuthority($certificateAuthority);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'parent' => $request->getParent(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startOperationsCall(
            'CreateCertificateAuthority',
            $optionalArgs,
            $request,
            $this->getOperationsClient()
        )->wait();
    }

    /**
     * Disable a [CertificateAuthority][google.cloud.security.privateca.v1beta1.CertificateAuthority].
     *
     * Sample code:
     * ```
     * $certificateAuthorityServiceClient = new CertificateAuthorityServiceClient();
     * try {
     *     $formattedName = $certificateAuthorityServiceClient->certificateAuthorityName('[PROJECT]', '[LOCATION]', '[CERTIFICATE_AUTHORITY]');
     *     $operationResponse = $certificateAuthorityServiceClient->disableCertificateAuthority($formattedName);
     *     $operationResponse->pollUntilComplete();
     *     if ($operationResponse->operationSucceeded()) {
     *         $result = $operationResponse->getResult();
     *         // doSomethingWith($result)
     *     } else {
     *         $error = $operationResponse->getError();
     *         // handleError($error)
     *     }
     *
     *
     *     // Alternatively:
     *
     *     // start the operation, keep the operation name, and resume later
     *     $operationResponse = $certificateAuthorityServiceClient->disableCertificateAuthority($formattedName);
     *     $operationName = $operationResponse->getName();
     *     // ... do other work
     *     $newOperationResponse = $certificateAuthorityServiceClient->resumeOperation($operationName, 'disableCertificateAuthority');
     *     while (!$newOperationResponse->isDone()) {
     *         // ... do other work
     *         $newOperationResponse->reload();
     *     }
     *     if ($newOperationResponse->operationSucceeded()) {
     *       $result = $newOperationResponse->getResult();
     *       // doSomethingWith($result)
     *     } else {
     *       $error = $newOperationResponse->getError();
     *       // handleError($error)
     *     }
     * } finally {
     *     $certificateAuthorityServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. The resource name for this [CertificateAuthority][google.cloud.security.privateca.v1beta1.CertificateAuthority] in the
     *                             format `projects/&#42;/locations/&#42;/certificateAuthorities/*`.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type string $requestId
     *          Optional. An ID to identify requests. Specify a unique request ID so that if you must
     *          retry your request, the server will know to ignore the request if it has
     *          already been completed. The server will guarantee that for at least 60
     *          minutes since the first request.
     *
     *          For example, consider a situation where you make an initial request and t
     *          he request times out. If you make the request again with the same request
     *          ID, the server can check if original operation with the same request ID
     *          was received, and if so, will ignore the second request. This prevents
     *          clients from accidentally creating duplicate commitments.
     *
     *          The request ID must be a valid UUID with the exception that zero UUID is
     *          not supported (00000000-0000-0000-0000-000000000000).
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\OperationResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function disableCertificateAuthority($name, array $optionalArgs = [])
    {
        $request = new DisableCertificateAuthorityRequest();
        $request->setName($name);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startOperationsCall(
            'DisableCertificateAuthority',
            $optionalArgs,
            $request,
            $this->getOperationsClient()
        )->wait();
    }

    /**
     * Enable a [CertificateAuthority][google.cloud.security.privateca.v1beta1.CertificateAuthority].
     *
     * Sample code:
     * ```
     * $certificateAuthorityServiceClient = new CertificateAuthorityServiceClient();
     * try {
     *     $formattedName = $certificateAuthorityServiceClient->certificateAuthorityName('[PROJECT]', '[LOCATION]', '[CERTIFICATE_AUTHORITY]');
     *     $operationResponse = $certificateAuthorityServiceClient->enableCertificateAuthority($formattedName);
     *     $operationResponse->pollUntilComplete();
     *     if ($operationResponse->operationSucceeded()) {
     *         $result = $operationResponse->getResult();
     *         // doSomethingWith($result)
     *     } else {
     *         $error = $operationResponse->getError();
     *         // handleError($error)
     *     }
     *
     *
     *     // Alternatively:
     *
     *     // start the operation, keep the operation name, and resume later
     *     $operationResponse = $certificateAuthorityServiceClient->enableCertificateAuthority($formattedName);
     *     $operationName = $operationResponse->getName();
     *     // ... do other work
     *     $newOperationResponse = $certificateAuthorityServiceClient->resumeOperation($operationName, 'enableCertificateAuthority');
     *     while (!$newOperationResponse->isDone()) {
     *         // ... do other work
     *         $newOperationResponse->reload();
     *     }
     *     if ($newOperationResponse->operationSucceeded()) {
     *       $result = $newOperationResponse->getResult();
     *       // doSomethingWith($result)
     *     } else {
     *       $error = $newOperationResponse->getError();
     *       // handleError($error)
     *     }
     * } finally {
     *     $certificateAuthorityServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. The resource name for this [CertificateAuthority][google.cloud.security.privateca.v1beta1.CertificateAuthority] in the
     *                             format `projects/&#42;/locations/&#42;/certificateAuthorities/*`.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type string $requestId
     *          Optional. An ID to identify requests. Specify a unique request ID so that if you must
     *          retry your request, the server will know to ignore the request if it has
     *          already been completed. The server will guarantee that for at least 60
     *          minutes since the first request.
     *
     *          For example, consider a situation where you make an initial request and t
     *          he request times out. If you make the request again with the same request
     *          ID, the server can check if original operation with the same request ID
     *          was received, and if so, will ignore the second request. This prevents
     *          clients from accidentally creating duplicate commitments.
     *
     *          The request ID must be a valid UUID with the exception that zero UUID is
     *          not supported (00000000-0000-0000-0000-000000000000).
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\OperationResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function enableCertificateAuthority($name, array $optionalArgs = [])
    {
        $request = new EnableCertificateAuthorityRequest();
        $request->setName($name);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startOperationsCall(
            'EnableCertificateAuthority',
            $optionalArgs,
            $request,
            $this->getOperationsClient()
        )->wait();
    }

    /**
     * Fetch a certificate signing request (CSR) from a [CertificateAuthority][google.cloud.security.privateca.v1beta1.CertificateAuthority]
     * that is in state
     * [PENDING_ACTIVATION][google.cloud.security.privateca.v1beta1.CertificateAuthority.State.PENDING_ACTIVATION] and is
     * of type [SUBORDINATE][google.cloud.security.privateca.v1beta1.CertificateAuthority.Type.SUBORDINATE]. The CSR must
     * then be signed by the desired parent Certificate Authority, which could be
     * another [CertificateAuthority][google.cloud.security.privateca.v1beta1.CertificateAuthority] resource, or could be an on-prem
     * certificate authority. See also [ActivateCertificateAuthority][google.cloud.security.privateca.v1beta1.CertificateAuthorityService.ActivateCertificateAuthority].
     *
     * Sample code:
     * ```
     * $certificateAuthorityServiceClient = new CertificateAuthorityServiceClient();
     * try {
     *     $formattedName = $certificateAuthorityServiceClient->certificateAuthorityName('[PROJECT]', '[LOCATION]', '[CERTIFICATE_AUTHORITY]');
     *     $response = $certificateAuthorityServiceClient->fetchCertificateAuthorityCsr($formattedName);
     * } finally {
     *     $certificateAuthorityServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. The resource name for this [CertificateAuthority][google.cloud.security.privateca.v1beta1.CertificateAuthority] in the
     *                             format `projects/&#42;/locations/&#42;/certificateAuthorities/*`.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Security\PrivateCA\V1beta1\FetchCertificateAuthorityCsrResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function fetchCertificateAuthorityCsr($name, array $optionalArgs = [])
    {
        $request = new FetchCertificateAuthorityCsrRequest();
        $request->setName($name);

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'FetchCertificateAuthorityCsr',
            FetchCertificateAuthorityCsrResponse::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Returns a [CertificateAuthority][google.cloud.security.privateca.v1beta1.CertificateAuthority].
     *
     * Sample code:
     * ```
     * $certificateAuthorityServiceClient = new CertificateAuthorityServiceClient();
     * try {
     *     $formattedName = $certificateAuthorityServiceClient->certificateAuthorityName('[PROJECT]', '[LOCATION]', '[CERTIFICATE_AUTHORITY]');
     *     $response = $certificateAuthorityServiceClient->getCertificateAuthority($formattedName);
     * } finally {
     *     $certificateAuthorityServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. The [name][google.cloud.security.privateca.v1beta1.CertificateAuthority.name] of the [CertificateAuthority][google.cloud.security.privateca.v1beta1.CertificateAuthority] to
     *                             get.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Security\PrivateCA\V1beta1\CertificateAuthority
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function getCertificateAuthority($name, array $optionalArgs = [])
    {
        $request = new GetCertificateAuthorityRequest();
        $request->setName($name);

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'GetCertificateAuthority',
            CertificateAuthority::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Lists [CertificateAuthorities][google.cloud.security.privateca.v1beta1.CertificateAuthority].
     *
     * Sample code:
     * ```
     * $certificateAuthorityServiceClient = new CertificateAuthorityServiceClient();
     * try {
     *     $formattedParent = $certificateAuthorityServiceClient->locationName('[PROJECT]', '[LOCATION]');
     *     // Iterate over pages of elements
     *     $pagedResponse = $certificateAuthorityServiceClient->listCertificateAuthorities($formattedParent);
     *     foreach ($pagedResponse->iteratePages() as $page) {
     *         foreach ($page as $element) {
     *             // doSomethingWith($element);
     *         }
     *     }
     *
     *
     *     // Alternatively:
     *
     *     // Iterate through all elements
     *     $pagedResponse = $certificateAuthorityServiceClient->listCertificateAuthorities($formattedParent);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $certificateAuthorityServiceClient->close();
     * }
     * ```
     *
     * @param string $parent       Required. The resource name of the location associated with the
     *                             [CertificateAuthorities][google.cloud.security.privateca.v1beta1.CertificateAuthority], in the format
     *                             `projects/&#42;/locations/*`.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type int $pageSize
     *          The maximum number of resources contained in the underlying API
     *          response. The API may return fewer values in a page, even if
     *          there are additional values to be retrieved.
     *     @type string $pageToken
     *          A page token is used to specify a page of values to be returned.
     *          If no page token is specified (the default), the first page
     *          of values will be returned. Any page token used here must have
     *          been generated by a previous call to the API.
     *     @type string $filter
     *          Optional. Only include resources that match the filter in the response.
     *     @type string $orderBy
     *          Optional. Specify how the results should be sorted.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\PagedListResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function listCertificateAuthorities($parent, array $optionalArgs = [])
    {
        $request = new ListCertificateAuthoritiesRequest();
        $request->setParent($parent);
        if (isset($optionalArgs['pageSize'])) {
            $request->setPageSize($optionalArgs['pageSize']);
        }
        if (isset($optionalArgs['pageToken'])) {
            $request->setPageToken($optionalArgs['pageToken']);
        }
        if (isset($optionalArgs['filter'])) {
            $request->setFilter($optionalArgs['filter']);
        }
        if (isset($optionalArgs['orderBy'])) {
            $request->setOrderBy($optionalArgs['orderBy']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'parent' => $request->getParent(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->getPagedListResponse(
            'ListCertificateAuthorities',
            $optionalArgs,
            ListCertificateAuthoritiesResponse::class,
            $request
        );
    }

    /**
     * Restore a [CertificateAuthority][google.cloud.security.privateca.v1beta1.CertificateAuthority] that is scheduled for deletion.
     *
     * Sample code:
     * ```
     * $certificateAuthorityServiceClient = new CertificateAuthorityServiceClient();
     * try {
     *     $formattedName = $certificateAuthorityServiceClient->certificateAuthorityName('[PROJECT]', '[LOCATION]', '[CERTIFICATE_AUTHORITY]');
     *     $operationResponse = $certificateAuthorityServiceClient->restoreCertificateAuthority($formattedName);
     *     $operationResponse->pollUntilComplete();
     *     if ($operationResponse->operationSucceeded()) {
     *         $result = $operationResponse->getResult();
     *         // doSomethingWith($result)
     *     } else {
     *         $error = $operationResponse->getError();
     *         // handleError($error)
     *     }
     *
     *
     *     // Alternatively:
     *
     *     // start the operation, keep the operation name, and resume later
     *     $operationResponse = $certificateAuthorityServiceClient->restoreCertificateAuthority($formattedName);
     *     $operationName = $operationResponse->getName();
     *     // ... do other work
     *     $newOperationResponse = $certificateAuthorityServiceClient->resumeOperation($operationName, 'restoreCertificateAuthority');
     *     while (!$newOperationResponse->isDone()) {
     *         // ... do other work
     *         $newOperationResponse->reload();
     *     }
     *     if ($newOperationResponse->operationSucceeded()) {
     *       $result = $newOperationResponse->getResult();
     *       // doSomethingWith($result)
     *     } else {
     *       $error = $newOperationResponse->getError();
     *       // handleError($error)
     *     }
     * } finally {
     *     $certificateAuthorityServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. The resource name for this [CertificateAuthority][google.cloud.security.privateca.v1beta1.CertificateAuthority] in the
     *                             format `projects/&#42;/locations/&#42;/certificateAuthorities/*`.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type string $requestId
     *          Optional. An ID to identify requests. Specify a unique request ID so that if you must
     *          retry your request, the server will know to ignore the request if it has
     *          already been completed. The server will guarantee that for at least 60
     *          minutes since the first request.
     *
     *          For example, consider a situation where you make an initial request and t
     *          he request times out. If you make the request again with the same request
     *          ID, the server can check if original operation with the same request ID
     *          was received, and if so, will ignore the second request. This prevents
     *          clients from accidentally creating duplicate commitments.
     *
     *          The request ID must be a valid UUID with the exception that zero UUID is
     *          not supported (00000000-0000-0000-0000-000000000000).
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\OperationResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function restoreCertificateAuthority($name, array $optionalArgs = [])
    {
        $request = new RestoreCertificateAuthorityRequest();
        $request->setName($name);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startOperationsCall(
            'RestoreCertificateAuthority',
            $optionalArgs,
            $request,
            $this->getOperationsClient()
        )->wait();
    }

    /**
     * Schedule a [CertificateAuthority][google.cloud.security.privateca.v1beta1.CertificateAuthority] for deletion.
     *
     * Sample code:
     * ```
     * $certificateAuthorityServiceClient = new CertificateAuthorityServiceClient();
     * try {
     *     $formattedName = $certificateAuthorityServiceClient->certificateAuthorityName('[PROJECT]', '[LOCATION]', '[CERTIFICATE_AUTHORITY]');
     *     $operationResponse = $certificateAuthorityServiceClient->scheduleDeleteCertificateAuthority($formattedName);
     *     $operationResponse->pollUntilComplete();
     *     if ($operationResponse->operationSucceeded()) {
     *         $result = $operationResponse->getResult();
     *         // doSomethingWith($result)
     *     } else {
     *         $error = $operationResponse->getError();
     *         // handleError($error)
     *     }
     *
     *
     *     // Alternatively:
     *
     *     // start the operation, keep the operation name, and resume later
     *     $operationResponse = $certificateAuthorityServiceClient->scheduleDeleteCertificateAuthority($formattedName);
     *     $operationName = $operationResponse->getName();
     *     // ... do other work
     *     $newOperationResponse = $certificateAuthorityServiceClient->resumeOperation($operationName, 'scheduleDeleteCertificateAuthority');
     *     while (!$newOperationResponse->isDone()) {
     *         // ... do other work
     *         $newOperationResponse->reload();
     *     }
     *     if ($newOperationResponse->operationSucceeded()) {
     *       $result = $newOperationResponse->getResult();
     *       // doSomethingWith($result)
     *     } else {
     *       $error = $newOperationResponse->getError();
     *       // handleError($error)
     *     }
     * } finally {
     *     $certificateAuthorityServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. The resource name for this [CertificateAuthority][google.cloud.security.privateca.v1beta1.CertificateAuthority] in the
     *                             format `projects/&#42;/locations/&#42;/certificateAuthorities/*`.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type string $requestId
     *          Optional. An ID to identify requests. Specify a unique request ID so that if you must
     *          retry your request, the server will know to ignore the request if it has
     *          already been completed. The server will guarantee that for at least 60
     *          minutes since the first request.
     *
     *          For example, consider a situation where you make an initial request and t
     *          he request times out. If you make the request again with the same request
     *          ID, the server can check if original operation with the same request ID
     *          was received, and if so, will ignore the second request. This prevents
     *          clients from accidentally creating duplicate commitments.
     *
     *          The request ID must be a valid UUID with the exception that zero UUID is
     *          not supported (00000000-0000-0000-0000-000000000000).
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\OperationResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function scheduleDeleteCertificateAuthority($name, array $optionalArgs = [])
    {
        $request = new ScheduleDeleteCertificateAuthorityRequest();
        $request->setName($name);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startOperationsCall(
            'ScheduleDeleteCertificateAuthority',
            $optionalArgs,
            $request,
            $this->getOperationsClient()
        )->wait();
    }

    /**
     * Update a [CertificateAuthority][google.cloud.security.privateca.v1beta1.CertificateAuthority].
     *
     * Sample code:
     * ```
     * $certificateAuthorityServiceClient = new CertificateAuthorityServiceClient();
     * try {
     *     $certificateAuthority = new CertificateAuthority();
     *     $updateMask = new FieldMask();
     *     $operationResponse = $certificateAuthorityServiceClient->updateCertificateAuthority($certificateAuthority, $updateMask);
     *     $operationResponse->pollUntilComplete();
     *     if ($operationResponse->operationSucceeded()) {
     *         $result = $operationResponse->getResult();
     *         // doSomethingWith($result)
     *     } else {
     *         $error = $operationResponse->getError();
     *         // handleError($error)
     *     }
     *
     *
     *     // Alternatively:
     *
     *     // start the operation, keep the operation name, and resume later
     *     $operationResponse = $certificateAuthorityServiceClient->updateCertificateAuthority($certificateAuthority, $updateMask);
     *     $operationName = $operationResponse->getName();
     *     // ... do other work
     *     $newOperationResponse = $certificateAuthorityServiceClient->resumeOperation($operationName, 'updateCertificateAuthority');
     *     while (!$newOperationResponse->isDone()) {
     *         // ... do other work
     *         $newOperationResponse->reload();
     *     }
     *     if ($newOperationResponse->operationSucceeded()) {
     *       $result = $newOperationResponse->getResult();
     *       // doSomethingWith($result)
     *     } else {
     *       $error = $newOperationResponse->getError();
     *       // handleError($error)
     *     }
     * } finally {
     *     $certificateAuthorityServiceClient->close();
     * }
     * ```
     *
     * @param CertificateAuthority $certificateAuthority Required. [CertificateAuthority][google.cloud.security.privateca.v1beta1.CertificateAuthority] with updated values.
     * @param FieldMask            $updateMask           Required. A list of fields to be updated in this request.
     * @param array                $optionalArgs         {
     *                                                   Optional.
     *
     *     @type string $requestId
     *          Optional. An ID to identify requests. Specify a unique request ID so that if you must
     *          retry your request, the server will know to ignore the request if it has
     *          already been completed. The server will guarantee that for at least 60
     *          minutes since the first request.
     *
     *          For example, consider a situation where you make an initial request and t
     *          he request times out. If you make the request again with the same request
     *          ID, the server can check if original operation with the same request ID
     *          was received, and if so, will ignore the second request. This prevents
     *          clients from accidentally creating duplicate commitments.
     *
     *          The request ID must be a valid UUID with the exception that zero UUID is
     *          not supported (00000000-0000-0000-0000-000000000000).
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\OperationResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function updateCertificateAuthority($certificateAuthority, $updateMask, array $optionalArgs = [])
    {
        $request = new UpdateCertificateAuthorityRequest();
        $request->setCertificateAuthority($certificateAuthority);
        $request->setUpdateMask($updateMask);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'certificate_authority.name' => $request->getCertificateAuthority()->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startOperationsCall(
            'UpdateCertificateAuthority',
            $optionalArgs,
            $request,
            $this->getOperationsClient()
        )->wait();
    }

    /**
     * Returns a [CertificateRevocationList][google.cloud.security.privateca.v1beta1.CertificateRevocationList].
     *
     * Sample code:
     * ```
     * $certificateAuthorityServiceClient = new CertificateAuthorityServiceClient();
     * try {
     *     $formattedName = $certificateAuthorityServiceClient->certificateRevocationListName('[PROJECT]', '[LOCATION]', '[CERTIFICATE_AUTHORITY]', '[CERTIFICATE_REVOCATION_LIST]');
     *     $response = $certificateAuthorityServiceClient->getCertificateRevocationList($formattedName);
     * } finally {
     *     $certificateAuthorityServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. The [name][google.cloud.security.privateca.v1beta1.CertificateRevocationList.name] of the
     *                             [CertificateRevocationList][google.cloud.security.privateca.v1beta1.CertificateRevocationList] to get.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Security\PrivateCA\V1beta1\CertificateRevocationList
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function getCertificateRevocationList($name, array $optionalArgs = [])
    {
        $request = new GetCertificateRevocationListRequest();
        $request->setName($name);

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'GetCertificateRevocationList',
            CertificateRevocationList::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Lists [CertificateRevocationLists][google.cloud.security.privateca.v1beta1.CertificateRevocationList].
     *
     * Sample code:
     * ```
     * $certificateAuthorityServiceClient = new CertificateAuthorityServiceClient();
     * try {
     *     $formattedParent = $certificateAuthorityServiceClient->certificateAuthorityName('[PROJECT]', '[LOCATION]', '[CERTIFICATE_AUTHORITY]');
     *     // Iterate over pages of elements
     *     $pagedResponse = $certificateAuthorityServiceClient->listCertificateRevocationLists($formattedParent);
     *     foreach ($pagedResponse->iteratePages() as $page) {
     *         foreach ($page as $element) {
     *             // doSomethingWith($element);
     *         }
     *     }
     *
     *
     *     // Alternatively:
     *
     *     // Iterate through all elements
     *     $pagedResponse = $certificateAuthorityServiceClient->listCertificateRevocationLists($formattedParent);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $certificateAuthorityServiceClient->close();
     * }
     * ```
     *
     * @param string $parent       Required. The resource name of the location associated with the
     *                             [CertificateRevocationLists][google.cloud.security.privateca.v1beta1.CertificateRevocationList], in the format
     *                             `projects/&#42;/locations/&#42;/certificateauthorities/*`.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type int $pageSize
     *          The maximum number of resources contained in the underlying API
     *          response. The API may return fewer values in a page, even if
     *          there are additional values to be retrieved.
     *     @type string $pageToken
     *          A page token is used to specify a page of values to be returned.
     *          If no page token is specified (the default), the first page
     *          of values will be returned. Any page token used here must have
     *          been generated by a previous call to the API.
     *     @type string $filter
     *          Optional. Only include resources that match the filter in the response.
     *     @type string $orderBy
     *          Optional. Specify how the results should be sorted.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\PagedListResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function listCertificateRevocationLists($parent, array $optionalArgs = [])
    {
        $request = new ListCertificateRevocationListsRequest();
        $request->setParent($parent);
        if (isset($optionalArgs['pageSize'])) {
            $request->setPageSize($optionalArgs['pageSize']);
        }
        if (isset($optionalArgs['pageToken'])) {
            $request->setPageToken($optionalArgs['pageToken']);
        }
        if (isset($optionalArgs['filter'])) {
            $request->setFilter($optionalArgs['filter']);
        }
        if (isset($optionalArgs['orderBy'])) {
            $request->setOrderBy($optionalArgs['orderBy']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'parent' => $request->getParent(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->getPagedListResponse(
            'ListCertificateRevocationLists',
            $optionalArgs,
            ListCertificateRevocationListsResponse::class,
            $request
        );
    }

    /**
     * Update a [CertificateRevocationList][google.cloud.security.privateca.v1beta1.CertificateRevocationList].
     *
     * Sample code:
     * ```
     * $certificateAuthorityServiceClient = new CertificateAuthorityServiceClient();
     * try {
     *     $certificateRevocationList = new CertificateRevocationList();
     *     $updateMask = new FieldMask();
     *     $operationResponse = $certificateAuthorityServiceClient->updateCertificateRevocationList($certificateRevocationList, $updateMask);
     *     $operationResponse->pollUntilComplete();
     *     if ($operationResponse->operationSucceeded()) {
     *         $result = $operationResponse->getResult();
     *         // doSomethingWith($result)
     *     } else {
     *         $error = $operationResponse->getError();
     *         // handleError($error)
     *     }
     *
     *
     *     // Alternatively:
     *
     *     // start the operation, keep the operation name, and resume later
     *     $operationResponse = $certificateAuthorityServiceClient->updateCertificateRevocationList($certificateRevocationList, $updateMask);
     *     $operationName = $operationResponse->getName();
     *     // ... do other work
     *     $newOperationResponse = $certificateAuthorityServiceClient->resumeOperation($operationName, 'updateCertificateRevocationList');
     *     while (!$newOperationResponse->isDone()) {
     *         // ... do other work
     *         $newOperationResponse->reload();
     *     }
     *     if ($newOperationResponse->operationSucceeded()) {
     *       $result = $newOperationResponse->getResult();
     *       // doSomethingWith($result)
     *     } else {
     *       $error = $newOperationResponse->getError();
     *       // handleError($error)
     *     }
     * } finally {
     *     $certificateAuthorityServiceClient->close();
     * }
     * ```
     *
     * @param CertificateRevocationList $certificateRevocationList Required. [CertificateRevocationList][google.cloud.security.privateca.v1beta1.CertificateRevocationList] with updated values.
     * @param FieldMask                 $updateMask                Required. A list of fields to be updated in this request.
     * @param array                     $optionalArgs              {
     *                                                             Optional.
     *
     *     @type string $requestId
     *          Optional. An ID to identify requests. Specify a unique request ID so that if you must
     *          retry your request, the server will know to ignore the request if it has
     *          already been completed. The server will guarantee that for at least 60
     *          minutes since the first request.
     *
     *          For example, consider a situation where you make an initial request and t
     *          he request times out. If you make the request again with the same request
     *          ID, the server can check if original operation with the same request ID
     *          was received, and if so, will ignore the second request. This prevents
     *          clients from accidentally creating duplicate commitments.
     *
     *          The request ID must be a valid UUID with the exception that zero UUID is
     *          not supported (00000000-0000-0000-0000-000000000000).
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\OperationResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function updateCertificateRevocationList($certificateRevocationList, $updateMask, array $optionalArgs = [])
    {
        $request = new UpdateCertificateRevocationListRequest();
        $request->setCertificateRevocationList($certificateRevocationList);
        $request->setUpdateMask($updateMask);
        if (isset($optionalArgs['requestId'])) {
            $request->setRequestId($optionalArgs['requestId']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'certificate_revocation_list.name' => $request->getCertificateRevocationList()->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startOperationsCall(
            'UpdateCertificateRevocationList',
            $optionalArgs,
            $request,
            $this->getOperationsClient()
        )->wait();
    }

    /**
     * Returns a [ReusableConfig][google.cloud.security.privateca.v1beta1.ReusableConfig].
     *
     * Sample code:
     * ```
     * $certificateAuthorityServiceClient = new CertificateAuthorityServiceClient();
     * try {
     *     $formattedName = $certificateAuthorityServiceClient->reusableConfigName('[PROJECT]', '[LOCATION]', '[REUSABLE_CONFIG]');
     *     $response = $certificateAuthorityServiceClient->getReusableConfig($formattedName);
     * } finally {
     *     $certificateAuthorityServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. The [name][ReusableConfigs.name] of the [ReusableConfigs][] to get.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Security\PrivateCA\V1beta1\ReusableConfig
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function getReusableConfig($name, array $optionalArgs = [])
    {
        $request = new GetReusableConfigRequest();
        $request->setName($name);

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'GetReusableConfig',
            ReusableConfig::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Lists [ReusableConfigs][google.cloud.security.privateca.v1beta1.ReusableConfig].
     *
     * Sample code:
     * ```
     * $certificateAuthorityServiceClient = new CertificateAuthorityServiceClient();
     * try {
     *     $formattedParent = $certificateAuthorityServiceClient->locationName('[PROJECT]', '[LOCATION]');
     *     // Iterate over pages of elements
     *     $pagedResponse = $certificateAuthorityServiceClient->listReusableConfigs($formattedParent);
     *     foreach ($pagedResponse->iteratePages() as $page) {
     *         foreach ($page as $element) {
     *             // doSomethingWith($element);
     *         }
     *     }
     *
     *
     *     // Alternatively:
     *
     *     // Iterate through all elements
     *     $pagedResponse = $certificateAuthorityServiceClient->listReusableConfigs($formattedParent);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $certificateAuthorityServiceClient->close();
     * }
     * ```
     *
     * @param string $parent       Required. The resource name of the location associated with the
     *                             [ReusableConfigs][google.cloud.security.privateca.v1beta1.ReusableConfig], in the format
     *                             `projects/&#42;/locations/*`.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type int $pageSize
     *          The maximum number of resources contained in the underlying API
     *          response. The API may return fewer values in a page, even if
     *          there are additional values to be retrieved.
     *     @type string $pageToken
     *          A page token is used to specify a page of values to be returned.
     *          If no page token is specified (the default), the first page
     *          of values will be returned. Any page token used here must have
     *          been generated by a previous call to the API.
     *     @type string $filter
     *          Optional. Only include resources that match the filter in the response.
     *     @type string $orderBy
     *          Optional. Specify how the results should be sorted.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\PagedListResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function listReusableConfigs($parent, array $optionalArgs = [])
    {
        $request = new ListReusableConfigsRequest();
        $request->setParent($parent);
        if (isset($optionalArgs['pageSize'])) {
            $request->setPageSize($optionalArgs['pageSize']);
        }
        if (isset($optionalArgs['pageToken'])) {
            $request->setPageToken($optionalArgs['pageToken']);
        }
        if (isset($optionalArgs['filter'])) {
            $request->setFilter($optionalArgs['filter']);
        }
        if (isset($optionalArgs['orderBy'])) {
            $request->setOrderBy($optionalArgs['orderBy']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'parent' => $request->getParent(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->getPagedListResponse(
            'ListReusableConfigs',
            $optionalArgs,
            ListReusableConfigsResponse::class,
            $request
        );
    }
}