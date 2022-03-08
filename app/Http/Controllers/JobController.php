<?php

namespace App\Http\Controllers;

use App\Article;
use App\Candidate;
use App\Company;
use App\Job;
use App\Question;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request|null $request
     * @return array|Response|string
     * @throws \Throwable
     */
    public function index(?Request $request)
    {
        $jobs = Job::with('company');
        $filter = $request->get('filter') ?? '';
        $sorter = $request->get('sorter') ?? '';

        switch ($sorter) {
            case 'ascScor' :
                $jobs = $jobs->orderBy('job_level');//->paginate(9);
                break;
            case 'descScor':
                $jobs = $jobs->orderByDesc('job_level');//->paginate(9);
                break;
        }

//        dd($filter);

        if ($filter) {
            $jobs = $jobs->where('category', $filter);
        }

        if (Auth::user()->role == 'Companie') {
            $companyId = Company::where('user_id', Auth::user()->id)->get()->first()['id'];

            $jobs->where('company_id', $companyId);
        }

        $jobs = $jobs->paginate(9);

        //dd($jobs);
        return view('jobs.index', compact('jobs', 'sorter', 'filter'))->render();
    }

    public function filter(Request $request)
    {
        //dd($request->get('subject'));
        $jobs = Article::where('category', $request->get('category'))->with('company')
            ->paginate(9);

        // dd($jobs);
        return view('articles.index', compact('questions'));
    }

    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'searchName' => 'string|max:30|'
        ]);
        if ($validator->fails()) {
            return view('students.searchNotOk');
        } else {
            $name = $request->get('searchName');
            try {
                $jobs = Job::where('name', 'like', '%' . $name . '%');
            } catch (\Exception $exception) {
                return view('students.searchNotOk');
            }

//            try {
//                $questions = DB::table('questions')->where('question', 'like', '%' . $name . '%')->get();
//            } catch (\Exception $exception) {
//                return view('students.searchNotOk');
//            }
//            //dd($jobs, $subjects, $questions);

            $sorter = '';
            $filter = '';
            $jobs = $jobs->paginate(9);
            return view('jobs.index', compact('jobs', 'sorter', 'filter'))->render();

        }
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $messages = [
            'description.required' => 'Descrierea este obligatorie',
            'name.required' => 'Numele este obligatoriu',
            'job_city.required' => 'Orasul este obligatoriu',
            'job_level.required' => 'Nivelul este obligatoriu',
        ];
        $validator = Validator::make($request->all(), [
            'description' => 'required|string',
            'name' => 'required|string',
            'job_city' => 'required|string',
            'job_level' => 'required|string',
        ], $messages);
        if ($validator->fails()) {
            return redirect('jobs/create')->withInput()->withErrors($validator);
        } else {
            $company = Company::all()->where('user_id', Auth::user()->id)->first();
            $data = [
                'description' => $request->get('description'),
                'name' => $request->get('name'),
                'job_level' => $request->get('job_level'),
                'job_city' => $request->get('job_city'),
                'requirements' => $request->get('requirements'),
                'responsibilities' => $request->get('responsibilities'),
                'category' => $request->get('category'),
                'details' => $request->get('details'),
                'expiration_date' => $request->get('expiration_date'),
                'company_id' => $company->id,
            ];

            $job = new Job();
            $job['description'] = $data['description'];
            $job['name'] = $data['name'];
            $job['job_level'] = $data['job_level'];
            $job['job_city'] = $data['job_city'];
            $job['requirements'] = $data['requirements'];
            $job['responsibilities'] = $data['responsibilities'];
            $job['category'] = $data['category'];
            $job['details'] = $data['details'];
            $job['expiration_date'] = $data['expiration_date'];
            $job['company_id'] = $data['company_id'];

            $job->save();
//            $question->teacher()->attach($request->get('teacher_id'));
//            $question->subject()->attach($request->get('subject_id'));

            return redirect('/jobs')->with('succes', 'Job salvat');
        }
    }

    /**
     * @param int $id
     * @return Application|Factory|View
     */
    public function show(int $id)
    {
        $job = Job::with('company')->where('id', $id)->get()->first();

        return view('jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Question $question
     * @return Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Question $question
     * @return Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Question $question
     * @return Response
     */
    public function destroy(Question $question)
    {
        //
    }

}
