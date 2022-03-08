<?php

namespace App\Http\Controllers;

use App\Article;
use App\Company;
use App\Question;
use App\Subject;
use App\Teacher;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ArticleController extends Controller
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
        $questions = Article::with('company');
        $filter = $request->get('filter') ?? '';
        $sorter = $request->get('sorter') ?? '';

        switch ($sorter) {
            case 'ascScor' :
                $questions = $questions->orderBy('max_points');//->paginate(9);
                break;
            case 'descScor':
                $questions = $questions->orderByDesc('max_points');//->paginate(9);
                break;
        }

//        dd($filter);

        if ($filter) {
            $questions = $questions->where('category', $filter);
        }

        $questions = $questions->paginate(9);

        //dd($questions);
        return view('articles.index', compact('questions', 'sorter', 'filter'))->render();
    }

    public function filter(Request $request)
    {
        //dd($request->get('subject'));
        $questions = Article::where('category', $request->get('category'))->with('company')
            ->paginate(9);

        // dd($questions);
        return view('articles.index', compact('questions'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('articles.create');
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
            'content.required' => 'Continutul este obligatoriu',
            'category.required' => 'Categoria este obligatorie',
        ];
        $validator = Validator::make($request->all(), [
            'content' => 'required|string',
            'category' => 'required|string',
        ], $messages);
        if ($validator->fails()) {
            return redirect('articles/create')->withInput()->withErrors($validator);
        } else {
            $company = Company::all()->where('user_id', Auth::user()->id)->first();
            $data = [
                'content' => $request->get('content'),
                'category' => $request->get('category'),
                'company_id' => $company->id,
            ];

            $article = new Article();
            $article['content'] = $data['content'];
            $article['category'] = $data['category'];
            $article['company_id'] = $data['company_id'];

            $article->save();
//            $question->teacher()->attach($request->get('teacher_id'));
//            $question->subject()->attach($request->get('subject_id'));

            return redirect('/articles')->with('succes', 'Articol salvat');
        }
    }

    /**
     * @param int $id
     * @return Application|Factory|View
     */
    public function show(int $id)
    {
        $article = Article::with('company')->where('id', $id)->get()->first();
        // dd($question);

        return view('articles.show', compact('article', ));
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

    protected function getAllSubjects()
    {
        $userId = Auth::user()->id;
        $teacherId = Teacher::where('user_id', $userId)->get()->first()['id'];
        $subjects = Subject::where('teacher_id', $teacherId)->get()->toArray();
        return array_unique(array_pluck($subjects, 'subject'));
    }

    protected function getSubject($subject)
    {
        // dd($subject, Subject::where('subject', $subject)->get()->first()['id']);
        return Subject::where('subject', $subject)->get()->first()['id'];
    }
}
