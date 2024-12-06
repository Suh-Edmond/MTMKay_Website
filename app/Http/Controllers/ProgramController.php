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
    const PERIODS = array('Quarter1', 'Quarter2', 'Quarter3', 'Quarter4', 'Quarter5', 'Quarter5', 'Quarter6', 'Quarter7', 'Quarter8', 'Quarter9', 'Quarter10', 'Quarter11', 'Quarter12');
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

        $data = [
            'program' => $program,
            'quarters' => $quarters
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

        Program::where('slug', $slug)->first()->update([
            'title' => $request['title'],
            'cost'   => $request['cost'],
            'duration' => $request['duration'],
            'eligibility' => $request['eligibility'],
            'objective' => $request['objective'],
            'training_resources' => $request['training_resources'],
            'available_seats' => $request['available_seats'],
            'trainer_name' => $request['trainer_name']
        ]);

        return Redirect::route('show.program', ['slug' => $slug])->with('status', 'program information updated successfully');

    }


    public function updateOutline(Request $request)
    {

        $request->validate([
            'period' => ['required', 'string', Rule::in(self::PERIODS)],
            'topic' => ['required', 'string', 'max:255', 'unique:program_outlines,topic']
        ]);

        $slug = $request['slug'];
        $outlineSlug = $request['outlineSlug'];
        $program = Program::where('slug', $slug)->first();
        $outline = ProgramOutline::where('slug',$outlineSlug)->where('program_id', $program->id)->first();

        if (!isset($outline)){
            ProgramOutline::create([
                'period' => $request['period'],
                'topic' => $request['topic'],
                'program_id' => $program->id
            ]);
        }else {
            $outline->update([
                'period' => $request['period'],
                'topic' => $request['topic']
            ]);
        }

        return Redirect::route('show.program', ['slug' => $slug])->with('status', 'Program outline updated successfully');
    }

    public function deleteOutline(Request $request)
    {
        $slug = $request['slug'];
        $outlineSlug = $request['outlineSlug'];
         ProgramOutline::where('slug', $outlineSlug)->first()->delete();

        return Redirect::route('show.program', ['slug' => $slug])->with('status', 'program outline deleted successfully');
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
