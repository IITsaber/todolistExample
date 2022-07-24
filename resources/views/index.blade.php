<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
<!-- JavaScript Bundle with Popper -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js" ></script>

</head>
<body class="bg-info">
    <div class="container w-50 mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3>To-do List</h3>
                <form action="{{route('store')}}" method="POST" autocomplete="off" >
                    @csrf
                     <div class="input-group">
                         <input type="text" name="content" class="form-control" placeholder="Add new todo">
                         <button type="submit" class="btn btn-dark btn-sm px-4"><i class="fas fa-plus"></i></button>
                     </div>
                </form>
                @if (count($todolists))
                <ul class="list-group list-group-flush mt-3">
                @foreach($todolists as $todolist)
                    <li class="list-group-item">
                        <form action="{{ route('destroy',$todolist->id) }}" method="POST">
                            {{ $todolist->content }}
                            @csrf
                            @method('delete')                          
                            

                            <button type="submit" class="btn btn-link btn-sm float-end "><i class="fas fa-trash"></i></button>
                        </form>
                    </li>
                    @endforeach
                </ul>
                @else
                <p class="text-center mt-3">No Task!</p>
                @endif
            </div>
            @if(count($todolists))
            <div class="card-footer">
                You have {{ count($todolists)}} pending task !
            </div>
            @else
            @endif
        </div>
    </div>    
</body>
</html>