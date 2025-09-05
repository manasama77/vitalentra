<?php

namespace App\Livewire\Components;

use Livewire\Component;

class FlyonuiThemeDemo extends Component
{
    public $activeTab = 'colors';

    public $sampleData = [
        ['name' => 'Primary Feature', 'status' => 'active', 'users' => 1250],
        ['name' => 'Secondary Feature', 'status' => 'pending', 'users' => 847],
        ['name' => 'Accent Feature', 'status' => 'inactive', 'users' => 623],
    ];

    public function render()
    {
        return view('livewire.components.flyonui-theme-demo');
    }
}
