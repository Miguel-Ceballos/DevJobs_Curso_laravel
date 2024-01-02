<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Salary;
use App\Models\Vacancy;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateVacancy extends Component
{

    public $title, $salary, $category, $company, $last_day, $description, $image;

    use WithFileUploads;

    protected $rules = [
        'title' => [ 'required' ],
        'salary' => [ 'required' ],
        'category' => [ 'required' ],
        'company' => [ 'required' ],
        'last_day' => [ 'required' ],
        'description' => [ 'required' ],
        'image' => [ 'image', 'max:1024' ]
    ];


    public function render()
    {
        return view('livewire.create-vacancy', [
            'salaries' => Salary::all(),
            'categories' => Category::all()
        ]);
    }

    public function createVacancy()
    {
        $data = $this->validate();

        // Storage image
        $image_path = $this->image->store('public/vacancies');
        $image_name = str_replace('public/vacancies/', '', $image_path);

        // Create vacancy
        Vacancy::create([
            'title' => $data['title'],
            'salary_id' => $data['salary'],
            'category_id' => $data['category'],
            'company' => $data['company'],
            'last_day' => $data['last_day'],
            'description' => $data['description'],
            'image' => $image_name,
            'user_id' => auth()->user()->id
        ]);

        // create a message
        session()->flash('message', 'Vacancy created successfully!');

        return redirect()->route('vacancies.index');
    }

}
