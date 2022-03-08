<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\CandidateJob;
use App\Job;
use App\Question;
use App\Student;
use App\StudentAnswer;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CandidateJobController extends Controller
{
    public function __construct()
    {
        //$this->middleware("candidate")->only('create', 'store');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $candidateId = Candidate::where('user_id', $userId)->get()->first()['id'];
        $jobs = CandidateJob::with('job.company')->where('candidate_id', $candidateId)->get();
//        dd($jobs);

       // $jobs = $jobs->paginate(9);

        //dd($jobs);
        return view('candidateJobs.index', compact('jobs'))->render();
    }

    public function showCandidates($jobId)
    {
        $candidateIds = CandidateJob::all()->where('job_id', $jobId)->pluck('candidate_id')->toArray();
        $students= Candidate::with('user')->whereIn('id', $candidateIds)->paginate( 5);
        $filter = '';
        return view('candidates.index', compact('students', 'filter', 'jobId'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($jobId)
    {
        $data = [
            'job_id' => $jobId,
        ];
        $job = new CandidateJob();
        $job['job_id'] = $data['job_id'];
        $userId = Auth::user()->id;
        $candidateId = Candidate::where('user_id', $userId)->get()->first()['id'];
        $job['candidate_id'] = $candidateId;
        $job['seen'] = false;

        $job->save();
        return redirect('/jobs')->with('succes', 'Aplicatie salvata');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $questionId)
    {
        $messages = [
            'answer.required' => 'Raspunsul este obligatoriu'
        ];
        //dd(Auth::user());
        $validator = Validator::make($request->all(), [
            'answer' => 'required|string'
        ], $messages);
        if ($validator->fails()) {
            return redirect('studentAnswers/create/' . $questionId)->withInput()->withErrors($validator);
        } else {
            $data = [
                'answer' => $request->get('answer'),
                'question_id' => $questionId,
            ];
            $answer = new StudentAnswer();
            $answer['answer'] = $data['answer'];
            $answer['question_id'] = $data['question_id'];
            $userId = Auth::user()->id;
            $studentId = Student::where('user_id', $userId)->get()->first()['id'];
            $student_id = $studentId;
            $answer['student_id'] = $student_id;
            $answer->save();
            return redirect('/questions')->with('succes', 'Answer saved');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\StudentAnswer $studentAnswer
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
//        $userId = Auth::user()->id;
//        $studentId = Student::where('user_id', $userId)->get()->first()['id'];
//        $studentAnswers = DB::table('student_answers')
//            ->join('questions', 'questions.id', 'student_answers.question_id')
//            ->join('subjects', 'questions.subject_id', 'subjects.id')
//            ->where('student_answers.student_id', $id)
//            ->get()->toArray();

        $studentAnswers = StudentAnswer::where('student_id', $id)->with('question')->with('teacherAnswers');
//        $studentAnswers = ['answers' => $studentAnswers->get()->toArray()];
        $studentAnswers = $studentAnswers->get()->toArray();
//dd($studentAnswers);
        return view('studentAnswers.show', compact('studentAnswers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\StudentAnswer $studentAnswer
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentAnswerController $studentAnswer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\StudentAnswer $studentAnswer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentAnswerController $studentAnswer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\StudentAnswer $studentAnswer
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentAnswerController $studentAnswer)
    {
        //
    }
}
