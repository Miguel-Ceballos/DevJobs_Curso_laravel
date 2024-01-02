<?php

namespace App\Livewire;

use App\Models\Vacancy;
use Livewire\Component;

class ShowVacancies extends Component
{

    protected $listeners = ['deleteVacancy'];

    public function deleteVacancy(Vacancy $vacancy)
    {
        $vacancy->delete();
    }

    public function render()
    {
        return view('livewire.show-vacancies', [
            'vacancies' => Vacancy::where('user_id', auth()->user()->id)->paginate(10)
        ]);
    }
}
