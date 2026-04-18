<div x-data="sliderList()" x-init="() => { window.addEventListener('open-slider-modal', () => modalOpen = true); window.addEventListener('close-slider-modal', () => modalOpen = false); }" class="space-y-4">

    <div class="flex items-center justify-between">
        <h2 class="text-xl font-semibold">Sliders</h2>
        <div class="flex items-center gap-2">
            <button @click="openCreate()" class="inline-flex items-center gap-2 rounded-full bg-indigo-600 text-white px-4 py-2 text-sm shadow">
                <i class="ri-add-line"></i>
                New Slider
            </button>
        </div>
    </div>

    <div class="bg-white border border-slate-200 rounded-lg overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-4 py-3 text-sm font-medium">Badge</th>
                    <th class="px-4 py-3 text-sm font-medium">Title</th>
                    <th class="px-4 py-3 text-sm font-medium">Image</th>
                    <th class="px-4 py-3 text-sm font-medium">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach (\App\Models\Slider::all() as $slider)
                    <tr class="border-t">
                        <td class="px-4 py-3 text-sm">{{ $slider->badge_name }}</td>
                        <td class="px-4 py-3 text-sm">{{ $slider->title }}</td>
                        <td class="px-4 py-3 text-sm">
                            @if($slider->image_path)
                                <img src="{{ asset($slider->image_path) }}" alt="" class="h-12 w-24 object-cover rounded" />
                            @else
                                —
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <div class="flex items-center gap-2">
                                <button @click="openEdit({{ $slider->id }})" class="px-3 py-1 rounded bg-yellow-100 text-yellow-800 text-sm">Edit</button>
                                <button @click="confirmDelete({{ $slider->id }})" class="px-3 py-1 rounded bg-red-100 text-red-700 text-sm">Delete</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div x-show="modalOpen" x-cloak class="fixed inset-0 z-50 flex items-center justify-center">
        <div class="absolute inset-0 bg-black/40" @click="modalOpen = false"></div>
        <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl z-50 p-6">
            <h3 class="text-lg font-semibold mb-4" x-text="editingId ? 'Edit Slider' : 'Create Slider'"></h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <div>
                    <label class="block text-sm text-slate-600">Badge</label>
                    <input wire:model.defer="badge_name" class="mt-1 w-full rounded border px-3 py-2" />
                </div>
                <div>
                    <label class="block text-sm text-slate-600">Image path</label>
                    <input wire:model.defer="image_path" class="mt-1 w-full rounded border px-3 py-2" placeholder="public/images/hero.jpg" />
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-sm text-slate-600">Title</label>
                    <input wire:model.defer="title" class="mt-1 w-full rounded border px-3 py-2" />
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-sm text-slate-600">Description</label>
                    <textarea wire:model.defer="description" rows="3" class="mt-1 w-full rounded border px-3 py-2"></textarea>
                </div>
                <div>
                    <label class="block text-sm text-slate-600">Button 1 text</label>
                    <input wire:model.defer="button1_text" class="mt-1 w-full rounded border px-3 py-2" />
                </div>
                <div>
                    <label class="block text-sm text-slate-600">Button 1 link</label>
                    <input wire:model.defer="button1_link" class="mt-1 w-full rounded border px-3 py-2" />
                </div>
                <div>
                    <label class="block text-sm text-slate-600">Button 2 text</label>
                    <input wire:model.defer="button2_text" class="mt-1 w-full rounded border px-3 py-2" />
                </div>
                <div>
                    <label class="block text-sm text-slate-600">Button 2 link</label>
                    <input wire:model.defer="button2_link" class="mt-1 w-full rounded border px-3 py-2" />
                </div>
            </div>

            <div class="mt-4 flex items-center justify-end gap-2">
                <button @click="modalOpen = false" class="px-4 py-2 rounded border">Cancel</button>
                <button @click="save()" class="px-4 py-2 rounded bg-indigo-600 text-white">Save</button>
            </div>
        </div>
    </div>

    <!-- Delete confirmation -->
    <div x-show="deleteConfirm" x-cloak class="fixed inset-0 z-50 flex items-center justify-center">
        <div class="absolute inset-0 bg-black/40" @click="deleteConfirm = false"></div>
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md z-50 p-6">
            <h3 class="text-lg font-semibold">Delete slider?</h3>
            <p class="mt-2 text-sm text-slate-600">This action cannot be undone. Are you sure you want to delete this slider?</p>
            <div class="mt-4 flex justify-end gap-2">
                <button @click="deleteConfirm = false" class="px-4 py-2 rounded border">Cancel</button>
                <button @click="confirmDeleteNow()" class="px-4 py-2 rounded bg-red-600 text-white">Delete</button>
            </div>
        </div>
    </div>

</div>

<script>
function sliderList(){
    return {
        modalOpen: false,
        deleteConfirm: false,
        editingId: null,
        badge_name: '',
        image_path: '',
        title: '',
        description: '',
        button1_text: '',
        button1_link: '',
        button2_text: '',
        button2_link: '',
        openCreate(){
            this.getLivewire().call('create');
        },
        getLivewire(){
            let root = document.currentScript ? document.currentScript.closest('[wire\:id]') : document.querySelector('[wire\:id]');
            if(!root) root = document.querySelector('[wire\:id]');
            return window.livewire.find(root.getAttribute('wire:id'));
        },
        openEdit(id){
            this.editingId = id;
            // ask Livewire to load the model into properties and open modal
            this.getLivewire().call('edit', id);
        },
        save(){
            this.getLivewire().call('save');
        },
        confirmDelete(id){
            this.editingId = id;
            this.deleteConfirm = true;
        },
        confirmDeleteNow(){
            this.getLivewire().call('delete', this.editingId);
            this.deleteConfirm = false;
        }
    }
}
</script>