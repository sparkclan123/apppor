<h1>กรอกข้อมูลเดี๋ยวนี้!!</h1>


{{--ตรงหัวเรื่อง--}}
<div>
<div>
@if(isset($pors))
    Edit Form
  @else
      add form
  @endif
</div>
@if(isset($pors))
    {{ Form::open(['method' => 'put', 'route' => ['pors.update', $pors->id]  ]) }}
  @else
    {{Form::open(['url'=>'pors'])}}
  @endif


{{--เช็ก alert--}}



  {{--ตรงตัว title--}}
<div>
  @if (count( $errors ) > 0)
    <div>
      <ul>
      @foreach ( $errors->all as $error)
        <li>{{ $error}}</li>
      @endforeach
    </ul>
    </div>
  @endif
    <div>
          <div>
                {{ Form::label('title','Title')}}
          </div>
          <div>
            @if(isset($pors->title))
                {{ Form::text('title',$pors->title)}}
            @else
                {{ Form::text('title','')}}
              @endif
          </div>
    </div>

    <div>
          <div>
                {{ Form::label('url','url')}}
          </div>
          <div>
            @if(isset($pors->url))
                {{ Form::text('url',$pors->url)}}
            @else
                {{ Form::text('url','')}}
              @endif
          </div>
    </div>

    <div>
          <div>
                {{ Form::label('description','description')}}
          </div>
          <div>
            @if(isset($pors->description))
                {{ Form::text('description',$pors->description)}}
            @else
                {{ Form::text('description','')}}
              @endif
          </div>
    </div>

<div>
  {{ Form::submit('save')}}
</div>
</div>




{{ Form::close()}}
</div>
