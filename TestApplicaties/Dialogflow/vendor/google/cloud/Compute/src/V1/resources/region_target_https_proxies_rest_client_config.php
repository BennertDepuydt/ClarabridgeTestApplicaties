<?php

return [
    'interfaces' => [
        'google.cloud.compute.v1.RegionTargetHttpsProxies' => [
            'Delete' => [
                'method' => 'delete',
                'uriTemplate' => '/compute/v1/projects/{project}/regions/{region}/targetHttpsProxies/{target_https_proxy}',
                'placeholders' => [
                    'target_https_proxy' => [
                        'getters' => [
                            'getTargetHttpsProxy',
                        ],
                    ],
                    'project' => [
                        'getters' => [
                            'getProject',
                        ],
                    ],
                    'region' => [
                        'getters' => [
                            'getRegion',
                        ],
                    ],
                ],
            ],
            'Get' => [
                'method' => 'get',
                'uriTemplate' => '/compute/v1/projects/{project}/regions/{region}/targetHttpsProxies/{target_https_proxy}',
                'placeholders' => [
                    'target_https_proxy' => [
                        'getters' => [
                            'getTargetHttpsProxy',
                        ],
                    ],
                    'project' => [
                        'getters' => [
                            'getProject',
                        ],
                    ],
                    'region' => [
                        'getters' => [
                            'getRegion',
                        ],
                    ],
                ],
            ],
            'Insert' => [
                'method' => 'post',
                'uriTemplate' => '/compute/v1/projects/{project}/regions/{region}/targetHttpsProxies',
                'body' => 'target_https_proxy_resource',
                'placeholders' => [
                    'project' => [
                        'getters' => [
                            'getProject',
                        ],
                    ],
                    'region' => [
                        'getters' => [
                            'getRegion',
                        ],
                    ],
                ],
            ],
            'List' => [
                'method' => 'get',
                'uriTemplate' => '/compute/v1/projects/{project}/regions/{region}/targetHttpsProxies',
                'placeholders' => [
                    'project' => [
                        'getters' => [
                            'getProject',
                        ],
                    ],
                    'region' => [
                        'getters' => [
                            'getRegion',
                        ],
                    ],
                ],
            ],
            'SetSslCertificates' => [
                'method' => 'post',
                'uriTemplate' => '/compute/v1/projects/{project}/regions/{region}/targetHttpsProxies/{target_https_proxy}/setSslCertificates',
                'body' => 'region_target_https_proxies_set_ssl_certificates_request_resource',
                'placeholders' => [
                    'target_https_proxy' => [
                        'getters' => [
                            'getTargetHttpsProxy',
                        ],
                    ],
                    'project' => [
                        'getters' => [
                            'getProject',
                        ],
                    ],
                    'region' => [
                        'getters' => [
                            'getRegion',
                        ],
                    ],
                ],
            ],
            'SetUrlMap' => [
                'method' => 'post',
                'uriTemplate' => '/compute/v1/projects/{project}/regions/{region}/targetHttpsProxies/{target_https_proxy}/setUrlMap',
                'body' => 'url_map_reference_resource',
                'placeholders' => [
                    'target_https_proxy' => [
                        'getters' => [
                            'getTargetHttpsProxy',
                        ],
                    ],
                    'project' => [
                        'getters' => [
                            'getProject',
                        ],
                    ],
                    'region' => [
                        'getters' => [
                            'getRegion',
                        ],
                    ],
                ],
            ],
        ],
    ],
];
