<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
class GuzzleController extends Controller
{
    public function index(){
        $client = new Client;
        $response  =  $client -> request ( 'GET' ,'http://115.68.220.209:8080/api/products',  [
        ]);
        $res['status'] = $response -> getStatusCode ();
        $res['body'] = $response -> getBody ();
        $res['body'] = json_decode($res['body'], true);
        return view('api.Product.index', compact('res'));
    }
    public function GetToken(){
            $Token['token_type'] = "Bearer";
            $Token['expires_in'] = 31622399;
            $Token['access_token'] = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjkyODZlYzRmMWQwYTE1MjBiMzcyMTA5N2FjZDY4ZWZmODM5NjRiNGYxYmVmNTE4YmQ2YzAwYTMyYzU5NDE4N2JkMWU3OGNiNTNjMGY0Y2VmIn0.eyJhdWQiOiIyIiwianRpIjoiOTI4NmVjNGYxZDBhMTUyMGIzNzIxMDk3YWNkNjhlZmY4Mzk2NGI0ZjFiZWY1MThiZDZjMDBhMzJjNTk0MTg3YmQxZTc4Y2I1M2MwZjRjZWYiLCJpYXQiOjE1NTg0MjE1MDEsIm5iZiI6MTU1ODQyMTUwMSwiZXhwIjoxNTkwMDQzOTAxLCJzdWIiOiI2Iiwic2NvcGVzIjpbIioiXX0.jhXHDUquiJ6C_xw9eYAT_esV2ApTphpzhqlKTLNzaFqo635pKhk6pfcb67JaspXBmQa1uCb-8YjyL92gPfevXqLues9XQHUlZw_qQUNczeEM3gFAW0fd2xnEUEdaWmDcFYve2TpBWZ4CA81cUL2CVMZfS13gQ2GlrMU9-EKs6sLaK_HMWR8qjQV8-6Y_7to2i8jiamKO2bveoEq2BUS2r1StzU28Rd3QwsOvWsyoHReQr7eMSj0PfP693kk7klhbyHltQYvgSuD6iReHxnFxLHhl5k73wq_6RZoXWRmkjfMwrWCNB79srZ-Vgi1I3NJzuDlGAZB5k6HJ5BrfS5xoq1NjA2VTa7Se6A3S5x-pRRuHiT3dyBjm55UPpFhIiTFdVwMR2xroK5OLMPReGvCbptqhSMn1Q67NsBxEc6rVew0nQH-wFgwa7bULyQ9CJF024uKWBA1h3RIrDKkq8BcVJwomJUp8qo-Onzbvh5IBO0MjuNtT205ytRYMoy9JqA4c-1ku1-AYsm-COsh6NnE1iqfLHR_k2RFaNvpUK4g-ubKZtP0EU8fZ08DZr3i4ajysKrj1AlIGBFMPspJTFkZ4hFgX0y0RFfNtNA-dGkHaVfmo8OSAiO74KwconhkjLajmtywUDxvEG0UCUkAMd7ssa-f6rjyN-WdwiVyomFXM6A";
            $Token['refresh_token'] =
            "def502005439c22aed9343f2fd587c5e9207557a13b6bfe340192035af8862940c7de15a0939ca6bf21d290c7ae1bd9a32967a2557463b1fd8dce3602ab147a3b1714d32d8c2ea499fd8dbeafa5cb514b7e7ed51431e55ffefd4534858ce2a7ab3e2f38f262adce00c40199b00bcbe42976bcd6616e95a8496d25364506ffe62ca42aa232ce4600894d9edfce54f6dd5509a396c328c4e885cf43ae3ff664e55bb2174a8efd49e675dc1045c6f4bb3c0718ee723d15800bb64ecadbeeb798d42f838a86e4474c5fbf7ea482233c215e8eb223bcb78934bb9f352f07be9bb131813bf57526a0dfb012d7f82ca94e162ab2558b79d26fc146dbf8b345a8945faaba6d231e6a5c6692d7522d3269df74fbaa9e18ca42da35d85e43d406a06a926a2dd605e94c2eb241f32da36bcce983f73bcc0d307382d307854d05ceba818e465f38f4ac863c44f704c867bebe4d4059221357fff2f0c569367212ddfd748c087bc7ee038";
            $Token = json_encode($Token, JSON_PRETTY_PRINT);

            $this->ApiUser();?><br><br><br><?php
            echo "토큰정보";
            echo "<pre>".$Token."<pre><br>";
        }
        public function ApiUser(){
            $client = new Client;
            $response  =  $client -> request ( 'GET' ,'http://115.68.220.209:8080/api/user',  [
                'headers' => [
                    'content-type' => 'application/json',
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjkyODZlYzRmMWQwYTE1MjBiMzcyMTA5N2FjZDY4ZWZmODM5NjRiNGYxYmVmNTE4YmQ2YzAwYTMyYzU5NDE4N2JkMWU3OGNiNTNjMGY0Y2VmIn0.eyJhdWQiOiIyIiwianRpIjoiOTI4NmVjNGYxZDBhMTUyMGIzNzIxMDk3YWNkNjhlZmY4Mzk2NGI0ZjFiZWY1MThiZDZjMDBhMzJjNTk0MTg3YmQxZTc4Y2I1M2MwZjRjZWYiLCJpYXQiOjE1NTg0MjE1MDEsIm5iZiI6MTU1ODQyMTUwMSwiZXhwIjoxNTkwMDQzOTAxLCJzdWIiOiI2Iiwic2NvcGVzIjpbIioiXX0.jhXHDUquiJ6C_xw9eYAT_esV2ApTphpzhqlKTLNzaFqo635pKhk6pfcb67JaspXBmQa1uCb-8YjyL92gPfevXqLues9XQHUlZw_qQUNczeEM3gFAW0fd2xnEUEdaWmDcFYve2TpBWZ4CA81cUL2CVMZfS13gQ2GlrMU9-EKs6sLaK_HMWR8qjQV8-6Y_7to2i8jiamKO2bveoEq2BUS2r1StzU28Rd3QwsOvWsyoHReQr7eMSj0PfP693kk7klhbyHltQYvgSuD6iReHxnFxLHhl5k73wq_6RZoXWRmkjfMwrWCNB79srZ-Vgi1I3NJzuDlGAZB5k6HJ5BrfS5xoq1NjA2VTa7Se6A3S5x-pRRuHiT3dyBjm55UPpFhIiTFdVwMR2xroK5OLMPReGvCbptqhSMn1Q67NsBxEc6rVew0nQH-wFgwa7bULyQ9CJF024uKWBA1h3RIrDKkq8BcVJwomJUp8qo-Onzbvh5IBO0MjuNtT205ytRYMoy9JqA4c-1ku1-AYsm-COsh6NnE1iqfLHR_k2RFaNvpUK4g-ubKZtP0EU8fZ08DZr3i4ajysKrj1AlIGBFMPspJTFkZ4hFgX0y0RFfNtNA-dGkHaVfmo8OSAiO74KwconhkjLajmtywUDxvEG0UCUkAMd7ssa-f6rjyN-WdwiVyomFXM6AE',
                ],
            ]);
            //echo  $response -> getStatusCode ()."<br>";
            echo "사용자 정보";?><br><br><?php
            echo  $response -> getBody ();
        }
}
