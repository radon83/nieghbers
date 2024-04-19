<?php

namespace App\Http\Livewire;

use App\Models\Settings as ModelsSettings;
use Livewire\Component;

class Settings extends Component
{
    public $language;
    public $theme;
    //
    protected $userSettings;
    protected $guard;

    public function mount()
    {
        $this->guard = 'user';

        if (auth('admin')->check())
            $this->guard = 'admin';

        $this->userSettings = ModelsSettings::where([
            ['position', '=', $this->guard],
            ['object_id', '=', auth()->user()->id]
        ])->first();

        $this->language = $this->userSettings?->lang;
        $this->theme = $this->userSettings?->theme;
    }

    protected function getGuard()
    {
        $this->guard = 'user';

        if (auth('admin')->check())
            $this->guard = 'admin';

        return $this->guard;
    }

    protected function getUserSettings () {
        return ModelsSettings::where([
            ['position', '=', $this->getGuard()],
            ['object_id', '=', auth()->user()->id]
        ])->first();
    }

    public function render()
    {
        return view('livewire.settings');
    }

    protected function generateWholeSettings()
    {
        $isSaved = false;
        if (is_null($this->getUserSettings())) {
            $isSaved = ModelsSettings::create([
                'lang' => $this->language ?? 'en',
                'theme' => $this->theme ?? 'normal',
                'position' => $this->getGuard(),
                'object_id' => auth()->user()->id,
            ]);
        } else {
            $isSaved = ModelsSettings::where([
                ['position', '=', $this->guard],
                ['object_id', '=', auth()->user()->id]
            ])->update([
                'lang' => $this->language ?? 'en',
                'theme' => $this->theme ?? 'normal',
            ]);
        }
        session()->flash('message', $isSaved ? __('Settings updated successfully') : __('Failed to update settings, please try again!'));
        session()->flash('status', $isSaved);
    }

    public function updatedLanguage()
    {
        $this->generateWholeSettings();
    }

    public function updatedTheme()
    {
        $this->generateWholeSettings();
    }

    public function rules()
    {
        return [
            'language' => 'required|string|in:' . implode(',', array_keys(ModelsSettings::LANGs)),
            'theme' => 'required|string|in:' . implode(',', array_keys(ModelsSettings::THEMEs)),
        ];
    }
}
