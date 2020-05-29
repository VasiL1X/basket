<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;



class PaymentController extends Controller
{
    public function response(Request $request)
    {
        $user_id = '';
        $access_code = $_GET['access_code'];
        $amount = 0.25 * 1000;
        $command = 'AUTHORIZATION';
        $currency = 'JOD';
        $customer_email = $_GET['user_id'] . '@basket.jo';
        $customer_ip = $this->getRealIpAddr();
        $language = $_GET['language'];
        $merchant_identifier = $_GET['merchant_identifier'];
        $merchant_reference = $_GET['merchant_reference'];
        $return_url = url('/payment/final/response?page=' . $_GET['page']);
        $token_name = $_GET['token_name'];
        $str = 'BASKETaccess_code=' . $access_code . 'amount=' . $amount . 'command=' . $command . 'currency=' . $currency . 'customer_email=' . $customer_email . 'customer_ip=' . $customer_ip . 'language=' . $language . 'merchant_identifier=' . $merchant_identifier . 'merchant_reference=' . $merchant_reference . 'return_url=' . $return_url . 'token_name=' . $token_name . 'BASKET';

        $signature = hash('sha256', $str);//To make a signature
        /* Payment process start */
        $requestParams = array(
            'access_code' => $access_code,
            'command' => $command,
            'currency' => $currency,
            'language' => $language,
            'amount' => $amount,
            'customer_email' => $customer_email,
            'return_url' => $return_url,
            'token_name' => $token_name,
            'merchant_identifier' => $merchant_identifier,
            'merchant_reference' => $merchant_reference,
            'customer_ip' => $customer_ip,
            'signature' => $signature,
        );
        $redirectUrl = 'https://paymentservices.payfort.com/FortAPI/paymentApi';
        $ch = curl_init($redirectUrl);

        # Setup request to send json via POST.
        $data = json_encode($requestParams);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        # Return response instead of printing.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSLVERSION, 6);
        # Send request.
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Curl error: ' . curl_error($ch);
        }
        $decode_result = json_decode($result, true);


        if ($decode_result['response_code'] == 20064) {
            header("location:" . $decode_result['3ds_url']);
            exit;
        } else {


            $request->session()->put('errorMassage', $_GET['response_message']);
            return Redirect::to('checkout?type=2');
        }

        curl_close($ch);


    }

    public function finalResponse(Request $request)
    {


        if ($_GET['status'] == 02) {

            $user_array = array(
                'response_code' => $_GET['response_code'],
                'card_number' => $_GET['card_number'],
                'card_holder_name' => $_GET['card_holder_name'],
                'expiry_date' => $_GET['expiry_date'],
                'response_message' => $_GET['response_message'],
                'service_command' => $_GET['command'],
                'merchant_reference' => $_GET['merchant_reference'],
                'token_name' => $_GET['token_name'],
                'payment_option' => $_GET['payment_option'],
            );


            $request->session()->put('successData', $user_array);

            return Redirect::to('checkout?type=1');

        } else {

            $request->session()->put('errorMassage', $_GET['response_message']);
            return Redirect::to('checkout?type=2');
        }

    }

    public function getErrors(Request $request)
    {
        $massage = $request->session()->get('errorMassage');
        $request->session()->forget('errorMassage');
        return response(['error'=> $massage],200);
    }
    public function getData(Request $request)
    {
        $massage = $request->session()->get('successData');
        $request->session()->forget('successData');
        return response(['data'=> $massage],200);
    }
    public function getRealIpAddr()
    {
        if (isset($_SERVER)) {
            if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
                $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
                if (strpos($ip, ",")) {
                    $exp_ip = explode(",", $ip);
                    $ip = $exp_ip[0];
                }
            } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
                $ip = $_SERVER["HTTP_CLIENT_IP"];
            } else {
                $ip = $_SERVER["REMOTE_ADDR"];
            }
        } else {
            if (getenv('HTTP_X_FORWARDED_FOR')) {
                $ip = getenv('HTTP_X_FORWARDED_FOR');
                if (strpos($ip, ",")) {
                    $exp_ip = explode(",", $ip);
                    $ip = $exp_ip[0];
                }
            } else if (getenv('HTTP_CLIENT_IP')) {
                $ip = getenv('HTTP_CLIENT_IP');
            } else {
                $ip = getenv('REMOTE_ADDR');
            }
        }
        return $ip;

    }


}
