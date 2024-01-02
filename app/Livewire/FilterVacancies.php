<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Salary;
use Livewire\Component;

class FilterVacancies extends Component
{

    public $term, $category, $salary;

    public function readFormData()
    {
        // Nos comunicamos con el componente padre (HomeVacancies) mandándole este evento
        $this->dispatch('searchTerms', $this->term, $this->salary, $this->category);
    }

    public function render()
    {
        return view('livewire.filter-vacancies', [
            'salaries' => Salary::all(),
            'categories' => Category::all()
        ]);
    }
}
