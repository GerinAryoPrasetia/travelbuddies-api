<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    //
    public function index()
    {
        return Plan::all();
    }

    public function showUserPlan($id)
    {
        $plan = Plan::where('user_id', $id)->first();
        return response($plan, 200);
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'user_id' => 'nullable',
            'destination_name' => 'required',
            'schedule' => 'required',
            'people' => 'required',
            'items' => 'required',
            'transportation' => 'required',
        ]);

        $plan = Plan::crete([
            'user_id' => $fields['user_id'],
            'destination_name' => $fields['destination_name'],
            'schedule' => $fields['schedule'],
            'people' => $fields['people'],
            'items' => $fields['items'],
            'transportation' => $fields['transportation'],
        ]);

        $response = [
            'code' => 201,
            'message' => 'Plan Berhasil Ditambahkan',
            'plan' => $plan,
        ];

        return response($response, 201);
    }
}
