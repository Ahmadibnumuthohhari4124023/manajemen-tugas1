<?php

namespace App\Database;

use Illuminate\Database\Connectors\PostgresConnector;

class CustomPostgresConnector extends PostgresConnector
{
    protected function getDsn(array $config)
    {
        $dsn = parent::getDsn($config);

        if (! empty($config['endpoint_id'])) {
            // Disisipkan TANPA spasi supaya Laravel tidak membungkusnya dengan tanda kutip
            $dsn .= ';options=endpoint='.$config['endpoint_id'];
        }

        return $dsn;
    }
}