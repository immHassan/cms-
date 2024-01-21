
    <div class="alert alert-danger message" style="display:none">
            
    </div>
<form method="POST" action="{{ route('question.vote', $question->id) }}" >
    @csrf
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">
            <i class="fa fa-arrow-right"></i>{{ $question->question }}
            </h3>
        </div>
    </div>
    <div class="panel-body">
        <ul class="list-group">
            @foreach($options as $id => $name)
                <li class="list-group-item">
                    <div class="radio" id="checkboxgroup">
                        <label>
                            <input value="{{ $id }}" type="checkbox" name="options[]">
                            {{ $name }}
                        </label>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="panel-footer mt-3">
        <input type="submit" class="btn btn-primary btn-sm" value="Vote" />
    </div>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    var limit =  {{$question->maxCheck}}
    $("input:checkbox").click(function() {
        if($("input:checkbox:checked").length >= limit+1){
            this.checked = false;
            $(".message").show();
            $(".message").html("You can't check more then "+limit+" options");
        } else {
            $(".message").hide();            
        } 
    });
         
</script>