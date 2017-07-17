@extends('main')

@section('title', '| ติดต่อสอบถาม')

@section('content')

    <div class="form-spacing-top-index row">
        <div class="col-md-12">
            <h1>ติดต่อสอบถาม ระบบจัดการข้อมูล</h1>
            <hr>
                <form action="#" method="POST">
                        <div class="form-group">
                            <input name="name" placeholder="Name" type="text" class="form-control" />
                        </div>
                        <div class="form-group">
                            <input name="email" placeholder="Email" type="email" class="form-control" />
                        </div>
                        <div class="form-group">
                            <textarea name="message" placeholder="Message" rows="4" class="form-control"></textarea>
                        </div>


                                <input type="submit" class="btn btn-success" value="Submit" />
                                <input type="reset" class="btn btn-default" value="Reset" />


                </form>
        </div>
    </div>

@endsection
