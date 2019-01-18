@extends('layouts.app')



@section('content')

<?php 
$request = request();
$keyword = request('keyword');
if(empty($keyword)) {
    $keyword = ' Something ....';
}

?>



<div class="coontainer">
    <div class="row">
        <div class="col-md-9 offset-md-1">
            <h1>Post list</h1>
        </div>    
    </div>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form method="GET" action="/post/search">
            <input type="text" name="keyword" placeholder="keyword" value="{{$keyword}}"> <input type="submit">
            </form>
        </div>    
    </div>
        
    <div class="row">
            <div class="table-resposive col-md-10 offset-md-1 form-group">
                
                @if(count($posts) > 0)  

                    <table class="table table-striped">
                        <tr>
                            <th>id</th>
                            <th>title</th>
                            <th>body</th>
                            <th>author</th>
                            <th>created on</th>
                            <th colspan="2">&nbsp</th>
                        </tr>


                    @foreach($posts as $post) 
                        <tr>
                            <td class="center">{{$post->id}}</td>
                            <td class="center">{{$post->title}}</td>
                            <td class="center">{{$post->body}}</td>
                            <td class="center">{{$post->author}}</td>
                            <td class="center">{{$post->created_at}}</td>
                            <td><a href="" class="btn btn-primary">Edit</a></td>
                            <td>{!! Form::open(['action' => ['PostController@destroy' , $post->id] , 'method' => 'POST']); !!}

                                
                                @method('DELETE')
                                {!! Form::submit('Delete' , ['class' => 'btn btn-danger']) !!}
                                {!! Form::close(); !!}
                            </td>
                        </tr>

                    @endforeach


                    


                    </table>
                    {{$posts->links()}}

                @else 
                    <div>No Post found</div>
                @endif
            </div>    
        </div>
</div>




@endsection('content')