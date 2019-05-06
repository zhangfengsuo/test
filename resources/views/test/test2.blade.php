@extends('common')


@section("title")
        request测试用页面
@stop


@section("sidebar")

    不集成common 页面的内容，这是request 页面自己的内容
@stop


@section("content")
    <form id="formID">

        <div>name:<input type="text" name="name" value="{{$name}}"></div>

        <div>id:<input type="number" name="id"></div>

        <div>content:<input type="text" name="content"></div>

        <div><input type="button" value="测试提交" class="submit"></div>
    </form>
@stop

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script>
    $(document).ready(function(){
        $(".submit").click(function(){
            alert("{{$name}}");
            {{--var data=$("#formID").serialize();--}}
           {{--$.post("{{url('get')}}",data,function(e){--}}

           {{--});--}}
        });
    })
</script>