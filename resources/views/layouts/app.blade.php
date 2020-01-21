<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>FSRE-Games</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script src="https://cdn.tiny.cloud/1/kvm3r8ah3dzqtleksdugz6masv1858dk8t7qzvpvy81456na/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://unpkg.com/vue"></script>
    <script src="https://unpkg.com/http-vue-loader"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
    <script type="text/javascript">

        tinymce.init({
        selector: '#mytextarea',
        plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
        imagetools_cors_hosts: ['picsum.photos'],
        menubar: 'file edit view insert format tools table help',
        toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
        toolbar_sticky: true,
        autosave_ask_before_unload: true,
        autosave_interval: "30s",
        autosave_prefix: "{path}{query}-{id}-",
        autosave_restore_when_empty: false,
        autosave_retention: "2m",
        image_advtab: true,
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tiny.cloud/css/codepen.min.css'
        ],
        link_list: [
            { title: 'My page 1', value: 'http://www.tinymce.com' },
            { title: 'My page 2', value: 'http://www.moxiecode.com' }
        ],
        image_list: [
            { title: 'My page 1', value: 'http://www.tinymce.com' },
            { title: 'My page 2', value: 'http://www.moxiecode.com' }
        ],
        image_class_list: [
            { title: 'None', value: '' },
            { title: 'Some class', value: 'class-name' }
        ],
        importcss_append: true,
        height: 400,
        file_picker_callback: function (callback, value, meta) {
            /* Provide file and text for the link dialog */
            if (meta.filetype === 'file') {
            callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
            }

            /* Provide image and alt text for the image dialog */
            if (meta.filetype === 'image') {
            callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
            }

            /* Provide alternative source and posted for the media dialog */
            if (meta.filetype === 'media') {
            callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
            }
        },
        templates: [
                { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
            { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
            { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
        ],
        template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
        template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
        height: 600,
        image_caption: true,
        quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
        noneditable_noneditable_class: "mceNonEditable",
        toolbar_drawer: 'sliding',
        contextmenu: "link image imagetools table",
        });



      </script>
    <!-- Styles -->
    <link href="{{ asset('css/freelancer.min.css') }}" rel="stylesheet">
    <style>
        body{
            background-image:url("{{ asset('img/controller2.jpg') }}")!important;
        }

          nav{
            background-image:url("{{asset('img/carbon.jpg')}}")!important;
          }
          .divider-custom-line{
            background-color: white!important;
          }
          .fa-star{
            color: white!important;
          }
          .copyright{
            background-image: linear-gradient(to right, #242424 , #171717)!important;
          }
        .py-4{

            padding-top: 8rem !important;
        }
        .profile-image{
            width: 150px;
            background-color: rgba(0,0,0,0.3);
        }
        .social-media-links{
            width: 150px;
        }
        .social-media-links a{
            color: #666;
        }
        .social-media-links a:hover{
            color: #444;
        }
        .label-default{
          
                background-color: #777;
                 display: inline;
                padding: .2em .6em .3em;
                font-size: 75%;
                font-weight: 700;
                line-height: 1;
                color: #fff;
                text-align: center;
                white-space: nowrap;
                vertical-align: baseline;
                border-radius: .25em;
        }
        .comment{
            margin-bottom:45px;
        }
        .author-img{
            width:50px;
            height:50px;
            border-radius: 50%;
            float: left;
        }
        .author-name{
            float: left;
            margin-left:15px;
        }
        .author-name>h4{
            margin:5px 0px;
            
        }
        .author-time{
            font-size:11px;
            font-style: italic;
            color:#aaa;
        }
        .comment-content{
            clear:both;
            margin-left: 65px;
            font-size: 16px;
            line-height: 1.3em;
        }
        .comment-title{
            margin-bottom: 45px;
        }
        .comment-title>span{
            margin-right:15px;
        }
        .show{
            display: block;
        }
        .filterDiv {
            float: left;
            background-color: #2196F3;
            color: #ffffff;
            width: 100px;
            line-height: 100px;
            text-align: center;
            margin: 2px;
            display: none; /* Hidden by default */
        }
    
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase">
            <div class="container">
                <a class="navbar-brand text-uppercase font-weight-bold text-white rounded" href="{{ url('/') }}">
                    FSRE-Games
                </a>
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold text-white rounded" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">Menu
                    <i class="fas fa-bars"></i> 
                </button>
                

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link text-uppercase font-weight-bold text-white rounded" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-uppercase font-weight-bold text-white rounded" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="text-white nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{route('profiles.index')}}"><i class="fas fa-users"></i>User list</a>
                          </li>
                          <li class="nav-item mx-0 mx-lg-1">
                            <a class="text-white nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{route('profiles.show',Auth::user())}}"><i class="fas fa-user"></i>My Profile</a>
                          </li>
                          <li class="nav-item mx-0 mx-lg-1">
                            <a class="text-white nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>  {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                            </form>
                          </li>
              
                                @can('manage-users')
                        <li class="nav-item dropdown mx-0 mx-lg-1">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-uppercase font-weight-bold text-white rounded py-3 px-0 px-lg-3 rounded" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                 Menu
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">                                
                                <a href="{{route('admin.users.index')}}" class="dropdown-item">
                                    <i class="fas fa-users"></i> Upravljaj Korisnicima
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="{{route('categories.index')}}" class="dropdown-item">
                                    <i class="fas fa-list-ul"></i> Upravljaj Kategorijama
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="{{route('posts.index')}}" class="dropdown-item">
                                    <i class="fas fa-copy"></i> Upravljaj Objavama
                                </a>
                                @endcan
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')

            <script src="{{asset('js/select2.min.js')}}"></script>
        </main>
    </div>
</body>

</html>