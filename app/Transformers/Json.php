<?php

namespace App\Transformers;


/**
*  Class Json is transformers from raw data to json view
*/
class Json
{
    public static function response($data = null, $message = null, $status = 1, $additional=null, $statusCode = 200)
    {
        if ($message==null) {
            $message = __('message.success');
        }
        if ($data==null) {
            $data = [];
        }
        $result['meta']['status'] = (int) $status;
        $result['meta']['message'] = $message;
        $result['meta']['code'] = $statusCode;
        if ($data instanceof \Illuminate\Pagination\LengthAwarePaginator) {
            $result['pagination']['total'] = $data->total();
            $result['pagination']['offset'] = $data->perPage();
            $result['pagination']['current'] =$data->currentpage();
            $result['pagination']['last']=$data->lastPage();
            $result['pagination']['next']=$data->nextPageUrl();
            $result['pagination']['prev']=$data->previousPageUrl();
            $result['data'] = $data->all();
        } else {
            $result['data'] = $data;
        }
        if ($additional!=null) {
            foreach ($additional as $add) {
                $result['meta'][$add['name']] = $add['data'];
            }
        }
        // $result['code'] = 200;
        $code = 200;
        return response()->json($result, $code);
    }

    public static function exception($message = null,$error = null, $code=200, $status = 0, $data=[], $sub_message = null)
    {
        if ($message==null) {
            $message = __('message.error');
        }
        $result['data'] = $data;
        $result['meta']['status'] = (int) $status;
        $result['meta']['message'] = $message;
        $result['meta']['message_desc'] = $sub_message;
        $result['meta']['code'] = $code;
        if ($error instanceof \ErrorException || $error instanceof \Throwable) {
            $result['error']['message'] = $error->getMessage();
            $result['error']['file'] = $error->getFile();
            $result['error']['line'] = $error->getLine();
        } else {
           $result['error'] = $error;
        }
        return response()->json($result, 200);
    }

}