<?php

namespace App\Http\Controllers;

use App\Constant\ProgramEnrollmentStatus;
use App\Http\Requests\CreateTrainingSlotRequest;
use App\Models\Program;
use App\Models\TrainingSlot;
use Illuminate\Http\Request;

class TrainingSlotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        dd($request->all());
        $filter = $request['filter'];
        $slug = $request['slug'];
        $trainingSlots = TrainingSlot::where('slug', $slug);
        if(isset($filter)){
            $trainingSlots = $trainingSlots->where('status', $filter);
        }
        $trainingSlots = $trainingSlots->orderByDesc('created_at')->paginate(10);
        $data = [
            'training_slots' => $trainingSlots
        ];
        dd($data);
        return view('pages.management.program.training_slot.index')->with($data);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTrainingSlotRequest $request)
    {
        $programSlug = $request['slug'];
        $program = Program::where('slug', $programSlug)->first();
        if(isset($request['slug'])){
            $existSlug = TrainingSlot::where('slug', $request['slug'])->first();
            $existSlug?->update([
                'name'          => $request['name'],
                'start_time'    => $request['start_time'],
                'end_time'      => $request['end_time'],
                'available_seat' => $request['available_seats'],
            ]);
        }else {
            TrainingSlot::create([
                'name'          => $request['name'],
                'start_time'    => $request['start_time'],
                'end_time'      => $request['end_time'],
                'available_seat' => $request['available_seats'],
                'status'         => ProgramEnrollmentStatus::AVAILABLE,
                'program_id'     => $program->id
            ]);
        }

        return redirect()->back()->with(['status' => 'Training Slot created successfully']);
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
    public function destroy(TrainingSlot $trainingSlot)
    {
        $trainingSlot->delete();

        return redirect()->back()->with(['status' => "Training Slot deleted successfully"]);
    }
}
