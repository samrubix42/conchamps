<?php

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use App\Models\Testimonial;

new #[Layout('layouts::admin')] class extends Component
{
    use WithPagination;

    public $search = '';
    public $name = '';
    public $role = '';
    public $company = '';
    public $quote = '';
    public $status = true;
    public $testimonialId = null;
    public $deleteId = null;

    protected $paginationTheme = 'tailwind';

    protected function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'quote' => 'required|string|max:2000',
            'status' => 'boolean',
        ];
    }

    public function getTestimonialsProperty()
    {
        $query = Testimonial::query();

        if ($this->search) {
            $query->where('name', 'like', "%{$this->search}%")
                ->orWhere('role', 'like', "%{$this->search}%")
                ->orWhere('company', 'like', "%{$this->search}%")
                ->orWhere('quote', 'like', "%{$this->search}%");
        }

        return $query->orderBy('id', 'desc')->paginate(10);
    }

    public function resetForm(): void
    {
        $this->reset([
            'name',
            'role',
            'company',
            'quote',
            'status',
            'testimonialId',
        ]);
        $this->status = true;
        $this->resetValidation();
    }

    public function openEditModal(int $id): void
    {
        $row = Testimonial::findOrFail($id);

        $this->testimonialId = $row->id;
        $this->name = $row->name;
        $this->role = $row->role;
        $this->company = $row->company;
        $this->quote = $row->quote;
        $this->status = (bool) $row->status;

        $this->dispatch('open-modal');
    }

    public function save(): void
    {
        $data = $this->validate();

        $data['status'] = $this->status ? 1 : 0;

        if ($this->testimonialId) {
            $row = Testimonial::find($this->testimonialId);

            if ($row) {
                $row->update($data);
            }
        } else {
            Testimonial::create($data);
        }

        $this->dispatch('close-modal');
        $this->resetForm();
        session()->flash('message', 'Testimonial saved.');
        $this->dispatch('toast-show', [
            'message' => 'Testimonial saved successfully!',
            'type' => 'success',
            'position' => 'top-right',
        ]);
    }

    public function confirmDelete(int $id): void
    {
        $this->deleteId = $id;
    }

    public function deleteConfirmed(): void
    {
        if ($this->deleteId) {
            $row = Testimonial::find($this->deleteId);

            if ($row) {
                $row->delete();
            }

            $this->dispatch('close-delete-modal');
            $this->deleteId = null;
            session()->flash('message', 'Testimonial deleted.');
            $this->dispatch('toast-show', [
                'message' => 'Testimonial deleted successfully!',
                'type' => 'success',
                'position' => 'top-right',
            ]);
        }
    }
};