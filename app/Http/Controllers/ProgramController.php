<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProgramInformationRequest;
use App\Models\Program;
use App\Models\StudentSuccess;
use App\Traits\ProgramOutlineTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Intervention\Image\Laravel\Facades\Image;

class ProgramController extends Controller
{
    const IMAGE_DIR ='/uploads/images/programs/';
    const PERIODS = array('Quarter1', 'Quarter2', 'Quarter3', 'Quarter4', 'Quarter5', 'Quarter6', 'Quarter7', 'Quarter8', 'Quarter9', 'Quarter10', 'Quarter11', 'Quarter12');

    use ProgramOutlineTrait;

    public function index(Request $request)
    {
        $successes = StudentSuccess::orderby('created_at', 'desc')->take(5)->get();
        $programs = Program::all();
        $data = [
            'programs' => $programs,
            'successes' => $successes
        ];

        return view('pages.management.program.index')->with($data);
    }

    public function show(Request $request)
    {
        $slug = $request['slug'];
        $program = Program::where('slug', $slug)->firstOrFail();
        $topics = $this->getProgramOutlinesTopics($program);
        $quarters = $this->getQuarters($topics);
        $allQuarters = self::PERIODS;
        $firstThreeOutlines = $program->programOutlines()->take(3)->orderBy('created_at', 'DESC')->get();

        $data = [
            'program' => $program,
            'quarters' => $quarters,
            'allQuarters' => $allQuarters,
            'is_first_time' => false,
            'programOutlines' => $program->programOutlines,
            'firstThreeOutlines' => $firstThreeOutlines
        ];


        return view('pages.management.program.program-detail')->with($data);
    }

    public function createProgram(Request $request)
    {

        $allQuarters = self::PERIODS;
        $data = [
            'allQuarter' => $allQuarters
        ];

        return view('pages.management.program.create-program')->with($data);

    }

    public function addProgramImage(Request $request)
    {
        $slug = $request['slug'];
        $program = Program::where('slug', $slug)->first();
        $data = [
            'program' => $program,
            'is_first_time' => true
        ];
        return view('pages.management.program.create-program-add-image')->with($data);
    }

    public function updateProgramImage(Request $request)
    {
        $slug = $request['slug'];
        $this->saveProgramImage($request);
        return Redirect::route('show.program', ['slug' => $slug])->with('status', 'program image updated successfully');
    }

    public function storeProgramImage(Request $request)
    {

        $slug = $request['slug'];
        $this->saveProgramImage($request);

        return Redirect::route('program.create.outline.view', ['slug' => $slug])->with('status', 'program image updated successfully');
    }

    public function storeProgramInformation(UpdateProgramInformationRequest $request)
    {
        $program = Program::create([
            'title' => $request['title'],
            'cost'   => $request['cost'],
            'duration' => $request['duration'],
            'eligibility' => $request['eligibility'],
            'objective' => $request['objective'],
            'training_resources' => $request['training_resources'],
            'available_seats' => $request['available_seats'],
            'trainer_name' => $request['trainer_name'],
            'job_opportunities' => $request['job_opportunities'],
            'image_path' => ''
        ]);

        return Redirect::route('manage-programs.create.add-image', ['slug' => $program->slug])->with('status', 'program information updated successfully');

    }
    public function updateProgramInformation(UpdateProgramInformationRequest $request)
    {

        $slug = $request['slug'];

        $program = Program::where('slug', $slug)->first();
        $program->update([
            'title' => $request['title'],
            'cost'   => $request['cost'],
            'duration' => $request['duration'],
            'eligibility' => $request['eligibility'],
            'objective' => $request['objective'],
            'training_resources' => $request['training_resources'],
            'available_seats' => $request['available_seats'],
            'job_opportunities' => $request['job_opportunities'],
            'trainer_name' => $request['trainer_name']
        ]);

        return Redirect::route('show.program', ['slug' => $slug])->with('status', 'program information updated successfully');

    }

    public function deleteProgram(Request $request)
    {
        $slug = $request['slug'];
        $program = Program::where('slug', $slug)->first();
        $program->delete();
        $this->deleteProgramFile($program);

        return Redirect::route('manage-programs')->with('status', 'Program deleted successfully');
    }

    private function saveProgramImage(Request $request)
    {
        $slug = $request['slug'];
        $program = Program::where('slug', $slug)->first();

        try {
            $request->validate([
                'image_path' => 'required|image|mimes:jpg,jpeg,png'
            ]);
            $file     = $request->file('image_path');

            $extension = $file->getClientOriginalExtension();
            $fileName  =   time() . '_' . uniqid() . '.' . $extension;
            $thumbnailpic = 'thumb'.'-'.$fileName;
            $path = $request->file('image_path')->storeAs(self::IMAGE_DIR.$slug, $fileName, 'public');

            $program->update([
                'image_path' => $fileName
            ]);
            $savePath = public_path(self::IMAGE_DIR.$slug."/".$fileName);
            $manager  = new ImageManager(new Driver());
            $image    = $manager->read($savePath);
            $image    = $image->resize(250, 250);
            $image->save(public_path().self::IMAGE_DIR.$slug."/".$thumbnailpic);


        }catch (\Exception $exception){

        }
    }

    private function deleteProgramFile($program)
    {
        $path     =  public_path(self::IMAGE_DIR.$program->slug."/".$program->image_path);
        Storage::disk('public')->delete($path);
    }
}
