<x-app-layout>
    <div class="pagetitle">
        <h1>{{ __('Post')}}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard')}}</a></li>
                    <li class="breadcrumb-item active">{{ __('Resource')}}</li>
                </ol>
            </nav>
    </div>
    <!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @if(session()->has('message'))
                    <div id ="success-alert" class= "alert alert=success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                        {{ session()->get('message') }}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <script>
                        setTimeout(function() {
                            var alert = document.getElementById('success-alert');
                            alert.parentNode.removeChild(alert);
                        }, 5000);
                    </script>
                @endif
                    <div class="card p-5">
                        <div class="card-body">
                            <div class="text-end">
                                <a href="{{ route('post.create') }}" class="btn btn-primary"><i class="bi bi-file-earmark-plus-fill me-1"> Add New Post</i></a>
                            </div>
                            <hr class="my-5">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col"><b>Subjects</th>
                                        <th scope="col">Posts</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($posts)
                                        @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $post->subject }}</td>
                                            <td>{{ $post->post }}</td>
                                            <td>
                                                @if($post->status == 1)
                                                    <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Published</span>
                                                @else
                                                <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i> Unpublished</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('post.show', $post) }}" class="btn btn-dark m-1"><i class="bi bi-folder-symlink"></i></a>
                                                <a href="{{ route('post.edit', $post) }}" type="button" class="btn btn-success m-1"><i class="bi bi-pencil-square"></i></a>
                                                <form action="{{ route('post.destroy', $post) }}" method="post" style="display:inline;" onsubmit="return confirmDelete()">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger m-1"><i class="bi bi-trash2-fill"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endisset
                                    <script>
                                        function confirmDelete() {
                                            return confirm('Are you sure you want to delete this post?');
                                        }
                                    </script>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
    </section>

</x-app-layout>