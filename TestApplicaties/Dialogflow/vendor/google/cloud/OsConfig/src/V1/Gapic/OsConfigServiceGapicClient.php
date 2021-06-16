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
 * https://github.com/google/googleapis/blob/master/google/cloud/osconfig/v1/osconfig_service.proto
 * and updates to that file get reflected here through a refresh process.
 *
 * @experimental
 */

namespace Google\Cloud\OsConfig\V1\Gapic;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\PathTemplate;
use Google\ApiCore\RequestParamsHeaderDescriptor;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use Google\Cloud\OsConfig\V1\CancelPatchJobRequest;
use Google\Cloud\OsConfig\V1\CreatePatchDeploymentRequest;
use Google\Cloud\OsConfig\V1\DeletePatchDeploymentRequest;
use Google\Cloud\OsConfig\V1\ExecutePatchJobRequest;
use Google\Cloud\OsConfig\V1\GetPatchDeploymentRequest;
use Google\Cloud\OsConfig\V1\GetPatchJobRequest;
use Google\Cloud\OsConfig\V1\ListPatchDeploymentsRequest;
use Google\Cloud\OsConfig\V1\ListPatchDeploymentsResponse;
use Google\Cloud\OsConfig\V1\ListPatchJobInstanceDetailsRequest;
use Google\Cloud\OsConfig\V1\ListPatchJobInstanceDetailsResponse;
use Google\Cloud\OsConfig\V1\ListPatchJobsRequest;
use Google\Cloud\OsConfig\V1\ListPatchJobsResponse;
use Google\Cloud\OsConfig\V1\PatchConfig;
use Google\Cloud\OsConfig\V1\PatchDeployment;
use Google\Cloud\OsConfig\V1\PatchInstanceFilter;
use Google\Cloud\OsConfig\V1\PatchJob;
use Google\Cloud\OsConfig\V1\PatchRollout;
use Google\Protobuf\Duration;
use Google\Protobuf\GPBEmpty;

/**
 * Service Description: OS Config API.
 *
 * The OS Config service is a server-side component that you can use to
 * manage package installations and patch jobs for virtual machine instances.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $osConfigServiceClient = new OsConfigServiceClient();
 * try {
 *     $formattedParent = $osConfigServiceClient->projectName('[PROJECT]');
 *     $instanceFilter = new PatchInstanceFilter();
 *     $response = $osConfigServiceClient->executePatchJob($formattedParent, $instanceFilter);
 * } finally {
 *     $osConfigServiceClient->close();
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
class OsConfigServiceGapicClient
{
    use GapicClientTrait;

    /**
     * The name of the service.
     */
    const SERVICE_NAME = 'google.cloud.osconfig.v1.OsConfigService';

    /**
     * The default address of the service.
     */
    const SERVICE_ADDRESS = 'osconfig.googleapis.com';

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
    private static $patchDeploymentNameTemplate;
    private static $patchJobNameTemplate;
    private static $projectNameTemplate;
    private static $pathTemplateMap;

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'apiEndpoint' => self::SERVICE_ADDRESS.':'.self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__.'/../resources/os_config_service_client_config.json',
            'descriptorsConfigPath' => __DIR__.'/../resources/os_config_service_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__.'/../resources/os_config_service_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__.'/../resources/os_config_service_rest_client_config.php',
                ],
            ],
        ];
    }

    private static function getPatchDeploymentNameTemplate()
    {
        if (null == self::$patchDeploymentNameTemplate) {
            self::$patchDeploymentNameTemplate = new PathTemplate('projects/{project}/patchDeployments/{patch_deployment}');
        }

        return self::$patchDeploymentNameTemplate;
    }

    private static function getPatchJobNameTemplate()
    {
        if (null == self::$patchJobNameTemplate) {
            self::$patchJobNameTemplate = new PathTemplate('projects/{project}/patchJobs/{patch_job}');
        }

        return self::$patchJobNameTemplate;
    }

    private static function getProjectNameTemplate()
    {
        if (null == self::$projectNameTemplate) {
            self::$projectNameTemplate = new PathTemplate('projects/{project}');
        }

        return self::$projectNameTemplate;
    }

    private static function getPathTemplateMap()
    {
        if (null == self::$pathTemplateMap) {
            self::$pathTemplateMap = [
                'patchDeployment' => self::getPatchDeploymentNameTemplate(),
                'patchJob' => self::getPatchJobNameTemplate(),
                'project' => self::getProjectNameTemplate(),
            ];
        }

        return self::$pathTemplateMap;
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a patch_deployment resource.
     *
     * @param string $project
     * @param string $patchDeployment
     *
     * @return string The formatted patch_deployment resource.
     * @experimental
     */
    public static function patchDeploymentName($project, $patchDeployment)
    {
        return self::getPatchDeploymentNameTemplate()->render([
            'project' => $project,
            'patch_deployment' => $patchDeployment,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a patch_job resource.
     *
     * @param string $project
     * @param string $patchJob
     *
     * @return string The formatted patch_job resource.
     * @experimental
     */
    public static function patchJobName($project, $patchJob)
    {
        return self::getPatchJobNameTemplate()->render([
            'project' => $project,
            'patch_job' => $patchJob,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a project resource.
     *
     * @param string $project
     *
     * @return string The formatted project resource.
     * @experimental
     */
    public static function projectName($project)
    {
        return self::getProjectNameTemplate()->render([
            'project' => $project,
        ]);
    }

    /**
     * Parses a formatted name string and returns an associative array of the components in the name.
     * The following name formats are supported:
     * Template: Pattern
     * - patchDeployment: projects/{project}/patchDeployments/{patch_deployment}
     * - patchJob: projects/{project}/patchJobs/{patch_job}
     * - project: projects/{project}.
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
     *           as "<uri>:<port>". Default 'osconfig.googleapis.com:443'.
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
    }

    /**
     * Patch VM instances by creating and running a patch job.
     *
     * Sample code:
     * ```
     * $osConfigServiceClient = new OsConfigServiceClient();
     * try {
     *     $formattedParent = $osConfigServiceClient->projectName('[PROJECT]');
     *     $instanceFilter = new PatchInstanceFilter();
     *     $response = $osConfigServiceClient->executePatchJob($formattedParent, $instanceFilter);
     * } finally {
     *     $osConfigServiceClient->close();
     * }
     * ```
     *
     * @param string              $parent         Required. The project in which to run this patch in the form `projects/*`
     * @param PatchInstanceFilter $instanceFilter Required. Instances to patch, either explicitly or filtered by some
     *                                            criteria such as zone or labels.
     * @param array               $optionalArgs   {
     *                                            Optional.
     *
     *     @type string $description
     *          Description of the patch job. Length of the description is limited
     *          to 1024 characters.
     *     @type PatchConfig $patchConfig
     *          Patch configuration being applied. If omitted, instances are
     *          patched using the default configurations.
     *     @type Duration $duration
     *          Duration of the patch job. After the duration ends, the patch job
     *          times out.
     *     @type bool $dryRun
     *          If this patch is a dry-run only, instances are contacted but
     *          will do nothing.
     *     @type string $displayName
     *          Display name for this patch job. This does not have to be unique.
     *     @type PatchRollout $rollout
     *          Rollout strategy of the patch job.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\OsConfig\V1\PatchJob
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function executePatchJob($parent, $instanceFilter, array $optionalArgs = [])
    {
        $request = new ExecutePatchJobRequest();
        $request->setParent($parent);
        $request->setInstanceFilter($instanceFilter);
        if (isset($optionalArgs['description'])) {
            $request->setDescription($optionalArgs['description']);
        }
        if (isset($optionalArgs['patchConfig'])) {
            $request->setPatchConfig($optionalArgs['patchConfig']);
        }
        if (isset($optionalArgs['duration'])) {
            $request->setDuration($optionalArgs['duration']);
        }
        if (isset($optionalArgs['dryRun'])) {
            $request->setDryRun($optionalArgs['dryRun']);
        }
        if (isset($optionalArgs['displayName'])) {
            $request->setDisplayName($optionalArgs['displayName']);
        }
        if (isset($optionalArgs['rollout'])) {
            $request->setRollout($optionalArgs['rollout']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'parent' => $request->getParent(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'ExecutePatchJob',
            PatchJob::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Get the patch job. This can be used to track the progress of an
     * ongoing patch job or review the details of completed jobs.
     *
     * Sample code:
     * ```
     * $osConfigServiceClient = new OsConfigServiceClient();
     * try {
     *     $formattedName = $osConfigServiceClient->patchJobName('[PROJECT]', '[PATCH_JOB]');
     *     $response = $osConfigServiceClient->getPatchJob($formattedName);
     * } finally {
     *     $osConfigServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. Name of the patch in the form `projects/&#42;/patchJobs/*`
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
     * @return \Google\Cloud\OsConfig\V1\PatchJob
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function getPatchJob($name, array $optionalArgs = [])
    {
        $request = new GetPatchJobRequest();
        $request->setName($name);

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'GetPatchJob',
            PatchJob::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Cancel a patch job. The patch job must be active. Canceled patch jobs
     * cannot be restarted.
     *
     * Sample code:
     * ```
     * $osConfigServiceClient = new OsConfigServiceClient();
     * try {
     *     $formattedName = $osConfigServiceClient->patchJobName('[PROJECT]', '[PATCH_JOB]');
     *     $response = $osConfigServiceClient->cancelPatchJob($formattedName);
     * } finally {
     *     $osConfigServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. Name of the patch in the form `projects/&#42;/patchJobs/*`
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
     * @return \Google\Cloud\OsConfig\V1\PatchJob
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function cancelPatchJob($name, array $optionalArgs = [])
    {
        $request = new CancelPatchJobRequest();
        $request->setName($name);

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'CancelPatchJob',
            PatchJob::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Get a list of patch jobs.
     *
     * Sample code:
     * ```
     * $osConfigServiceClient = new OsConfigServiceClient();
     * try {
     *     $formattedParent = $osConfigServiceClient->projectName('[PROJECT]');
     *     // Iterate over pages of elements
     *     $pagedResponse = $osConfigServiceClient->listPatchJobs($formattedParent);
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
     *     $pagedResponse = $osConfigServiceClient->listPatchJobs($formattedParent);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $osConfigServiceClient->close();
     * }
     * ```
     *
     * @param string $parent       Required. In the form of `projects/*`
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
     *          If provided, this field specifies the criteria that must be met by patch
     *          jobs to be included in the response.
     *          Currently, filtering is only available on the patch_deployment field.
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
    public function listPatchJobs($parent, array $optionalArgs = [])
    {
        $request = new ListPatchJobsRequest();
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

        $requestParams = new RequestParamsHeaderDescriptor([
          'parent' => $request->getParent(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->getPagedListResponse(
            'ListPatchJobs',
            $optionalArgs,
            ListPatchJobsResponse::class,
            $request
        );
    }

    /**
     * Get a list of instance details for a given patch job.
     *
     * Sample code:
     * ```
     * $osConfigServiceClient = new OsConfigServiceClient();
     * try {
     *     $formattedParent = $osConfigServiceClient->patchJobName('[PROJECT]', '[PATCH_JOB]');
     *     // Iterate over pages of elements
     *     $pagedResponse = $osConfigServiceClient->listPatchJobInstanceDetails($formattedParent);
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
     *     $pagedResponse = $osConfigServiceClient->listPatchJobInstanceDetails($formattedParent);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $osConfigServiceClient->close();
     * }
     * ```
     *
     * @param string $parent       Required. The parent for the instances are in the form of
     *                             `projects/&#42;/patchJobs/*`.
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
     *          A filter expression that filters results listed in the response. This
     *          field supports filtering results by instance zone, name, state, or
     *          `failure_reason`.
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
    public function listPatchJobInstanceDetails($parent, array $optionalArgs = [])
    {
        $request = new ListPatchJobInstanceDetailsRequest();
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

        $requestParams = new RequestParamsHeaderDescriptor([
          'parent' => $request->getParent(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->getPagedListResponse(
            'ListPatchJobInstanceDetails',
            $optionalArgs,
            ListPatchJobInstanceDetailsResponse::class,
            $request
        );
    }

    /**
     * Create an OS Config patch deployment.
     *
     * Sample code:
     * ```
     * $osConfigServiceClient = new OsConfigServiceClient();
     * try {
     *     $formattedParent = $osConfigServiceClient->projectName('[PROJECT]');
     *     $patchDeploymentId = '';
     *     $patchDeployment = new PatchDeployment();
     *     $response = $osConfigServiceClient->createPatchDeployment($formattedParent, $patchDeploymentId, $patchDeployment);
     * } finally {
     *     $osConfigServiceClient->close();
     * }
     * ```
     *
     * @param string          $parent            Required. The project to apply this patch deployment to in the form
     *                                           `projects/*`.
     * @param string          $patchDeploymentId Required. A name for the patch deployment in the project. When creating a
     *                                           name the following rules apply:
     *                                           * Must contain only lowercase letters, numbers, and hyphens.
     *                                           * Must start with a letter.
     *                                           * Must be between 1-63 characters.
     *                                           * Must end with a number or a letter.
     *                                           * Must be unique within the project.
     * @param PatchDeployment $patchDeployment   Required. The patch deployment to create.
     * @param array           $optionalArgs      {
     *                                           Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\OsConfig\V1\PatchDeployment
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function createPatchDeployment($parent, $patchDeploymentId, $patchDeployment, array $optionalArgs = [])
    {
        $request = new CreatePatchDeploymentRequest();
        $request->setParent($parent);
        $request->setPatchDeploymentId($patchDeploymentId);
        $request->setPatchDeployment($patchDeployment);

        $requestParams = new RequestParamsHeaderDescriptor([
          'parent' => $request->getParent(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'CreatePatchDeployment',
            PatchDeployment::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Get an OS Config patch deployment.
     *
     * Sample code:
     * ```
     * $osConfigServiceClient = new OsConfigServiceClient();
     * try {
     *     $formattedName = $osConfigServiceClient->patchDeploymentName('[PROJECT]', '[PATCH_DEPLOYMENT]');
     *     $response = $osConfigServiceClient->getPatchDeployment($formattedName);
     * } finally {
     *     $osConfigServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. The resource name of the patch deployment in the form
     *                             `projects/&#42;/patchDeployments/*`.
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
     * @return \Google\Cloud\OsConfig\V1\PatchDeployment
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function getPatchDeployment($name, array $optionalArgs = [])
    {
        $request = new GetPatchDeploymentRequest();
        $request->setName($name);

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'GetPatchDeployment',
            PatchDeployment::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Get a page of OS Config patch deployments.
     *
     * Sample code:
     * ```
     * $osConfigServiceClient = new OsConfigServiceClient();
     * try {
     *     $formattedParent = $osConfigServiceClient->projectName('[PROJECT]');
     *     // Iterate over pages of elements
     *     $pagedResponse = $osConfigServiceClient->listPatchDeployments($formattedParent);
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
     *     $pagedResponse = $osConfigServiceClient->listPatchDeployments($formattedParent);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $osConfigServiceClient->close();
     * }
     * ```
     *
     * @param string $parent       Required. The resource name of the parent in the form `projects/*`.
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
    public function listPatchDeployments($parent, array $optionalArgs = [])
    {
        $request = new ListPatchDeploymentsRequest();
        $request->setParent($parent);
        if (isset($optionalArgs['pageSize'])) {
            $request->setPageSize($optionalArgs['pageSize']);
        }
        if (isset($optionalArgs['pageToken'])) {
            $request->setPageToken($optionalArgs['pageToken']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'parent' => $request->getParent(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->getPagedListResponse(
            'ListPatchDeployments',
            $optionalArgs,
            ListPatchDeploymentsResponse::class,
            $request
        );
    }

    /**
     * Delete an OS Config patch deployment.
     *
     * Sample code:
     * ```
     * $osConfigServiceClient = new OsConfigServiceClient();
     * try {
     *     $formattedName = $osConfigServiceClient->patchDeploymentName('[PROJECT]', '[PATCH_DEPLOYMENT]');
     *     $osConfigServiceClient->deletePatchDeployment($formattedName);
     * } finally {
     *     $osConfigServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. The resource name of the patch deployment in the form
     *                             `projects/&#42;/patchDeployments/*`.
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
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function deletePatchDeployment($name, array $optionalArgs = [])
    {
        $request = new DeletePatchDeploymentRequest();
        $request->setName($name);

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'DeletePatchDeployment',
            GPBEmpty::class,
            $optionalArgs,
            $request
        )->wait();
    }
}
