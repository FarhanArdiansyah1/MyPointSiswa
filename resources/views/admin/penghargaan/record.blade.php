<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class='card-header'>
        <a class="btn btn-success" data-toggle="modal" data-target="#create"> Create New Book</a>
    </div>

    <div class="card-body">
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Penghargaan</th>
                    <th>Poin</th>
                    <th>Keterangan</th>
                    <th width="300px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dtPenghargaan as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td></td>
                    <td>{{ $item->penghargaan }}</td>
                    <td>{{ $item->poin_penghargaan }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>
                        <a href="{{ route('admin.penghargaan.record.edit', $item->id) }}" data-toggle="modal" data-target="#edit" class="edit btn btn-primary btn-sm editBook">Edit</a>
                        <a href="" data-toggle="tooltip" class="btn btn-danger btn-sm deleteBook">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Create</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.penghargaan.record.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" placeholder="Nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Penghargaan" class="form-control" id="penghargaan" name="penghargaan">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Poin" class="form-control" id="poin" name="poin">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Keterangan" class="form-control" id="keterangan" name="keterangan">
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
          </div>
        </div>
      </div>

       
</x-app-layout>
@stack('js')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
