@extends('layouts.web.app')

@section('content')

@php
$departments = getDepartments();
$section1 = $data['section_1'] ?? null;
$section2 = $data['section_2'] ?? null;
@endphp


<section class="contact-us-page">
    <div class="container">
        <div class="row" id="section1">
            <div class="col-md-8 col-sm-12 mx-auto">
                <div class="text-center cheading">
                    <!-- <h1>Engage Mission Control</h1>
                    <p>Use the Form Below to Contact Us and Resolve Your Queries!</p> -->
                    
                    {!! $section1['main_title'] ?? '' !!}
                    <p>{!! $section1['sub_title'] ?? '' !!}</p>
                </div>

                <form action="{{ route('web.user_requests.store') }}" method="post">
                    @csrf()

                    <div class="contactselect-dept accordion" id="contactservice">
                        <!-- <div class="accordion-item">
                            <h2 class="m-0" id="selectserviceitem">
                                <button class="select-department-btn" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <img src="{{ asset('/web/images/select-department.png') }}" /> Select Deparment
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="selectserviceitem" data-bs-parent="#contactservice">
                                <div class="accordion-body selectvalue">

                                    @foreach($departments as $index => $department)
                                        <div class="d-flex">
                                            <input type="radio" id="t{{ $index }}" name="department_id" value="{{ $department->id }}">
                                            <label for="t{{ $index }}">{{ $department->name ?? '' }}</label>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div> -->

                        <div class="accordion-item">
                            <h2 class="m-0" id="selectserviceitem">
                                <button class="select-department-btn" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <img src="{{ asset('/web/images/select-department.png') }}" /> Select Deparment
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="selectserviceitem" data-bs-parent="#contactservice">
                                <div class="accordion-body selectvalue">

                                @foreach($departments as $index => $department)
                                <div class="d-flex">
                                    <input type="radio" id="t{{ $index }}" name="department_id" value="{{ $department->id }}">
                                    <label for="t{{ $index }}">{{ $department->name ?? '' }}</label>
                                </div>
                                @endforeach

                                </div>
                            </div>
                        </div>




                    </div>

                    <div class="form-joinorbit">
                        <input type="hidden" name="type" value="contact_us">
                        <input type="text" placeholder="Full Name" name="full_name" class="fullname" maxlength="50">
                        <input type="email" placeholder="E-Mail Address" name="email" class="emailaddress" maxlength="50">
                        <input type="tel" placeholder="Mobile Number" name="contact_number" class="phonenumber" maxlength="15">
                        <textarea name="description" placeholder="How can we help you?" maxlength="250"></textarea>

                        <button type="submit" class="sendmessage">Send <strong>Message</strong> <span></span></button>

                    </div>

                </form>

            </div>
        </div>


        <div class="row mt-100 justify-content-center" id="section2">
            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="contact-details">
                    <h3> <img src="{{ asset('/web/images/location.svg') }}" alt="" style="width: 49px;"> Address</h3>
                    <!-- <p>Space Markets, 13th Floor, Green Park Corner, 3 Lower Road, Sandown, Gauteng, 2196</p> -->

                    <p class="description address">{!! $section2['address'] ?? '' !!}</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="contact-details">
                    <h3> <img src="{{ asset('/web/images/email-icon.png') }}" alt=""> Emails</h3>
                    @if($section2['email1']) <a href="mailto:{{ $section2['email1'] }}">{{ $section2['email1'] }}</a> @endif
                    @if($section2['email2']) <a href="mailto:{{ $section2['email2'] }}">{{ $section2['email2'] }}</a> @endif
                    <!-- <a href="mailto:support@rcgmarkets.com">support@rcgmarkets.com</a>
                   <a href="mailto:complaints@rcgmarkets.com">complaints@rcgmarkets.com</a>
                   <a href="mailto:finance@rcgmarkets.com">finance@rcgmarkets.com</a> -->
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 mb-4">

                <div class="contact-details">
                    <div class="phonenumber">
                        <label for="">Number</label>
                        @if($section2['phone_number']) <a href="tel:{{ $section2['phone_number'] }}">{{ $section2['phone_number'] }}</a> @endif
                        <!-- <a href="tel:0100355120">010 035 5120</a> -->
                    </div>

                    <div class="whatappsicon">
                        <label for="">WhatsApp Number</label>
                        @if($section2['whatsapp_number']) <a href="tel:{{ $section2['whatsapp_number'] }}">{{ $section2['whatsapp_number'] }}</a> @endif
                        <!-- <a href="tel:+27100075974">+27 82 401 6338</a> -->
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>

@endsection

@push('page_scripts')
<script>
    
</script>
@endpush