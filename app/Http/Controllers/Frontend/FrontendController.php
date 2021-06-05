<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $body_class = '';

        return view('frontend.index', compact('body_class'));
    }

    /**
     * Privacy Policy Page
     *
     * @return \Illuminate\Http\Response
     */
    public function privacy()
    {
        $body_class = '';

        return view('frontend.privacy', compact('body_class'));
    }

    /**
     * Terms & Conditions Page
     *
     * @return \Illuminate\Http\Response
     */
    public function terms()
    {
        $body_class = '';

        return view('frontend.terms', compact('body_class'));
    }

    /**
     * Contact Page
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        $body_class = '';

        return view('frontend.contact', compact('body_class'));
    }

    /**
     * Contact Submit
     *
     * @param ContactRequest $request
     * @return \Illuminate\Http\Response
     */
    public function contactSubmit(ContactRequest $request)
    {
        Feedback::create($request->all());

        return redirect()->route('frontend.home')->with('flash_message', 'Feedback Send successfully!');
    }

    /**
     * Help me Page
     *
     * @return \Illuminate\Http\Response
     */
    public function support()
    {
        $body_class = '';

        return view('frontend.support', compact('body_class'));
    }
}
