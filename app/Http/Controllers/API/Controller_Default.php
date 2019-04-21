<?php
/**
 * Created by PhpStorm.
 * User: BASMA
 * Date: 4/14/2019
 * Time: 2:48 PM
 */

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

abstract class Controller_Default extends Controller
{

    /**
     * @param int $status
     * @param null $message
     * @param array $data
     * @return mixed
     */
    public static function ResponseAPI($status = 200, $message = null, $data = [])
    {
        if(empty($message))
        {
            $message = 'message error';
        }

        $data = [
            'status'    =>  $status,
            'message'   =>  $message,
            'data'      =>  $data
        ];

        return json_encode($data, true);
    }

//    public function requestAPI(string $method, string $url, $params = [])
//    {
//        $client = new Client();
////        return $result = $client->post('http://127.0.0.1:8000/oauth/token', [
////            'form_params' =>
////                [
////                    'username' => "mohammed.elaraby100@gmail.com",
////                    'password' => "123",
////                    'grant_type' => "password",
////                    'client_id' => "3",
////                    'client_secret' => "npIzAhXnxjnyUCWBbyM1x6R9jDCIH2iqNRftli5N",
////                ]
////
////        ])->getBody()->getContents();
//
//        $result = $client->request($method,self::$host.$url, [
//            'headers' =>
//                [
//                    'Authorization' => "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjVhMTk5MWFiZjFmM2JhYTlkZDdlMzI4OWY1YzI5NzQ5YzA3MTI0NThhNGNlZDFiOWNlZWQxY2I1ZTc4NzQ3ZGI2NzA3MTc2OTRkMTRjMmI5In0.eyJhdWQiOiIyIiwianRpIjoiNWExOTkxYWJmMWYzYmFhOWRkN2UzMjg5ZjVjMjk3NDljMDcxMjQ1OGE0Y2VkMWI5Y2VlZDFjYjVlNzg3NDdkYjY3MDcxNzY5NGQxNGMyYjkiLCJpYXQiOjE1NDg1NzkzNjQsIm5iZiI6MTU0ODU3OTM2NCwiZXhwIjoxNTgwMTE1MzYzLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.ncCJw9yYtEkCdxsayq0eyrCLGepk3foVqpiwWjh3uxfF6dyiay8JqLVXQLDm76N6zYkchE_gph9W0LaMRyZ-tgkeY-OTHYntgJ_lmPueSturWjIcywQ6l0cagTS8nXK7GpCkIhEKnkulWzNiyIgoYYNxSR0jX051kBB32McbS-J1L9Od4AAv0Kib5WhAxznTT5uFvci_CCDSR2IdLmC4r942eVs1qsdpSO8PdDr6m4CZyIH14qY4NkRxM9SCk9GedqdXWXCEcn6wYwMqfPHrNzwPS7Ttd73iGnVX6FhCFwDRdH38Pr7zvVRwo4w3vSAWrOqhJ0F1nSoDkDa0pFR27YoPMwxjgaeU-YKD-Jt1R2pFIO_YZytT1_Kjwz_kU9rYm0Wmz2lWQdR-tHGmU1s8eXRPo_kKmZR-qFBklgaYJRAd8L4qtqq8b7KGuL7vc32ojNK0CbqIWqXPJP-X3TEiIcZ72Xk9gBnpajQv9QkvM7l9eFNpjBUpGbDDU0D6qXFovpJ3CUiz55mccBzY2LzWoHDxrKysozBOzoN1D7T-RG9pY1yowtDrHSiL8OOG5r1gEfZ2sd3dkaY163SQdVxtJY950th1mSqeEd5jJMYu-u-YaAN50D4COX4mhwZ8pxi5dYhQnfK9kZkB9qZV8581w3kXINCYIspanLfnMXIvjbI"
//                ],'form_params' => $params
//
//        ])->getBody()->getContents();
//        return \GuzzleHttp\json_decode($result, true);
//    }

}