<x-layout>
    <style>
        .upload__img-wrap {
            display: flex;
            flex-wrap: wrap;


        }

        .upload__img-box {
            width: 200px;
            padding: 0 10px;
            margin-bottom: 0px;
        }

        .upload__img-close {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.5);
            position: absolute;
            top: 10px;
            right: 10px;
            text-align: center;
            line-height: 24px;
            z-index: 1;
            cursor: pointer;
        }

        .upload__img-close:after {
            content: '\2716';
            font-size: 14px;
            color: white;
        }

        .img-bg {
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            position: relative;
            padding-bottom: 100%;
        }
    </style>

    <x-slot:heading> Home </x-slot:heading>

    <section>
        <form action="/post" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex-none flex-col rounded-lg bg-white p-5 ">
    
                <article class="flex flex-row space-x-3">
                    <div class="">
                        <img src="{{ Vite::asset('resources/images/people-1.jpeg') }}"
                            class="w-14 h-14 border-2  rounded-full" alt="">
                    </div>
                    <div class="flex-1">
                        <textarea name='post' class="w-full h-32 px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-black border-2"
                            placeholder="what is on your mind?"></textarea>
                        <div class="upload__img-wrap  justify-center"></div>
                        <span class="err_msg_upload flex justify-center text-xs text-red-500 mt-1 "> </span>
                    </div>
                </article>
                <footer class="mt-1">
                    <div class="flex justify-end space-x-1">
                        <label for="file-upload"
                            class=" cursor-pointer bg-gray-500 transition-colors text-white duration-300 hover:bg-gray-600 py-2 px-3 text-sm hover:text-white hover:border-transparent rounded">
                            <span class="text-sm">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M10 12.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Z"></path>
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M17 3h-2l-.447-.894A2 2 0 0 0 12.764 1H7.236a2 2 0 0 0-1.789 1.106L5 3H3a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V5a2 2 0 0 0-2-2Z">
                                    </path>
                                </svg>
                            </span>
                            <input type="file" id="file-upload" multiple="multiple" data-max_length="3" name="images[]"
                                class="upload__inputfile hidden bg-gray-500 transition-colors text-white duration-300 hover:bg-gray-600 text-sm hover:text-white hover:border-transparent">
                        </label>
    
                        <x-post-button type="submit">
                            Post
                        </x-post-button>
                    </div>
                </footer>
            </div>
        </form>

    </section>

    <section>
        {{-- @foreach ($users as $user ) --}}
        @if($posts->isEmpty())
        <div class="flex-none mt-3 rounded-lg bg-white py-5 px-5">
            
            <x-post >

            </x-post>

            
        </div>
        @else
        @foreach ($posts as $post )
        <div class="flex-none mt-3 rounded-lg bg-white py-5 px-5">
            
            <x-post :$post>

            </x-post>

            
        </div>
        @endforeach
        @endif
        {{-- @endforeach --}}
        
  
    </section>


</x-layout>

<script type="module">
    $(document).ready(function() {
        ImgUpload();

        function ImgUpload() {
            var imgWrap = "";
            var err_msg = "";
            var imgArray = [];

            $('.upload__inputfile').each(function() {
                $(this).on('change', function(e) {
                    imgWrap = $('.upload__img-wrap');
                    err_msg = $('.err_msg_upload');
                    var maxLength = $(this).attr('data-max_length');

                    var files = e.target.files;
                    var filesArr = Array.prototype.slice.call(files);
                    var iterator = 0;


                    filesArr.forEach(function(f, index) {

                        // if (!f.type.match('image.*')) {
                        // return;
                        // }

                        if (imgArray.length > maxLength) {
                            err_msg.append('Maximum picture is 5')
                        } else {
                            var len = 0;
                            for (var i = 0; i < imgArray.length; i++) {
                                if (imgArray[i] !== undefined) {
                                    len++;
                                }
                            }
                            if (len > maxLength) {
                                return false;
                            } else {
                                imgArray.push(f);

                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    console.log(f.type);
                                    if (f.type == 'application/pdf') {
                                        var html =
                                            "<div class='upload__img-box'><div style='background-image: url(" +
                                            e.target.result + ")' data-number='" +
                                            $(".upload__img-close").length +
                                            "' data-file='" + f.name +
                                            "' class='img-bg' ><div class='upload__img-close'></div><img  src='https://cdn-icons-png.flaticon.com/128/337/337946.png'></div></div>";

                                    } else {
                                        var html =
                                            "<div class='upload__img-box'><div style='background-image: url(" +
                                            e.target.result + ")' data-number='" +
                                            $(".upload__img-close").length +
                                            "' data-file='" + f.name +
                                            "' class='img-bg rounded'><div class='upload__img-close'></div></div></div>";
                                        $(".upload__img-wrap").addClass(
                                            "border-2 p-2 rounded");


                                    }
                                    imgWrap.append(html);
                                    iterator++;
                                }
                                reader.readAsDataURL(f);
                            }
                        }
                    });
                });
            });

            $('body').on('click', ".upload__img-close", function(e) {
                var file = $(this).parent().data("file");
                for (var i = 0; i < imgArray.length; i++) {
                    if (imgArray[i].name === file) {
                        imgArray.splice(i, 1);
                        break;
                    }
                }
                if (imgArray.length == 0) {
                    $(".upload__img-wrap").removeClass("border-2 p-2");
                }

                $(this).parent().parent().remove();
                $(this).parent().children().remove();

            });
        }
    });
</script>
