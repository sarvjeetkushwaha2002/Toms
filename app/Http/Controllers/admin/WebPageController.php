<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUsGenerator;
use App\Models\ContactUsGenerator;
use App\Models\PrivacyPolicyGenerator;
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

    public function aboutUsPage()
    {
        return view('admin.webpage.about_us_tools');
    }

    public function viewPage2()
    {
        return view('admin.webpage.view2_page');
    }

    public function createAboutUs(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        if ($request->website_category != null && $request->website_name != null &&  $request->website_url != null && $request->country_id != '0') {

            if ($request->email != null || $request->phone != null) {
                if ($request->email != null) {
                    AboutUsGenerator::updateOrCreate(
                        [
                            'email' => $request->email,
                        ],
                        [
                            'website_category' => $request->website_category,
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
                    AboutUsGenerator::updateOrCreate(
                        [
                            'phone' => $request->phone,
                        ],
                        [
                            'website_category' => $request->website_category,
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
                return view('admin.webpage.view2_page', compact('data'));
            } else {
                return view('admin.webpage.view2_page', compact('data'));
            }
        } else {
            return response()->json([
                'request' => $request->all(),
                'message' => 'any fields not fill',
            ]);
        }
    }

    public function privacyPolicyPage()
    {
        return view('admin.webpage.privacy_policy_tools');
    }

    public function viewPage3()
    {
        return view('admin.webpage.view3_page');
    }

    public function createPrivacyPolicy(Request $request)
    {

        $data = $request->all();
        if ($request->company_name != null && $request->website_name != null &&  $request->website_url != null && $request->country_id != '0' && $request->email != null) {
            PrivacyPolicyGenerator::updateOrCreate(
                [
                    'email' => $request->email,
                ],
                [
                    'company_name' => $request->company_name,
                    'website_name' => $request->website_name,
                    'website_url' => $request->website_url,
                    'country_id' => $request->country_id,
                    'email' => $request->email,
                    'state_id' => $request->state_id,
                    'cookies' => isset($request->site_cookies) ? ($request->site_cookies == 0 ? 'yes' : 'no') : 'no',
                    'google_adSense' => isset($request->google_adSense) ? ($request->google_adSense == 0 ? 'yes' : 'no') : 'no',
                    'third_parties' => isset($request->third_parties) ? ($request->third_parties == 0 ? 'yes' : 'no') : 'no',
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
            return view('admin.webpage.view3_page', compact('data'));
        } else {
            return response()->json([
                'request' => $request->all(),
                'message' => 'any fields not fill',
            ]);
        }
    }
}
