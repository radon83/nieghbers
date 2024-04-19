<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HeaderSettings extends Component
{
    public $selectedLang;

    public function render()
    {
        return view('livewire.header-settings');
    }

    public function resetLanguage($lang = 'en')
    {
        $userSettings = getUserSettings();

        $userSettings->lang = $lang;
        $isUpdated = $userSettings->save();

        session()->flash('message', $isUpdated ? __('Settings update successfully') : __('Failed to update settings, please try again!'));
        session()->flash('status', $isUpdated);

        return redirect()->route('control.panel');
    }

    public function resetTheme($theme = 'normal')
    {
        $userSettings = getUserSettings();

        $userSettings->theme = $theme;
        $isUpdated = $userSettings->save();

        session()->flash('message', $isUpdated ? __('Settings update successfully') : __('Failed to update settings, please try again!'));
        session()->flash('status', $isUpdated);

        return redirect()->back();
    }
}
