<div class="container mt-5">

    <h1>Add post here</h1>

    
    <div class="container">

        <form action="/post/save" method="post">
        @csrf
            <div>
                <label for="cate" class="form-label">Category</label>
                <select class="form-select" id="cate" name="category" requried>
                    <option value="" selected>Select Category</option>
                    @foreach($category as $cate)
                        <option value="{{$cate->categoryID}}"> {{ $cate->category }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">What's on your mind?</label>
                <textarea class="form-control" name="content" id="" cols="30" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-lg">Post</button>
        </form>

    </div>


</div>