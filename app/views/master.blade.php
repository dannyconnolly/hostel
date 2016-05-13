<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        @section('title')
        <title>{{{$title}}}</title>
        @show

        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700,300italic|Open+Sans:400,800' rel='stylesheet' type='text/css'>
        {{ HTML::style('bower_components/bootstrap-css/css/bootstrap.min.css') }}
        {{ HTML::style('bower_components/bootstrap-css/css/bootstrap-theme.min.css') }}
        {{ HTML::style('assets/css/ui-lightness/jquery-ui-1.10.4.min.css') }}
        {{ HTML::style('//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css') }}
        {{ HTML::style('assets/css/app.css') }}
    </head>
    <body>

        @include('partials.navigation')

        <div class="main-container" id="main-container">
            @if(Auth::check())
            @include('partials.sidenavigation')
            @else  
            @include('partials.frontsidenavigation')
            @endif
            <div class="main-content">

                <div class="breadcrumbs" id="breadcrumbs">
                    <ul class="breadcrumb">
                        <li>
                            <i class="ace-icon fa fa-home home-icon"></i>
                            <a href="/">Home</a>
                        </li>
                        <li class="active">{{{$title}}}</li>
                    </ul><!-- /.breadcrumb -->
                </div>
                <div class="page-content">
                    {{$main}}
                </div>
                <footer>
                    <p><a href="http://www.dannysouthern.com" target="_blank" title="Software Development by Danny Southern">Software Development</a> by Danny Southern</p>
                </footer>
            </div>
        </div>

        {{ HTML::script('assets/js/scripts.js') }}
        {{ HTML::script('inc/ckeditor/ckeditor.js') }}
        {{ HTML::script('assets/js/app.js') }}

        <script>
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            var description = document.getElementById('description');
            var details = document.getElementById('details');
            if (description !== null) {
                CKEDITOR.replace('description');
            }
            if (details !== null) {
                CKEDITOR.replace('details');
            }
        </script>

        <script>
            $(document).ready(function($) {
                $(".date-input").datepicker({dateFormat: "yy-mm-dd"});

                $('.book-btn').on('click', function(e) {
                    var hostel = $(this).data('hostel');
                    $('.hidden_hostel').val(hostel);
                    $('.hostel_name').val(hostel);
                    $('#myModal').modal('show');
                    console.log(hostel);
                });

            });
        </script> 


    </body>
</html>