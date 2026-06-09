<?php

namespace App\Livewire;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;

class AdminCategoryManager extends Component
{
    public ?int $categoryId = null;
    public string $name = '';
    public string $slug = '';
    public string $description = '';
    public string $status = 'active';

    public function updatedName(): void
    {
        $this->slug = Str::slug($this->name);
    }

    public function save(): void
    {
        $data = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'status' => ['required', 'in:active,inactive'],
        ]);

        Category::updateOrCreate(['id' => $this->categoryId], $data);
        $this->resetForm();
        session()->flash('success', 'Category saved.');
    }

    public function edit(int $id): void
    {
        $category = Category::findOrFail($id);
        $this->categoryId = $category->id;
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->description = (string) $category->description;
        $this->status = $category->status;
    }

    public function delete(int $id): void
    {
        Category::findOrFail($id)->delete();
    }

    public function resetForm(): void
    {
        $this->reset(['categoryId', 'name', 'slug', 'description']);
        $this->status = 'active';
    }

    public function render()
    {
        return view('livewire.admin-category-manager', ['categories' => Category::latest()->get()]);
    }
}
