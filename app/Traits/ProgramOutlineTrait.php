<?php

namespace App\Traits;

trait ProgramOutlineTrait
{
    public static function getProgramOutlinesTopics($program)
    {
        return $program->programOutlines->map(function ($outline){
            return $outline->period;
        });
    }

    public function getQuarters($outlines)
    {
        return collect(self::PERIODS)->filter(function ($quarter) use ($outlines){
            return !in_array($quarter, $outlines->toArray());
        })->toArray();
    }
}
