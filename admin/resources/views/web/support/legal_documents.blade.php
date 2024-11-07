@extends('layouts.web.app')

@section('content')

@php
$section1 = $data['section_1'] ?? null;
$legalDocuments = getModuleData(\App\Models\Setting::MODULE_LEGAL_DOCUMENTS);
@endphp

<section class="inner-banner legal-document-banner">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-xl-8 col-12">
        <div class="content-wrap">
          <!-- <h1>Terms & Conditions <strong class="clr-new"> The Fine Print You'll Actually Want to Read </strong></h1>
                    <p>At Space Markets, honesty, legal compliance, and transparency are not just ideals; they're the bedrock of our operations. We adhere rigorously to all regulatory requirements stipulated by the FSCA, ensuring that every trade is executed with integrity and accountability and we remain at the forefront of compliance within our industry. Our commitment to transparency means that clients have full visibility into their transactions, pricing, and account activities. With Space Markets, you can trade confidently, knowing that you're partnering with a broker that prioritizes honesty, legality, and transparency at every step. Browse a variety of legal documents with ease - we're all about equipping you with all the details of your partnership with us. </p> -->

          <!-- <div class="pre_title mb-4">{!! $section1['pre_title'] ?? '' !!}</div> -->
          {!! $section1['main_title'] ?? '' !!}
          {!! $section1['description'] ?? '' !!}
        </div>
      </div>
      <div class="col-xl-4 col-12">
        <div class="image-wrap text-center">
          <img src="{{ asset('/web/images/legal-doc-banner.png') }}" class=" bounce-animation" alt="">
        </div>
      </div>
    </div>
  </div>
</section>
<section class="pdf-wrapper">
  <div class="container">
    <div class="row">

      @forelse($legalDocuments as $legalDocument)

      <div class="col-xl-3 col-lg-4 col-md-6 col-12">
        <div class="pdfbox">
          <img src="{{ asset('/web/images/pdf-icon.png') }}" />
          <h3>{{ $legalDocument->name }}</h3>
          <a href="{{ route('download.file', ['url' => $legalDocument->file_link, 'name' => $legalDocument->name ]) }}">Download</a>
          <!-- <a href="{{ route('download.file', ['url' => $legalDocument->link, 'name' => $legalDocument->name ]) }}">Download</a> -->
          <!-- <a href="{{ $legalDocument->link }}" target="blank" download>Download</a> -->
          <!-- <a href="{{ $legalDocument->link }}" class="downloadableBtn" download>Download</a> -->
        </div>
      </div>
      @empty
          <!-- No Content Available -->
      @endforelse



      <!-- <div class="col-xl-3 col-lg-4 col-md-6 col-12">
        <div class="pdfbox">
          <img src="{{ asset('/web/images/pdf-icon.png') }}" />
          <h3>Privacy Policy</h3>
          <a href="{{ asset('/web/pdf/Privacy Policy.pdf') }}" download>Download</a>
        </div>
      </div>

      <div class="col-xl-3 col-lg-4 col-md-6 col-12">
        <div class="pdfbox">
          <img src="{{ asset('/web/images/pdf-icon.png') }}" />
          <h3>Conflict of Interest Policy</h3>
          <a href="{{ asset('/web/pdf/Conflict of Interest Policy.pdf') }}" download>Download</a>
        </div>
      </div>

      <div class="col-xl-3 col-lg-4 col-md-6 col-12">
        <div class="pdfbox">
          <img src="{{ asset('/web/images/pdf-icon.png') }}" />
          <h3>FAIS Disclosure</h3>
          <a href="{{ asset('/web/pdf/FAIS Disclosure.pdf') }}" download>Download</a>
        </div>
      </div>

      <div class="col-xl-3 col-lg-4 col-md-6 col-12">
        <div class="pdfbox">
          <img src="{{ asset('/web/images/pdf-icon.png') }}" />
          <h3>PAIA Manual</h3>
          <a href="{{ asset('/web/pdf/PAIA Manual.pdf') }}" download>Download</a>
        </div>
      </div> -->

    </div>
  </div>
  </div>
</section>

@endsection

@push('page_scripts')
  <script>
    document.addEventListener("DOMContentLoaded", function() {
        const accordionButtons = document.querySelectorAll('.downloadableBtn');

        accordionButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent the form from being submitted

                const url = button.getAttribute('href');
                console.log('url', url)
                
                fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.blob();
                })
                .then(blob => {
                    const url = window.URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.style.display = 'none';
                    a.href = url;
                    a.download = 'downloaded-file.jpg'; // Optional: Specify the download file name
                    document.body.appendChild(a);
                    a.click();
                    window.URL.revokeObjectURL(url);
                })
                .catch(error => console.error('Error downloading the file:', error));
            });
        });
    });
  </script>
@endpush