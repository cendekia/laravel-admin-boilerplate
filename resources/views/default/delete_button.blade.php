{!! Form::open(['url' => $url, 'method' => 'delete', 'onSubmit' => "if(!confirm('Are you sure want to delete it?')){return false;}", 'style' => "display: inline-block;"]) !!}
    <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-erase"></i></button>
{!! Form::close() !!}
