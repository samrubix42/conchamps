<?php

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use App\Models\Contact;

new #[Layout('layouts::admin')] class extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'tailwind';

    public function getContactsProperty()
    {
        $query = Contact::query();

        if ($this->search) {
            $query->where('name', 'like', "%{$this->search}%")
                ->orWhere('email', 'like', "%{$this->search}%")
                ->orWhere('phone', 'like', "%{$this->search}%")
                ->orWhere('project_type', 'like', "%{$this->search}%");
        }

        return $query->orderBy('id', 'desc')->paginate(10);
    }
};