<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ReviewController extends Controller
{
    public function index($id, $request)
    {

             $client = new Client;
             $response  =  $client -> request ( 'GET' ,'http://115.68.220.209:8080/api/products/'.$id.'/reviews',  [
             ]);
             $res['status'] = $response -> getStatusCode ();
             $res['body'] = $response -> getBody ();
             $res['body'] = json_decode($res['body'], true);
             $res['id'] = $id;
             $res['bike'] =$request;
             return view('api.Review.index', compact('res'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $client = new Client([
            'headers' => [
                'content-type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjkyODZlYzRmMWQwYTE1MjBiMzcyMTA5N2FjZDY4ZWZmODM5NjRiNGYxYmVmNTE4YmQ2YzAwYTMyYzU5NDE4N2JkMWU3OGNiNTNjMGY0Y2VmIn0.eyJhdWQiOiIyIiwianRpIjoiOTI4NmVjNGYxZDBhMTUyMGIzNzIxMDk3YWNkNjhlZmY4Mzk2NGI0ZjFiZWY1MThiZDZjMDBhMzJjNTk0MTg3YmQxZTc4Y2I1M2MwZjRjZWYiLCJpYXQiOjE1NTg0MjE1MDEsIm5iZiI6MTU1ODQyMTUwMSwiZXhwIjoxNTkwMDQzOTAxLCJzdWIiOiI2Iiwic2NvcGVzIjpbIioiXX0.jhXHDUquiJ6C_xw9eYAT_esV2ApTphpzhqlKTLNzaFqo635pKhk6pfcb67JaspXBmQa1uCb-8YjyL92gPfevXqLues9XQHUlZw_qQUNczeEM3gFAW0fd2xnEUEdaWmDcFYve2TpBWZ4CA81cUL2CVMZfS13gQ2GlrMU9-EKs6sLaK_HMWR8qjQV8-6Y_7to2i8jiamKO2bveoEq2BUS2r1StzU28Rd3QwsOvWsyoHReQr7eMSj0PfP693kk7klhbyHltQYvgSuD6iReHxnFxLHhl5k73wq_6RZoXWRmkjfMwrWCNB79srZ-Vgi1I3NJzuDlGAZB5k6HJ5BrfS5xoq1NjA2VTa7Se6A3S5x-pRRuHiT3dyBjm55UPpFhIiTFdVwMR2xroK5OLMPReGvCbptqhSMn1Q67NsBxEc6rVew0nQH-wFgwa7bULyQ9CJF024uKWBA1h3RIrDKkq8BcVJwomJUp8qo-Onzbvh5IBO0MjuNtT205ytRYMoy9JqA4c-1ku1-AYsm-COsh6NnE1iqfLHR_k2RFaNvpUK4g-ubKZtP0EU8fZ08DZr3i4ajysKrj1AlIGBFMPspJTFkZ4hFgX0y0RFfNtNA-dGkHaVfmo8OSAiO74KwconhkjLajmtywUDxvEG0UCUkAMd7ssa-f6rjyN-WdwiVyomFXM6AE',
            ]
        ]);
        $response = $client->post('http://115.68.220.209:8080/api/products/'.$request -> productId.'/reviews',
            ['body' => json_encode(
                [
                    'product_id' => $request -> productId,
                    'customer' => $request-> name,
                    'review' => $request-> description,
                    'star' => $request-> star
                ]
            )]
        );
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $bike = $request -> request->get('request');
        $client = new Client;
        $response  =  $client -> request ( 'GET' ,'http://115.68.220.209:8080/api/products/'.$id,  [
        ]);
        $res['status'] = $response -> getStatusCode ();
        $res['body'] = $response -> getBody ();
        $res['code'] = 'show';
        $res['body'] = json_decode($res['body'], true);

        return view('api.Product.index', compact('res','id','bike'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $client = new Client([
            'headers' => [
                'content-type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjkyODZlYzRmMWQwYTE1MjBiMzcyMTA5N2FjZDY4ZWZmODM5NjRiNGYxYmVmNTE4YmQ2YzAwYTMyYzU5NDE4N2JkMWU3OGNiNTNjMGY0Y2VmIn0.eyJhdWQiOiIyIiwianRpIjoiOTI4NmVjNGYxZDBhMTUyMGIzNzIxMDk3YWNkNjhlZmY4Mzk2NGI0ZjFiZWY1MThiZDZjMDBhMzJjNTk0MTg3YmQxZTc4Y2I1M2MwZjRjZWYiLCJpYXQiOjE1NTg0MjE1MDEsIm5iZiI6MTU1ODQyMTUwMSwiZXhwIjoxNTkwMDQzOTAxLCJzdWIiOiI2Iiwic2NvcGVzIjpbIioiXX0.jhXHDUquiJ6C_xw9eYAT_esV2ApTphpzhqlKTLNzaFqo635pKhk6pfcb67JaspXBmQa1uCb-8YjyL92gPfevXqLues9XQHUlZw_qQUNczeEM3gFAW0fd2xnEUEdaWmDcFYve2TpBWZ4CA81cUL2CVMZfS13gQ2GlrMU9-EKs6sLaK_HMWR8qjQV8-6Y_7to2i8jiamKO2bveoEq2BUS2r1StzU28Rd3QwsOvWsyoHReQr7eMSj0PfP693kk7klhbyHltQYvgSuD6iReHxnFxLHhl5k73wq_6RZoXWRmkjfMwrWCNB79srZ-Vgi1I3NJzuDlGAZB5k6HJ5BrfS5xoq1NjA2VTa7Se6A3S5x-pRRuHiT3dyBjm55UPpFhIiTFdVwMR2xroK5OLMPReGvCbptqhSMn1Q67NsBxEc6rVew0nQH-wFgwa7bULyQ9CJF024uKWBA1h3RIrDKkq8BcVJwomJUp8qo-Onzbvh5IBO0MjuNtT205ytRYMoy9JqA4c-1ku1-AYsm-COsh6NnE1iqfLHR_k2RFaNvpUK4g-ubKZtP0EU8fZ08DZr3i4ajysKrj1AlIGBFMPspJTFkZ4hFgX0y0RFfNtNA-dGkHaVfmo8OSAiO74KwconhkjLajmtywUDxvEG0UCUkAMd7ssa-f6rjyN-WdwiVyomFXM6AE',
            ]
        ]);
        $response = $client->put('http://115.68.220.209:8080/api/products/'.$id.'/reviews/'.$request->reviewId,
            ['body' => json_encode(
                [
                    // 'product_id' => $request -> productId,
                    'customer' => $request-> name,
                    'review' => $request-> description,
                    'star' => $request-> star
                ]
            )]
        );
        $mess = $response -> getBody ();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $reviewId)
    {
        $client = new Client([
            'headers' => [
                'content-type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjkyODZlYzRmMWQwYTE1MjBiMzcyMTA5N2FjZDY4ZWZmODM5NjRiNGYxYmVmNTE4YmQ2YzAwYTMyYzU5NDE4N2JkMWU3OGNiNTNjMGY0Y2VmIn0.eyJhdWQiOiIyIiwianRpIjoiOTI4NmVjNGYxZDBhMTUyMGIzNzIxMDk3YWNkNjhlZmY4Mzk2NGI0ZjFiZWY1MThiZDZjMDBhMzJjNTk0MTg3YmQxZTc4Y2I1M2MwZjRjZWYiLCJpYXQiOjE1NTg0MjE1MDEsIm5iZiI6MTU1ODQyMTUwMSwiZXhwIjoxNTkwMDQzOTAxLCJzdWIiOiI2Iiwic2NvcGVzIjpbIioiXX0.jhXHDUquiJ6C_xw9eYAT_esV2ApTphpzhqlKTLNzaFqo635pKhk6pfcb67JaspXBmQa1uCb-8YjyL92gPfevXqLues9XQHUlZw_qQUNczeEM3gFAW0fd2xnEUEdaWmDcFYve2TpBWZ4CA81cUL2CVMZfS13gQ2GlrMU9-EKs6sLaK_HMWR8qjQV8-6Y_7to2i8jiamKO2bveoEq2BUS2r1StzU28Rd3QwsOvWsyoHReQr7eMSj0PfP693kk7klhbyHltQYvgSuD6iReHxnFxLHhl5k73wq_6RZoXWRmkjfMwrWCNB79srZ-Vgi1I3NJzuDlGAZB5k6HJ5BrfS5xoq1NjA2VTa7Se6A3S5x-pRRuHiT3dyBjm55UPpFhIiTFdVwMR2xroK5OLMPReGvCbptqhSMn1Q67NsBxEc6rVew0nQH-wFgwa7bULyQ9CJF024uKWBA1h3RIrDKkq8BcVJwomJUp8qo-Onzbvh5IBO0MjuNtT205ytRYMoy9JqA4c-1ku1-AYsm-COsh6NnE1iqfLHR_k2RFaNvpUK4g-ubKZtP0EU8fZ08DZr3i4ajysKrj1AlIGBFMPspJTFkZ4hFgX0y0RFfNtNA-dGkHaVfmo8OSAiO74KwconhkjLajmtywUDxvEG0UCUkAMd7ssa-f6rjyN-WdwiVyomFXM6AE',
            ]
        ]);
        $response = $client->delete('http://115.68.220.209:8080/api/products/'.$id.'/reviews/'.$reviewId);
        return redirect()->back();
    }
}
