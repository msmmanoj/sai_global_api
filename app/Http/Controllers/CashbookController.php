<?php

namespace App\Http\Controllers;

use App\Cashbook;
use Illuminate\Http\Request;

class CashbookController extends Controller
{
    public function getCashbookValues()
    {
        try {
            $response = Cashbook::get()->toArray();
            return response()->json(
                [
                    'success' => true,
                    'body' => $response
                ], 200
            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Cashbook Retrieval Failed',
                    'error' => $e->getMessage()
                ]
            );
        }
    }

    public function insertCashbookValues(Request $request)
    {
        try {
            $cashBook = new Cashbook;
            $cashBook->amount = $request->input('amount', 0);
            $cashBook->acc_name = $request->input('acc_name', 'default');
            $cashBook->acc_date = $request->input('acc_date', '');
            $cashBook->is_credit = $request->input('is_credit', 0);
            $cashBook->company = $request->input('company', 'Sai Global');
            $cashBook->save();
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Cashbook Inserted Successfully'
                ],
                200
            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Cashbook Insertion Failed',
                    'error' => $e->getMessage()
                ]
            );
        }
    }

    public function updateCashbookById(Request $request, $id)
    {
        try {
            $cashBook = Cashbook::find($id);
            if (empty($cashBook)) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => $id . ' is not a valid cashbook id',
                    ],
                    200
                );
            } else {
                $cashBook->amount = $request->input('amount', 0);
                $cashBook->acc_name = $request->input('acc_name', 'default');
                $cashBook->acc_date = $request->input('acc_date', null);
                $cashBook->is_credit = $request->input('is_credit', 0);
                $cashBook->company = $request->input('company', 'Sai Global');
                $cashBook->save();
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Cashbook data updated.',
                    ],
                    200
                );
            }
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Cashbook Updating Failed',
                    'error' => $e->getMessage()
                ]
            );
        }
    }

    public function deleteCashbookById($id)
    {
        try {
            if (Cashbook::find($id)) {
                Cashbook::find($id)->delete();
                $status = true;
                $message = 'Cashbook deleted successfully.';
            } else {
                $status = false;
                $message = 'Cannot find cashbook with '.$id;
            }
            return response()->json(
                [
                    'success' => $status,
                    'message' => $message,
                ],
                200
            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Cashbook Deletion Failed',
                    'error' => $e->getMessage()
                ]
            );
        }
    }

}
