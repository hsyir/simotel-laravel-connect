<?php

return [
    'smartApi' => [
        'apps' => [
            '*' => "\App\Simotel\SmartApiApps",
        ],
    ],
    /*
     *
     */
    "simotelEventApi" => [
        "events" => [
            "Cdr" => \Hsy\LaraSimotel\Events\SimotelEventCdr::class,
            "NewState" => \Hsy\LaraSimotel\Events\SimotelEventNewState::class,
            "ExtenAdded" => \Hsy\LaraSimotel\Events\SimotelEventExtenAdded::class,
            "ExtenRemoved" => \Hsy\LaraSimotel\Events\SimotelEventExtenRemoved::class,
            "IncomingCall" => \Hsy\LaraSimotel\Events\SimotelEventIncomingCall::class,
            "OutGoingCall" => \Hsy\LaraSimotel\Events\SimotelEventOutgoingCall::class,
            "Transfer" => \Hsy\LaraSimotel\Events\SimotelEventTransfer::class,
        ]
    ],
    'simotelApi' => [
        'connect' => [
            'user' => 'apiUser',
            'pass' => 'apiPass',
            'token' => 'apiToken',
            'server_address' => 'http://simotelServer',

        ],
        'methods' => [

            // pbx/users
            'pbx_users_create' => [
                'address' => 'pbx/users/add',
                'request_method' => 'POST',
                'default_request_data' => [
                    'user_type' => 'SIP',
                    'active' => 'yes',
                    //                            'name' => '',
                    //                            'number' => '',
                    'cid_number' => '',
                    //                            'secret' => '',
                    'call_record' => 'no',
                    'push_notification' => 'no',
                    'deny' => '0.0.0.0/0.0.0.0',
                    'permit' => '0.0.0.0/0.0.0.0',
                    'dtmfmode' => 'rfc2833',
                    'canreinvite' => 'no',
                    'directmedia' => 'no',
                    'context' => 'main_routing',
                    'host' => 'dynamic',
                    'type' => 'user',
                    'nat' => 'no',
                    'port' => '5060',
                    'qualify' => 'no',
                    'callgroup' => '1',
                    'pickupgroup' => '1',
                    'callcounter' => 'no',
                    'faxdetect' => 'no',
                    'call_limit' => '',
                    'trunk' => 'no',
                    'transfer' => 'no',
                    'email' => '',
                    'forward_policy' => [
                        'Busy' => '',
                        'No Answer' => '',
                        'UnAvailable' => '',
                        'All' => '',
                    ],
                    'more_options' => '',
                ],
            ],
            'pbx_users_update' => [
                'address' => 'pbx/users/update',
                'request_method' => 'PUT',
                'default_request_data' => [
                ],
            ],
            'pbx_users_remove' => [
                'address' => 'pbx/users/remove',
                'request_method' => 'DELETE',
            ],
            'pbx_users_search' => [
                'address' => 'pbx/users/search',
                'request_method' => 'GET',
            ],

            // pbx/trunks
            'pbx_trunks_create' => [
                'address' => 'pbx/trunks/add',
                'request_method' => 'POST',
                'default_request_data' => [
                    'trunk_type' => 'SIP',
                    'register_string' => '3591011020:as#3591011020@192.168.1.10/3591011020	',
                    'active' => 'no',
                    'deny' => '0.0.0.0/0.0.0.0',
                    'permit' => '0.0.0.0/0.0.0.0',
                    'dtmfmode' => 'rfc2833',
                    'canreinvite' => 'no',
                    'directmedia' => 'no',
                    'context' => 'from-pstn',
                    'host' => '192.168.1.10',
                    'type' => 'friend',
                    'nat' => 'force_rport,comedia',
                    'port' => '5060',
                    'qualify' => 'yes',
                    'insecure' => 'port,invite',
                    'disallow' => 'all',
                    'allow' => 'ulaw,alaw',
                    'more_options' => 'fromuser=3591011020
username=3591011020
secret=as#3591011020',
                    'description' => '',
                ],

            ],
            'pbx_trunks_update' => [
                'address' => 'pbx/trunks/update',
                'request_method' => 'PUT',
                'default_request_data' => [
                ],
            ],
            'pbx_trunks_remove' => [
                'address' => 'pbx/trunks/remove',
                'request_method' => 'DELETE',
            ],
            'pbx_trunks_search' => [
                'address' => 'pbx/trunks/search',
                'request_method' => 'GET',
            ],

            // pbx/queues
            'pbx_queues_create' => [
                'address' => 'pbx/queues/add',
                'request_method' => 'POST',
                'default_request_data' => [
                    'trunk_type' => 'SIP',
                    'register_string' => '3591011020:as#3591011020@192.168.1.10/3591011020	',
                    'active' => 'no',
                    'deny' => '0.0.0.0/0.0.0.0',
                    'permit' => '0.0.0.0/0.0.0.0',
                    'dtmfmode' => 'rfc2833',
                    'canreinvite' => 'no',
                    'directmedia' => 'no',
                    'context' => 'from-pstn',
                    'host' => '192.168.1.10',
                    'type' => 'friend',
                    'nat' => 'force_rport,comedia',
                    'port' => '5060',
                    'qualify' => 'yes',
                    'insecure' => 'port,invite',
                    'disallow' => 'all',
                    'allow' => 'ulaw,alaw',
                    'more_options' => 'fromuser=3591011020
username=3591011020
secret=as#3591011020',
                    'description' => '',
                ],

            ],
            'pbx_queues_update' => [
                'address' => 'pbx/queues/update',
                'request_method' => 'PUT',
                'default_request_data' => [
                ],
            ],
            'pbx_queues_remove' => [
                'address' => 'pbx/queues/remove',
                'request_method' => 'DELETE',
            ],
            'pbx_queues_search' => [
                'address' => 'pbx/queues/search',
                'request_method' => 'GET',
            ],
            'pbx_queues_addAgent' => [
                'address' => 'pbx/queues/addagent',
                'request_method' => 'PUT',
            ],
            'pbx_queues_removeAgent' => [
                'address' => 'pbx/queues/removeagent',
                'request_method' => 'PUT',
            ],
            'pbx_queues_pauseAgent' => [
                'address' => 'pbx/queues/pauseagent',
                'request_method' => 'PUT',
            ],
            'pbx_queues_resumeAgent' => [
                'address' => 'pbx/queues/resumeagent',
                'request_method' => 'PUT',
            ],

            // pbx/blacklist
            'pbx_blacklists_add' => [
                'address' => 'pbx/blacklists/add',
                'request_method' => 'POST',
            ],
            'pbx_blacklists_update' => [
                'address' => 'pbx/blacklists/update',
                'request_method' => 'PUT',
            ],
            'pbx_blacklists_remove' => [
                'address' => 'pbx/blacklists/remove',
                'request_method' => 'DELETE',
            ],
            'pbx_blacklists_search' => [
                'address' => 'pbx/blacklists/search',
                'request_method' => 'GET',
            ],

            // pbx/whitelists
            'pbx_whitelists_add' => [
                'address' => 'pbx/whitelists/add',
                'request_method' => 'POST',
            ],
            'pbx_whitelists_update' => [
                'address' => 'pbx/whitelists/update',
                'request_method' => 'PUT',
            ],
            'pbx_whitelists_remove' => [
                'address' => 'pbx/whitelists/remove',
                'request_method' => 'DELETE',
            ],
            'pbx_whitelists_search' => [
                'address' => 'pbx/whitelists/search',
                'request_method' => 'GET',
            ],

            // pbx/announcements
            'pbx_announcements_upload' => [
                'address' => 'pbx/announcements/upload',
                'request_method' => 'POST',
            ],
            'pbx_announcements_add' => [
                'address' => 'pbx/announcements/add',
                'request_method' => 'POST',
            ],
            'pbx_announcements_update' => [
                'address' => 'pbx/announcements/update',
                'request_method' => 'PUT',
            ],
            'pbx_announcements_remove' => [
                'address' => 'pbx/announcements/remove',
                'request_method' => 'DELETE',
            ],
            'pbx_announcements_search' => [
                'address' => 'pbx/announcements/search',
                'request_method' => 'GET',
            ],

            // pbx/musicOnHolds
            'pbx_music_on_holds_search' => [
                'address' => 'pbx/musiconholds/search',
                'request_method' => 'GET',
            ],

            // pbx/faxes
            'pbx_faxes_upload' => [
                'address' => 'pbx/faxes/upload',
                'request_method' => 'POST',
            ],
            'pbx_faxes_download' => [
                'address' => 'pbx/faxes/download',
                'request_method' => 'GET',
            ],
            'pbx_faxes_add' => [
                'address' => 'pbx/faxes/add',
                'request_method' => 'POST',
            ],
            'pbx_faxes_search' => [
                'address' => 'pbx/faxes/search',
                'request_method' => 'GET',
            ],

            // call/originate
            'call_originate_act' => [
                'address' => 'call/originate/act',
                'request_method' => 'PUT',
            ],

            // voicemails/voicemails
            'voicemails_voicemails_add' => [
                'address' => 'voicemails/voicemails/add',
                'request_method' => 'POST',
            ],
            'voicemails_voicemails_update' => [
                'address' => 'voicemails/voicemails/update',
                'request_method' => 'PUT',
            ],
            'voicemails_voicemails_remove' => [
                'address' => 'voicemails/voicemails/remove',
                'request_method' => 'DELETE',
            ],
            'voicemails_voicemails_search' => [
                'address' => 'voicemails/voicemails/search',
                'request_method' => 'GET',
            ],

            // voicemails/inbox
            'voicemails_inbox_read' => [
                'address' => 'voicemails/inbox/read',
                'request_method' => 'GET',
            ],
            'voicemails_inbox_search' => [
                'address' => 'voicemails/inbox/search',
                'request_method' => 'GET',
            ],

            // reports/quick
            'reports_quick_search' => [
                'address' => 'reports/quick/search',
                'request_method' => 'GET',
            ],
            'reports_quick_info' => [
                'address' => 'reports/quick/info',
                'request_method' => 'GET',
            ],
            'reports_quick_cdr' => [
                'address' => 'reports/quick/cdr',
                'request_method' => 'GET',
            ],

            // autodialer/announcements
            'autodialer_announcements_upload' => [
                'address' => 'autodialer/announcements/upload',
                'request_method' => 'POST',
            ],
            'autodialer_announcements_add' => [
                'address' => 'autodialer/announcements/add',
                'request_method' => 'POST',
            ],
            'autodialer_announcements_update' => [
                'address' => 'autodialer/announcements/update',
                'request_method' => 'PUT',
            ],
            'autodialer_announcements_remove' => [
                'address' => 'autodialer/announcements/remove',
                'request_method' => 'DELETE',
            ],
            'autodialer_announcements_search' => [
                'address' => 'autodialer/announcements/search',
                'request_method' => 'GET',
            ],

            // autodialer/campaigns
            'autodialer_campaigns_add' => [
                'address' => 'autodialer/campaigns/add',
                'request_method' => 'POST',
            ],
            'autodialer_campaigns_update' => [
                'address' => 'autodialer/campaigns/update',
                'request_method' => 'PUT',
            ],
            'autodialer_campaigns_remove' => [
                'address' => 'autodialer/campaigns/remove',
                'request_method' => 'DELETE',
            ],
            'autodialer_campaigns_search' => [
                'address' => 'autodialer/campaigns/search',
                'request_method' => 'GET',
            ],

            // autodialer/contacts
            'autodialer_contacts_add' => [
                'address' => 'autodialer/contacts/add',
                'request_method' => 'POST',
            ],
            'autodialer_contacts_update' => [
                'address' => 'autodialer/contacts/update',
                'request_method' => 'PUT',
            ],
            'autodialer_contacts_remove' => [
                'address' => 'autodialer/contacts/remove',
                'request_method' => 'DELETE',
            ],
            'autodialer_contacts_search' => [
                'address' => 'autodialer/contacts/search',
                'request_method' => 'GET',
            ],

            // autodialer/groups
            'autodialer_groups_upload' => [
                'address' => 'autodialer/groups/upload',
                'request_method' => 'POST',
            ],
            'autodialer_groups_add' => [
                'address' => 'autodialer/groups/add',
                'request_method' => 'POST',
            ],
            'autodialer_groups_update' => [
                'address' => 'autodialer/groups/update',
                'request_method' => 'PUT',
            ],
            'autodialer_groups_remove' => [
                'address' => 'autodialer/groups/remove',
                'request_method' => 'DELETE',
            ],
            'autodialer_groups_search' => [
                'address' => 'autodialer/groups/search',
                'request_method' => 'GET',
            ],

            // autodialer/reports
            'autodialer_reports_search' => [
                'address' => 'autodialer/reports/search',
                'request_method' => 'GET',
            ],
            'autodialer_reports_info' => [
                'address' => 'autodialer/reports/info',
                'request_method' => 'GET',
            ],

            // autodialer/trunks
            'autodialer_trunks_update' => [
                'address' => 'autodialer/trunks/update',
                'request_method' => 'PUT',
            ],
            'autodialer_trunks_search' => [
                'address' => 'autodialer/trunks/search',
                'request_method' => 'GET',
            ],

        ],
    ],

];
