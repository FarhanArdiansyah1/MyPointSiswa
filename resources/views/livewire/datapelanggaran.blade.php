<div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Buat Record Pelanggaran</h5>
                    <button type="button" class="close" wire:click.prevent='closeCreate'>
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Masukan Nama Pelanggaran</label>
                            <input type="text" wire:model.defer="namapel" class="form-control" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Masukan Poin</label>
                            <input type="text" wire:model.defer="poin" class="form-control" placeholder="Nama">
                        </div>
                        <br>
                        <button type="button" class="btn btn-secondary" wire:click.prevent='closeCreate'>Close</button>
                        <button wire:click.prevent="stores()" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" wire:ignore>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Record Pelanggaran</h5>
                    <button type="button" class="close" wire:ignore wire:click.prevent='closeUpdate'>
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <input type="hidden" wire:model.defer="selected_id">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Masukan Nama Pelanggaran</label>
                            <input type="text" wire:model.defer="namapel" class="form-control" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Masukan Poin</label>
                            <input type="text" wire:model.defer="poin" class="form-control" placeholder="Nama">
                        </div>
                        <br>
                        <button type="button" class="btn btn-secondary" wire:click.prevent='closeUpdate'>Close</button>
                        <button wire:click.prevent="update()" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-between align-content-center mb-2">
        <div class="d-flex">
            <div>
                <div class="d-flex align-items-center ml-4">
                    <label for="paginate" class="text-nowrap mr-2 mb-0">Per Page</label>
                    <select wire:model="paginate" name="paginate" id="paginate" class="form-control form-control-sm">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                    </select>
                </div>
            </div>

            <div>
                @if ($checked)
                    <div class="dropdown ml-4">
                        <button class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">With Checked
                            ({{ count($checked) }})</button>
                        <div class="dropdown-menu">
                            @role('admin')
                            <a href="#" class="dropdown-item" type="button"
                                onclick="confirm('Are you sure you want to delete these Records?') || event.stopImmediatePropagation()"
                                wire:click="deleteRecords()">
                                Delete
                            </a>
                            @endrole
                            <a href="#" class="dropdown-item" type="button"
                                onclick="confirm('Are you sure you want to export these Records?') || event.stopImmediatePropagation()"
                                wire:click="exportSelected()">
                                Export
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div align="center">
            @include('backend.includes.livewire_flash_messages')
        </div>
        @role('admin')
        <div class=" col-md-1,2">
            <button type="button" class="btn btn-primary" wire:click.prevent='showCreate'>Buat Pelanggaran</button>
        </div>
        @endrole
    </div>

    <div class="d-flex justify-content-center">
        <div class="col-md-3">
            <input type="search" wire:model.debounce.500ms="search" class="form-control" placeholder="Search">
        </div>
    </div>

    <div class="col-md-10 mt-3">
        @include('backend.includes.livewire_flash_messages')
    </div>

    @if ($selectPage)
        <div class="col-md-10 mb-2">
            @if ($selectAll)
                <div>
                    You have selected all <strong>{{ $students->total() }}</strong> items.
                </div>
            @else
                <div>
                    You have selected <strong>{{ count($checked) }}</strong> items, Do you want to Select All
                    <strong>{{ $students->total() }}</strong>?
                    <a href="#" class="ml-2" wire:click="selectAll">Select All</a>
                </div>
            @endif

        </div>
    @endif


    <div class="card-body table-responsive p-0">
        <table class="table table-hover">
            <tbody>
                <tr>
                    <th><input type="checkbox" wire:model="selectPage"></th>
                    <th>Nama Pelanggaran</th>
                    <th>Poin</th>
                    @role('admin')
                    <th>Aksi</th>
                    @endrole
                </tr>
                @foreach ($students as $student)
                    <tr class="@if ($this->isChecked($student->id)) table-primary @endif">
                        <td><input type="checkbox" value="{{ $student->id }}" wire:model="checked"></td>
                        <td>{{ $student->nama_pelanggaran }}</td>
                        <td>{{ $student->poin }}</td>
                        @role('admin')
                        <td>
                            <button wire:click.prevent="edit({{ $student->id }})" class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></button>
                            <button class="btn btn-danger btn-sm"
                                onclick="confirm('Are you sure you want to delete this record?') || event.stopImmediatePropagation()"
                                wire:click="deleteSingleRecord({{ $student->id }})"><i class="fa fa-trash"
                                    aria-hidden="true"></i></button>
                        </td>
                        @endrole
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <div class="row mt-4">
        <div class="col-sm-6 offset-5">
            {{ $students->links() }}
        </div>
    </div>
</div>
