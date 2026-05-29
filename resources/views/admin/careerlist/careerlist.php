<?php

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use App\Models\Career;

new #[Layout('layouts::admin')] class extends Component
{
    use WithPagination;

    public $search = '';
    public $deleteId = null;

    protected $paginationTheme = 'tailwind';

    public function getCareersProperty()
    {
        $query = Career::query();

        if ($this->search) {
            $query->where('title', 'like', "%{$this->search}%")
                ->orWhere('location', 'like', "%{$this->search}%")
                ->orWhere('experience', 'like', "%{$this->search}%")
                ->orWhere('type', 'like', "%{$this->search}%");
        }

        return $query->orderBy('id', 'desc')->paginate(10);
    }

    public function confirmDelete(int $id): void
    {
        $this->deleteId = $id;
    }

    public function deleteConfirmed(): void
    {
        if ($this->deleteId) {
            $career = Career::find($this->deleteId);

            if ($career) {
                $career->delete();
            }

            $this->dispatch('close-delete-modal');
            $this->deleteId = null;
            
            $this->dispatch('toast-show', [
                'message' => 'Job description deleted successfully!',
                'type' => 'success',
                'position' => 'top-right',
            ]);
        }
    }
};