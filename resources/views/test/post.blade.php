<div class="container mt-5">

    <h1>Posts</h1>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Post</th>
                <th>Category</th>
                <th>Posted By:</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($post as $p)
                <tr>
                    <td> {{ $p->postID }} </td>
                    <td> {{ $p->post }} </td>
                    <td> {{ $p->category }} </td>
                    <td> {{ $p->name }} </td>
                    <td>
                        <div class="btn-group">
                            <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#edit{{ $p->postID }}"><i class="fas fa-edit"></i></button>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete{{ $p->postID }}"><i class="fas fa-trash-alt"></i></button>
                        </div>
                        
                        <!-- The Modal -->
                        <div class="modal fade" id="edit{{ $p->postID }}">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit {{ $p->name }}'s Post?</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form action="/post/update/{{ $p->postID }}" method="post">
                                        @csrf
                                        <div>
                                            <label for="cate" class="form-label">Category</label>
                                            <select class="form-select" id="cate" name="category" requried>
                                                <option value="{{ $p->categoryID }}" selected>{{ $p->category }}</option>
                                                @foreach($category as $cate)
                                                    <option value="{{$cate->categoryID}}"> {{ $cate->category }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label for="email" class="form-label">What's on your mind?</label>
                                            <textarea class="form-control" name="content" id="" cols="30" rows="10"> {{ $p->post }}</textarea>
                                        </div>
                                    
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" >Update</button>
                                    </form>
                                </div>

                                </div>
                            </div>
                        </div>


                        <!-- The Modal -->
                        <div class="modal fade" id="delete{{ $p->postID }}">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Confirmation</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    Are you realy sure to delete {{ $p->name }}'s this post?
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                                    <form action="/post/delete/{{ $p->postID }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>

                                </div>
                            </div>
                        </div>




                        


                    </td>


                </tr>
            @endforeach
        </tbody>
    </table>

</div>