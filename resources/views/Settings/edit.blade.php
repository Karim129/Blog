@extends('layouts.dashboard')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row d-flex justify-content-between align-items-center mx-5">
                <div class="">
                    <h1 class="m-0"> Settings</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('settings.edit') }}">Home</a></li>
                        <li class="breadcrumb-item active">Settings</li>

                    </ol>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="container">
                <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="phone">Phone 1</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            value="{{ $settings['phone'] }}" required>
                    </div>
                    <div class="form-group">
                        <label for="mobile">Phone 2</label>
                        <input type="text" class="form-control" id="mobile" name="mobile"
                            value="{{ $settings['mobile'] }}" required>


                    </div>

                    <div class="form-group">
                        <label for="about">About</label>
                        <textarea class="form-control" id="about" name="about" required>{{ $settings['about'] }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address"
                            value="{{ $settings['address'] }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ $settings['email'] }}" required>
                    </div>

                    <div class="form-group">
                        <label for="whatsapp">Whatsapp</label>
                        <input type="text" class="form-control" id="whatsapp" name="whatsapp"
                            value="{{ $settings['whatsapp'] }}" required>
                    </div>
                    <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input type="text" class="form-control" id="facebook" name="facebook"
                            value="{{ $settings['facebook'] }}" required>
                    </div>
                    <div class="form-group">
                        <label for="twitter">Twitter</label>
                        <input type="text" class="form-control" id="twitter" name="twitter"
                            value="{{ $settings['twitter'] }}" required>
                    </div>
                    <div class="form-group">
                        <label for="linkedin">Linkdin</label>
                        <input type="text" class="form-control" id="linkedin" name="linkedin"
                            value="{{ $settings['linkedin'] }}" required>
                    </div>


                    <div class="form-group">
                        <label for="header_logo">Header Logo</label>
                        <input type="file" class="form-control" id="header_logo" name="header_logo"
                            onchange="loadFile(event, 1)">
                        @if ($settings['header_logo'])
                            <img src="{{ $settings['header_logo'] }}" style="width: 100px;">
                        @endif
                    </div>
                    <div style="display: none;" id="image-preview-section1">
                        @if ($settings['header_logo'])
                            <img src="{{ $settings['header_logo'] }}" id="image-preview1" alt="your image"
                                style="display:{{ is_null($settings['header_logo']) ? 'none' : 'block' }}; width: 100px; ">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="footer_logo">Footer Logo</label>
                        <input type="file" class="form-control" id="footer_logo" name="footer_logo"
                            onchange="loadFile(event, 2)">
                        @if ($settings['footer_logo'])
                            <img src="{{ $settings['footer_logo'] }}"style="width: 100px;">
                        @endif
                    </div>
                    <div style="display: none;" id="image-preview-section2">
                        @if ($settings['footer_logo'])
                            <img src="{{ $settings['footer_logo'] }}" id="image-preview2" alt="your image"
                                style="display:{{ is_null($settings['footer_logo']) ? 'none' : 'block' }}; width: 100px;">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="footer_text">Footer Text</label>
                        <textarea class="form-control" id="footer_text" name="footer_text" required>{{ $settings['footer_text'] }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="contact_us_map">Contact US Map</label>
                        <input type="text" class="form-control" id="contact_us_map" name="contact_us_map"   value="{{ $settings['contact_us_map'] }}" required>
                    </div>

                    <div class="form-group">
                        <label for="Business_partners">Business Partners</label>
                        <input type="number" class="form-control" id="Business_partners" name="Business_partners"
                            value="{{ $settings['Business_partners'] }}" required>
                    </div>

                    <div class="form-group">
                        <label for="cases_Done">Cases Done</label>
                        <input type="number" class="form-control" id="cases_Done" name="cases_Done"
                            value="{{ $settings['cases_Done'] }}" required>
                    </div>

                    <div class="form-group">
                        <label for="happy_clients">Happy Clients</label>
                        <input type="number" class="form-control" id="happy_clients" name="happy_clients"
                            value="{{ $settings['happy_clients'] }}" required>
                    </div>

                    <div class="form-group">
                        <label for="Award_won">Award Won</label>
                        <input type="number" class="form-control" id="Award_won" name="Award_won"
                            value="{{ $settings['Award_won'] }}" required>
                    </div>
                    <div class="form-group">
                        <label for="success cases">Success Cases</label>
                        <input type="number" class="form-control" id="success cases" name="success cases"
                            value="{{ $settings['success cases'] }}" required>
                    </div>
                    <div class="form-group">
                        <label for="home_page_about_image">Home Page About Image</label>
                            <input type="file" class="form-control" id="home_page_about_image" name="home_page_about_image"
                                onchange="loadFile(event, 3)">

                        @if ($settings['home_page_about_image'])
                            <img src="{{ $settings['home_page_about_image'] }}" style="width: 100px;">
                        @endif
                    </div>
                    <div style="display: none;" id="image-preview-section3">
                        @if ($settings['home_page_about_image'])
                            <img src="{{ $settings['home_page_about_image'] }}" id="image-preview3" alt="your image"
                                style="display:{{ is_null($settings['home_page_about_image']) ? 'none' : 'block' }}; width: 100px;">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="background_image">Background Image</label>
                        <input type="file" class="form-control" id="background_image" name="background_image"
                            onchange="loadFile(event, 4)">

                        @if ($settings['background_image'])
                            <img src="{{ $settings['background_image'] }}" style="width: 100px;">
                        @endif
                    </div>
                    <div style="display: none;" id="image-preview-section4">
                        @if ($settings['background_image'])
                            <img src="{{ $settings['background_image'] }}" id="image-preview4" alt="your image"
                                style="display:{{ is_null($settings['background_image']) ? 'none' : 'block' }}; width: 100px;">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="speak_with_our_expert_logo">Speak With Our Expert Logo</label>
                        <input type="file" class="form-control" id="speak_with_our_expert_logo" name="speak_with_our_expert_logo"
                            onchange="loadFile(event, 5)">

                        @if ($settings['speak_with_our_expert_logo'])
                            <img src="{{ $settings['speak_with_our_expert_logo'] }}" style="width: 100px;">
                        @endif
                    </div>
                    <div style="display: none;" id="image-preview-section5">
                        @if ($settings['speak_with_our_expert_logo'])
                            <img src="{{ $settings['speak_with_our_expert_logo'] }}" id="image-preview5" alt="your image"
                                style="display:{{ is_null($settings['speak_with_our_expert_logo']) ? 'none' : 'block' }}; width: 100px;">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="speak_with_our_expert_image">Speak With Our Expert Image</label>
                        <input type="file" class="form-control" id="speak_with_our_expert_image" name="speak_with_our_expert_image"
                            onchange="loadFile(event, 6)">

                        @if ($settings['speak_with_our_expert_image'])
                            <img src="{{ $settings['speak_with_our_expert_image'] }}" style="width: 100px;">
                        @endif
                    </div>
                    <div style="display: none;" id="image-preview-section6">
                        @if ($settings['speak_with_our_expert_image'])
                            <img src="{{ $settings['speak_with_our_expert_image'] }}" id="image-preview6" alt="your image"
                                style="display:{{ is_null($settings['speak_with_our_expert_image']) ? 'none' : 'block' }}; width: 100px;">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="banner_title">Banner Title</label>
                        <input type="text" class="form-control" id="banner_title" name="banner_title"
                            value="{{ $settings['banner_title'] }}" required>

                    </div>
                    <div class="form-group">
                        <label for="banner_subtitle">Banner Subtitle</label>
                        <input type="text" class="form-control" id="banner_subtitle" name="banner_subtitle"
                            value="{{ $settings['banner_subtitle'] }}" required>

                    </div>
                    <div class="form-group">
                        <label for="banner_text">Banner Text</label>
                        <input type="text" class="form-control" id="banner_text" name="banner_text"
                            value="{{ $settings['banner_text'] }}" required>

                    </div>
                    <div class="form-group">
                        <label for="home_page_video">Home Page Video</label>
                        <input type="text" class="form-control" id="home_page_video" name="home_page_video"
                            value="{{ $settings['home_page_video'] }}" required>
                    </div>
                    <div class="form-group">
                        <label for="Thumbnail_Video">Thumbnail Video</label>
                        <input type="file" class="form-control" id="Thumbnail_Video" name="Thumbnail_Video" onchange="loadFile(event, 8)">

                        @if ($settings['Thumbnail_Video'])
                            <img src="{{ $settings['Thumbnail_Video'] }}" style="width: 100px;">
                        @endif

                    </div>
                    <div style="display: none;" id="image-preview-section8">
                        @if ($settings['Thumbnail_Video'])
                            <img src="{{ $settings['Thumbnail_Video'] }}" id="image-preview8" alt="your image"
                                style="display:{{ is_null($settings['Thumbnail_Video']) ? 'none' : 'block' }}; width: 100px;">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="about_us_page_image">About Us Page Image</label>
                        <input type="file" class="form-control" id="about_us_page_image" name="about_us_page_image"
                            onchange="loadFile(event, 7)">

                        @if ($settings['about_us_page_image'])
                            <img src="{{ $settings['about_us_page_image'] }}" style="width: 100px;">
                        @endif
                    </div>
                    <div style="display: none;" id="image-preview-section7">
                        @if ($settings['about_us_page_image'])
                            <img src="{{ $settings['about_us_page_image'] }}" id="image-preview7" alt="your image"
                                style="display:{{ is_null($settings['about_us_page_image']) ? 'none' : 'block' }}; width: 100px;">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="about_us_page_text">About Us Page Text</label>
                        <textarea class="form-control" id="description" name="about_us_page_text"
                            required>{{$settings['about_us_page_text'] }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="about_us_page_review">About Us Page Review</label>
                        <input type="text" class="form-control" id="about_us_page_review" name="about_us_page_review"
                            value="{{ $settings['about_us_page_review'] }}" required>
                    </div>
                    <div class="form-group">
                        <label for="what_make_us_unique_first"  >What Make Us Unique First</label>
                        <input type="text" class="form-control" id="what_make_us_unique_first" name="what_make_us_unique_first"
                            value="{{ $settings['what_make_us_unique_first'] }}" required>
                    </div>
                    <div class="form-group">
                        <label for="what_make_us_unique_second">What Make Us Unique Second</label>
                        <input type="text" class="form-control" id="what_make_us_unique_second" name="what_make_us_unique_second"
                            value="{{ $settings['what_make_us_unique_second'] }}" required>
                    </div>
                    <div class="form-group">
                        <label for="what_make_us_unique_third">What Make Us Unique Third</label>
                        <input type="text" class="form-control" id="what_make_us_unique_third" name="what_make_us_unique_third"
                            value="{{ $settings['what_make_us_unique_third'] }}" required>
                    </div>
                    <div class="form-group">
                        <label for="services_page_title"    >Services Page Title</label>
                        <input type="text" class="form-control" id="services_page_title" name="services_page_title"
                            value="{{ $settings['services_page_title'] }}" required>
                    </div>
                    <div class="form-group">
                        <label for="services_page_description">Services Page Description</label>
                        <textarea class="form-control" id="htmeditor" name="services_page_description"
                            required>{{$settings['services_page_description'] }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="services_page_image">Services Page Image</label>
                        <input type="file" class="form-control" id="services_page_image" name="services_page_image"
                            onchange="loadFile(event, 8)">

                        @if ($settings['services_page_image'])
                            <img src="{{ $settings['services_page_image'] }}" style="width: 100px;">
                        @endif


                    </div>
                    <div style="display: none;" id="image-preview-section8">
                        @if ($settings['services_page_image'])
                            <img src="{{ $settings['services_page_image'] }}" id="image-preview8" alt="your image"
                                style="display:{{ is_null($settings['services_page_image']) ? 'none' : 'block' }}; width: 100px;">
                        @endif
                    </div>


                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>

            </div>

        </div>

    </section>

    <script>
        var loadFile = function(event, id) {
            var output = document.getElementById('image-preview' + id); // Get the 'image-preview' element
            var previewSection = document.getElementById('image-preview-section' +
            id); // Get the 'image-preview-section' element

            output.src = URL.createObjectURL(event.target.files[
            0]); // Convert the selected file into a URL and assign it to the 'src' attribute
            previewSection.style.display = 'block'; // Show the preview section

            output.onload = function() {
                URL.revokeObjectURL(output.src); // Free up memory by revoking the object URL
            };
        };
    </script>
@endsection
