@extends('common')


@section('title', 'Page Title')

@section('sidebar')
    @parent
    <p>这将追加到主布局的侧边栏。</p>
@endsection
{{--注释内容--}}

@section('content')
   {{-- @include("test.common",["name"=>"张丰锁"])
    <p>这是主体内容。@{{$name ?? "没有值"}}</p>--}}
  {{--  @if($name=="abc")
        我是abc
    @elseif($name=="abcd")
        我是abcd
    @else
        我是abcde
    @endif--}}
   {{-- @foreach($name as $val)
        {{$val}}
    @endforeach--}}
    {{--@forelse($name as $val)--}}
        {{--<li>{{$val}}</li>--}}
    {{--@empty--}}
        {{--<p>no users</p>--}}
    {{--@endforelse--}}

   {{-- This comment will not be present in the rendered HTML --}}

   @php
        echo "元素php111";
   @endphp
@endsection
