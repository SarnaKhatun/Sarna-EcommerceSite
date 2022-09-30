@extends('admin.master')
@section('title')
    Manage Category
@endsection

@section('body')
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center text-capitalize">manage category</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-responsive">
                        <thead>
                        <tr>
                            <th>Sl. No:</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$category->category_name}}</td>
                            <td>
                                <a href="{{route('edit-category', ['id' => $category->id])}}" class="btn btn-secondary fa fa-edit"></a>
                                <a href="{{route('delete-category', ['id' => $category->id])}}" class="btn btn-danger" onclick="deleteCategory({{$category->id}})"><i class="fa fa-trash"></i></a>
                                <form action="{{route('delete-category', ['id' => $category->id])}}" method="post" id="deleteCate{{$category->id}}">
                                    @csrf
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteCategory(id) {
            event.preventDefault();
            var category = confirm('Are you sure????');
            if (category)
            {
                document.getElementById('deleteCate'+id).submit();
            }
        }
    </script>

@endsection


