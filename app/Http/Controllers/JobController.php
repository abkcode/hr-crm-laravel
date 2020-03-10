<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Job;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $pageLimit = 10;
        $jobs = DB::table('jobs')->orderBy('created_at', 'desc')->paginate($pageLimit);
        $pageNum = ($request->page) ? $request->page : 1;
        $startIndex = ($pageNum - 1) * $pageLimit + 1;
        $endIndex = ($startIndex - 1) + $pageLimit;
        if ($endIndex > $jobs->total()) {
            $endIndex = $jobs->total();
        }
        return view('jobs.index', compact('jobs', 'startIndex', 'endIndex'));
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'experience' => 'required',
            'location' => 'required'
        ]);

        $job = new Job([
            'title' => $request->get('title'),
            'experience' => $request->get('experience'),
            'location' => $request->get('location'),
        ]);
        $job->save();
        return redirect('/jobs')->with('success', 'Job saved!');
    }

    public function edit($id)
    {
        $job = Job::find($id);
        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'experience' => 'required',
            'location' => 'required'
        ]);

        $job = Job::find($id);
        $job->title =  $request->get('title');
        $job->experience = $request->get('experience');
        $job->location = $request->get('location');
        $job->save();

        return redirect('/jobs')->with('success', 'Job updated!');
    }

    public function destroy($id)
    {
        $job = Job::find($id);
        $job->delete();
        return redirect('/jobs')->with('success', 'Job deleted!');
    }
}
