<?php

namespace App\Livewire\Setting;

use App\Models\AppSetting;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Pengaturan')]
class Edit extends Component
{
    public $settings = [];
    public $groups = [];

    public function mount()
    {
        $all = AppSetting::all();
        $this->groups = $all->groupBy('group');

        foreach ($all as $setting) {
            $this->settings[$setting->key] = $setting->value;
        }
    }

    public function save()
    {
        foreach ($this->settings as $key => $value) {
            AppSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        session()->flash('message', 'Pengaturan berhasil disimpan.');
    }

    public function render()
    {
        return view('livewire.setting.edit');
    }
}
