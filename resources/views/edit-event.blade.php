<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <section style="padding-top:60px;">
        <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    Edit Events
                </div>
                <div class="card-body">
                    @if(Session::has('event_updated'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('event_updated')}}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('events.update', $event->id)}}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $event->id}}">
                        <div class="form-group">
                            <label for="name">Event Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Event Name" value="{{ $event->name}}" required/>
                        </div>
                            <br>
                        <div class="form-group">
                            <label for="start_at">Event Start At</label>
                             <input type="date" name="start_at" value="{{ $event->start_at}}" required>
                        </div>
                            <br>
                        <div class="form-group">
                            <label for="start_at">Event End At</label>
                             <input type="date" name="end_at" value="{{ $event->end_at}}" required>
                        </div>
                        <br>

                       <button type="submit" class="btn btn-success">Update Event</button>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>
