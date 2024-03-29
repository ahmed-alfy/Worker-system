<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;

trait GeneralTrait{




public function returnError($status,$errNum,$msg){

    return response()->json([
        'status'=>$status,
        'errNum' => $errNum,
        'msg'=> $msg
    ],$status);
}

public function returnSuccessMessage($status,$msg,$errNum = 'S000'){

    return response()->json([
        'status'=>$status,
        'errNum' => $errNum,
        'msg'=> $msg
    ],$status);
}

public function returnData($status,$key,$value,$msg='',$errNum='S0001'){
    return response()->json([
        'status'=>$status,
        'errNum' => $errNum,
        'msg'=> $msg,
        $key=>$value
    ],$status);
}


public function returnValidationError($status,$code,$validator){
    return $this->returnError($status,$code, $validator->errors()->first());
}

public function returnCodeAccordingToInput($validator){
    $inputs = array_keys($validator->errors()->toArray());
    $code = $this->getErrorCode($inputs[0]);
    return $code;
}

public function getErrorCode($input){
        if ($input == "messages")
            return 'E0011';
        else
            return 'E000011';
    }
}

