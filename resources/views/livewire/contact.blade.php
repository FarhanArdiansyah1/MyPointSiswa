<div>
    <div class="col-md-6">

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Sorry!</strong> invalid input.<br><br>
                <ul style="list-style-type:none;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Buat Pelanggaran</button>


        @if ($updateMode)
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <input type="hidden" wire:model.defer="selected_id">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Enter Name</label>
                                    <input type="text" wire:model.defer="name" class="form-control"
                                        placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Enter Emails</label>
                                    <input type="text" class="form-control" placeholder="Enter email"
                                        wire:model.defer="email">
                                </div>
                                <div class="form-group">
                                    <select name="form-control" id="" wire:model="keresmianval">
                                        <option value="{{ $keresmiann }}">{{ $keresmiannama }}</option>
                                        @foreach ($keresmian as $item)
                                            <option value="{{ $item->id }}">{{ $item->keresmian }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button wire:click.defer="update()" class="btn btn-primary" data-dismiss="modal">Send
                                    message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @else
            {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Enter Name</label>
                                    <input type="text" wire:model="name" class="form-control"
                                        placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Enter Email</label>
                                    <input type="text" class="form-control" placeholder="Enter email"
                                        wire:model="email">
                                </div>
                                <div class="form-group">
                                    <select name="form-control" id="" wire:model="keresmianval">
                                        <option value="">Select Keresmian</option>
                                        @foreach ($keresmian as $item)
                                            <option value="{{ $item->id }}">{{ $item->keresmian }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Keresmian</label>
                                    <input type="text" class="form-control" placeholder="Enter email"
                                        wire:model="keresmianval">
                                </div>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button wire:click="store()" class="btn btn-primary" data-dismiss="modal">Send
                                    message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Masukan Nama Siswa</label>
                                    <input type="text" wire:model="namasiswa" class="form-control"
                                        placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Masukan Nama prestasi</label>
                                    <input type="text" class="form-control" placeholder="Enter email"
                                        wire:model="prestasi">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Masukan Poin</label>
                                    <input type="text" class="form-control" placeholder="Enter email"
                                        wire:model="poin">
                                </div>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button wire:click="stores()" class="btn btn-primary" data-dismiss="modal">Send
                                    message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="container" style="margin-top:20px;">
            <table class="table table-bordered data-table">
                <tr>
                    <td>NO</td>
                    <td>NAME</td>
                    <td>KERESMIAN</td>
                    <td>EMAIL</td>
                    <td>ACTION</td>
                </tr>

                @foreach ($data as $row)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->keresmian->keresmian }}</td>
                        <td>{{ $row->email }}</td>
                        <td>
                            <button data-toggle="modal" data-target="#exampleModal"
                                wire:click.prevent="edit({{ $row->id }})"
                                class="btn btn-sm btn-outline-danger py-0">Edit</button> |
                            <button wire:click="destroy({{ $row->id }})"
                                class="btn btn-sm btn-outline-danger py-0">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

</div>
