<?php

return [
    'interfaces' => [
        'google.cloud.compute.v1.Firewalls' => [
            'Delete' => [
                'method' => 'delete',
                'uriTemplate' => '/compute/v1/projects/{project}/global/firewalls/{firewall}',
                'placeholders' => [
                    'firewall' => [
                        'getters' => [
                            'getFirewall',
                        ],
                    ],
                    'project' => [
                        'getters' => [
                            'getProject',
                        ],
                    ],
                ],
            ],
            'Get' => [
                'method' => 'get',
                'uriTemplate' => '/compute/v1/projects/{project}/global/firewalls/{firewall}',
                'placeholders' => [
                    'firewall' => [
                        'getters' => [
                            'getFirewall',
                        ],
                    ],
                    'project' => [
                        'getters' => [
                            'getProject',
                        ],
                    ],
                ],
            ],
            'Insert' => [
                'method' => 'post',
                'uriTemplate' => '/compute/v1/projects/{project}/global/firewalls',
                'body' => 'firewall_resource',
                'placeholders' => [
                    'project' => [
                        'getters' => [
                            'getProject',
                        ],
                    ],
                ],
            ],
            'List' => [
                'method' => 'get',
                'uriTemplate' => '/compute/v1/projects/{project}/global/firewalls',
                'placeholders' => [
                    'project' => [
                        'getters' => [
                            'getProject',
                        ],
                    ],
                ],
            ],
            'Patch' => [
                'method' => 'patch',
                'uriTemplate' => '/compute/v1/projects/{project}/global/firewalls/{firewall}',
                'body' => 'firewall_resource',
                'placeholders' => [
                    'firewall' => [
                        'getters' => [
                            'getFirewall',
                        ],
                    ],
                    'project' => [
                        'getters' => [
                            'getProject',
                        ],
                    ],
                ],
            ],
            'Update' => [
                'method' => 'put',
                'uriTemplate' => '/compute/v1/projects/{project}/global/firewalls/{firewall}',
                'body' => 'firewall_resource',
                'placeholders' => [
                    'firewall' => [
                        'getters' => [
                            'getFirewall',
                        ],
                    ],
                    'project' => [
                        'getters' => [
                            'getProject',
                        ],
                    ],
                ],
            ],
        ],
    ],
];
