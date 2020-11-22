<?php

namespace App\Http\Controllers;

use App\CompanyName;
use Illuminate\Http\Request;

class CompanyNameController extends Controller
{
    public function getCompanyLists()
    {
        try {
            $response = CompanyName::get()->toArray();
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
                    'message' => 'Company Retrieval Failed',
                    'error' => $e->getMessage()
                ]
            );
        }
    }

    public function insertCompany(Request $request)
    {
        try {
            $company = new CompanyName;
            $company->id = $request->input('id', 0);
            $company->company_name = $request->input('company_name', 'global');
            $company->save();
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Company Inserted Successfully'
                ],
                200
            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Company Insertion Failed',
                    'error' => $e->getMessage()
                ]
            );
        }
    }

    public function updateCompany(Request $request,$id) {
        try {
            $company = CompanyName::where('id', $id)->first();
            if (empty($company)) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => $id . ' is not a valid Company id',
                    ],
                    200
                );
            } else {
                $company->company_name = $request->input('company_name', 'global');
                $company->save();
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Company data updated.',
                    ],
                    200
                );
            }
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Company Updating Failed',
                    'error' => $e->getMessage()
                ]
            );
        }
    }

    public function deleteCompany($id) {
        try {
            if (CompanyName::find($id)) {
                CompanyName::find($id)->delete();
                $status = true;
                $message = 'Company deleted successfully.';
            } else {
                $status = false;
                $message = 'Cannot find Company with '.$id;
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
                    'message' => 'Company Deletion Failed',
                    'error' => $e->getMessage()
                ]
            );
        }
    }
}
