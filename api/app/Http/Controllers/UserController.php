<?php

namespace App\Http\Controllers;

// use App\User;

class UserController extends Controller
{
    /**
     * Retrieve the user for the given ID.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

        // $arr2 = [];

        // for ($x = 0; $x <= 10; $x++) {
        //     $arr2[] = [
        //         'email' =>  $x
        //     ];
        // }

        $arr = [
            'data' => [
                'id' => $id,
                'name' => 'Mirel',
                'mail_limit' => '20',
                'branch' => "PSC",
                'mobile' => "",
                'phone' => "",
                'login' => "mirel",
                'sms_limit' => "5",
                'email' => "mirel@talisman.tech",
                'consultant' => "MIR",
                'title' => "",
                'address' => array(
                    'ceva' => '12123'
                )
            ]
        ];

        //dd($arr);

        return $arr;

    }
}
