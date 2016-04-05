<?php

use Creios\Http\Message\Response;

function out(Response $response)
{
    header(sprintf('%s %s %s', $response->getProtocolVersion(), $response->getStatusCode(), $response->getReasonPhrase()));

    foreach ($response->getHeaders() as $name => $values) {
        foreach ($values as $value) {
            header(sprintf('%s: %s', $name, $value), false);
        }
    }
    echo $response->getBody()->__toString();
}
