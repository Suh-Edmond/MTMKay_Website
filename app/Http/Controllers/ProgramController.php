<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUpdateProgramOutline;
use App\Http\Requests\UpdateProgramInformationRequest;
use App\Models\Program;
use App\Models\ProgramOutline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProgramController extends Controller
{
    const IMAGE_DIR ='/uploads/images/';
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
        $data = [
            'program' => $program
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

        $slug = $request['slug'];
        $outlineSlug = $request['outlineSlug'];
        $program = Program::where('slug', $slug)->first();
        $outline = ProgramOutline::where('slug',$outlineSlug)->where('program_id', $program->id)->first();

        $outline->update([
            'period' => $request['period'],
            'topic' => $request['topic']
        ]);

        return Redirect::route('show.program', ['slug' => $slug])->with('status', 'program outline updated successfully');
    }

    public function deleteOutline(Request $request)
    {
        $slug = $request['slug'];
        $outlineSlug = $request['outlineSlug'];
         ProgramOutline::where('slug', $outlineSlug)->first()->delete();

        return Redirect::route('show.program', ['slug' => $slug])->with('status', 'program outline deleted successfully');
    }
}
