<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/png" href="{{ URL::to('../public/uploads/icon.png')}}"/>
        <!-- Web fonts -->
        <link href='https://fonts.googleapis.com/css?family=Mukta+Vaani:400,300,500,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Quicksand:400,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Proza+Libre:400,600,500' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,600,700,200,300' rel='stylesheet' type='text/css'>
        <!-- links -->
        <link rel="stylesheet" href="{{ URL::to('bower_components/chosen/chosen.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('bower_components/font-awesome/css/font-awesome.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('bower_components/Ionicons/css/ionicons.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('bower_components/sweetalert/dist/sweetalert.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('bower_components/summernote/dist/summernote.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('bower_components/froala-wysiwyg-editor/css/froala_editor.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('bower_components/froala-wysiwyg-editor/css/froala_style.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('bower_components/codemirror/lib/codemirror.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('bower_components/animate.css/animate.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('bower_components/toastr/toastr.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('bower_components/slick-carousel/slick/slick.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('bower_components/slick-carousel/slick/slick-theme.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('bower_components/owl-carousel/owl-carousel/owl.carousel.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('bower_components/owl-carousel/owl-carousel/owl.theme.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('bower_components/sweet-modal/dist/min/jquery.sweet-modal.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('bower_components/nprogress/nprogress.css') }}" type="text/css">
        
        <!-- Froala plugins -->
        <link rel="stylesheet" href="{{ URL::to('bower_components/froala-wysiwyg-editor/css/plugins/code_view.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('bower_components/froala-wysiwyg-editor/css/plugins/colors.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('bower_components/froala-wysiwyg-editor/css/plugins/file.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('bower_components/froala-wysiwyg-editor/css/plugins/fullscreen.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('bower_components/froala-wysiwyg-editor/css/plugins/line_breaker.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('bower_components/froala-wysiwyg-editor/css/plugins/table.css') }}" type="text/css">

        <!-- Custum admin css -->
        <link rel="stylesheet" href="{{ URL::to('resources/views/admin/assets/css/default.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('resources/views/admin/assets/css/nav-side.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('resources/views/admin/assets/css/content.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('resources/views/admin/assets/css/nav-header.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('resources/views/admin/assets/css/posts.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('resources/views/admin/assets/css/profile.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('resources/views/admin/assets/css/users.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('resources/views/admin/assets/css/comments.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('resources/views/admin/assets/css/visitors.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('resources/views/admin/assets/css/wickedpicker.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('resources/views/admin/assets/css/tasks.css') }}" type="text/css">


         <!-- Custum public css -->
        <link rel="stylesheet" href="{{ URL::to('resources/views/public/assets/css/default.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('resources/views/public/assets/css/navbar.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('resources/views/public/assets/css/navbar-2.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('resources/views/public/assets/css/identification.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('resources/views/public/assets/css/carousel.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('resources/views/public/assets/css/view_posts.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('resources/views/public/assets/css/single_posts.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('resources/views/public/assets/css/side-post.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('resources/views/public/assets/css/search.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('resources/views/public/assets/css/navigation.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('resources/views/public/assets/css/list_tags.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('resources/views/public/assets/css/footer.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('resources/views/public/assets/css/legendes.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('resources/views/public/assets/css/home.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::to('resources/views/public/assets/css/profile.css') }}" type="text/css">


    <title>@yield('title')</title>
    </head>
    <body>

        @yield('content')


        <script type="text/javascript" src="{{ URL::to('bower_components/jquery/dist/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('bower_components/chosen/chosen.js') }}"></script>


        <script type="text/javascript" src="{{ URL::to('bower_components/sweetalert/dist/sweetalert.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('bower_components/summernote/dist/summernote.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('bower_components/froala-wysiwyg-editor/js/froala_editor.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('bower_components/codemirror/lib/codemirror.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('bower_components/codemirror/mode/xml/xml.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('bower_components/waterwheelcarousel/js/jquery.waterwheelCarousel.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('bower_components/jsanimatedmodal/animatedModal.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('bower_components/semantic/dist/semantic.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('bower_components/toastr/toastr.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('bower_components/typed.js/dist/typed.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('bower_components/slick-carousel/slick/slick.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('bower_components/owl-carousel/owl-carousel/owl.carousel.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('bower_components/sweet-modal/dist/min/jquery.sweet-modal.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('bower_components/nprogress/nprogress.js') }}"></script>
        
        <!-- Froala plugins -->
        <script type="text/javascript" src="{{ URL::to('bower_components/froala-wysiwyg-editor/js/plugins/align.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('bower_components/froala-wysiwyg-editor/js/plugins/code_beautifier.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('bower_components/froala-wysiwyg-editor/js/plugins/code_view.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('bower_components/froala-wysiwyg-editor/js/plugins/colors.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('bower_components/froala-wysiwyg-editor/js/plugins/font_family.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('bower_components/froala-wysiwyg-editor/js/plugins/font_size.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('bower_components/froala-wysiwyg-editor/js/plugins/fullscreen.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('bower_components/froala-wysiwyg-editor/js/plugins/inline_style.min.js') }}"></script>

        <script type="text/javascript" src="{{ URL::to('bower_components/froala-wysiwyg-editor/js/plugins/line_breaker.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('bower_components/froala-wysiwyg-editor/js/plugins/lists.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('bower_components/froala-wysiwyg-editor/js/plugins/font_size.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('bower_components/froala-wysiwyg-editor/js/plugins/paragraph_format.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('bower_components/froala-wysiwyg-editor/js/plugins/paragraph_style.min.js') }}"></script>

        <script type="text/javascript" src="{{ URL::to('bower_components/froala-wysiwyg-editor/js/plugins/quote.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('bower_components/froala-wysiwyg-editor/js/plugins/table.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('bower_components/froala-wysiwyg-editor/js/plugins/url.min.js') }}"></script>

        <script type="text/javascript" src="{{ URL::to('resources/views/public/assets/js/wickedpicker.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('resources/views/admin/assets/js/default.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('resources/views/public/assets/js/default.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('resources/views/public/assets/js/ajax.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('resources/views/public/assets/js/typejs.js') }}"></script>
        
        <!-- NProgress -->
        <script>
            // Show the progress bar 
            NProgress.start();
            // Increase randomly
            var interval = setInterval(function() { NProgress.inc(); }, 1000);        
            // Trigger finish when page fully loaded
            jQuery(window).load(function () {
                clearInterval(interval);
                NProgress.done();
            });
            // Trigger bar when exiting the page
            jQuery(window).unload(function () {
                NProgress.start();
            });
        </script>
        <!-- Alerts -->
        {!! Toastr::render() !!}
        @include('Alerts::alerts')

    </body>
</html>
