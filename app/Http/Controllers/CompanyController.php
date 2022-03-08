<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Company;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class CompanyController extends Controller
{

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function show()
    {
        $user = auth()->user();

        $company = Company::all()->firstWhere('user_id', $user->id);
        $id = $company->id;

        $name = $company->name;

        return view ('companies.show', compact(
            'company',
            'name',
            'id'
        ));
    }

    public function edit(int $id)
    {
        $user = Company::find($id);

        return view('companies.edit', compact('user'));
    }

    public function update(Request $request, int $id)
    {
//        $messages = [
//            'name.required' => 'Numele este obligatoriu',
//            'role.required' => 'Rolul este obligatoriu',
//            'username.required' => 'Numele de utilizator este obligatoriu'
//            'name.string' => 'Rolul este obligatoriu',
//            'role.required' => 'Rolul este obligatoriu',
//            ];
//        $rules = [];
//        $validator = Validator::make($request->all(), $rules, $messages);
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['string', 'nullable'],
            'company_city' => ['string', 'nullable'],
            'email' => ['email', 'nullable'],
        ]);

        $company = Company::find($id);
        if ($validator->fails()) {
            return redirect('companies/' . $id . '/edit')->withInput()->withErrors($validator);
        } else {
            $company->update($request->all());
            return redirect('companies/' . $id)->with('Success');
        }
    }}
