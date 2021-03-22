<?php


namespace Leit040\GeoIpApi;


use  Leit040\GeoInterface\GeoIpInterface;
use Illuminate\Support\Facades\Http;


class IpApiGeoService implements GeoIpInterface
{


    public $data;


    public function parse($ip)
    {

        $response = Http::get('http://ip-api.com/json/' . $ip . '?fields=status,continentCode,countryCode');
        $this->data = $response->json();
        if ($this->data['status'] == 'fail') {
            $this->data['continentCode'] = "N/A";
            $this->data['countryCode'] = "N/A";

        }

    }


    public function continentCode()
    {
        return $this->data['continentCode'];
    }

    public function countryCode()
    {
        return $this->data['countryCode'];
    }


}
