<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Response;
use SimpleXMLElement;

class ResponseServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Response::macro('xml', function(array $vars, $status = 200, array $header = [], $xml = null)
        {
            if (is_null($xml)) {
                $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><response/>');
            }

            foreach ($vars as $key => $value) {
                if (is_array($value)) {
                    Response::xml($value, $status, $header, $xml->addChild($key));
                } else {
                    $xml->addChild($key, $value);
                }
            }

            if (empty($header)) {
                $header['Content-Type'] = 'application/xml';
            }
            
            return Response::make($xml->asXML(), $status, $header);
        });

    }
}