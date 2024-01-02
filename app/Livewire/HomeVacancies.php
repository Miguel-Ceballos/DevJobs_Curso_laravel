<?php

namespace App\Livewire;

use App\Models\Vacancy;
use Livewire\Component;

class HomeVacancies extends Component
{

    // Declaramos las propiedades que se pasan a través del evento para evitar errores de propiedades no definidas
    public $term, $salary, $category;

    // Para escuchar eventos tenemos que agregarlos al listeners
    protected $listeners = [ 'searchTerms' => 'search' ];

    public function search($term, $salary, $category) : void
    {
        $this->term = $term;
        $this->salary = $salary;
        $this->category = $category;
    }

    public function render()
    {
        // La diferencia entre where y when es que com when si las propiedades (term, category, salary)
        // tienen algún valor, de lo contrario no se ejecuta.
        $vacancies = Vacancy::when($this->term, function($query) {
            $query->where('title', 'LIKE', "%" . $this->term . "%");
        })->when($this->category, function($query) {
            $query->where('category_id', $this->category);
        })->when($this->salary, function($query) {
            $query->where('salary_id', $this->salary);
        })->paginate(20);

        return view('livewire.home-vacancies', [
            'vacancies' => $vacancies
        ]);
    }
}
