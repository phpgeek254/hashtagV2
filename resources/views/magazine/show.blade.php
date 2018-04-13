@extends('master')
@section('content')
    <script>
        $(document).ready(function(){
            $('.materialboxed').materialbox();
        });
        Dropzone.options.addImages = {
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 8, // MB
            uploadMultiple: true,
            acceptedFiles: ".jpeg,.jpg,.png,.gif"
        };
    </script>
    <style>
        html, body {
            margin: 0;
            height: 100%;
        }

        body {
            background-color: #333;
        }

        /*body.hide-overflow {*/
            /*overflow: hidden;*/
        /*}*/

        /* helpers */

        .t {
            display: table;
            width: 100%;
            height: 100%;
        }

        .tc {
            display: table-cell;
            vertical-align: middle;
            text-align: center;
        }

        .rel {
            position: relative;
        }

        /* book */

        .book {
            margin: 0 auto;
            width: 90%;
            height: 90%;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .book .page {
            width: 100%;
            height: 100%;
        }

        .book .page img {
            max-width: 100%;
            height: 100%;
        }

    </style>
<div class="container">

        @if(Auth::user() and Auth::user()->user_level==1)
        <div class="row">
            @foreach( $magazine->pages as $page)
                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-image">
                                <img  width='100' height="200" class='materialboxed' src="{{ asset($page->page_path) }}">
                        </div>
                        <div class="card-content">
                            <div class="form">
                                {!! Form::open(['route'=>['magazine_page.destroy', $page->id], 'method'=>'delete']) !!}
                                <button class="btn"><i class="fa fa-trash"></i></button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @endif
        <div class="row">

            <div class="col s12 card" style="padding: 10px;">
                    <h5 class="center black-text"> {{ $magazine->magazine_name }}
                        @if(Auth::check() and Auth::user()->user_level == 'admin')
                            <small> {{ count($magazine->pages) }}</small>
                        @endif
                        <br><small> Tap to flip the pages  </small></h5>
            </div>
        </div>
                <div class="row center">

                        <div class="t">
                            <div class="tc rel">

                                <div id="book" class="book">
                            @foreach($magazine->pages as $image)
                                <div class="col s12 m12 l12 page">
                                    <img src="{{ asset($image->page_path) }}" alt="">
                                </div>
                            @endforeach
                                </div>
                                <button id="prevBtn" class="btn"><i class="fa fa-arrow-left"></i></button>
                                <button id="nextBtn" class="btn"><i class="fa fa-arrow-right"></i></button>
                                <button id="fullscreen" class="btn"><i class="fa fa-arrows"></i></button>

                            </div>

                        </div>
                        </div>
    <div class="row">
        @if(Auth::user() and Auth::user()->user_level == '1')

            <div class="row">
                <div class="col s2"></div>
                <div class="col s8 card" style="padding: 20px;">
                {!! Form::open(['route'=>'magazine_page.store', 'files'=>true, "class"=>"dropzone",
                "id"=>"addImages"]) !!}
                    {!! Form::hidden('magazine_id', $magazine->id) !!}
                    <div class="fallback">
                        <input name="file" type="file" multiple />
                    </div>
                        @if($errors)
                        <span class="error">
                            {{ $errors->first('page_path') }}
                        </span>
                        @endif

                        <div class="button" style="margin: 10px;">
                            {!! Form::submit('Add Image', ['class'=>'btn']) !!}
                        </div>
                    </div>

                {!!  Form::close() !!}
                </div>
                <div class="col s2"></div>
            </div>
        @endif
    </div>
    <script type="text/javascript">

        (function () {
            'use strict';

            var module = {
                ratio: 1,
                init: function (id) {

                    var me = this;

                    // if older browser then don't run javascript
                    if (document.addEventListener) {
                        this.el = document.getElementById(id);
                        this.resize();
                        this.plugins();

                        // on window resize, update the plugin size
                        window.addEventListener('resize', function (e) {
                            var size = me.resize();
                            $(me.el).turn('size', size.width, size.height);
                        });
                    }
                },
                resize: function () {
                    // reset the width and height to the css defaults
                    this.el.style.width = '';
                    this.el.style.height = '';

                    var width = this.el.clientWidth,
                        height = Math.round(width / this.ratio),
                        padded = Math.round(document.body.clientHeight * 0.9);

                    // if the height is too big for the window, constrain it
                    if (height > padded) {
                        height = padded;
                        width = Math.round(height * this.ratio);
                    }

                    // set the width and height matching the aspect ratio
                    this.el.style.width = width + 'px';
                    this.el.style.height = height + 'px';

                    return {
                        width: width,
                        height: height
                    };
                },
                plugins: function () {
                    // run the plugin
                    $(this.el).turn({
                        gradients: true,
                        acceleration: true,
                        display: 'single'
                    });
                    // hide the body overflow
                    document.body.className = 'hide-overflow';
                }
            };

            module.init('book');
        }());

        $(function(){
            var book = $("#book");
            $("#prevBtn").click(function() {
                $("#book").turn("previous");
            });

            $("#nextBtn").click(function() {
                $("#book").turn("next");
            });

            $('#fullscreen').click(function() {
                $("#book").turn("size", $(window).width(), $(window).height());
            });


        });
    </script>
</div>

@endsection