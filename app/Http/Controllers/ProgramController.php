<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUpdateProgramOutline;
use App\Http\Requests\UpdateProgramInformationRequest;
use App\Models\Program;
use App\Models\ProgramOutline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class ProgramController extends Controller
{
    const IMAGE_DIR ='/uploads/images/';
    const PERIODS = array('Quarter1', 'Quarter2', 'Quarter3', 'Quarter4', 'Quarter5', 'Quarter6', 'Quarter7', 'Quarter8', 'Quarter9', 'Quarter10', 'Quarter11', 'Quarter12');
    public function index(Request $request)
    {
        $programs = Program::all();
        $data = [
            'programs' => $programs
        ];

        return view('pages.management.program.index')->with($data);
    }

    public function show(Request $request)
    {
        $slug = $request['slug'];
        $program = Program::where('slug', $slug)->firstOrFail();
        $outlines = $this->getProgramOutlines($program);
        $quarters = $this->getQuarters($outlines);
        $allQuarters = self::PERIODS;

        $data = [
            'program' => $program,
            'quarters' => $quarters,
            'allQuarter' => $allQuarters
        ];

        return view('pages.management.program.program-detail')->with($data);
    }

    public function createProgram(Request $request)
    {

        $allQuarters = self::PERIODS;
        $data = [
            'allQuarter' => $allQuarters
        ];

        return view('pages.management.program.program-detail')->with($data);

    }

    public function updateImage(Request $request)
    {
        $slug = $request['slug'];
        $program = Program::where('slug', $slug)->first();

        try {
            $request->validate([
                'image_path' => 'required|image|mimes:jpg,jpeg,png'
            ]);

            $fileName = $request->file('image_path')->getClientOriginalName();
            $fileName = str_replace(' ', '', $fileName);
            $programTitle = str_replace(' ', '', $program->title);
            $programTitle = str_replace('+', '', $programTitle);
            $request->file('image_path')->storeAs(self::IMAGE_DIR.$programTitle, $fileName, 'public');

            $program->update([
                'image_path' => $fileName
            ]);

        }catch (\Exception $exception){

        }

        return Redirect::route('show.program', ['slug' => $slug])->with('status', 'program image updated successfully');
    }

    public function updateProgramInformation(UpdateProgramInformationRequest $request)
    {

        $slug = $request['slug'];

        $program = Program::where('slug', $slug)->first();
        if(isset($program)){
            $program->update([
                'title' => $request['title'],
                'cost'   => $request['cost'],
                'duration' => $request['duration'],
                'eligibility' => $request['eligibility'],
                'objective' => $request['objective'],
                'training_resources' => $request['training_resources'],
                'available_seats' => $request['available_seats'],
                'trainer_name' => $request['trainer_name']
            ]);
        }else{
            Program::create([
                'title' => $request['title'],
                'cost'   => $request['cost'],
                'duration' => $request['duration'],
                'eligibility' => $request['eligibility'],
                'objective' => $request['objective'],
                'training_resources' => $request['training_resources'],
                'available_seats' => $request['available_seats'],
                'trainer_name' => $request['trainer_name']
            ]);
        }

        return Redirect::route('show.program', ['slug' => $slug])->with('status', 'program information updated successfully');

    }


    public function updateOutline(Request $request)
    {

        $request->validate([
            'period' => ['required', 'string', Rule::in(self::PERIODS)],
            'topic' => ['required', 'string', 'max:255']
        ]);

        $slug = $request['slug'];
        $outlineSlug = $request['outlineSlug'];
        $program = Program::where('slug', $slug)->first();
        $outline = ProgramOutline::where('slug',$outlineSlug)->where('program_id', $program->id)->first();

        $outline->update([
            'period' => $request['period'],
            'topic' => $request['topic']
        ]);

        return Redirect::route('show.program', ['slug' => $slug])->with('status', 'Program outline save successfully');
    }

    public function createOutline(Request $request)
    {

        $request->validate([
            'period' => ['required', 'string', Rule::in(self::PERIODS)],
            'topic' => ['required', 'string', 'max:255']
        ]);
        $slug = $request['slug'];
        $program = Program::where('slug', $slug)->first();

        ProgramOutline::create([
            'period' => $request['period'],
            'topic' => $request['topic'],
            'program_id' => $program->id
        ]);

        return Redirect::route('show.program', ['slug' => $slug])->with('status', 'Program outline save successfully');
    }



    public function deleteOutline(Request $request)
    {
        $slug = $request['slug'];
        $outlineSlug = $request['outlineSlug'];
        $outline = ProgramOutline::where('slug', $outlineSlug)->first();

        $outline->delete();
        return Redirect::back()->with('status', 'Program outline deleted successfully');
    }

    public function deleteProgram(Request $request)
    {
        $slug = $request['slug'];
        $program = Program::where('slug', $slug)->first();
        $program->delete();

        return Redirect::back()->with('status', 'Program deleted successfully');
    }

    private function getQuarters($outlines)
    {
        return collect(self::PERIODS)->filter(function ($quarter) use ($outlines){
            return !in_array($quarter, $outlines->toArray());
        })->toArray();
    }

    private function getProgramOutlines($program)
    {
        return $program->programOutlines->map(function ($outline){
            return $outline->period;
        });
    }
}
