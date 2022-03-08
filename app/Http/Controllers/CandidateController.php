<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\CandidateJob;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class CandidateController extends Controller
{
    /**
     * @param Request|null $request
     * @return array|Application|Factory|View|string
     * @throws \Throwable
     */
    public function index(?Request $request)
    {
        $students = [];

        if (!$request->get('filter')) {
            $filter = '';
            $students = Candidate::with('user')->paginate( 5);
//            dd($students);
            return view('candidates.index', compact('students', 'filter'));
        }
        $filter = $request->get('filter');
        switch ($filter) {
            case 'AscendentNume' :
                $students = Candidate::with('user')->orderBy('name')->paginate(5);
                break;
            case 'DescendentNume':
                $students = Candidate::with('user')->orderByDesc('name')->paginate(5);
                break;
        }

        return view('candidates.index', compact('students', 'filter'))->render();


    }
    public function order(Request $request)
    {
        if (!$request->get('filter')) {
            $students = Candidate::with('user')->paginate(5);
            return view('candidates.index', compact('students'));
        }
        $filter = $request->get('filter');
        switch ($filter) {
            case 'AscendentNume' :
                $students = Candidate::with('user')->orderBy('name')->paginate(5);
                break;
            case 'DescendentNume':
                $students = Candidate::with('user')->orderByDesc('name')->paginate(5);
                break;
        }

        return view('candidates.ordered', compact('students'));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function show()
    {
        $user = auth()->user();

        $candidate = Candidate::all()->firstWhere('user_id', $user->id);
        $id = $candidate->id;

        $name = $candidate->name;

        return view ('candidates.show', compact(
            'candidate',
            'name',
            'id'
        ));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function profile($id)
    {
//        $user = auth()->user();

        $candidate = Candidate::all()->firstWhere('id', $id);
//        $id = $candidate->id;

        $name = $candidate->name;

        return view ('candidates.show', compact(
            'candidate',
            'name',
            'id'
        ));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function profile2($id, $jobId)
    {
//        $user = auth()->user();

        $candidate = Candidate::all()->firstWhere('id', $id);
//        $id = $candidate->id;

        $name = $candidate->name;

        $jobCandidate = CandidateJob::all()->where('job_id', $jobId)->where('candidate_id', $id)->first();
        $jobCandidate->seen = true;
        $jobCandidate->save();

        return view ('candidates.show', compact(
            'candidate',
            'name',
            'id'
        ));
    }


    public function edit(int $id)
    {
        $user = Candidate::find($id);

        return view('candidates.edit', compact('user'));
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
            'education' => ['string', 'nullable'],
            'city' => ['string', 'nullable'],
            'email' => ['email', 'nullable'],
            'phone_number' => ['numeric', 'nullable'],
            'last_job' => ['string', 'nullable'],
            'spoken_languages' => ['string', 'nullable']
        ]);

        $candidate = Candidate::find($id);
        if ($validator->fails()) {
            return redirect('candidates/' . $id . '/edit')->withInput()->withErrors($validator);
        } else {
            $candidate->update($request->all());
            return redirect('candidates/' . $id)->with('Success');
        }
    }

}
