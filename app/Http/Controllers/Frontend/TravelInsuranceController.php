<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Services\TravelInsuranceService;
use Illuminate\Http\Request;

class TravelInsuranceController extends Controller
{
    protected $insuranceService;

    public function __construct(TravelInsuranceService $insuranceService)
    {
        $this->insuranceService = $insuranceService;
    }

    public function index(Request $request)
    {
        if ($request->has('origin') && $request->has('destination')) {
            try {
                $params = [
                    'origin' => $request->input('origin'),
                    'destination' => $request->input('destination'),
                    'start_date' => $request->input('start_date'),
                    'return_date' => $request->input('return_date'),
                    'residence_country' => $request->input('residence_country'),
                    'adult_count' => $request->input('adult_count', 0),
                    'children_count' => $request->input('children_count', 0),
                    'infant_count' => $request->input('infant_count', 0),
                    'adult_ages' => $request->input('adult_ages', []),
                    'children_ages' => $request->input('children_ages', []),
                ];

                $data = $this->insuranceService->getAvailablePlans($params);
                
                return view('frontend.travel-insurance.index', compact('data'));
            } catch (\Exception $e) {
                return back()->with('error', 'Failed to fetch insurance plans: ' . $e->getMessage());
            }
        }

        return view('frontend.travel-insurance.index');
    }

    public function details(Request $request)
    {
        $countries = Country::orderBy('name', 'asc')->get();
        $selectedPlanData = null;

        if ($request->has('plan') && $request->has('origin') && $request->has('destination')) {
            try {
                $params = [
                    'origin' => $request->input('origin'),
                    'destination' => $request->input('destination'),
                    'start_date' => $request->input('start_date'),
                    'return_date' => $request->input('return_date'),
                    'residence_country' => $request->input('residence_country'),
                    'adult_count' => $request->input('adult_count', 0),
                    'children_count' => $request->input('children_count', 0),
                    'infant_count' => $request->input('infant_count', 0),
                    'adult_ages' => $request->input('adult_ages', []),
                    'children_ages' => $request->input('children_ages', []),
                ];

                $data = $this->insuranceService->getAvailablePlans($params);
                $selectedPlan = $request->input('plan');
                [$planCode, $ssrFeeCode] = explode('~', $selectedPlan);

                // Find the selected plan from available plans or upsell plans
                $allPlans = array_merge(
                    $data['available_plans'] ?? [],
                    array_map(function($group) {
                        return $group['UpsellPlans']['UpsellPlan'] ?? [];
                    }, $data['available_upsell_plans'] ?? [])
                );

                foreach ($allPlans as $plan) {
                    if (isset($plan['PlanCode']) && $plan['PlanCode'] === $planCode && 
                        isset($plan['SSRFeeCode']) && $plan['SSRFeeCode'] === $ssrFeeCode) {
                        $selectedPlanData = $plan;
                        break;
                    }
                }
            } catch (\Exception $e) {
                // If API fails, continue without plan data
            }
        }

        return view('frontend.travel-insurance.details', compact('countries', 'selectedPlanData'));
    }
}
