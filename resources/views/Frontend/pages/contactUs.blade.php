@extends('Frontend.layout.main')

@section('secondlink','/')
@section('secondname','Page')

@section('content')

<!-- START MAIN CONTENT -->
<div class="main_content">
    <div class="container">

        <div class="container contact-form">
            <div class="contact-image">
                <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact" />
            </div>

            <form action="{{route('frontend.save.contact')}}" method="post">
                @csrf
                <h3>Drop Us a Message</h3>
                <div class="row">
                    <div class="col-12">

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Your Name *" value="" />
                            {{--   @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror --}}
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Your Email *" value="" />
                        {{--     @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                    @enderror --}}
                </div>
                <div class="form-group">
                    <input type="text" name="phone_number" class="form-control" placeholder="Your Phone Number *"
                        value="" />
                </div>
                <div class="form-group">
                    <input type="submit" name="btnSubmit" class="btnContact" value="Send Message" />
                </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="subject" class="form-control" placeholder="Subject *" value="" />
            </div>
            <div class="form-group">
                <textarea name="message" class="form-control" placeholder="Your Message *"
                    style="width: 100%; height: 150px;"></textarea>
                @error('message')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>
    </form>
</div>
</div>
</div>
<!-- END MAIN CONTENT -->


@endsection