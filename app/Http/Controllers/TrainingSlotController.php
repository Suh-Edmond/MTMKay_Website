<?php

namespace App\Http\Controllers;

use App\Constant\ProgramEnrollmentStatus;
use App\Http\Requests\CreateTrainingSlotRequest;
use App\Models\Program;
use App\Models\TrainingSlot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function Symfony\Component\String\b;
use function Symfony\Component\Translation\t;

class TrainingSlotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = $request['filter'];
        $sort = $request['sort'];
        $slug = $request['slug'];
        $program = Program::where('slug', $slug)->first();
        $trainingSlots = TrainingSlot::where('program_id', $program->id);
        if(isset($filter)){
            $trainingSlots = $trainingSlots->where('status', $filter);
        }
        if(isset($sort)){
            switch ($sort) {
                case 'DATE_ASC':
                    $trainingSlots->orderBy('created_at');
                    break;
                default:
                    $trainingSlots->orderByDesc('created_at');
                    break;
            }
        }
        $trainingSlots = $trainingSlots->orderByDesc('created_at')->paginate(10);
        $data = [
            'training_slots' => $trainingSlots,
            'program'        => $program
        ];

        return view('pages.management.program.training_slot.index')->with($data);
    }


    private function validationRequest(Request $request)
    {

        $request->validateWithBag('slotCreation', [
            'name'              =>  'required|string|max:255|min:5',
            'start_time'        =>  'required',
            'end_time'          =>  'required|after:start_time',
            'available_seats'    =>  'required|numeric|min:1',
        ]);

    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validationRequest($request);

        $programSlug = $request['programSlug'];
        $program = Program::where('slug', $programSlug)->first();
        if (isset($program)){
            TrainingSlot::create([
                'name'           => $request['name'],
                'start_time'     => $request['start_time'],
                'end_time'       => $request['end_time'],
                'available_seats' => $request['available_seats'],
                'status'         => ProgramEnrollmentStatus::AVAILABLE,
                'program_id'     => $program->id
            ]);
        }else {
            return  redirect()->back()->with(['status' => 'Program not found']);
        }

        return redirect()->back()->with(['status' => 'Training Slot created successfully']);
    }

    public function update(Request $request)
    {
        //TODO: Add validation for update request
//        $this->validationRequest($request);

        $slug = $request['slug'];
        $existSlug = TrainingSlot::where('slug', $slug)->first();
        $existSlug?->update([
            'name'          => $request['name'],
            'start_time'    => $request['start_time'],
            'end_time'      => $request['end_time'],
            'available_seats' => $request['available_seats'],
        ]);

        return redirect()->back()->with(['status' => 'Training Slot updated successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(TrainingSlot $trainingSlot)
    {
        return view('pages.management.programs.training_slot.show')->with($trainingSlot);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $trainingSlot = TrainingSlot::where('slug', $request['slug'])->first();
        $trainingSlot?->delete();

        return redirect()->back()->with(['status' => "Training Slot deleted successfully"]);
    }
}
