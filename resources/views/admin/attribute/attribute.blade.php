@extends('admin.layout')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">ADD Attribute</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">ADD Attribute</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Settings</button>
                        <button type="button"
                            class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                                href="javascript:;">Action</a>
                            <a class="dropdown-item" href="javascript:;">Another action</a>
                            <a class="dropdown-item" href="javascript:;">Something else here</a>
                            <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated
                                link</a>
                        </div>
                    </div>
                </div>
            </div>
            <h6 class="mb-0 text-uppercase">DataTable Import</h6>
            <hr />

            <div class="card">
                <div class="card-body">
                    <button type="button" onclick="saveData('0','','')" class="btn btn-outline-primary px-3 mb-1"
                        data-bs-toggle="modal" data-bs-target="#exampleModal">Add
                        new</button>

                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>

                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Actions</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->slug }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->updated_at }}</td>
                                        <td><button type="button"
                                                onclick="saveData('{{ $item->id }}','{{ $item->name }}','{{ $item->slug }}')"
                                                class="btn btn-outline-primary px-3 mb-1" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">Edit</button>
                                            <button onclick="deleteData('{{ $item->id }}','attributes')"
                                                class="btn btn-outline-danger px-3 mb-1">Delete </button>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                            {{-- <tfoot>
                                <tr>
                                    <th>Attribute</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                            </tfoot> --}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('admin/update-attribute-name') }}" id="formSubmit" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                {{-- <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                            </div> --}}
                                <h5 class="mb-0 text-info">Add new home banner</h5>
                            </div>
                            <hr>
                            <input type="hidden" name="id" id="enter_id">
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Text</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" id="enter_name"
                                        placeholder="Enter Attribute Name" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="enter_slug" class="col-sm-3 col-form-label">Link</label>
                                <div class="col-sm-9">
                                    <input type="text" name="slug" class="form-control" id="enter_slug"
                                        placeholder="Slug" required>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="modal-footer">
                        <span id="submitButton">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </span>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function saveData(id, name, slug) {
            $('#enter_id').val(id);
            $('#enter_name').val(name);
            $('#enter_slug').val(slug);
        }
    </script>
@endsection
