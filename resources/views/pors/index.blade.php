<h1>ดูข้อมูลตาราง!!</h1>
@if(Session::has('message'))
  <div>
      {{ Session::get('message')}}
  </div>
@endif

<table border="1">
      <thead>
              <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Url</th>
                  <th>Description</th>

                  <th width="200">กดตรงนี้</th>
              </tr>
      </thead>
      <tbody>
          @forelse ($pors as $p)
            <tr>
              <td>{{ $p['id']}}</td>
              <td>{{ $p['title']}}</td>
              <td>{{ $p['url']}}</td>
              <td>{{ $p['description']}}</td>

              <td>
                  {{Form::open(['route' => ['pors.destroy' ,$p['id'],'method' => "DELETE"]])}}
                  <input type="hidden" name="_method" value="delete"/>

                  {{Html::link('pors/'.$p['id'], 'ดูข้อมูล')}}
                  {{Html::link('pors/'.$p['id'].'/edit', 'เเก้ไขข้อมูล')}}

                  {{Form::submit('Delete')}}
                  {{Form::close() }}
              </td>
            </tr>
          @empty
            <tr>
              <td colapan="6">No data</td>
            </tr>
          @endforelse

      </tbody>

</table>

<div>
 {{ Html::link('pors/create','เพิ่มข้อมูล') }}
</div>
