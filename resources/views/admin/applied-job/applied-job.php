<?php

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use App\Models\AppliedJobs;
use App\Models\Career;
use Illuminate\Support\Facades\Storage;

new #[Layout('layouts::admin')] class extends Component
{
    use WithPagination;

    public $search = '';
    public $statusFilter = '';
    public $careerFilter = '';
    public $deleteId = null;
    
    // Details modal state
    public $selectedApplicationId = null;
    public $selectedApplication = null;

    protected $paginationTheme = 'tailwind';

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function updatedStatusFilter(): void
    {
        $this->resetPage();
    }

    public function updatedCareerFilter(): void
    {
        $this->resetPage();
    }

    public function getAppliedJobsProperty()
    {
        $query = AppliedJobs::query()->with('career');

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('full_name', 'like', "%{$this->search}%")
                  ->orWhere('email', 'like', "%{$this->search}%")
                  ->orWhere('phone', 'like', "%{$this->search}%")
                  ->orWhere('address', 'like', "%{$this->search}%");
            });
        }

        if ($this->statusFilter) {
            $query->where('status', $this->statusFilter);
        }

        if ($this->careerFilter) {
            $query->where('career_id', $this->careerFilter);
        }

        return $query->orderBy('id', 'desc')->paginate(10);
    }

    public function getCareersProperty()
    {
        return Career::orderBy('title')->get();
    }

    public function confirmDelete(int $id): void
    {
        $this->deleteId = $id;
    }

    public function deleteConfirmed(): void
    {
        if ($this->deleteId) {
            $application = AppliedJobs::find($this->deleteId);

            if ($application) {
                // Delete resume file if exists
                if ($application->resume_doc) {
                    Storage::disk('public')->delete($application->resume_doc);
                }
                
                $application->delete();
            }

            if ($this->selectedApplicationId === $this->deleteId) {
                $this->resetDetails();
            }

            $this->dispatch('close-delete-modal');
            $this->deleteId = null;
            
            $this->dispatch('toast-show', [
                'message' => 'Job application deleted successfully!',
                'type' => 'success',
                'position' => 'top-right',
            ]);
        }
    }

    public function viewDetails(int $id): void
    {
        $this->selectedApplicationId = $id;
        $this->selectedApplication = AppliedJobs::with('career')->find($id);
        
        if ($this->selectedApplication) {
            $this->dispatch('open-details-modal');
        }
    }

    public function resetDetails(): void
    {
        $this->selectedApplicationId = null;
        $this->selectedApplication = null;
        $this->dispatch('close-details-modal');
    }

    public function updateStatus(int $id, string $status): void
    {
        if (!in_array($status, ['pending', 'reviewed', 'accepted', 'rejected'])) {
            return;
        }

        $application = AppliedJobs::find($id);
        if ($application) {
            $application->update(['status' => $status]);
            
            if ($this->selectedApplicationId === $id) {
                $this->selectedApplication = $application->fresh('career');
            }

            $this->dispatch('toast-show', [
                'message' => 'Application status updated to ' . ucfirst($status) . '!',
                'type' => 'success',
                'position' => 'top-right',
            ]);
        }
    }

    public function downloadResume(int $id)
    {
        $application = AppliedJobs::find($id);

        if ($application && $application->resume_doc && Storage::disk('public')->exists($application->resume_doc)) {
            return Storage::disk('public')->download($application->resume_doc);
        }

        $this->dispatch('toast-show', [
            'message' => 'Resume document file not found!',
            'type' => 'error',
            'position' => 'top-right',
        ]);
    }
};