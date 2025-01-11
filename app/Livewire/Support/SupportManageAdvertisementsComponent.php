<?php

namespace App\Livewire\Support;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Advertisement;

class SupportManageAdvertisementsComponent extends Component
{
    use WithPagination;

    public $advertisementId, $title, $description, $image, $isEditMode = false;

    protected $paginationTheme = 'bootstrap';

    public function edit($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        $this->advertisementId = $advertisement->id;
        $this->title = $advertisement->title;
        $this->description = $advertisement->description;
        $this->isEditMode = true;
    }

    public function updateAdvertisement()
    {
        $this->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|string',
        ]);

        $advertisement = Advertisement::findOrFail($this->advertisementId);
        $advertisement->update([
            'title' => $this->title,
            'description' => $this->description,
        ]);

        session()->flash('message', 'Advertisement updated successfully!');
        $this->reset();
        $this->isEditMode = false;
    }

    public function deleteConfirmation($id)
    {
        Advertisement::findOrFail($id)->delete();
        session()->flash('message', 'Advertisement deleted successfully!');
    }

    public function render()
    {
        return view('livewire.support.support-manage-advertisements-component', [
            'advertisements' => Advertisement::paginate(10),
        ])->layout('layouts.support');
    }
}
