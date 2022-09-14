<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Balance;
use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalanceController extends Controller
{

    public function showAccount()
    {
        return view('account');
    }

    public function addBalanceAccount(Request $request)
    {
        $validated = $request->validate([
            'customerName' => 'required',
            'customerSurname' => 'required',
            'cardNumber' => 'required|string|min:19|max:19',
            'expiryDate' => 'required|string|min:5|max:5',
            'CCV' => 'required|numeric|digits:3',

        ],

            [
                'customerName.required' => 'Customer name cannot be empty.',

                'customerSurname.required' => 'Customer Surname cannot be empty.',

                'cardNumber.required' => 'Card number cannot be empty.',
                'cardNumber.min' => 'Card number must be 16 digits.',
                'cardNumber.max' => 'Card number must be 16 digits.',

                'expiryDate.required' => 'Expiry date cannot be empty.',
                'expiryDate.min' => 'Expiry date must be 4 digits.',
                'expiryDate.max' => 'Expiry date must be 4 digits.',

                'CCV.required' => 'CCV cannot be empty.',
                'CCV.digits' => 'CCV must be 3 digits.',
            ]

        );

        $user_id = Auth::user()->id;

        Card::create([
            'user_id' => $user_id,
            'card_user_name' => request('customerName'),
            'card_user_surname' => request('customerSurname'),
            'card_number' => request('cardNumber'),
            'card_expiry_date' => request('expiryDate'),
            'card_CCV' => request('CCV'),
        ]);

        Balance::create([
            'user_balance' => 0,
            'user_id' => $user_id,
        ]);

        DB::table('users')
            ->where('id', $user_id)
            ->update(['Balance_Is_Set' => 1]);

        return back();
    }

    public function withdraw(Request $request)
    {
        $validated = $request->validate([
            'withdrawBalance' => 'required|numeric|min:1|max:500',
        ],

            [
                'withdrawBalance.required' => 'Withdraw field cannot be empty.',
                'withdrawBalance.min' => 'Minimum withdrawal amount is 1.',
                'withdrawBalance.max' => 'Maximum withdrawal amount is 500.',
            ]

        );

        $balance = Auth::user()->balance->user_balance;

        $subtraction_value = request('withdrawBalance');

        if ($subtraction_value > $balance) {
            return back()->withErrors(['insufficientBalance' => 'Insufficient balance.']);
        }
        else {
            $balance = Auth::user()->balance->user_balance;
            $subtraction_value = request('withdrawBalance');
            $calculated_balance = $balance - $subtraction_value;

            $user_balance_ID = Auth::user()->balance->balance_id;

            DB::table('balances')
                ->where('balance_id', $user_balance_ID)
                ->update(['user_balance' => $calculated_balance]);

            return back();

        }
    }

    public function addBalance(Request $request) {
        $validated = $request->validate([
            'addBalance' => 'required|numeric|min:1|max:500',
        ],

            [
                'addBalance.required' => 'Add field cannot be empty.',
                'addBalance.min' => 'Minimum add amount is 1.',
                'addBalance.max' => 'Maximum add amount is 500.',
            ]

        );

        $balance = Auth::user()->balance->user_balance;

        $addition_value = request('addBalance');

        $added_balance = $balance + $addition_value;

        $user_balance_ID = Auth::user()->balance->balance_id;

        DB::table('balances')
            ->where('balance_id', $user_balance_ID)
            ->update(['user_balance' => $added_balance]);

        return back();
    }

}
