<?php

namespace App\Http\Livewire;
use App\Models\User;
use App\Models\Photo;
use Livewire\Component;
use Livewire\WithPagination;

class PhotosTable extends Component
{
    use WithPagination;
    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;
    public function render()
    {
        return view('livewire.photos-table',[
        'photos' => Photo::search($this->search)
        ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
        ->simplePaginate($this->perPage),
    ]);
    }
}
