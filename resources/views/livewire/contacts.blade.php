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


        @if ($updateMode)
            @include('livewire.update')
        @else
            @include('livewire.create')
        @endif

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>

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
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Recipient:</label>
                                <input type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Message:</label>
                                <textarea class="form-control" id="message-text"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Send message</button>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-striped" style="margin-top:20px;">
            <tr>
                <td>No.</td>
                <td>Nama Siswa</td>
                <td>Prestasi</td>
                <td>Poin</td>
                <td>Nama Pelapor</td>
                <td>Keterangan</td>
                <td>ACTION</td>
            </tr>

            @foreach ($datas as $row)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $row->getsiswa->name }}</td>
                    <td>{{ $row->prestasi }}</td>
                    <td>{{ $row->poin }}</td>
                    <td>{{ $row->getpelapor->name }}</td>
                    <td>{{ $row->keterangan }}</td>
                    <td>
                        <button wire:click="edit({{ $row->id }})"
                            class="btn btn-sm btn-outline-danger py-0">Edit</button> |
                        <button wire:click="destroy({{ $row->id }})"
                            class="btn btn-sm btn-outline-danger py-0">Delete</button>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

</div>
