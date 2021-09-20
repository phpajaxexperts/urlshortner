<?php

namespace App\Http\Controllers;

use App\Models\UrlShortner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class ShorturlController extends Controller
{
    //

    public function generateShortUrl(Request $request)
    {
        $requestData = $request->all();
        $validator = Validator::make($request->all(), [
            'url' => 'required|url|unique:url_shortener'
        ]);
        if ($validator->fails()) {
            return redirect('/')
                ->with('failure', $validator->errors()->first());
        }else{
            $requestData['code'] = Str::random(6);

            UrlShortner::create($requestData);

            return redirect('/')
                ->with('success', 'Shorten Link Generated Successfully!');
        }
    }

    public function shortenUrl(Request $request)
    {
        $code = $request->code;

        $shorten_url = UrlShortner::where('code','=',$code)->first();

        if(isset($shorten_url->count))
        UrlShortner::where('code', $code)
            ->update(['count' => $shorten_url->count+1]);

        $shorten_url = UrlShortner::where('code','=',$code)->first();

        return view('shorten-url', compact('shorten_url'));
    }

    public function shortenUrlLookedUp(Request $request)
    {
        $code = $request->code;

        $shorten_url = UrlShortner::where('code','=',$code)->first();

        return view('shorten-url-looked-up', compact('shorten_url'));
    }
}
