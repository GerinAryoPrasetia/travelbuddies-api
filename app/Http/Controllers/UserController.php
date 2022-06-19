<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function index()
    {
        return User::all();
    }

    public function show($id)
    {
        return User::find($id);
    }

    public function addPlan(Request $request, User $user)
    {
        try {
            $validator = Validator::make($request->all(), [
                'destination_name' => 'required',
                'schedule' => 'required',
                'people' => 'required',
                'items' => 'required',
                'transportation' => 'required',
            ]);

            $this->validate($request, [
                'destination_name' => 'required',
                'schedule' => 'required',
                'people' => 'required',
                'items' => 'required',
                'transportation' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(
                    [
                        'status' => 'error',
                        'message' => $validator->errors()
                    ],
                    500
                );
            };

            $plan = new Plan([
                'destination_name' => $request->get('destination_name'),
                'schedule' => $request->get('schedule'),
                'people' => $request->get('people'),
                'items' => $request->get('items'),
                'transportation' => $request->get('transportation'),
            ]);

            if ($user->plans()->save($plan)) {
                return response()->json(['message' => 'Plan Saved', 'data' => $plan], 200);
            }

            return response()->json(
                [
                    'status' => 'success',
                    'message' => 'plan data successfully added',
                    'data' => $plan,
                ],
                200
            );
        } catch (\Throwable $e) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => $e->getMessage(),
                ],
                500
            );
        };
    }

    public function showPlan(User $user)
    {
        $plans = $user->plans;
        if (count($plans) > 0) {
            return response()->json($plans, 200);
        } else {
            return response()->json([
                'message' => 'Data Not Found',
                'plan' => null,
            ], 200);
        }
    }
}
