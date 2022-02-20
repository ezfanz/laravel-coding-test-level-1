@extends('layouts.app')
@section('content')


    <section style="padding-top:60px;">
        <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    All Events
                     @if (Auth::check())
                    <a href="{{ route('events.create') }}" class="btn btn-success float-right">Add New Event</a>
                      @endif
                </div>
                <div class="card-body">
                    @if(Session::has('event_deleted'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('event_deleted')}}
                    </div>
                    @endif
                   <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Event Name</th>
                                <th>Event Start</th>
                                <th>Event End</th>
                                <th>Action</th>



                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $event )
                            <tr>
                                <td>{{$event->id}}</td>
                                <td>{{$event->name}}</td>
                                <td>{{$event->start_at}}</td>
                                <td>{{$event->end_at}}</td>
                                <td>
                                    <a href="{{ route('events.details', $event->id)}}" class="btn btn-info">Details</a>
                                    @if (Auth::check())
                                    <a href="{{ route('events.edit', $event->id)}}" class="btn btn-success">Edit</a>
                                    <a href="{{ route('events.delete', $event->id)}}" class="btn btn-danger">Delete</a>
                                    @endif

                                </td>



                            </tr>

                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>

</section>

    <section style="padding-top:60px;">
        <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    External weathers API Data

                </div>
                <div class="card-body">

                   <table id="example2" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Country</th>
                                <th>Region</th>
                                <th>lat</th>
                                <th>lon</th>
                                <th>timezone</th>
                                <th>localtime</th>
                                <th>utc_offset</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>{{$weathers["name"]}}</td>
                                <td>{{$weathers['country']}}</td>
                                <td>{{$weathers['region']}}</td>
                                <td>{{$weathers['lat']}}</td>
                                <td>{{$weathers['lon']}}</td>
                                <td>{{$weathers['timezone_id']}}</td>
                                <td>{{$weathers['localtime']}}</td>
                                <td>{{$weathers['utc_offset']}}</td>
                            </tr>


                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>

</section>
</div>

<script>
$(document).ready(function() {
    $('#example').DataTable();
} );

$(document).ready(function() {
    $('#example2').DataTable();
} );
</script>


@endsection

    </section>


