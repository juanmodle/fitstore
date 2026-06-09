<?php

namespace App\Livewire;

use App\Models\Giveaway;
use Livewire\Component;

class AdminGiveawayManager extends Component
{
    public ?int $giveawayId = null;
    public string $title = '';
    public string $description = '';
    public string $prize = '';
    public string $startDate = '';
    public string $endDate = '';
    public string $status = 'active';

    public function save(): void
    {
        $data = $this->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'prize' => ['required', 'string', 'max:255'],
            'startDate' => ['required', 'date'],
            'endDate' => ['required', 'date', 'after_or_equal:startDate'],
            'status' => ['required', 'in:active,finished,draft'],
        ]);

        Giveaway::updateOrCreate(['id' => $this->giveawayId], [
            'title' => $data['title'],
            'description' => $data['description'],
            'prize' => $data['prize'],
            'start_date' => $data['startDate'],
            'end_date' => $data['endDate'],
            'status' => $data['status'],
        ]);

        $this->reset(['giveawayId', 'title', 'description', 'prize', 'startDate', 'endDate']);
        $this->status = 'active';
    }

    public function edit(int $id): void
    {
        $giveaway = Giveaway::findOrFail($id);
        $this->giveawayId = $giveaway->id;
        $this->title = $giveaway->title;
        $this->description = $giveaway->description;
        $this->prize = $giveaway->prize;
        $this->startDate = $giveaway->start_date->toDateString();
        $this->endDate = $giveaway->end_date->toDateString();
        $this->status = $giveaway->status;
    }

    public function delete(int $id): void
    {
        Giveaway::findOrFail($id)->delete();
    }

    public function render()
    {
        return view('livewire.admin-giveaway-manager', ['giveaways' => Giveaway::latest()->get()]);
    }
}
