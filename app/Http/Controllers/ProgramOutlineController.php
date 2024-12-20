<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\ProgramOutline;
use App\Traits\ProgramOutlineTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class ProgramOutlineController extends Controller
{
    const PERIODS = array('Quarter1', 'Quarter2', 'Quarter3', 'Quarter4', 'Quarter5', 'Quarter6', 'Quarter7', 'Quarter8', 'Quarter9', 'Quarter10', 'Quarter11', 'Quarter12');
    use ProgramOutlineTrait;
    public function updateOutline(Request $request)
    {

        $request->validate([
            'period' => ['required', 'string', Rule::in(self::PERIODS)],
            'topic' => ['required', 'string', 'max:1000']
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

    public function storeOutline(Request $request)
    {

        $request->validate([
            'period' => ['required', 'string', Rule::in(self::PERIODS)],
            'topic' => ['required', 'string', 'max:1000']
        ]);
        $slug = $request['slug'];
        $program = Program::where('slug', $slug)->first();

        ProgramOutline::create([
            'period' => $request['period'],
            'topic' => $request['topic'],
            'program_id' => $program->id,
            'programOutlines' => $program->programOutlines
        ]);

        return Redirect::back()->with('status', 'Program outline save successfully');
    }

    public function createOutline(Request $request)
    {
        $slug = $request['slug'];

        $program = Program::where('slug', $slug)->first();
        $quarters = $this->getQuarters($this->getProgramOutlinesTopics($program));
        $allQuarters = self::PERIODS;
        $outlines = $program->programOutlines;
        $firstThreeOutlines = $program->programOutlines()->take(3)->orderBy('created_at', 'DESC')->get();

        $data = [
            'program' => $program,
            'quarters' => $quarters,
            'allQuarters' => $allQuarters,
            'programOutlines' => $outlines,
            'firstThreeOutlines' => $firstThreeOutlines

        ];

        return view('pages.management.program.create-program-outline')->with($data);
    }

    public function deleteOutline(Request $request)
    {
        $slug = $request['slug'];
        $outlineSlug = $request['outlineSlug'];
        $outline = ProgramOutline::where('slug', $outlineSlug)->first();

        $outline->delete();
        return Redirect::back()->with('status', 'Program outline deleted successfully');
    }



}
