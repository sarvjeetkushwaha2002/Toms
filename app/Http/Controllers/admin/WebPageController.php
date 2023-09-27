<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUsGenerator;
use App\Models\State;
use App\Models\Subscription;
use App\Models\TermCondition;
use Illuminate\Http\Request;

class WebPageController extends Controller
{
    public function termAndConditions()
    {
        return view('admin.web configration.terms_and_conditions');
    }

    public function contactUs()
    {
        return view('admin.web configration.contact_us');
    }


    public function viewPage()
    {
        return view('admin.webpage.view_page');
    }

    public function termConditionPage()
    {
        return view('admin.webpage.term_condition_tools');
    }

    public function fetchStates($country_id)
    {
        $res = State::where('country_id', $country_id)->get();
        if ($res == null) {
            $html = '<option value="">--No Data--</option>';
        } else {
            $html = '';
            foreach ($res as $r) {
                $html .= '<option value="' . $r->id . '">' . $r->name . '</option>';
            }
        }
        return response()->json($html);
    }

    public function createTermsCondition(Request $request)
    {
        $data = $request->all();
        if ($request->company_name != null && $request->website_name != null &&  $request->website_url != null && $request->country_id != '0' && $request->email != null) {
            TermCondition::updateOrCreate(
                [
                    'email' => $request->email,
                ],
                [
                    'company_name' => $request->company_name,
                    'website_name' => $request->website_name,
                    'website_url' => $request->website_url,
                    'country_id' => $request->country_id,
                    'email' => $request->email,
                    'state_id' => $request->state_id
                ]
            );
            Subscription::updateOrCreate(
                [
                    'email' => $request->email,
                ],
                [
                    'website_url' => $request->website_url,
                    'email' => $request->email,
                ]
            );
            return view('admin.webpage.view_page', compact('data'));
        } else {
            return response()->json([
                'request' => $request->all(),
                'message' => 'any fields not fill',
            ]);
        }
    }

    public function contactUsPage()
    {
        return view('admin.webpage.contact_us_tools');
    }

    public function viewPage1()
    {
        return view('admin.webpage.view1_page');
    }

    public function createContactUs(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        if ($request->company_name != null && $request->website_name != null &&  $request->website_url != null && $request->country_id != '0') {

            if ($request->email != null || $request->phone != null) {
                if ($request->email != null) {
                    ContactUsGenerator::updateOrCreate(
                        [
                            'email' => $request->email,
                        ],
                        [
                            'company_name' => $request->company_name,
                            'website_name' => $request->website_name,
                            'website_url' => $request->website_url,
                            'country_id' => $request->country_id,
                            'email' => $request->email,
                            'state_id' => $request->state_id
                        ]
                    );
                    Subscription::updateOrCreate(
                        [
                            'email' => $request->email,
                        ],
                        [
                            'website_url' => $request->website_url,
                            'email' => $request->email,
                        ]
                    );
                }
                if ($request->phone != null) {
                    ContactUsGenerator::updateOrCreate(
                        [
                            'phone' => $request->phone,
                        ],
                        [
                            'company_name' => $request->company_name,
                            'website_name' => $request->website_name,
                            'website_url' => $request->website_url,
                            'country_id' => $request->country_id,
                            'phone' => $request->phone,
                            'state_id' => $request->state_id
                        ]
                    );
                    Subscription::updateOrCreate(
                        [
                            'phone' => $request->phone,
                        ],
                        [
                            'website_url' => $request->website_url,
                            'phone' => $request->phone,
                        ]
                    );
                }
                return view('admin.webpage.view1_page', compact('data'));
            } else {
                return view('admin.webpage.view1_page', compact('data'));
            }
        } else {
            return response()->json([
                'request' => $request->all(),
                'message' => 'any fields not fill',
            ]);
        }
    }
}
