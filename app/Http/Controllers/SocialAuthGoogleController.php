<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Socialite;


class SocialAuthGoogleController extends Controller
{
    /**
     * Return a callback method from google api.
     *
     * @return callback URL from google
     */
    public function handleProviderCallback($provider)
    {
        // Socialite will pick response data automatic
        $user = Socialite::driver($provider)->stateless()->user();

        return response()->json($user);
    }


    public function reverseGeoCoding(Request $request)
    {

        $url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($request->lat).','.trim($request->lng).'&sensor=false&key='.env('GOOGLE_API_KEY');
        $json = @file_get_contents($url);

        $data=json_decode($json);

        $status = $data->status;
        if($status=="OK")
        {
            return $data->results[0]->formatted_address;
        }
        else
        {
            return false;
        }

    }
}
