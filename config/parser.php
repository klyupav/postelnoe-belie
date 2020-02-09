<?php
return [

    'use_proxy_list' => env('USE_PROXY_LIST', false),

    'log_to_mail' => env('APP_LOGTOEMAIL', false),

    'admin_emails' => env('ADMIN_EMAILS', 'pasha.klyuchnikov@gmail.com'),

    'donors' => [
        'main' => [
            'Rao_rf_pub' => \App\Donors\B2BDivehouseRuCategory::class,
            'Rss_rf_pub' => \App\Donors\Rss_rf_pub::class,
            'Rss_ts_pub' => \App\Donors\Rss_ts_pub::class,
            'Rss_pub_gost_r' => \App\Donors\Rss_pub_gost_r::class,
            'Rds_rf_pub' => \App\Donors\Rds_rf_pub::class,
            'Rds_ts_pub' => \App\Donors\Rds_ts_pub::class,
            'Rds_pub_gost_r' => \App\Donors\Rds_pub_gost_r::class,
        ]
    ],

    'version' => [
        'main' => 1,
    ],
    'version_label' => [
        'main' => 'WEB',
    ]

];