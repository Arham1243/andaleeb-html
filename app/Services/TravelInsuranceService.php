<?php

namespace App\Services;

use App\Models\Country;
use Exception;

class TravelInsuranceService
{
    public function getAvailablePlans(array $params)
    {
        $originCountry = Country::where('name', 'LIKE', '%' . $params['origin'] . '%')->first();
        $destinationCountry = Country::where('name', 'LIKE', '%' . $params['destination'] . '%')->first();

        if (!$originCountry || !$destinationCountry) {
            throw new Exception('Origin or destination country not found');
        }

        $url = "https://zeus.tune2protect.com/ZeusAPI/v5/Zeus.asmx";

        $headers = [
            "Content-Type: text/xml; charset=utf-8",
            "SOAPAction: \"http://ZEUSTravelInsuranceGateway/WebServices/GetAvailablePlansOTAWithRiders\"",
        ];

        $startDate = date('Y-m-d', strtotime($params['start_date']));
        $returnDate = date('Y-m-d', strtotime($params['return_date']));

        $xmlRequest = '
        <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:web="http://ZEUSTravelInsuranceGateway/WebServices">
           <soapenv:Header/>
           <soapenv:Body>
              <web:GetAvailablePlansOTAWithRiders>
                 <web:GenericRequestOTALite>
                    <web:Authentication>
                       <web:Username>andleb_prod</web:Username>
                       <web:Password>rgJp8jgH1Clw</web:Password>
                    </web:Authentication>
                    <web:Header>
                       <web:Channel>IBE_ADDAE</web:Channel>
                       <web:Currency>AED</web:Currency>
                       <web:CountryCode>AE</web:CountryCode>
                       <web:CultureCode>EN</web:CultureCode>
                       <web:TotalAdults>' . ($params['adult_count'] ?? 0) . '</web:TotalAdults>
                       <web:TotalChild>' . ($params['children_count'] ?? 0) . '</web:TotalChild>
                       <web:TotalInfants>' . ($params['infant_count'] ?? 0) . '</web:TotalInfants>
                       <web:TotalPackagePrice></web:TotalPackagePrice>
                       <web:Attachment></web:Attachment>
                       <web:PackageType></web:PackageType>
                    </web:Header>
                    <web:Flights>
                       <web:DepartCountryCode>' . $originCountry->iso_code . '</web:DepartCountryCode>
                       <web:DepartStationCode></web:DepartStationCode>
                       <web:ArrivalCountryCode>' . $destinationCountry->iso_code . '</web:ArrivalCountryCode>
                       <web:ArrivalStationCode></web:ArrivalStationCode>
                       <web:DepartAirlineCode></web:DepartAirlineCode>
                       <web:DepartDateTime>' . $startDate . '</web:DepartDateTime>
                       <web:ReturnAirlineCode></web:ReturnAirlineCode>
                       <web:ReturnDateTime>' . $returnDate . '</web:ReturnDateTime>
                       <web:DepartFlightNo></web:DepartFlightNo>
                       <web:ReturnFlightNo></web:ReturnFlightNo>
                    </web:Flights>
                    <web:Filters>
                      <web:KeyValue>
                         <web:KeyValue>
                            <web:FilterKeyName></web:FilterKeyName>
                            <web:FilterValue>
                               <web:string></web:string>
                            </web:FilterValue>
                         </web:KeyValue>
                      </web:KeyValue>
                   </web:Filters>
                 </web:GenericRequestOTALite>
              </web:GetAvailablePlansOTAWithRiders>
           </soapenv:Body>
        </soapenv:Envelope>';

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlRequest);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            $error = curl_error($ch);
            curl_close($ch);
            throw new Exception('cURL Error: ' . $error);
        }

        curl_close($ch);

        $response = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $response);
        $xml = simplexml_load_string($response);

        if ($xml === false) {
            throw new Exception('Failed to parse XML response');
        }

        $json = json_encode($xml);
        $responseArray = json_decode($json, true);

        if (isset($responseArray['soapBody']['GetAvailablePlansOTAWithRidersResponse']['GenericResponse'])) {
            $genericResponse = &$responseArray['soapBody']['GetAvailablePlansOTAWithRidersResponse']['GenericResponse'];

            $seenPlanCodes = [];
            $seenSsrCodes = [];

            if (isset($genericResponse['AvailablePlans']['AvailablePlan']) && is_array($genericResponse['AvailablePlans']['AvailablePlan'])) {
                $uniqueAvailablePlans = [];
                foreach ($genericResponse['AvailablePlans']['AvailablePlan'] as $plan) {
                    $planCode = $plan['PlanCode'] ?? null;
                    $ssrFeeCode = $plan['SSRFeeCode'] ?? null;

                    if ($planCode && $ssrFeeCode && !isset($seenPlanCodes[$planCode]) && !isset($seenSsrCodes[$ssrFeeCode])) {
                        $uniqueAvailablePlans[] = $plan;
                        $seenPlanCodes[$planCode] = true;
                        $seenSsrCodes[$ssrFeeCode] = true;
                    }
                }
                $genericResponse['AvailablePlans']['AvailablePlan'] = $uniqueAvailablePlans;
            }

            if (isset($genericResponse['AvailableUpsellPlans']['UpsellPlanGroup']) && is_array($genericResponse['AvailableUpsellPlans']['UpsellPlanGroup'])) {
                $uniqueUpsellGroups = [];
                foreach ($genericResponse['AvailableUpsellPlans']['UpsellPlanGroup'] as $group) {
                    if (isset($group['UpsellPlans']['UpsellPlan'])) {
                        $plan = $group['UpsellPlans']['UpsellPlan'];

                        $planCode = $plan['PlanCode'] ?? null;
                        $ssrFeeCode = $plan['SSRFeeCode'] ?? null;

                        if ($planCode && $ssrFeeCode && !isset($seenPlanCodes[$planCode]) && !isset($seenSsrCodes[$ssrFeeCode])) {
                            $uniqueUpsellGroups[] = $group;
                            $seenPlanCodes[$planCode] = true;
                            $seenSsrCodes[$ssrFeeCode] = true;
                        }
                    }
                }
                $genericResponse['AvailableUpsellPlans']['UpsellPlanGroup'] = $uniqueUpsellGroups;
            }
        }

        $availablePlans = $responseArray['soapBody']['GetAvailablePlansOTAWithRidersResponse']['GenericResponse']['AvailablePlans']['AvailablePlan'] ?? [];
        $availableUpsellPlans = $responseArray['soapBody']['GetAvailablePlansOTAWithRidersResponse']['GenericResponse']['AvailableUpsellPlans']['UpsellPlanGroup'] ?? [];

        return [
            'available_plans' => $availablePlans,
            'available_upsell_plans' => $availableUpsellPlans,
        ];
    }
}
