<?php

namespace App\Livewire;

use Livewire\Component;

class LanguageSwitcher extends Component
{
    public string $locale = 'es';

    public function mount(): void
    {
        $this->locale = session('locale', auth()->user()?->locale ?? app()->getLocale());
    }

    public function updatedLocale(string $locale): void
    {
        if (! in_array($locale, ['en', 'es'], true)) {
            return;
        }

        session(['locale' => $locale]);
        app()->setLocale($locale);
    }

    public function render()
    {
        return view('livewire.language-switcher');
    }
}
